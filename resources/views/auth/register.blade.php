{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Daftar</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ asset('assets/') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/') }}/plugins/font-awesome/css/all.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('assets/') }}../../assets/css/connect.min.css" rel="stylesheet">
    <link href="{{ asset('assets/') }}../../assets/css/dark_theme.css" rel="stylesheet">
    <link href="{{ asset('assets/') }}../../assets/css/custom.css" rel="stylesheet">
    <link href="{{ asset('assets/') }}../../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">

    {{-- calendar --}}
    <link href="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/core/main.min.css" rel="stylesheet">
    <link href="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/daygrid/main.min.css"
        rel="stylesheet">
    <link href="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/timegrid/main.min.css"
        rel="stylesheet">
    <link href="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/bootstrap//main.min.css"
        rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="auth-page sign-in">
    <div class="connect-container align-content-stretch d-flex flex-wrap">


        <div class="container">

            <div class="page-content">
                <div class="container">

                    <div class="connect-container align-content-stretch d-flex flex-wrap">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="auth-form">
                                        <div class="row">
                                            <div class="col">
                                                <div class="logo-box"><a href="#" class="logo-text">SI-Vena</a>
                                                </div>
                                                <div class="card-title row justify-content-center">
                                                    <h6><b>Daftar Anggota</b></h6>
                                                </div>
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf

                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="Nama anda" @error('name') is-invalid @enderror"
                                                            name="name" value="{{ old('name') }}" required
                                                            autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <input id="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            name="email" value="{{ old('email') }}" required
                                                            autocomplete="email" placeholder="Masukkan e-Mail anda">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>

                                                    <div class="form-group">
                                                        <input id="whatsapp" type="integer"
                                                            class="form-control @error('whatsapp') is-invalid @enderror"
                                                            name="whatsapp" value="{{ old('whatsapp') }}" required
                                                            autocomplete="whatsapp" placeholder="Nomor WhatsApp anda">

                                                        @error('whatsapp')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>

                                                    <div class="form-group">
                                                        <input id="password" placeholder="Kata sandi" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <input id="password-confirm"
                                                            placeholder="Konfirmasi kata sandi"type="password"
                                                            class="form-control" name="password_confirmation" required
                                                            autocomplete="new-password">
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary btn-block btn-submit">{{ __('Daftar Sekarang') }}</button>
                                                    <div class="auth-options">

                                                        <a href="/login" class="forgot-link">Sudah mempunyai
                                                            akun?</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>

    </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('assets/') }}../../assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/bootstrap/popper.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/blockui/jquery.blockUI.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/flot/jquery.flot.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/flot/jquery.flot.time.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/js/connect.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/js/pages/dashboard.js"></script>

    <script src="{{ asset('assets/') }}../../assets/plugins/DataTables/datatables.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/js/pages/datatables.js"></script>

    {{-- <script>
            $('#edit').on('show.bs.modal', function (event){
                var button = $(event.relatedTarget)
                var nama = button.data()
            })
        </script> --}}
</body>

</html>

{{-- @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf



                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">

                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection --}}
