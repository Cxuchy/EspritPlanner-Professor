<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <div class="card mt-4">
            <div class="card-header p-3">
                <h5 class="mb-0">Exams Grades</h5>
            </div>


            <div class="card-body p-3 pb-4">

                <!-- Table here -->

                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Module Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        ECTS</th>
                                        <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Grade</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($credits as $credit)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">
                                            <div>
                                                <img src="https://pbs.twimg.com/profile_images/1394261489054277638/rijXG1C__400x400.jpg"
                                                    class="avatar avatar-sm rounded-circle me-2">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-xs">{{$credit->modulename}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-dark text-xs">{{$credit->ects}}</span>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge badge-dot me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-dark text-xs">{{$credit->grade}}</span>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                <!-- End Table-->
            </div>
        </div>

        {{--
        <div class="card mt-4">
            <div class="card-header p-3">
                <h5 class="mb-0">Notifications</h5>
                <p class="text-sm mb-0">
                    Notifications on this page use Toasts from Bootstrap. Read more details <a
                        href="https://getbootstrap.com/docs/5.0/components/toasts/" target="
              ">here</a>.
                </p>
            </div>
            <div class="card-body p-3">
                <div class="row">

                </div>
            </div>
        </div>
        --}}
    </div>
</div>
