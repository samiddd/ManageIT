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
    <title>@yield('title')</title>

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

<body>
    <div class="connect-container align-content-stretch d-flex flex-wrap">

        @include('layout.nav')

        <div class="page-container">
            <div class="page-header">
                <nav class="navbar navbar-expand">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item small-screens-sidebar-link">
                            <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/') }}/images/avatars/profile-image-2.png"
                                    alt="profile image">
                                <span>Dimas Sul'Ulum</span><i
                                    class="material-icons dropdown-icon">keyboard_arrow_down</i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Calendar<span
                                        class="badge badge-pill badge-info float-right">2</span></a>
                                <a class="dropdown-item" href="#">Settings &amp Privacy</a>
                                <a class="dropdown-item" href="#">Switch Account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="material-icons-outlined">mail</i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="dark-theme-toggle"><i
                                    class="material-icons-outlined">brightness_2</i><i
                                    class="material-icons">brightness_2</i></a>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <button type="button" class="btn btn-primary">Masuk</button>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="page-content">
                <div class="container">
                    @yield('page-info')

                    @yield('content')
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
