<div class="card-body p-3">



    @foreach ($myprimaryplanning as $primary)

        @if ($primary->status == 'accepted')
            <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <i class="material-icons text-success text-gradient">book</i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                            @php
                                // Convert the date to full letters date
                                $date = new DateTime($primary->datepassage);
                                $formattedDate =
                                    'The ' .
                                    $date->format('jS') .
                                    ' of ' .
                                    $date->format('F') .
                                    ' ' .
                                    $date->format('Y');

                                // Get the current date and time
                                $currentDate = new DateTime();

                                // Calculate the difference
                                $interval = $currentDate->diff($date);

                                // Get the number of days remaining
                                $daysRemaining = $interval->format('%r%a');
                            @endphp
                            {{ $formattedDate }}
                        </h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"> at {{ $primary->heurepassage }}:00
                        </p>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"> {{ $daysRemaining }} Days remaining until the exam
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach


</div>
<button type="button" class="btn btn-danger btn-lg w-100">Transfer this planning to my email</button>

</div>
