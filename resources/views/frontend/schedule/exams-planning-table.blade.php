<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">

<table class="table align-items-center mb-0">
    <thead>
        <tr>
            <th
                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Date</th>
            <th
                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                Start Hour</th>
            <th
                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                Remaining Supervisors Places</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Status</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                First Choice</th>
            <th
                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Second Choice</th>
        </tr>
    </thead>






    <tbody>
        <form action="{{ route('submit-schedule') }}" method="POST">
        @csrf
        @foreach ($data as $passageexam)
            @php
                // Current date and time
                $currentDateTime = new DateTime();

                // Passage date and time
                $passageDateTime = new DateTime($passageexam->datepassage);

                // Check if the passage date has already passed
                $hasPassed = $currentDateTime > $passageDateTime;

                // Calculate the remaining required professors
                $remainingProfessors = $passageexam->nbprof_required - $passageexam->nbprof_enrolled;
            @endphp

            <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                            <img src="../assets/img/esprit-sign-up.jpg"
                                class="avatar avatar-sm me-3 border-radius-lg"
                                alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $passageexam->datepassage }}</h6>
                            <p class="text-xs text-secondary mb-0">Exam at Esprit</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">at {{ $passageexam->heurepassage }}:00</p>
                    <p class="text-xs text-secondary mb-0">Tunisia Timezone</p>
                </td>

                @if ($hasPassed)
                <td>
                    <p class="text-xs font-weight-bold mb-0">NA</p>
                </td>
                <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-secondary">Previous</span>
                </td>
                <td class="align-middle text-center">
                    <input type="checkbox" class="list1" disabled>
                </td>
                <td class="align-middle text-center">
                    <input type="checkbox" class="list2" disabled>
                </td>
                @else
                <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $remainingProfessors }}</p>
                </td>
                <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">Upcoming</span>
                </td>
                <td class="align-middle text-center">
                    <input type="checkbox" class="list1" name="selected_exams_list1[]" value="{{ $passageexam->id }}" {{ $remainingProfessors == 0 ? 'disabled' : '' }}>
                </td>
                <td class="align-middle text-center">
                    <input type="checkbox" class="list2" name="selected_exams_list2[]" value="{{ $passageexam->id }}" {{ $remainingProfessors == 0 ? 'disabled' : '' }}>
                </td>
                @endif
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
                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Submit Choices</button>
        </div>
    </div>
</div>
</form>
