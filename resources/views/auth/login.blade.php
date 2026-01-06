@extends('layouts.app')

@section('title', 'Login - Ironing Master')

@section('content')
<section class="auth-page">
    <div class="container">
        <div class="auth-container">
            <div class="auth-card">
                <!-- Left Side - Welcome & Features -->
                <div class="auth-left">
                    <div class="auth-logo">
                        <img src="{{ asset('assets/images/logo/ironing_master_logo_white.png') }}" alt="Ironing Master">
                    </div>
                    
                    <div class="welcome-text">
                        <h2>Welcome Back!</h2>
                        <p>Sign in to access your account and manage your laundry services.</p>
                    </div>
                    
                    <div class="auth-features">
                        <div class="auth-feature">
                            <div class="auth-feature-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="auth-feature-content">
                                <h4>Fast Pickup</h4>
                                <p>Schedule pickups at your convenience</p>
                            </div>
                        </div>
                        
                        <div class="auth-feature">
                            <div class="auth-feature-icon">
                                <i class="fas fa-tshirt"></i>
                            </div>
                            <div class="auth-feature-content">
                                <h4>Professional Care</h4>
                                <p>Expert laundry and ironing services</p>
                            </div>
                        </div>
                        
                        <div class="auth-feature">
                            <div class="auth-feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="auth-feature-content">
                                <h4>On-time Delivery</h4>
                                <p>Fresh clothes delivered to your doorstep</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Form -->
                <div class="auth-right">
                    <div class="auth-logo d-md-none">
                        <img src="{{ asset('assets/images/logo/IRONING_MASTER_NEW.png') }}" alt="Ironing Master">
                    </div>
                    
                    <h1 class="auth-title">Login to Your Account</h1>
                    <p class="auth-subtitle">Enter your credentials to access your account</p>
                    
                    <form method="POST" action="#" id="loginForm">
                        @csrf
                        
                        <div class="auth-form-group">
                            <label class="auth-form-label" for="email">Email Address</label>
                            <input type="email" class="auth-form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="auth-form-group">
                            <label class="auth-form-label" for="password">Password</label>
                            <div class="password-wrapper">
                                <input type="password" class="auth-form-control" id="password" name="password" placeholder="Enter your password" required>
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="auth-form-group d-flex justify-content-between align-items-center">
                            <div class="auth-form-check">
                                <input type="checkbox" class="auth-form-check-input" id="remember">
                                <label class="auth-form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="forgot-link">Forgot Password?</a>
                        </div>
                        
                        <button type="submit" class="auth-btn">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </button>
                        
                        <div class="auth-link mt-3">
                            Don't have an account? <a href="{{ route('register') }}">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function togglePassword(fieldId) {
        const passwordInput = document.getElementById(fieldId);
        const toggleIcon = document.querySelector(`#${fieldId} + .password-toggle i`);
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
    
    // Form validation
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        
        // Simple validation
        if (!email || !password) {
            alert('Please fill in all fields');
            return;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address');
            return;
        }
        
        // If validation passes
        alert('Login successful!');
        // In real application, you would submit the form here
        // this.submit();
    });
</script>
@endsection