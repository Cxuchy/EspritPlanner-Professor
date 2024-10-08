<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/esprit_small.png">
    <title>
        Esprit Planner
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://www.esb.tn/wp-content/uploads/2022/10/ESB-2-1024x683.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h3 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                        <img src="../assets/img/esprit_small.png" class="navbar-brand-img h-100"
                                            alt="main_logo">
                                    </h3>
                                    <h3 class="text-white font-weight-bolder text-center mt-2 mb-0">
                                        Esprit Planner

                                    </h3>
                                    <h5 class="text-white font-weight-bolder text-center mt-4 mb-0">Sign in</h5>
                                    <div class="row mt-3">



                                        @if (session('success'))
                                            <div class="text-white font-weight-bolder text-center mt-2 mb-0">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">


                                <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>

                                    <div class="mb-2 text-sm mx-auto" style="color:red">
                                        @error('email')
                                            <span> {{ $message }} </span>
                                        @enderror
                                    </div>


                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>


                                    <div class="mb-2 text-sm mx-auto" style="color:red">
                                        @error('password')
                                            <span> {{ $message }} </span>
                                        @enderror
                                    </div>


                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="subimit" value="submit"
                                            class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                    </div>

                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="{{ url('/sign-up') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                    <p class="mt-1 text-sm text-center">
                                        <a href="{{ url('/forgot-password') }}"
                                            class="text-primary text-gradient "> <u>Forgot Password?</u></a>
                                    </p>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
