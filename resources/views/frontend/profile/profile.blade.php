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
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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



        <!-- ELEMENTS WILL BE HERE -->


      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://www.ecoles.com.tn/sites/default/files/universite/images/esprit-couv.jpg');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/person.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">

                @auth()
                <h5 class="mb-1">
                    {{Auth::user()->nom}}
                  </h5>
                @endauth

                @guest
                <h5 class="mb-1">
                    Professor at Esprit (Sign In to view full profile)
                  </h5>
                @endguest



              <p class="mb-0 font-weight-normal text-sm">
                Professor
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="{{route('index')}}" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">home</i>
                    <span class="ms-1">Dashboard</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row">

            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    Hello , i'm a Professor at ESPRIT
                </p>
                  <hr class="horizontal gray-light my-4">


                    @guest
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; NA</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; NA</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; NA</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Identifier:</strong> &nbsp; NA</li>
                        <li class="list-group-item border-0 ps-0 pb-0">
                          <strong class="text-dark text-sm">Social:</strong> &nbsp;
                          <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-linkedin fa-lg"></i>
                          </a>
                          <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-twitter fa-lg"></i>
                          </a>
                          <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                            <i class="fab fa-instagram fa-lg"></i>
                          </a>
                        </li>
                      </ul>
                  @endguest


                  @auth
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{Auth::user()->nom}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{Auth::user()->phonenumber}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{Auth::user()->email}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Identifier:</strong> &nbsp; {{Auth::user()->identifier}}</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Faculty role:</strong> &nbsp; {{Auth::user()->role}}</li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                      <strong class="text-dark text-sm">Social:</strong> &nbsp;
                      <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-linkedin fa-lg"></i>
                      </a>
                      <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-twitter fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                  @endauth



                </div>



              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Colleagues</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">


                    @foreach ($users as $user)
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                        <div class="avatar me-3">
                          <img src="../assets/img/person.jpg" alt="kal" class="border-radius-lg shadow">
                        </div>
                        <div class="d-flex align-items-start flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$user->nom}}</h6>
                          <p class="mb-0 text-xs">Phone number : {{$user->phonenumber}}</p>
                        </div>
                        <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Mesasge</a>
                      </li>
                    @endforeach










                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 mt-4">
              <div class="mb-5 ps-3">
                <h6 class="mb-1">Upcoming Exams</h6>
                <p class="text-sm">See upcoming exams dates</p>
              </div>
              <div class="row">



                @foreach ($exams as $exam)
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                    <div class="card card-blog card-plain">
                      <div class="card-header p-0 mt-n4 mx-3">
                        <a class="d-block shadow-xl border-radius-xl">
                          <img src="../assets/img/esprit-sign-up.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                      </div>
                      <div class="card-body p-3">
                        <p class="mb-0 text-sm"></p>
                        <a href="javascript:;">
                          <h5>
                            Date : {{$exam->datepassage}}
                          </h5>
                        </a>
                        <p class="mb-4 text-sm">
                          this exam is starting at {{$exam->heurepassage}}:00 and requires {{$exam->nbprof_required}} supervisors.
                        </p>
                        <div class="d-flex align-items-center justify-content-between">
                          <button type="button" class="btn btn-outline-primary btn-sm mb-0" >Full List</button>
                          <div class="avatar-group mt-2">
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                              <img alt="Image placeholder" src="../assets/img/esprit_small.png">
                            </a>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                @endforeach


              </div>
            </div>
          </div>
        </div>
      </div>




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
