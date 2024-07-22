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



                @if ($hasPassed)

                <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                            <img src="../assets/img/esprit-sign-up.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                                @php
                                    // Convert the datepassage to the desired format
                                    $date = new DateTime($passageexam->datepassage);
                                    $formattedDate = "The " . $date->format('jS') . " of " . $date->format('F') . " " . $date->format('Y');
                                @endphp
                                {{ $formattedDate }}
                            </h6>
                            <p class="text-xs text-secondary mb-0">Exam at Esprit</p>
                        </div>
                    </div>
                </td>

            <td>
                    <p class="text-xs font-weight-bold mb-0">at {{ $passageexam->heurepassage }}:00</p>
                    <p class="text-xs text-secondary mb-0">Tunisia Timezone</p>
                </td>

                <td>
                    <p class="text-xs font-weight-bold mb-0">NA</p>
                </td>
                <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-secondary">Previous</span>
                </td>



                @endif
            </tr>
        @endforeach



    </tbody>


</table>

{{-- pagination thing
{{$data->links('frontend.vendor.custom')}}

--}}


</div>

</form>








