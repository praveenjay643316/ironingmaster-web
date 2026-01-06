@extends('layouts.app')

@section('title', 'Register - Ironing Master')

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
                    
                    <form method="POST" action="#" id="registerForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="auth-form-group">
                                    <label class="auth-form-label" for="name">Full Name</label>
                                    <input type="text" class="auth-form-control" id="name" name="name" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="auth-form-group">
                                    <label class="auth-form-label" for="email">Email Address</label>
                                    <input type="email" class="auth-form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="auth-form-group">
                                    <label class="auth-form-label" for="mobile">Mobile Number</label>
                                    <input type="tel" class="auth-form-control" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="auth-form-group">
                                    <label class="auth-form-label" for="password">Password</label>
                                    <div class="password-wrapper">
                                        <input type="password" class="auth-form-control" id="password" name="password" placeholder="Create a password" required>
                                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="auth-form-group">
                            <label class="auth-form-label" for="confirm_password">Confirm Password</label>
                            <div class="password-wrapper">
                                <input type="password" class="auth-form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                                <button type="button" class="password-toggle" onclick="togglePassword('confirm_password')">
                                    <i class="far fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="auth-form-group">
                            <div class="auth-form-check">
                                <input type="checkbox" class="auth-form-check-input" id="terms" name="terms" required>
                                <label class="auth-form-check-label" for="terms">
                                    I agree to the <a href="#" class="forgot-link">Terms of Service</a> and <a href="#" class="forgot-link">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="auth-btn">
                            <i class="fas fa-user-plus mr-2"></i> Create Account
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
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const mobile = document.getElementById('mobile').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const terms = document.getElementById('terms').checked;
        
        // Validation
        let isValid = true;
        let errorMessage = '';
        
        // Name validation
        if (name.length < 2) {
            isValid = false;
            errorMessage = 'Name must be at least 2 characters';
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            isValid = false;
            errorMessage = 'Please enter a valid email address';
        }
        
        // Mobile validation
        const mobileRegex = /^[0-9]{10}$/;
        if (!mobileRegex.test(mobile)) {
            isValid = false;
            errorMessage = 'Please enter a valid 10-digit mobile number';
        }
        
        // Password validation
        if (password.length < 8) {
            isValid = false;
            errorMessage = 'Password must be at least 8 characters';
        }
        
        // Confirm password validation
        if (password !== confirmPassword) {
            isValid = false;
            errorMessage = 'Passwords do not match';
        }
        
        // Terms validation
        if (!terms) {
            isValid = false;
            errorMessage = 'You must agree to the terms and conditions';
        }
        
        if (!isValid) {
            alert(errorMessage);
            return;
        }
        
        // If validation passes
        alert('Registration successful!');
        // In real application, you would submit the form here
        // this.submit();
    });
</script>
@endsection