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
            display: flex;
            align-items: center;
            min-height: 100vh;
            background:
                linear-gradient(135deg, rgba(11, 16, 32, 0.7), rgba(39, 63, 150, 0.48)),
                url("{{ asset('assets/jember-feed-19.png') }}") center / cover no-repeat;
        }

        .voting-login-section > .container {
            width: 100%;
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

        .voting-auth-form .form-label {
            margin-bottom: 0.45rem;
            font-weight: 700;
            color: var(--isc-dark);
        }

        .voting-register-step {
            display: none;
        }

        .voting-register-step.is-active {
            display: block;
        }

        .voting-otp-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .voting-otp-input {
            height: 3.8rem;
            padding: 0.5rem;
            font-size: 1.7rem;
            font-weight: 800;
            line-height: 1;
            text-align: center;
        }

        .voting-register-error {
            display: none;
            font-size: 0.85rem;
            color: #dc3545;
        }

        .voting-register-error.is-active {
            display: block;
        }

        .voting-register-error.is-success {
            color: #198754;
        }

        .form-control.voting-password-invalid,
        .form-control.voting-password-invalid:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.12);
        }

        .form-control.voting-password-valid,
        .form-control.voting-password-valid:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.12);
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

        .btn-voting-login:disabled {
            color: rgba(255, 255, 255, 0.72);
            cursor: not-allowed;
            background: #4b5563;
            border-color: #4b5563;
            opacity: 1;
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
<section class="voting-login-section">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
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
                                        <label class="form-label" for="votingPhone">Nomor HP</label>
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
                                        @if ($activeVotingForm === 'login')
                                            @error('phone')
                                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                                            @enderror
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="votingPassword">Password</label>
                                        <input
                                            type="password"
                                            id="votingPassword"
                                            name="password"
                                            class="form-control form-control-lg"
                                            autocomplete="current-password"
                                            required
                                        >
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
                                    data-register-verify-url="{{ route('voting.register.verify') }}"
                                    data-register-resend-url="{{ route('voting.register.resend') }}"
                                    novalidate
                                >
                                    @csrf
                                    <input type="hidden" name="_form" value="register">

                                    <div class="voting-register-step is-active" data-register-step="details">
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="votingRegisterName">Nama</label>
                                            <input
                                                type="text"
                                                id="votingRegisterName"
                                                name="name"
                                                class="form-control form-control-lg"
                                                value="{{ old('_form') === 'register' ? old('name') : '' }}"
                                                autocomplete="name"
                                                required
                                            >
                                            @error('name')
                                                <small class="text-danger d-block mt-2">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="votingRegisterPhone">Nomor HP</label>
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
                                            @if ($activeVotingForm === 'register')
                                                @error('phone')
                                                    <small class="text-danger d-block mt-2">{{ $message }}</small>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="votingRegisterPassword">Password</label>
                                            <input
                                                type="password"
                                                id="votingRegisterPassword"
                                                name="password"
                                                class="form-control form-control-lg"
                                                autocomplete="new-password"
                                                required
                                            >
                                            @if ($activeVotingForm === 'register')
                                                @error('password')
                                                    <small class="text-danger d-block mt-2">{{ $message }}</small>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="votingRegisterPasswordConfirmation">Confirm Password</label>
                                            <input
                                                type="password"
                                                id="votingRegisterPasswordConfirmation"
                                                name="password_confirmation"
                                                class="form-control form-control-lg"
                                                autocomplete="new-password"
                                                required
                                            >
                                            <small class="voting-register-error mt-2" data-register-error></small>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-voting-login btn-lg btn-block w-100" type="submit" data-register-submit>Register</button>
                                        </div>
                                    </div>

                                    <div class="voting-register-step" data-register-step="otp">
                                        <label class="form-label d-block" for="votingRegisterOtp1">Kode OTP</label>
                                        <div class="voting-otp-grid mb-4">
                                            @for ($otpIndex = 1; $otpIndex <= 4; $otpIndex++)
                                                <input
                                                    type="text"
                                                    id="votingRegisterOtp{{ $otpIndex }}"
                                                    class="form-control voting-otp-input"
                                                    inputmode="numeric"
                                                    maxlength="1"
                                                    pattern="[0-9]*"
                                                    autocomplete="{{ $otpIndex === 1 ? 'one-time-code' : 'off' }}"
                                                    aria-label="Digit OTP {{ $otpIndex }}"
                                                    data-otp-input
                                                >
                                            @endfor
                                        </div>
                                        <small class="voting-register-error mb-3" data-otp-message></small>

                                        <button class="btn btn-voting-login btn-lg btn-block w-100" type="button" data-otp-resend>Resend</button>
                                    </div>
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
    const registerForm = document.querySelector('[data-auth-form="register"]');
    const registerDetailStep = registerForm?.querySelector('[data-register-step="details"]');
    const registerOtpStep = registerForm?.querySelector('[data-register-step="otp"]');
    const registerPassword = document.getElementById('votingRegisterPassword');
    const registerPasswordConfirmation = document.getElementById('votingRegisterPasswordConfirmation');
    const registerError = registerForm?.querySelector('[data-register-error]');
    const registerSubmitButton = registerForm?.querySelector('[data-register-submit]');
    const otpMessage = registerForm?.querySelector('[data-otp-message]');
    const otpResendButton = document.querySelector('[data-otp-resend]');
    const otpInputs = [...document.querySelectorAll('[data-otp-input]')];
    let otpResendTimer = null;
    let isVerifyingOtp = false;

    const csrfToken = registerForm?.querySelector('input[name="_token"]')?.value ?? '';

    const startOtpResendCooldown = (seconds = 60) => {
        if (!otpResendButton) {
            return;
        }

        let remainingSeconds = seconds;
        otpResendButton.disabled = true;
        otpResendButton.textContent = `Resend ${remainingSeconds}s`;

        window.clearInterval(otpResendTimer);
        otpResendTimer = window.setInterval(() => {
            remainingSeconds -= 1;

            if (remainingSeconds <= 0) {
                window.clearInterval(otpResendTimer);
                otpResendButton.disabled = false;
                otpResendButton.textContent = 'Resend';

                return;
            }

            otpResendButton.textContent = `Resend ${remainingSeconds}s`;
        }, 1000);
    };

    const setOtpMessage = (status, message = '') => {
        if (!otpMessage) {
            return;
        }

        otpMessage.textContent = message;
        otpMessage.classList.toggle('is-active', message !== '');
        otpMessage.classList.toggle('is-success', status === 'success');
    };

    const setRegisterMessage = (status, message = '') => {
        if (!registerError) {
            return;
        }

        registerError.textContent = message;
        registerError.classList.toggle('is-active', message !== '');
        registerError.classList.toggle('is-success', status === 'success');
    };

    const firstResponseMessage = (data, fallback) => {
        if (data?.message) {
            return data.message;
        }

        if (data?.errors) {
            const firstError = Object.values(data.errors)[0];

            if (Array.isArray(firstError) && firstError.length > 0) {
                return firstError[0];
            }
        }

        return fallback;
    };

    const postForm = async (url, body) => {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body,
        });
        const data = await response.json().catch(() => ({}));

        if (!response.ok) {
            throw new Error(firstResponseMessage(data, 'Permintaan gagal. Silakan coba lagi.'));
        }

        return data;
    };

    const setRegisterPasswordFeedback = (status, message = '') => {
        [registerPassword, registerPasswordConfirmation].forEach((input) => {
            input?.classList.remove('voting-password-invalid', 'voting-password-valid');

            if (status === 'valid') {
                input?.classList.add('voting-password-valid');
            }

            if (status === 'invalid') {
                input?.classList.add('voting-password-invalid');
            }
        });

        if (!registerError) {
            return;
        }

        registerError.textContent = message;
        registerError.classList.toggle('is-active', message !== '');
        registerError.classList.toggle('is-success', status === 'valid');
    };

    const validateRegisterPassword = (showIncomplete = false) => {
        if (!registerPassword || !registerPasswordConfirmation) {
            return false;
        }

        if (!registerPassword.value && !registerPasswordConfirmation.value) {
            setRegisterPasswordFeedback(showIncomplete ? 'invalid' : '', showIncomplete ? 'Password dan confirm password wajib diisi.' : '');

            return false;
        }

        if (registerPassword.value.length > 0 && registerPassword.value.length < 8) {
            setRegisterPasswordFeedback('invalid', 'Password minimal 8 karakter.');

            return false;
        }

        if (!registerPasswordConfirmation.value) {
            setRegisterPasswordFeedback(showIncomplete ? 'invalid' : '', showIncomplete ? 'Password dan confirm password wajib diisi.' : '');

            return false;
        }

        if (registerPassword.value !== registerPasswordConfirmation.value) {
            setRegisterPasswordFeedback('invalid', 'Password tidak sama.');

            return false;
        }

        setRegisterPasswordFeedback('valid', 'Password sama.');

        return true;
    };

    [registerPassword, registerPasswordConfirmation].forEach((input) => {
        input?.addEventListener('input', () => {
            validateRegisterPassword();
        });
    });

    registerForm?.addEventListener('submit', async (event) => {
        event.preventDefault();
        setOtpMessage('', '');

        const requiredInputs = [...registerForm.querySelectorAll('[data-register-step="details"] input[required]')];
        const hasEmptyInput = requiredInputs.some((input) => input.value.trim() === '');

        if (hasEmptyInput) {
            setRegisterMessage('error', 'Lengkapi semua data register terlebih dahulu.');

            return;
        }

        if (!validateRegisterPassword(true)) {
            return;
        }

        if (registerSubmitButton) {
            registerSubmitButton.disabled = true;
            registerSubmitButton.textContent = 'Mengirim OTP...';
        }

        try {
            const data = await postForm(registerForm.action, new FormData(registerForm));

            registerDetailStep?.classList.remove('is-active');
            registerOtpStep?.classList.add('is-active');
            otpInputs.forEach((input) => {
                input.value = '';
            });
            setOtpMessage('success', data.message ?? 'Kode OTP sudah dikirim ke WhatsApp Anda.');
            otpInputs[0]?.focus();
            startOtpResendCooldown(data.cooldown_seconds ?? 60);
        } catch (error) {
            setRegisterMessage('error', error.message);
        } finally {
            if (registerSubmitButton) {
                registerSubmitButton.disabled = false;
                registerSubmitButton.textContent = 'Register';
            }
        }
    });

    const currentOtp = () => otpInputs.map((input) => input.value).join('');

    const verifyOtpIfComplete = async () => {
        const otp = currentOtp();

        if (isVerifyingOtp || otp.length !== otpInputs.length) {
            return;
        }

        isVerifyingOtp = true;
        setOtpMessage('', '');
        otpInputs.forEach((input) => {
            input.disabled = true;
        });

        const formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('otp', otp);

        try {
            const data = await postForm(registerForm.dataset.registerVerifyUrl, formData);

            setOtpMessage('success', data.message ?? 'Registrasi berhasil.');
            window.location.href = data.redirect_url;
        } catch (error) {
            setOtpMessage('error', error.message);
            otpInputs.forEach((input) => {
                input.value = '';
            });
            otpInputs[0]?.focus();
        } finally {
            otpInputs.forEach((input) => {
                input.disabled = false;
            });
            isVerifyingOtp = false;
        }
    };

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/\D/g, '').slice(0, 1);

            if (input.value && otpInputs[index + 1]) {
                otpInputs[index + 1].focus();
            }

            verifyOtpIfComplete();
        });

        input.addEventListener('keydown', (event) => {
            if (event.key === 'Backspace' && !input.value && otpInputs[index - 1]) {
                otpInputs[index - 1].focus();
            }
        });

        input.addEventListener('paste', (event) => {
            const digits = event.clipboardData.getData('text').replace(/\D/g, '').slice(0, otpInputs.length);

            if (!digits) {
                return;
            }

            event.preventDefault();

            digits.split('').forEach((digit, digitIndex) => {
                if (otpInputs[digitIndex]) {
                    otpInputs[digitIndex].value = digit;
                }
            });

            otpInputs[Math.min(digits.length, otpInputs.length) - 1]?.focus();
            verifyOtpIfComplete();
        });
    });

    otpResendButton?.addEventListener('click', async () => {
        const formData = new FormData();
        formData.append('_token', csrfToken);

        otpResendButton.disabled = true;
        otpResendButton.textContent = 'Mengirim...';

        try {
            const data = await postForm(registerForm.dataset.registerResendUrl, formData);

            setOtpMessage('success', data.message ?? 'Kode OTP baru sudah dikirim ke WhatsApp Anda.');
            startOtpResendCooldown(data.cooldown_seconds ?? 60);
        } catch (error) {
            setOtpMessage('error', error.message);
            otpResendButton.disabled = false;
            otpResendButton.textContent = 'Resend';
        }

        otpInputs.forEach((input) => {
            input.value = '';
        });
        otpInputs[0]?.focus();
    });

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
