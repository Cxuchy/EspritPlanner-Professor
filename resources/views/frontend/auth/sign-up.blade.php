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

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('../assets/img/esprit-sign-up.jpg'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Sign Up</h4>
                                    <p class="mb-0">Enter your personal informations to register</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ route('sign-up') }}" method="POST">
                                        @csrf
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="identifier">Identifier</label>
                                            <input type="text" class="form-control" name="identifier"
                                                id="identifier">

                                        </div>
                                        <div class="mb-2 text-sm mx-auto" style="color:red">
                                            @error('identifier')
                                                <span> {{ $message }} </span>
                                            @enderror
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name">


                                        </div>
                                        <div class="mb-2 text-sm mx-auto" style="color:red">
                                            @error('name')
                                                <span> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="phonenumber">Phone Number</label>
                                            <input type="text" class="form-control" name="phonenumber"
                                                id="phonenumber">


                                        </div>
                                        <div class="mb-2 text-sm mx-auto" style="color:red">
                                            @error('phonenumber')
                                                <span> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <select class="form-control" name="role" id="role"
                                                placeholder="Role">
                                                <option value="Professor" selected="">Professor</option>
                                                <option value="Student">Student</option>
                                            </select>

                                        </div>
                                        <div class="mb-2 text-sm mx-auto" style="color:red">
                                            @error('role')
                                                <span> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
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
                                                <span class="mb-2 text-sm mx-auto"> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label" for="confirm-password">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="confirm-password">

                                        </div>
                                        <div class="mb-2 text-sm mx-auto" style="color:red">
                                            @error('password')
                                                <span> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-check form-check-info text-start ps-0">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I agree the <a href="javascript:;"
                                                    class="text-dark font-weight-bolder">Terms and Conditions</a>
                                            </label>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="submit"
                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0"
                                                value="submit">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="{{ url('/login') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
