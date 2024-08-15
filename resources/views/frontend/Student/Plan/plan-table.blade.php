<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">

<table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th
                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Module Name</th>
            <th
                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                ECTS</th>
            <th
                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                Plan</th>

        </tr>
    </thead>






    <tbody>
        <form action="{{ route('submit-plan') }}" method="POST">
        @csrf

            @foreach ($credits as $credit)
            <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                            <img src="../assets/img/esprit-sign-up.jpg"
                                class="avatar avatar-sm me-3 border-radius-lg"
                                alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"> {{$credit->modulename}} </h6>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{$credit->ects}}</p>
                </td>
                <td class="text-xs font-weight-bold mb-0">
                    <input type="checkbox" class="list1" value="{{ $credit->ucrid }}" name="selected_exams_list1[]">
                </td>
            </tr>
            @endforeach


    </tbody>

</table>

</div>
<div class="card-header pb-0 p-3">
    <div class="row">
        <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0"></h6>
        </div>
        <div class="col-6 text-end">
            <button class="btn bg-gradient-dark mb-0" type="submit" ><i
                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Submit Plan</button>
        </div>
    </div>
</div>
</form>
