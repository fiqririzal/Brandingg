<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Maniac PS</title>
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.png') }}" type="image/png">
    <script src="{{ asset('mazer/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('mazer/assets/js/app.js') }}"></script>

</head>

<body>
    <div id="auth">
        <div class="container mx-auto mt-5 col-lg-5">
            <h1 class="auth-title">Register</h1>
            <p class="auth-subtitle mb-5">Please enter your personal data correctly.</p>

            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="form-group position-relative mb-4">
                    <input type="name" name="name" class="form-control form-control-xl" placeholder="Full Name"
                        value="{{ old('name') }}" required>
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="email" name="email" class="form-control form-control-xl" placeholder="Email"
                        value="{{ old('email') }}" required>
                </div>
                <div class="form-group position-relative mb-4">
                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password"
                        required>

                </div>
                <div class="form-group position-relative mb-4">
                    <input type="number" name="phone" class="form-control form-control-xl" placeholder="Phone"
                        required>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-2 ">Register</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="auth-subtitle">Back to login? <a href="{{ url('/login') }}" class="font-bold">Login</a>.</p>
            </div>

        </div>
    </div>
</body>

</html>
