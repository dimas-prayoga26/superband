<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Voting | Indonesia Superband Competition</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/voting-login/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <style>
        :root {
            --isc-purple: #51206f;
            --isc-blue: #273f96;
            --isc-yellow: #f4bc22;
            --isc-dark: #111827;
        }

        body {
            margin: 0;
        }

        .voting-login-section {
            min-height: 100vh;
            background:
                linear-gradient(135deg, rgba(11, 16, 32, 0.7), rgba(39, 63, 150, 0.48)),
                url("{{ asset('assets/jember-feed-19.png') }}") center / cover no-repeat;
        }

        .voting-login-card {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 24px 70px rgba(17, 24, 39, 0.28);
            overflow: hidden;
        }

        .voting-silhouette-stage {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 560px;
            overflow: hidden;
            background:
                linear-gradient(135deg, var(--isc-yellow) 0%, #ffd85d 52%, #f6b81d 100%);
            border-radius: 1rem 0 0 1rem;
        }

        .voting-silhouette-stage::after {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
            height: 52%;
            content: "";
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.58), transparent);
            pointer-events: none;
        }

        .voting-login-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            box-sizing: border-box;
            z-index: 0;
            opacity: 0;
            animation: voting-silhouette-fade 10s infinite;
            transform: scale(0.98);
        }

        .voting-login-image:nth-child(2) {
            animation-delay: 5s;
        }

        .voting-personnel-card {
            position: absolute;
            inset: 0;
            z-index: 2;
            color: var(--isc-dark);
            opacity: 0;
            animation: voting-personnel-fade 10s infinite;
            pointer-events: none;
        }

        .voting-personnel-card.is-second {
            animation-delay: 5s;
        }

        .voting-personnel-bubble {
            position: absolute;
            display: inline-flex;
            align-items: center;
            min-height: 2.4rem;
            padding: 0.55rem 0.8rem;
            color: #ffffff;
            background: rgba(17, 24, 39, 0.86);
            border: 1px solid rgba(255, 255, 255, 0.22);
            border-radius: 999px;
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.24);
            backdrop-filter: blur(10px);
        }

        .voting-personnel-bubble.is-top-left {
            top: 1.25rem;
            left: 1.25rem;
        }

        .voting-personnel-bubble.is-under-label {
            top: 3.1rem;
            left: 1.25rem;
        }

        .voting-personnel-bubble.is-school {
            right: 1.1rem;
            bottom: 7.4rem;
        }

        .voting-personnel-name-row {
            position: absolute;
            bottom: 1.4rem;
            left: 1.25rem;
            display: flex;
            gap: 0.45rem;
            align-items: center;
            max-width: calc(100% - 2.5rem);
        }

        .voting-personnel-name-row .voting-personnel-bubble {
            position: static;
        }

        .voting-personnel-bubble.is-label {
            min-height: auto;
            padding: 0.32rem 0.68rem;
            font-size: 0.68rem;
            font-weight: 800;
            line-height: 1;
            color: var(--isc-dark);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            background: var(--isc-yellow);
        }

        .voting-personnel-bubble.is-name {
            width: fit-content;
            max-width: 12.2rem;
            font-size: 1.35rem;
            font-weight: 800;
            line-height: 1.05;
            white-space: nowrap;
        }

        .voting-personnel-bubble.is-meta {
            flex-direction: column;
            align-items: flex-start;
            min-height: 3.05rem;
            min-width: 5.8rem;
            padding: 0.48rem 0.78rem;
            font-size: 0.78rem;
            font-weight: 700;
            line-height: 1.15;
        }

        .voting-personnel-bubble.is-class {
            min-width: 4rem;
        }

        .voting-personnel-bubble small {
            margin-bottom: 0.18rem;
            font-size: 0.6rem;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.58);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        @keyframes voting-personnel-fade {
            0%,
            45% {
                opacity: 1;
                transform: translateY(0);
            }

            50%,
            95% {
                opacity: 0;
                transform: translateY(14px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes voting-silhouette-fade {
            0%,
            45% {
                opacity: 1;
                transform: scale(1);
            }

            50%,
            95% {
                opacity: 0;
                transform: scale(1.03);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .voting-brand-logo {
            width: 46px;
            height: 46px;
            object-fit: contain;
        }

        .voting-title {
            letter-spacing: 1px;
        }

        .voting-auth-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.35rem;
            padding: 0.3rem;
            margin-bottom: 1.25rem;
            background: #f3f4f6;
            border-radius: 999px;
        }

        .voting-auth-tab {
            padding: 0.65rem 1rem;
            font-weight: 800;
            color: #6b7280;
            background: transparent;
            border: 0;
            border-radius: 999px;
        }

        .voting-auth-tab.is-active {
            color: #ffffff;
            background: var(--isc-dark);
            box-shadow: 0 10px 22px rgba(17, 24, 39, 0.16);
        }

        .voting-auth-form {
            display: none;
        }

        .voting-auth-form.is-active {
            display: block;
        }

        .btn-voting-login {
            --bs-btn-bg: var(--isc-dark);
            --bs-btn-border-color: var(--isc-dark);
            --bs-btn-hover-bg: #000000;
            --bs-btn-hover-border-color: #000000;
            --bs-btn-active-bg: #000000;
            --bs-btn-active-border-color: #000000;
            color: #ffffff;
        }

        .btn-voting-login:hover,
        .btn-voting-login:focus,
        .btn-voting-login:active {
            color: #ffffff !important;
        }

        .form-control:focus {
            border-color: var(--isc-purple);
            box-shadow: 0 0 0 0.2rem rgba(81, 32, 111, 0.15);
        }

        @media (max-width: 767.98px) {
            .voting-login-section {
                min-height: 100svh;
            }

            .voting-login-card {
                border-radius: 0.85rem;
            }

            .voting-card-body {
                padding: 2rem !important;
            }
        }
    </style>
</head>
<body>
<section class="voting-login-section vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card voting-login-card">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <div class="voting-silhouette-stage">
                                <img
                                    src="{{ asset('assets/Alone.jpg') }}"
                                    alt=""
                                    class="img-fluid voting-login-image"
                                >
                                <img
                                    src="{{ asset('assets/Testing10.jpg') }}"
                                    alt=""
                                    class="img-fluid voting-login-image"
                                >
                                <div class="voting-personnel-card">
                                    <span class="voting-personnel-bubble is-label is-top-left">Grand Finalist</span>
                                    <span class="voting-personnel-bubble is-meta is-under-label"><small>Posisi</small>Vocalist</span>
                                    <span class="voting-personnel-bubble is-meta is-school"><small>Sekolah</small>SMAN 2 Jember</span>
                                    <div class="voting-personnel-name-row">
                                        <span class="voting-personnel-bubble is-name">Raka Pratama</span>
                                        <span class="voting-personnel-bubble is-meta is-class"><small>Kelas</small>12</span>
                                    </div>
                                </div>
                                <div class="voting-personnel-card is-second">
                                    <span class="voting-personnel-bubble is-label is-top-left">Grand Finalist</span>
                                    <span class="voting-personnel-bubble is-meta is-under-label"><small>Posisi</small>Keyboardist</span>
                                    <span class="voting-personnel-bubble is-meta is-school"><small>Sekolah</small>SMK Negeri 5 Jember</span>
                                    <div class="voting-personnel-name-row">
                                        <span class="voting-personnel-bubble is-name">Naya Sekar</span>
                                        <span class="voting-personnel-bubble is-meta is-class"><small>Kelas</small>11</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black voting-card-body">
                                @php
                                    $activeVotingForm = old('_form') === 'register' ? 'register' : 'login';
                                @endphp

                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <img
                                        src="{{ asset('assets/img/logo.png') }}"
                                        alt="Indonesia Superband Competition"
                                        class="me-3 voting-brand-logo"
                                    >
                                    <span class="h1 fw-bold mb-0">ISC Voting</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3 voting-title">Masuk atau daftar akun voting</h5>

                                <div class="voting-auth-tabs" role="tablist" aria-label="Voting auth">
                                    <button
                                        type="button"
                                        class="voting-auth-tab {{ $activeVotingForm === 'login' ? 'is-active' : '' }}"
                                        data-auth-form-target="login"
                                    >
                                        Login
                                    </button>
                                    <button
                                        type="button"
                                        class="voting-auth-tab {{ $activeVotingForm === 'register' ? 'is-active' : '' }}"
                                        data-auth-form-target="register"
                                    >
                                        Register
                                    </button>
                                </div>

                                <form
                                    action="{{ route('voting.login.store') }}"
                                    method="POST"
                                    class="voting-auth-form {{ $activeVotingForm === 'login' ? 'is-active' : '' }}"
                                    data-auth-form="login"
                                >
                                    @csrf
                                    <input type="hidden" name="_form" value="login">

                                    <div class="form-outline mb-4">
                                        <input
                                            type="tel"
                                            id="votingPhone"
                                            name="phone"
                                            class="form-control form-control-lg"
                                            value="{{ old('_form') === 'login' ? old('phone') : '' }}"
                                            autocomplete="tel"
                                            inputmode="numeric"
                                            maxlength="13"
                                            pattern="[0-9]*"
                                            required
                                        >
                                        <label class="form-label" for="votingPhone">Nomor HP</label>
                                        @if ($activeVotingForm === 'login')
                                            @error('phone')
                                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input
                                            type="password"
                                            id="votingPassword"
                                            name="password"
                                            class="form-control form-control-lg"
                                            autocomplete="current-password"
                                            required
                                        >
                                        <label class="form-label" for="votingPassword">Password</label>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="1" id="rememberVotingDevice" checked>
                                            <label class="form-check-label text-dark" for="rememberVotingDevice">
                                                Remember me
                                            </label>
                                        </div>
                                        <a class="small text-muted" href="{{ route('home') }}">Back to home</a>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-voting-login btn-lg btn-block w-100" type="submit">Login</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">
                                        Gunakan nomor HP voter yang sudah terdaftar untuk masuk.
                                    </p>
                                    <a href="{{ route('home') }}" class="small text-muted">Terms of use.</a>
                                    <a href="{{ route('home') }}" class="small text-muted ms-2">Privacy policy</a>
                                </form>

                                <form
                                    action="{{ route('voting.register.store') }}"
                                    method="POST"
                                    class="voting-auth-form {{ $activeVotingForm === 'register' ? 'is-active' : '' }}"
                                    data-auth-form="register"
                                >
                                    @csrf
                                    <input type="hidden" name="_form" value="register">

                                    <div class="form-outline mb-3">
                                        <input
                                            type="text"
                                            id="votingRegisterName"
                                            name="name"
                                            class="form-control form-control-lg"
                                            value="{{ old('_form') === 'register' ? old('name') : '' }}"
                                            autocomplete="name"
                                            required
                                        >
                                        <label class="form-label" for="votingRegisterName">Nama</label>
                                        @error('name')
                                            <small class="text-danger d-block mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input
                                            type="tel"
                                            id="votingRegisterPhone"
                                            name="phone"
                                            class="form-control form-control-lg"
                                            value="{{ old('_form') === 'register' ? old('phone') : '' }}"
                                            autocomplete="tel"
                                            inputmode="numeric"
                                            maxlength="13"
                                            pattern="[0-9]*"
                                            required
                                        >
                                        <label class="form-label" for="votingRegisterPhone">Nomor HP</label>
                                        @if ($activeVotingForm === 'register')
                                            @error('phone')
                                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input
                                            type="password"
                                            id="votingRegisterPassword"
                                            name="password"
                                            class="form-control form-control-lg"
                                            autocomplete="new-password"
                                            required
                                        >
                                        <label class="form-label" for="votingRegisterPassword">Password</label>
                                        @if ($activeVotingForm === 'register')
                                            @error('password')
                                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input
                                            type="password"
                                            id="votingRegisterPasswordConfirmation"
                                            name="password_confirmation"
                                            class="form-control form-control-lg"
                                            autocomplete="new-password"
                                            required
                                        >
                                        <label class="form-label" for="votingRegisterPasswordConfirmation">Confirm Password</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-voting-login btn-lg btn-block w-100" type="submit">Register</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">
                                        Akun baru otomatis masuk sebagai voter setelah berhasil dibuat.
                                    </p>
                                    <a href="{{ route('home') }}" class="small text-muted">Terms of use.</a>
                                    <a href="{{ route('home') }}" class="small text-muted ms-2">Privacy policy</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('assets/auth/voting-login/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/auth/voting-login/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script>
    document.querySelectorAll('[data-auth-form-target]').forEach((tab) => {
        tab.addEventListener('click', () => {
            const target = tab.dataset.authFormTarget;

            document.querySelectorAll('[data-auth-form-target]').forEach((item) => {
                item.classList.toggle('is-active', item.dataset.authFormTarget === target);
            });

            document.querySelectorAll('[data-auth-form]').forEach((form) => {
                form.classList.toggle('is-active', form.dataset.authForm === target);
            });
        });
    });
</script>
</body>
</html>
