<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Akun KKN UNSULBAR</title>

    <link href="{{ asset('dashboard') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('dashboard') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-color: #fff;
        }

        .login-wrapper {
            display: flex;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }

        .left-side {
            background-color: #b31117;
            color: white;
            flex: 1.1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 10%;
            position: relative;
            z-index: 1;
        }

        .back-btn {
            position: absolute;
            top: 40px;
            left: 10%;
            color: white;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .back-btn:hover {
            color: #ddd;
        }

        .welcome-text h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0;
        }

        .welcome-text p {
            font-size: 2.8rem;
            font-weight: 700;
            margin-top: -10px;
        }

        .left-side::after {
            content: "";
            position: absolute;
            top: 0;
            right: -100px;
            bottom: 0;
            width: 150px;
            background-color: #fff;
            border-top-left-radius: 100% 50%;
            border-bottom-left-radius: 100% 50%;
            z-index: 2;
        }

        .right-side {
            flex: 1;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 10%;
            z-index: 3;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box img {
            width: 200px;
            margin-bottom: 15px;
        }

        .login-box h2 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
        }

        .custom-input {
            background-color: #e9ecef !important;
            border: none !important;
            border-radius: 4px !important;
            height: 48px !important;
            color: #495057 !important;
            font-size: 1rem !important;
            padding-left: 15px !important;
        }

        .btn-masuk {
            background-color: #b31117 !important;
            border: none !important;
            color: white !important;
            height: 48px;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 4px;
            margin-top: 10px;
            transition: background 0.2s;
        }

        .btn-masuk:hover {
            background-color: #900d12 !important;
        }

        @media (max-width: 768px) {
            .left-side {
                display: none;
            }

            .right-side {
                flex: 1;
                padding: 0 25px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <div class="left-side">
            <a href="{{ url('/') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
            </a>

            <div class="welcome-text">
                <h1>Halo 👋</h1>
                <p>Buat akun baru!</p>
            </div>
        </div>

        <div class="right-side">
            <div class="login-box">

                <img src="{{ asset('dashboard') }}/img/usb.svg" alt="Logo UNSULBAR">

                <h2>Daftar Akun KKN UNSULBAR</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <input type="text" class="form-control custom-input @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" placeholder="Nama Lengkap"
                            required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="email" class="form-control custom-input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email Address"
                            required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" class="form-control custom-input @error('password') is-invalid @enderror"
                            name="password" placeholder="Password"
                            required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <input type="password" class="form-control custom-input"
                            name="password_confirmation" placeholder="Konfirmasi Password"
                            required autocomplete="new-password">
                    </div>

                    <button type="submit" class="btn btn-block btn-masuk">
                        Daftar
                    </button>

                    <div class="mt-4">
                        <a class="small text-muted" href="{{ route('login') }}">Sudah punya akun? Masuk</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="{{ asset('dashboard') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/sb-admin-2.min.js"></script>

</body>

</html>
