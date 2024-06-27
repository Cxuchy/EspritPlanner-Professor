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

<body class="g-sidenav-show  bg-gray-200">
    @include('frontend.elements.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('frontend.elements.navbar')


        <!--PAGE NOTIFICATION TOP-->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="card mt-4">
                        <div class="card-body p-3 pb-0">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">Choices Saved successfully.</span>
                                </div>
                            @elseif (session('error'))
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">Select at least 4 choices for each list</span>
                            </div>
                            @else
                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">Please make sure to select two seperate choices from the list bellow</span>
                                </div>
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
                                <h6 class="text-white text-capitalize ps-3">Exams Planning </h6>
                            </div>
                        </div>


                        @include('frontend.schedule.exams-planning-table')


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

        <div class="row">
            <div class="col-md-7 mt-4">
              <div class="card">
                <div class="card-header pb-0 px-3">
                  <h6 class="mb-0">Primary List</h6>
                </div>
                <div class="card-body pt-4 p-3">

                    <!--YOUR MAIN TABLE HERE-->


                    @include('frontend.schedule.list1-table')


                </div>
              </div>
            </div>
            <div class="col-md-5 mt-4">
              <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                  <div class="row">
                    <div class="col-md-6">
                      <h6 class="mb-0">Final Planning</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                      <i class="material-icons me-2 text-lg">date_range</i>
                      <small>23 - 30 March 2020</small>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-4 p-3">

                    <!--YOUR SECOND TABLE HJERE -->


                </div>
              </div>
            </div>
          </div>

        </div>
    </main>




    @include('frontend.elements.footer')
    </div>
    </main>

    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        @include('frontend.elements.materialU')
    </div>

</body>

</html>



<!-- Js code for disabled second checkbox when the first is submited-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input.list1').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                let row = this.closest('tr');
                let otherCheckbox = row.querySelector('input.list2');
                otherCheckbox.disabled = this.checked;
            });
        });

        document.querySelectorAll('input.list2').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                let row = this.closest('tr');
                let otherCheckbox = row.querySelector('input.list1');
                otherCheckbox.disabled = this.checked;
            });
        });
    });
</script>


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
