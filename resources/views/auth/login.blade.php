@extends('layouts.app')

@section('title', 'Login - Ironing Master')

@section('content')
<section class="auth-page">
    <div class="container">
        <div class="auth-container">
            <div class="auth-card">
                <!-- Left Side -->
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
                    <p class="auth-subtitle">Enter your email/phone and password to access your account</p>
                    
                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Error Messages --}}
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('login.submit') }}" id="loginForm">
                        @csrf
                        
                        <div class="auth-form-group">
                            <label class="auth-form-label" for="login">Email Address or Phone Number</label>
                            <input type="text" 
                                   class="auth-form-control @error('login') is-invalid @enderror" 
                                   id="login" 
                                   name="login" 
                                   value="{{ old('login') }}"
                                   placeholder="Enter your email or phone number" 
                                   required 
                                   autofocus>
                            @error('login')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-text text-muted">
                                You can login using your email or phone number
                            </small>
                        </div>
                        
                        <div class="auth-form-group">
                            <label class="auth-form-label" for="password">Password</label>
                            <div class="password-wrapper">
                                <input type="password" 
                                       class="auth-form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Enter your password" 
                                       required>
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="auth-form-group d-flex justify-content-between align-items-center">
                            <div class="auth-form-check">
                                <input type="checkbox" class="auth-form-check-input" id="remember" name="remember">
                                <label class="auth-form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="forgot-link">Forgot Password?</a>
                        </div>
                        
                        <button type="submit" class="auth-btn" id="loginBtn">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
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

@push('styles')
<style>
    .alert {
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 20px;
    }
    
    .alert-success {
        background-color: #d1f2eb;
        border-color: #28a745;
        color: #155724;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        border-color: #dc3545;
        color: #721c24;
    }
    
    .alert ul {
        margin: 0;
        padding-left: 20px;
    }
    
    .alert ul li {
        margin-bottom: 5px;
    }
    
    .alert ul li:last-child {
        margin-bottom: 0;
    }
    
    .is-invalid {
        border-color: #dc3545 !important;
    }
    
    .invalid-feedback {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }
    
    .auth-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
    
    .form-text {
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }
</style>
@endpush

@push('scripts')
<script>
function togglePassword(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    const toggleIcon = passwordInput.nextElementSibling.querySelector('i');
    
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

// Form submission handling
document.getElementById('loginForm').addEventListener('submit', function(e) {
    const button = document.getElementById('loginBtn');
    button.disabled = true;
    button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Logging in...';
});

// Auto-dismiss alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script>
@endpush