<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Vite CSS and JS -->
    @vite(['resources/css/auth.css', 'resources/js/auth.js'])
</head>
<body>

<div class="auth-container">
    <form action="{{ route('register.store') }}" method="POST" class="auth-card auth-form">
        @csrf

        <h1 class="text-center mb-4">Create Account</h1>

        <!-- Full Name -->
        <div class="input-wrapper mb-3">
            <i class="fa fa-user"></i>
            <input 
                type="text" 
                name="name" 
                class="form-control" 
                placeholder="Full Name" 
                value="{{ old('name') }}"
            >
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Email -->
        <div class="input-wrapper mb-3">
            <i class="fa fa-envelope"></i>
            <input 
                type="email" 
                name="email" 
                class="form-control" 
                placeholder="Email Address" 
                value="{{ old('email') }}"
            >
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password -->
        <div class="input-wrapper mb-3">
            <i class="fa fa-lock"></i>
            <input 
                type="password" 
                name="password" 
                class="form-control" 
                placeholder="Password"
            >
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Admin Key (Optional) -->
        <div class="input-wrapper mb-4">
            <i class="fa fa-key"></i>
            <input 
                type="text" 
                name="admin_key" 
                class="form-control" 
                placeholder="Admin Key (optional)"
                value="{{ old('admin_key') }}"
            >
        </div>

        <!-- Register Button -->
        <button type="submit" class="btn btn-primary w-100 mb-3">
            <i class="fa fa-user-plus me-2"></i> Register
        </button>

        <!-- Login Link -->
        <p class="text-center mt-2">
            Have an account? <a href="{{ route('login') }}">Login</a>
        </p>
    </form>
</div>

</body>
</html>