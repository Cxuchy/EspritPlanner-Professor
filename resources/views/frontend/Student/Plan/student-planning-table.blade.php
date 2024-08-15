<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">

        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Module Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Status</th>

                </tr>
            </thead>






            <tbody>
                @foreach ($confirmed_credits as $credit)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                                <img src="../assets/img/esprit-sign-up.jpg" class="avatar avatar-sm me-3 border-radius-lg"
                                    alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"> {{$credit->modulename}} </h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0"><strong>NA</strong></p>
                    </td>
                    <td>
                        <span class="badge bg-gradient-info">Confirmed</span>
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>

    </div>
