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
    <link
        href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body class="g-sidenav-show  bg-gray-200">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @include('frontend.Professor.elements.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @if (session('success'))
                                <script>
                                    toastr.options = {
                                        "closeButton": true,
                                        "progressBar": true,
                                        "positionClass": "toast-bottom-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                    };
                                    toastr.success("Complaint sent to administrator.");
                                </script> @endif

        @include('frontend.Professor.elements.navbar')


        @include('frontend.Professor.complaint.complaint-stats')

        <div class="row">
    <div class="col-md-7 mt-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">My Complaints</h6>
            </div>
            <div class="card-body pt-4 p-3">

                <!--YOUR COMPLAINT TABLE HERE-->
                @include('frontend.Professor.complaint.complaint-table')



            </div>
        </div>
    </div>
    <div class="col-md-5 mt-4">
        <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-0">Submit a Complaint here</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                        <i class="material-icons me-2 text-lg">date_range</i>
                        <small>
                            {{ $today_date->format('D M Y') }}
                        </small>
                    </div>
                </div>
            </div>
            <div class="card-body pt-4 p-3">

                <!--YOUR COMPLAINT HERE -->
                <div class="card-body">
                    <form role="form" action="{{ route('submit-complaint') }}" method="POST">
                        @csrf

                        <div class="input-group input-group-static mb-4">
                            <label for="exampleFormControlSelect1" class="ms-0" for="type">Complaint Type</label>
                            <select class="form-control" name="type" id="type">
                                <option>Scheduling</option>
                                <option>Personnal Account</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="input-group input-group-static mb-4">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details" id="details" rows="4"></textarea>
                        </div>

                        <div class="mb-2 text-sm mx-auto" style="color:red">
                            @error('details')
                                <span> {{ $message }} </span>
                            @enderror
                        </div>


                        <div class="text-center">
                            <button type="submit" name="submit"
                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" value="submit">Submit
                                Complaint</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>

    </div>
    </main>




    @include('frontend.Professor.elements.footer')
    </div>
    </main>

    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        @include('frontend.Professor.elements.materialU')
    </div>

    </body>

</html>
