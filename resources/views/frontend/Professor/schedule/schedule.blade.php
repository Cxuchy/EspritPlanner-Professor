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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="g-sidenav-show  bg-gray-200">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @include('frontend.Professor.elements.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('frontend.Professor.elements.navbar')


        <!--PAGE NOTIFICATION TOP-->
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="card mt-4">
                        <div class="card-body p-3 pb-0">
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
                                    toastr.success("Choices Saved successfully.");
                                </script>

                            @elseif (session('error'))
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
                                    toastr.danger("Please select exactly 10 seperate choices for list1 and list2.");
                                </script>
                            @elseif (session('success_delete'))
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
                                toastr.warning("Requests deleted.");
                            </script>
                            @elseif (session('danger'))
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
                                    toastr.danger("Please select exactly 10 seperate choices for list1 and list2.");
                                </script>
                            @elseif (session('success_generate'))
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
                                toastr.success("Personnal planning is ready for you down below ! ");
                            </script>
                             @elseif (session('email_success'))
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
                                 toastr.success("Email sent successfully ");
                             </script>
                            @else
                                @if ($hasplanning == 0)
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
                                    toastr.info("Please make sure to select two seperate choices from the list ");
                                </script>
                                @endif

                            @endif


                        </div>
                    </div>


                </div>
            </div>
        </div>










        </div>



        <!-- ELEMENTS WILL BE HERE -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <div class="d-inline-flex p-2">
                                    <h6 class="text-white text-capitalize ps-3">Exams Planning (submit two separate
                                        choices)</h6>

                                    <p id="checkedCountList1" class="text-white text-capitalize ps-3">
                                        Primary: 0
                                    </p>
                                    <p class="text-white text-capitalize ps-3">

                                    </p>
                                    <p id="checkedCountList2" class="text-white text-capitalize ps-3">
                                        Secondary: 0
                                    </p>
                                    <p class="text-white text-capitalize ps-3">

                                    </p>
                                </div>
                            </div>


                        </div>


                        @include('frontend.Professor.schedule.exams-planning-table')


                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-secondary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Previous Exams </h6>
                            </div>
                        </div>


                        @include('frontend.Professor.schedule.previous-exams-table')


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




        <!--
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Chosen Lists (column fehom mochkla w columns
                                mriglin)</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">


                        </div>
                    </div>
                </div>
            </div>
        </div>
-->


        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-md-7 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Requested Planning</h6>
                        </div>
                        <div class="card-body pt-4 p-3">

                            <!--YOUR MAIN TABLE HERE-->


                            @include('frontend.Professor.schedule.list1-table')


                        </div>
                    </div>
                </div>





                <div class="col-md-5 mt-4">
                    <div class="card h-100 mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">My Schedule</h6>
                                </div>
                                <div
                                    class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                                    <i class="material-icons me-2 text-lg">date_range</i>
                                    <small>You have <strong>{{ count($finalplanning) }}/{{ count($finalplanning) }}</strong>
                                        Supervisions</small>
                                </div>

                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <!--YOUR SECOND TABLE HJERE -->
                            @include('frontend.Professor.schedule.list2-table')


                        </div>

                    </div>

                </div>

            </div>
    </main>




    @include('frontend.Professor.elements.footer')
    </div>
    </main>




</body>







</html>


<style>
    /* Hide the default checkbox */
    .custom-checkbox {
        position: relative;
        display: inline-block;
    }

    .custom-checkbox input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid #ccc;
        border-radius: 4px;
        outline: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    /* Custom checkbox */
    .custom-checkbox input[type="checkbox"]:checked {
        background-color: red;
        border-color: red;
    }

    /* Checkmark */
    .custom-checkbox input[type="checkbox"]:checked::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 6px;
        height: 12px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: translate(-50%, -50%) rotate(45deg);
    }
</style>

{{--
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


    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

--}}
