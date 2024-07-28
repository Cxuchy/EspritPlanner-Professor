<script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.8/countUp.min.js"></script>

<!-- TOP ELEMENTS --->
<div class="container-fluid py-4">

    <div class="row">

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>

                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Users Count</p>
                        <h4 class="mb-0">{{ $user_count }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"> </p>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">check_circle</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Users that have a planning</p>
                        <h4 class="mb-0">{{ $users_have_planning_count }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"></p>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">event</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Upcoming Supervisions</p>
                        <h4 class="mb-0">{{ $supervisions_count }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"></p>
                </div>
            </div>
        </div>






    </div>

