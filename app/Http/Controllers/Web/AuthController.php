<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    private function getApiUrl($endpoint)
    {
        return config('services.admin_api.url') . $endpoint;
    }

    public function showLogin()
    {
        if (Session::has('user') && Session::has('token')) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function showRegister()
    {
        if (Session::has('user') && Session::has('token')) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    public function login(Request $request)
    {
        // Validate input - accept login field (email or phone)
        $validated = $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',
        ], [
            'login.required' => 'Email or phone number is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
        ]);

        try {
            $response = Http::when(
                app()->environment('local'),
                fn($http) => $http->withoutVerifying()
            )
            ->timeout(30)
            ->post($this->getApiUrl('/login'), [
                'login' => $validated['login'],
                'password' => $validated['password'],
            ]);

            Log::info('Login API Response', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            // Handle different response codes
            if ($response->status() === 401) {
                return back()
                    ->withErrors(['login' => 'Invalid email/phone or password. Please try again.'])
                    ->withInput($request->only('login'));
            }

            if ($response->status() === 403) {
                return back()
                    ->withErrors(['login' => 'Access denied. This account is not authorized for web access.'])
                    ->withInput($request->only('login'));
            }

            if ($response->failed()) {
                $errorData = $response->json();
                $errorMessage = $errorData['message'] ?? 'Login failed. Please try again.';
                
                return back()
                    ->withErrors(['login' => $errorMessage])
                    ->withInput($request->only('login'));
            }

            $data = $response->json();

            // Validate response structure
            if (!isset($data['user']) || !isset($data['token'])) {
                Log::error('Invalid API response structure', ['data' => $data]);
                return back()
                    ->withErrors(['login' => 'Server error. Please contact support.'])
                    ->withInput($request->only('login'));
            }

            // Regenerate session for security
            $request->session()->regenerate();

            // Store user data
            Session::put('user', [
                'id' => $data['user']['id'],
                'name' => $data['user']['name'] ?? 'User',
                'email' => $data['user']['email'],
                'phone' => $data['user']['phone'] ?? null,
                'role' => $data['user']['role_id'] ?? 'customer',
            ]);

            Session::put('token', $data['token']);

            Log::info('User logged in successfully', [
                'user_id' => $data['user']['id'],
                'login' => $validated['login'],
            ]);

            return redirect()
                ->intended(route('booking'))
                ->with('success', 'Welcome back, ' . ($data['user']['name'] ?? 'User') . '!');

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('API Connection Error', [
                'error' => $e->getMessage(),
                'url' => $this->getApiUrl('/login'),
            ]);

            return back()
                ->withErrors(['login' => 'Unable to connect to server. Please try again later.'])
                ->withInput($request->only('login'));

        } catch (\Exception $e) {
            Log::error('Login Exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withErrors(['login' => 'An unexpected error occurred. Please try again.'])
                ->withInput($request->only('login'));
        }
    }

    public function register(Request $request)
    {
        // Validate input including phone
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:10|max:15',
            'password' => 'required|string|min:8|max:255',
        ], [
            'name.required' => 'Full name is required',
            'name.min' => 'Name must be at least 2 characters',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'phone.required' => 'Phone number is required',
            'phone.min' => 'Phone number must be at least 10 digits',
            'phone.max' => 'Phone number must not exceed 15 digits',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        try {
            $response = Http::when(
                app()->environment('local'),
                fn($http) => $http->withoutVerifying()
            )
            ->timeout(30)
            ->post($this->getApiUrl('/signup'), [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'password' => $validated['password'],
            ]);

            Log::info('Register API Response', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            // Handle API errors
            if ($response->failed()) {
                $apiData = $response->json();
                $errorMessage = $apiData['message'] ?? 'Registration failed.';
                
                // Check for specific error messages
                if (str_contains(strtolower($errorMessage), 'email') && 
                    str_contains(strtolower($errorMessage), 'taken')) {
                    $errorMessage = 'This email is already registered. Please login or use a different email.';
                }
                
                if (str_contains(strtolower($errorMessage), 'phone') && 
                    str_contains(strtolower($errorMessage), 'taken')) {
                    $errorMessage = 'This phone number is already registered. Please login or use a different number.';
                }

                return back()
                    ->withErrors(['email' => $errorMessage])
                    ->withInput($request->except('password'));
            }

            $apiData = $response->json();

            // Validate response structure
            if (!isset($apiData['data']['user']) || !isset($apiData['data']['token'])) {
                Log::error('Invalid register API response', ['data' => $apiData]);
                return back()
                    ->withErrors(['email' => 'Server error. Please try again.'])
                    ->withInput($request->except('password'));
            }

            $user = $apiData['data']['user'];
            $token = $apiData['data']['token'];

            // Regenerate session for security
            $request->session()->regenerate();

            // Store user data
            Session::put('user', [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'] ?? null,
                'role' => $user['role_id'] ?? 'customer',
            ]);

            Session::put('token', $token);

            Log::info('User registered successfully', [
                'user_id' => $user['id'],
                'email' => $user['email'],
            ]);

            return redirect()
                ->route('home')
                ->with('success', $apiData['message'] ?? 'Account created successfully! Welcome to Ironing Master.');

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Register API Connection Error', [
                'error' => $e->getMessage(),
                'url' => $this->getApiUrl('/signup'),
            ]);

            return back()
                ->withErrors(['email' => 'Cannot connect to server. Please try again later.'])
                ->withInput($request->except('password'));

        } catch (\Exception $e) {
            Log::error('Register Exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()
                ->withErrors(['email' => 'Something went wrong. Please try again.'])
                ->withInput($request->except('password'));
        }
    }

    public function logout(Request $request)
    {
        $token = Session::get('token');
        $user = Session::get('user');

        // Call logout API
        if ($token) {
            try {
                Http::when(
                    app()->environment('local'),
                    fn($http) => $http->withoutVerifying()
                )
                ->withToken($token)
                ->timeout(10)
                ->post($this->getApiUrl('/logout'));
            } catch (\Exception $e) {
                Log::warning('Logout API call failed', ['error' => $e->getMessage()]);
            }
        }

        // Clear session
        Session::forget(['user', 'token']);
        Session::flush();

        Log::info('User logged out', ['email' => $user['email'] ?? 'unknown']);

        return redirect()
            ->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}