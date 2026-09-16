<!doctype html>
<html lang="id">
<head>
    <title>Login Admin & Juri | Indonesia Superband Competition</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/staff-login/css/style.css') }}">
    <style>
        :root {
            --isc-purple: #51206f;
            --isc-blue: #273f96;
            --isc-ink: #0a0c00;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(39, 63, 150, 0.08), rgba(81, 32, 111, 0.12)), #f7f8fc;
        }

        .ftco-section {
            min-height: 100vh;
            padding: 72px 0;
            display: flex;
            align-items: center;
        }

        .login-wrap {
            border-radius: 8px;
            box-shadow: 0 24px 70px rgba(10, 12, 0, 0.12);
        }

        .login-wrap .icon {
            background: var(--isc-purple);
            color: #fff;
        }

        .btn.btn-primary {
            background: var(--isc-purple) !important;
            border-color: var(--isc-purple) !important;
            letter-spacing: 0;
        }

        .form-control:focus {
            border-color: var(--isc-blue);
            box-shadow: 0 0 0 0.2rem rgba(39, 63, 150, 0.15);
        }

    </style>
</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <div class="login-wrap p-4 p-md-5">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fas fa-user-shield" aria-hidden="true"></span>
                    </div>
                    <h3 class="text-center mb-4">Admin Panel</h3>
                    <form action="{{ route('login.store') }}" method="POST" class="login-form">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control rounded-left" placeholder="Email" value="{{ old('email') }}" autocomplete="email" required>
                            @error('email')
                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group d-flex">
                            <input type="password" name="password" class="form-control rounded-left" placeholder="Password" autocomplete="current-password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input type="checkbox" name="remember" value="1" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="{{ route('home') }}">Kembali ke Home</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('assets/auth/staff-login/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/auth/staff-login/js/popper.js') }}"></script>
<script src="{{ asset('assets/auth/staff-login/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/auth/staff-login/js/main.js') }}"></script>
</body>
</html>
