@extends('layouts.app')

@section('title', 'Register - Ironing Master')

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
                        <h2>Join Ironing Master!</h2>
                        <p>Create an account to enjoy our premium laundry services.</p>
                    </div>
                    
                    <div class="auth-features">
                        <div class="auth-feature">
                            <div class="auth-feature-icon">
                                <i class="fas fa-percentage"></i>
                            </div>
                            <div class="auth-feature-content">
                                <h4>Exclusive Discounts</h4>
                                <p>Get special offers for members</p>
                            </div>
                        </div>
                        
                        <div class="auth-feature">
                            <div class="auth-feature-icon">
                                <i class="fas fa-history"></i>
                            </div>
                            <div class="auth-feature-content">
                                <h4>Order History</h4>
                                <p>Track all your laundry orders</p>
                            </div>
                        </div>
                        
                        <div class="auth-feature">
                            <div class="auth-feature-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="auth-feature-content">
                                <h4>Quick Booking</h4>
                                <p>Schedule services in seconds</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Form -->
                <div class="auth-right">
                    <div class="auth-logo d-md-none">
                        <img src="{{ asset('assets/images/logo/IRONING_MASTER_NEW.png') }}" alt="Ironing Master">
                    </div>
                    
                    <h1 class="auth-title">Create Your Account</h1>
                    <p class="auth-subtitle">Fill in your details to get started</p>
                    
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
                    
                    <form method="POST" action="{{ route('register.submit') }}" id="registerForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="auth-form-group">
                                    <label class="auth-form-label" for="name">
                                        Full Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="auth-form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}"
                                           placeholder="Enter your full name" 
                                           required
                                           autofocus>
                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="auth-form-group">
                                    <label class="auth-form-label" for="email">
                                        Email Address <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" 
                                           class="auth-form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           placeholder="Enter your email" 
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="auth-form-group">
                                    <label class="auth-form-label" for="phone">
                                        Phone Number <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" 
                                           class="auth-form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}"
                                           placeholder="Enter your phone number" 
                                           required
                                           pattern="[0-9]{10,15}"
                                           minlength="10"
                                           maxlength="15">
                                    @error('phone')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Enter 10-15 digit phone number
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="auth-form-group">
                                    <label class="auth-form-label" for="password">
                                        Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="password-wrapper">
                                        <input type="password" 
                                               class="auth-form-control @error('password') is-invalid @enderror" 
                                               id="password" 
                                               name="password" 
                                               placeholder="Create a password (min 8 characters)" 
                                               required
                                               minlength="8">
                                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Password must be at least 8 characters long
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="auth-form-group">
                            <div class="auth-form-check">
                                <input type="checkbox" 
                                       class="auth-form-check-input @error('terms') is-invalid @enderror" 
                                       id="terms" 
                                       name="terms" 
                                       required>
                                <label class="auth-form-check-label" for="terms">
                                    I agree to the <a href="#" class="forgot-link">Terms of Service</a> and 
                                    <a href="#" class="forgot-link">Privacy Policy</a>
                                    <span class="text-danger">*</span>
                                </label>
                            </div>
                            @error('terms')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="auth-btn" id="registerBtn">
                            <i class="fas fa-user-plus me-2"></i> Create Account
                        </button>
                        
                        <div class="auth-link mt-3">
                            Already have an account? <a href="{{ route('login') }}">Login here</a>
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
    
    .text-danger {
        color: #dc3545;
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

// Form validation
document.getElementById('registerForm').addEventListener('submit', function(e) {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const password = document.getElementById('password').value;
    const terms = document.getElementById('terms').checked;
    
    let errors = [];
    
    // Name validation
    if (name.length < 2) {
        errors.push('Name must be at least 2 characters long');
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errors.push('Please enter a valid email address');
    }
    
    // Phone validation
    const phoneRegex = /^[0-9]{10,15}$/;
    if (!phoneRegex.test(phone)) {
        errors.push('Please enter a valid 10-15 digit phone number');
    }
    
    // Password validation
    if (password.length < 8) {
        errors.push('Password must be at least 8 characters long');
    }
    
    // Terms validation
    if (!terms) {
        errors.push('You must agree to the Terms of Service and Privacy Policy');
    }
    
    if (errors.length > 0) {
        e.preventDefault();
        alert('Please fix the following errors:\n\n' + errors.join('\n'));
        return false;
    }
    
    // Disable button and show loading
    const button = document.getElementById('registerBtn');
    button.disabled = true;
    button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Creating Account...';
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