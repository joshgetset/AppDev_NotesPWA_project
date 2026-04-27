<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Vite CSS and JS -->
    @vite(['resources/css/auth.css', 'resources/js/auth.js'])

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="auth-container">
    <form method="POST" action="{{ route('login') }}" class="auth-card auth-form">
        @csrf

        <h1 class="text-center mb-4">Log in</h1>

        <!-- Email -->
        <div class="input-wrapper mb-3">
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" class="form-control" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password -->
        <div class="input-wrapper mb-4">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Remember Me -->
        <label class="remember-me mb-4">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>

        <!-- Login Button -->
        <button type="submit" class="btn btn-primary w-100 mb-3">
            <i class="fa fa-right-to-bracket me-2"></i> Login
        </button>

        <!-- Register Link -->
        <p class="text-center mt-2">
            Don't have an account yet? <a href="{{ route('register') }}">Register here</a>
        </p>
    </form>
</div>

</body>
</html>