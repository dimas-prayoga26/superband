<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ISC 2026 - Indonesia Superband Competition</title>
    <meta name="description" content="ISC 2026 - Indonesia Superband Competition">
    <meta name="keywords" content="ISC 2026 - Indonesia Superband Competition">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" href="assets/img/logo.png?v=browser-tab-logo">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/logo.png?v=browser-tab-logo">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">



    <!--==============================
	    All CSS File
	============================== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/imageRevealHover.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css?v=register-buttons">
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <style>
        .audition-position-row {
            --bs-gutter-x: 0;
            --bs-gutter-y: 0;
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 24px;
        }

        .audition-position-row > [class*="col-"] {
            display: flex;
            width: auto;
            max-width: none;
            padding: 0;
        }

        .audition-position-row > [class*="col-"]:nth-child(-n+3) {
            grid-column: span 2;
        }

        .audition-position-row > [class*="col-"]:nth-child(4) {
            grid-column: 2 / span 2;
        }

        .audition-position-row > [class*="col-"]:nth-child(5) {
            grid-column: 4 / span 2;
        }

        .audition-position-row .pricing-card {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .audition-position-row .checklist {
            flex: 1 1 auto;
        }

        .audition-position-row .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 60px;
            margin-top: auto;
            white-space: nowrap;
        }

        @media (max-width: 991px) {
            .audition-position-row {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .audition-position-row > [class*="col-"],
            .audition-position-row > [class*="col-"]:nth-child(4),
            .audition-position-row > [class*="col-"]:nth-child(5) {
                grid-column: auto;
            }

            .audition-position-row > [class*="col-"]:last-child:nth-child(odd) {
                grid-column: 1 / -1;
                justify-self: center;
                width: calc(50% - 12px);
            }
        }

        @media (max-width: 767px) {
            .audition-position-row {
                grid-template-columns: 1fr;
            }

            .audition-position-row > [class*="col-"]:last-child:nth-child(odd) {
                width: 100%;
            }

            .audition-position-row .btn {
                white-space: normal;
            }
        }

        @media (min-width: 992px) {
            .register-header-row {
                display: grid;
                grid-template-columns: 120px minmax(0, 1fr) 120px;
            }

            .register-header-row > .col-auto {
                width: auto;
                max-width: none;
            }

            .register-header-menu {
                justify-self: center;
                margin: 0 !important;
            }

            .register-header-spacer {
                width: 120px;
                height: 1px;
            }
        }

        .register-breadcumb {
            aspect-ratio: 1408 / 576;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover !important;
        }

        .register-breadcumb .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .register-breadcumb .breadcumb-content {
            width: 100%;
            text-align: center;
        }

        .register-breadcumb .breadcumb-title {
            margin: 0;
        }

        @media (max-width: 767px) {
            .register-breadcumb {
                aspect-ratio: auto;
                min-height: clamp(210px, 52vw, 250px);
                background-position: center center;
                background-size: auto 100% !important;
            }

            .register-breadcumb .breadcumb-title {
                font-size: clamp(30px, 9vw, 40px);
            }
        }
    </style>

</head>

<body>
    <!--********************************
   		Code Start From Here
	******************************** -->




    <!--==============================
     Preloader
    ==============================-->
    <div class="preloader">
        <div class="preloader-inner">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="popup-search-box">
        <button class="searchClose"><img src="assets/img/icon/close.svg" alt="img"></button>
        <form action="#">
            <input type="text" placeholder="Search Here..">
            <button type="submit"><img src="assets/img/icon/search-white.svg" alt="img"></button>
        </form>
    </div>

    @include('partials.layouts.header')

    <!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper register-breadcumb" data-bg-src="{{ asset('assets/jember-feed-19.png') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Register</h1>
            </div>
        </div>
    </div>

        <!--==============================
    Feature Area
    ==============================-->
    <div class="feature-area-3 space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="title-area text-center">
                        <h2 class="sec-title">Rules of the Game & Panduan Rekam Video</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-6 col-md-6">
                    <div class="feature-card style3 h-100">
                        <div class="title-wrap">
                            <h4 class="feature-card-title">
                                <a href="service.html">Ketentuan Video</a>
                            </h4>
                            <div class="feature-card-icon">
                                <img src="assets/img/icon/feature-icon1-1.svg" alt="icon">
                            </div>
                        </div>
                        <p class="feature-card-text">Biar Aksimu Dinilai Maksimal Sama Juri, Pastikan Format Videomu Sesuai Aturan Ini!</p>
                        <ul class="feature-card-list">
                            <li>1. Siapkan video aksi live performance kamu maksimal 3 menit.</li>
                            <li>2. Pastikan rekamannya format MP4, landscape (HP dimiringkan), dan kualitasnya minimal 720p biar juri bisa menilai skill kamu dengan jernih.</li>
                            <li>3. Wajah dan instrumen wajib kelihatan jelas, no frame terpotong!</li>
                            <li>4. Kalau sudah siap, langsung setor link videomu ke Form dibawah: (Masukkan Link)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="feature-card style3 h-100">
                        <div class="title-wrap">
                            <h4 class="feature-card-title">
                                <a href="service.html">Persyaratan Umum</a>
                            </h4>
                            <div class="feature-card-icon">
                                <img src="assets/img/icon/feature-icon1-2.svg" alt="icon">
                            </div>
                        </div>
                        <p class="feature-card-text">Audition Checklists: Pastikan Kamu Memenuhi Syarat Ini Biar Lolos Seleksi Administrasi!</p>
                        <ul class="feature-card-list">
                            <li>1. Khusus buat kamu pelajar SMA/Sederajat di Jember.</li>
                            <li>2. Tentukan senjatamu: Vokal, Gitar, Bass, Keyboard, atau Drum!</li>
                            <li>3. Beresin form registrasi dan kumpulkan video live performance-mu.</li>
                            <li>4. No bad vibes! Lagu wajib aman dari unsur SARA, kekerasan, atau ujaran kebencian.</li>
                            <li>5. Siap komitmen ikut seluruh rangkaian acara dari awal sampai malam puncak.</li>
                            <li>6. Rules are rules! Panitia berhak mencoret pelanggar aturan, dan penilaian juri adalah mutlak.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Pricing Area
    ==============================-->
    <div class="space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-6 col-lg-8">
                    <div class="title-area text-center">
                        <h2 class="sec-title">Audition Rules & Requirements</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center audition-position-row">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card bg-smoke h-100">
                        <h4 class="pricing-card_title">Good</h4>
                        <div class="price-card-wrap">
                            <h4 class="pricing-card_price">VOCAL</h4>
                        </div>
                        <p>The Charismatic Voice</p>
                        <div class="checklist">
                            <ul>
                                <li><i class="fas fa-check"></i> Khusus pelajar SMA/Sederajat di Jember.</li>
                                <li><i class="fas fa-check"></i> Siapkan 2 lagu: 1 Lagu Wajib (Pop/Pop Folk/Rock) & 1 Lagu Bebas!</li>
                                <li><i class="fas fa-check"></i> Video maksimal 3 menit (jangan lupa perkenalan di intro).</li>
                                <li><i class="fas fa-check"></i> Boleh main alat musik sendiri atau pakai backing track.</li>
                                <li><i class="fas fa-check"></i> Wajah harus kelihatan jelas di kamera.</li>
                                <li><i class="fas fa-check"></i> Tunjukkan suara aslimu.</li>
                            </ul>
                        </div>
                        <a href="{{ route('register', ['audition_position' => 'Vocal']) }}" class="btn audition-position-btn" data-position="Vocal">
                            <span class="link-effect">
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card bg-smoke h-100">
                        <h4 class="pricing-card_title">Good</h4>
                        <div class="price-card-wrap">
                            <h4 class="pricing-card_price">GITARIS</h4>
                        </div>
                        <p>The Riff Maker & Tone Explorer</p>
                        <div class="checklist">
                            <ul>
                                <li><i class="fas fa-check"></i> Khusus pelajar SMA/Sederajat di Jember.</li>
                                <li><i class="fas fa-check"></i> Wajib main gitar secara langsung (live recording), boleh pilih akustik atau elektrik!</li>
                                <li><i class="fas fa-check"></i> Siapkan 2 lagu: 1 Lagu Wajib (Pop/Pop Folk/Rock) & 1 Lagu Bebas.</li>
                                <li><i class="fas fa-check"></i> Boleh banget pakai backing track sebagai pengiring.</li>
                                <li><i class="fas fa-check"></i> Video wajib memperlihatkan wajah, posisi jari/tangan, dan gitarmu dengan jelas.</li>
                                <li><i class="fas fa-check"></i> No dubbing atau lip-sync jari! Tunjukkan skill aslimu di depan kamera.</li>
                            </ul>
                        </div>
                        <a href="{{ route('register', ['audition_position' => 'Gitaris']) }}" class="btn audition-position-btn" data-position="Gitaris">
                            <span class="link-effect">
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card bg-smoke h-100">
                        <h4 class="pricing-card_title">Good</h4>
                        <div class="price-card-wrap">
                            <h4 class="pricing-card_price">BASSIS</h4>
                        </div>
                        <p>The Groove Builder</p>
                        <div class="checklist">
                            <ul>
                                <li><i class="fas fa-check"></i> Khusus pelajar SMA/Sederajat di Jember.</li>
                                <li><i class="fas fa-check"></i> Siapkan 2 lagu: 1 Lagu Wajib (Pop/Pop Folk/Rock) & 1 Lagu Bebas!</li>
                                <li><i class="fas fa-check"></i> Boleh banget pakai backing track sebagai pengiring.</li>
                                <li><i class="fas fa-check"></i> Video wajib memperlihatkan wajah, instrumen, dan detail teknik permainan tanganmu dengan jelas.</li>
                                <li><i class="fas fa-check"></i> Pastikan sound bass kamu terdengar jernih dan menonjol (clear & punchy) agar juri bisa menilai groove dan teknikmu secara maksimal!</li>
                            </ul>
                        </div>
                        <a href="{{ route('register', ['audition_position' => 'Bassis']) }}" class="btn audition-position-btn" data-position="Bassis">
                            <span class="link-effect">
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card bg-smoke h-100">
                        <h4 class="pricing-card_title">Good</h4>
                        <div class="price-card-wrap">
                            <h4 class="pricing-card_price" style="font-size: 40px;">KEYBOARDIST</h4>
                        </div>
                        <p>The Vibe Creator & Harmony Master</p>
                        <div class="checklist">
                            <ul>
                                <li><i class="fas fa-check"></i> Khusus pelajar SMA/Sederajat di Jember.</li>
                                <li><i class="fas fa-check"></i> Wajib main keyboard atau piano secara langsung (live recording).</li>
                                <li><i class="fas fa-check"></i> Siapkan 2 lagu: 1 Lagu Wajib (Pop/Pop Folk/Rock) & 1 Lagu Bebas!</li>
                                <li><i class="fas fa-check"></i> Boleh pakai backing track kalau butuh iringan tambahan.</li>
                                <li><i class="fas fa-check"></i> Video wajib memperlihatkan wajah, instrumen, dan pergerakan jarimu di atas tuts dengan jelas.</li>
                                <li><i class="fas fa-check"></i> No dubbing! Pastikan audio dan visual sinkron untuk menunjukkan skill aslimu.</li>
                            </ul>
                        </div>
                        <a href="{{ route('register', ['audition_position' => 'Keyboardist']) }}" class="btn audition-position-btn" data-position="Keyboardist">
                            <span class="link-effect">
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card bg-smoke h-100">
                        <h4 class="pricing-card_title">Good</h4>
                        <div class="price-card-wrap">
                            <h4 class="pricing-card_price" style="font-size: 40px;">DRUMMER</h4>
                        </div>
                        <p>The Powerhouse Beat & Timekeeper</p>
                        <div class="checklist">
                            <ul>
                                <li><i class="fas fa-check"></i> Khusus pelajar SMA/Sederajat di Jember.</li>
                                <li><i class="fas fa-check"></i> Wajib menggunakan drum set (atau perangkat drum memadai) dan dimainkan secara langsung!</li>
                                <li><i class="fas fa-check"></i> Siapkan 2 lagu: 1 Lagu Wajib (Pop/Pop Folk/Rock) & 1 Lagu Bebas.</li>
                                <li><i class="fas fa-check"></i> Boleh banget pakai backing track sebagai pengiring.</li>
                                <li><i class="fas fa-check"></i> Angle video wajib memperlihatkan wajah, pergerakan tangan, dan drum kit kamu secara keseluruhan dengan jelas.</li>
                                <li><i class="fas fa-check"></i> Pastikan audio ketukan drum kamu terdengar jernih dan dominan agar juri bisa menilai power, tempo, dan teknikmu secara maksimal!</li>
                            </ul>
                        </div>
                        <a href="{{ route('register', ['audition_position' => 'Drummer']) }}" class="btn audition-position-btn" data-position="Drummer">
                            <span class="link-effect">
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                                <span class="effect-1">CHOOSE THIS POSITION</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cart-area -->
    <div id="registration-form" class="checkout-wrapper space-top space-extra-bottom">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger mb-30">
                    <strong>Data belum lengkap.</strong> Cek lagi form pendaftaranmu, ya.
                </div>
            @endif
            <form id="registration-submit-form" action="{{ route('registrations.store') }}" method="POST" enctype="multipart/form-data" class="woocommerce-checkout">
                @csrf
                <div class="row gx-60 gy-60">
                    <div class="col-lg-12">
                        <h2 class="h3 fw-semibold mt-n2 mb-40">Kenalan Dulu, Yuk! (Data Diri Musisi)</h2>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Nama Lengkap Sesuai KTP/Kartu Pelajar: <br> (Biar sertifikat dan datanya aman!) *</label>
                                <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" placeholder="" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Nama Panggilan / Stage Name: * <br> (Biar panitia dan juri gampang manggil kamu)</label>
                                <input type="text" name="stage_name" class="form-control" value="{{ old('stage_name') }}" placeholder="" required>
                            </div>
                            <div class="col-12 form-group">
                                <label>Asal Sekolah: <br> (Wajib SMA/SMK/MA sederajat di wilayah Jember, ya!)</label>
                                <input type="text" name="school" class="form-control" value="{{ old('school') }}" placeholder="" required>
                            </div>
                            <div class="col-12 form-group">
                                <label>Kelas:</label>
                                <input type="text" name="grade" class="form-control" value="{{ old('grade') }}" placeholder="kelas 10, 11, atau 12" inputmode="numeric" maxlength="2" pattern="10|11|12" data-digits-only data-max-digits="2" required>
                            </div>
                            <div class="col-12 form-group">
                                <label>Pilih Senjata Andalanmu / Kategori Audisi: *</label>
                                @php
                                    $auditionPositions = ['Vocal', 'Gitaris', 'Bassis', 'Keyboardist', 'Drummer'];
                                    $requestedAuditionPosition = request('audition_position');
                                    $selectedAuditionPosition = old(
                                        'audition_position',
                                        in_array($requestedAuditionPosition, $auditionPositions, true) ? $requestedAuditionPosition : null,
                                    );
                                @endphp
                                <select id="audition-position-select" name="audition_position" class="form-select" required>
                                    <option value="" disabled @selected(! $selectedAuditionPosition)>Pilih satu ya</option>
                                    @foreach ($auditionPositions as $auditionPosition)
                                        <option value="{{ $auditionPosition }}" @selected($selectedAuditionPosition === $auditionPosition)>{{ $auditionPosition }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <label>Nomor WhatsApp Super Aktif: <br> (Penting banget buat masuk grup koordinasi dan info lolos audisi)</label>
                                <input type="tel" name="whatsapp" class="form-control" value="{{ old('whatsapp') }}" placeholder="" inputmode="numeric" maxlength="13" pattern="[0-9]{1,13}" data-digits-only data-max-digits="13" required>
                            </div>
                            <div class="col-12 form-group">
                                <label>Email Aktif: <br> (Untuk konfirmasi pendaftaran dan info resmi dari panitia)</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="" required>
                            </div>
                            <div class="col-12 form-group">
                                <label>Link Akun Instagram : * <br> (Jangan di-private! Siapa tahu kita repost aksi kerenmu)</label>
                                <input type="url" name="instagram_url" class="form-control" value="{{ old('instagram_url') }}" placeholder="" required>
                            </div>
                            <div class="col-12 form-group">
                                <label>Link Akun TikTok: * <br> (Jangan di-private! Siapa tahu kita repost aksi kerenmu)</label>
                                <input type="url" name="tiktok_url" class="form-control" value="{{ old('tiktok_url') }}" placeholder="" required>
                            </div>
                            <div class="col-12 form-group">
                                <label class="mb-3">Pilih Genre Lagu Wajib *</label>
                                <fieldset class="mb-3">                                   
                                    <div class="mb-3">
                                        <input type="radio" id="Pop" name="required_song_genre" value="Pop" @checked(old('required_song_genre', 'Pop') === 'Pop')>
                                        <label for="Pop">Pop</label>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="radio" id="Pop Folk" name="required_song_genre" value="Pop Folk" @checked(old('required_song_genre') === 'Pop Folk')>
                                        <label for="Pop Folk">Pop Folk</label>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="radio" id="Rock" name="required_song_genre" value="Rock" @checked(old('required_song_genre') === 'Rock')>
                                        <label for="Rock">Rock</label>
                                    </div>
                                    </fieldset>
                            </div>
                            <div class="col-12 form-group">
                                <label>Judul Lagu Pilihan Bebas * <br> (Bebas pilih lagu yang paling nunjukin skill maksimalmu!)</label>
                                <input type="text" name="free_song_title" class="form-control" value="{{ old('free_song_title') }}" placeholder="" required>
                            </div>
                            <div class="col-12 form-group">
                                <label>Tautan (Link) Video Audisi * <br> <span class="text-danger">(Paste link Google Drive atau YouTube kamu di sini. Notes penting: Pastikan aksesnya sudah di-setting "Anyone with the link" atau "Publik". Kalau di-private, juri nggak bisa nonton!)</span> </label>
                                <input type="url" name="audition_video_url" class="form-control" value="{{ old('audition_video_url') }}" placeholder="" required>
                            </div>
                            <div class="col-12 form-group">
                                <label>Upload Foto Kartu Pelajar * <br> (Sebagai bukti sah kalau kamu beneran pelajar aktif di Jember. Format foto/PDF maksimal 5MB)</label>
                                <input type="file" name="student_card" class="form-control" placeholder="" accept="image/*,application/pdf" data-max-file-size="5242880" data-max-file-message="Ukuran foto kartu pelajar 5MB atau lebih. Silakan unggah file yang lebih kecil." required>
                                <small class="text-danger d-none mt-2" data-file-size-error-for="student_card"></small>
                            </div>
                            <div class="col-12 form-group">
                                <label>Upload Foto * <br> (Format foto maksimal 5MB)</label>
                                <input type="file" name="photo" class="form-control" placeholder="" accept="image/*" data-max-file-size="5242880" data-max-file-message="Ukuran foto 5MB atau lebih. Silakan unggah file yang lebih kecil." required>
                                <small class="text-danger d-none mt-2" data-file-size-error-for="photo"></small>
                            </div>
                            <div class="col-12 form-group">
                                <label class="mb-3">Komitmen Audisi *</label>
                                <fieldset class="mb-3">                                   
                                    <div class="mb-3">
                                        <input type="checkbox" id="coding" name="commitments[]" value="live_video" required>
                                        <label for="coding">Saya janji video audisi ini direkam secara live tanpa dubbing/auto-tune.</label>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="checkbox" id="music" name="commitments[]" value="full_commitment" required>
                                        <label for="music">Saya siap ngikutin semua aturan main dan gabung di rangkaian acara dari awal sampai akhir kalau lolos.</label>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <input type="checkbox" id="gaming" name="commitments[]" value="judge_decision" required>
                                        <label for="gaming">Saya paham kalau keputusan juri itu mutlak dan nggak bisa diganggu gugat.</label>
                                    </div>
                                    </fieldset>
                            </div>
                            <div class="col-12 form-group">
                                <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                                @error('cf-turnstile-response')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            <div class="mt-lg-3 mb-30">
                <div class="woocommerce-checkout-payment">
                    <div class="form-row place-order">
                        <button type="submit" class="btn">
                            <span class="link-effect">
                                <span class="effect-1">SUBMIT PENDAFTARAN</span>
                                <span class="effect-1">SUBMIT PENDAFTARAN</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- cart-area-end -->

    <!--==============================
    Marquee Area
    ==============================-->
    <div class="container-fluid p-0 overflow-hidden">
        <div class="slider__marquee clearfix marquee-wrap">
            <div class="marquee_mode marquee__group">
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Bersinar Bareng Superband Baru-mu!</a></h6>
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Bersinar Bareng Superband Baru-mu!</a></h6>
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Bersinar Bareng Superband Baru-mu!</a></h6>
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Bersinar Bareng Superband Baru-mu!</a></h6>
            </div>
        </div>
    </div>

    <!--==============================
        Footer Area
    ==============================-->
    <footer class="footer-wrapper footer-layout2 overflow-hidden">
        <div class="container">
            <div class="widget-area space-top">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-5 col-lg-6">
                        <div class="widget widget-newsletter footer-widget">
                            <h3 class="widget_title">Stay in the loop. Get gig schedules, backstage insights, and competition updates delivered to you.</h3>
                            <form class="newsletter-form">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Your email here" required="">
                                </div>
                                <button type="submit" class="btn"><img src="assets/img/icon/arrow-left-top.svg" alt=""></button>
                            </form>
                            <p>By dropping your email, you agree to our Privacy Policy. Your info is safe with us.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xl-2 col-lg-3">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Links</h3>
                            <div class="menu-all-pages-container list-column2">
                                <ul class="menu">
                                    <li><a href="{{ route('about') }}"> About</a></li>
                                    <li><a href="project.html">Portfolios</a></li>
                                    <li><a href="service.html">Services</a></li>
                                    <li><a href="contact.html">Testimonials</a></li>
                                    <li><a href="project.html">Careers</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto col-lg-4">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Contact</h3>
                            <ul class="contact-info-list">
                                <li>Kabupaten Jember, Jawa Timur, Indonesia</li>
                                <!-- <li>
                                    <a href="tel:1800123654987">+1 800 123 654 987</a>
                                    <a href="mailto:frisk.agency@mail.com">frisk.agency@mail.com</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row gy-3 justify-content-between align-items-center">
                    <div class="col-md-6">
                        <p class="copyright-text">Copyright © 2026
                            <a href="">Indonesia Superband Competition</a>
                        </p>

                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="social-btn style3 justify-content-md-end">
                            <a href="https://www.facebook.com/">
                                <span class="link-effect">
                                    <span class="effect-1"><i class="fab fa-facebook"></i></span>
                                    <span class="effect-1"><i class="fab fa-facebook"></i></span>
                                </span>
                            </a>
                            <a href="https://instagram.com/">
                                <span class="link-effect">
                                    <span class="effect-1"><i class="fab fa-instagram"></i></span>
                                    <span class="effect-1"><i class="fab fa-instagram"></i></span>
                                </span>
                            </a>
                            <a href="https://twitter.com/">
                                <span class="link-effect">
                                    <span class="effect-1"><i class="fab fa-tiktok"></i></span>
                                    <span class="effect-1"><i class="fab fa-tiktok"></i></span>
                                </span>
                            </a>
                            <a href="https://dribbble.com/">
                                <span class="link-effect">
                                    <span class="effect-1"><i class="fab fa-youtube"></i></span>
                                    <span class="effect-1"><i class="fab fa-youtube"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--********************************
			Code End  Here
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>


    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/gsap.min.js"></script>
<script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/sticky-kit.min.js"></script>

    
    <script src="assets/js/imageRevealHover.js"></script>
    <script src="assets/js/jarallax.min.js"></script>
    <script src="assets/js/jquery.marquee.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/wow.js"></script>

    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>
    <script>
        document.querySelectorAll('[data-digits-only]').forEach((input) => {
            const maxDigits = Number.parseInt(input.dataset.maxDigits, 10);

            input.addEventListener('input', () => {
                const digits = input.value.replace(/\D/g, '');
                input.value = Number.isFinite(maxDigits) ? digits.slice(0, maxDigits) : digits;
            });
        });

        const validateFileSize = (input) => {
            const maxFileSize = Number.parseInt(input.dataset.maxFileSize, 10);
            const file = input.files?.[0];
            const errorMessage = document.querySelector(`[data-file-size-error-for="${input.name}"]`);

            const hideFileSizeError = () => {
                if (!errorMessage) {
                    return;
                }

                errorMessage.textContent = '';
                errorMessage.classList.add('d-none');
            };

            const showFileSizeError = (message) => {
                if (!errorMessage) {
                    return;
                }

                errorMessage.textContent = message;
                errorMessage.classList.remove('d-none');
            };

            if (!file || !Number.isFinite(maxFileSize)) {
                input.setCustomValidity('');
                hideFileSizeError();

                return true;
            }

            if (file.size >= maxFileSize) {
                const message = input.dataset.maxFileMessage || 'Ukuran file terlalu besar.';

                input.setCustomValidity(message);
                input.reportValidity();
                showFileSizeError(message);
                input.value = '';

                return false;
            }

            input.setCustomValidity('');
            hideFileSizeError();

            return true;
        };

        const maxFileInputs = document.querySelectorAll('[data-max-file-size]');

        maxFileInputs.forEach((input) => {
            input.addEventListener('change', () => {
                validateFileSize(input);
                input.reportValidity();
            });
        });

        document.getElementById('registration-submit-form')?.addEventListener('submit', (event) => {
            const isFileSizeValid = Array.from(maxFileInputs).every(validateFileSize);

            if (!isFileSizeValid) {
                event.preventDefault();
                maxFileInputs.forEach((input) => input.reportValidity());
            }
        });

        document.querySelectorAll('.audition-position-btn').forEach((button) => {
            button.addEventListener('click', (event) => {
                event.preventDefault();

                const selectedPosition = button.dataset.position;
                const positionSelect = document.getElementById('audition-position-select');
                const registrationForm = document.getElementById('registration-form');

                if (positionSelect && selectedPosition) {
                    positionSelect.value = selectedPosition;
                }

                if (selectedPosition) {
                    const registerUrl = new URL(button.href, window.location.origin);
                    window.history.replaceState(null, '', `${registerUrl.pathname}${registerUrl.search}`);
                }

                if (registrationForm) {
                    const headerOffset = 120;
                    const formPosition = registrationForm.getBoundingClientRect().top + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: formPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>
