<div class="card-body p-3">



    @foreach ($myprimaryplanning as $primary)
        @if ($primary->status == 'accepted')
            @php
                // Convert the date to full letters date
                $date = new DateTime($primary->datepassage);
                $formattedDate = 'The ' . $date->format('jS') . ' of ' . $date->format('F') . ' ' . $date->format('Y');

                // Get the current date and time
                $currentDate = new DateTime();

                // Calculate the difference
                $interval = $currentDate->diff($date);

                // Get the number of days remaining
                $daysRemaining = $interval->format('%r%a');
            @endphp

            @if ($daysRemaining > 0)
            <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <i class="material-icons text-success text-gradient">book</i>
                    </span>

                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                            {{ $formattedDate }}
                        </h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"> at {{ $primary->heurepassage }}:00
                        </p>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"> {{ $daysRemaining }} Days remaining
                        </p>
                    </div>
                </div>
            </div>
            @elseif ($daysRemaining == 0)
            <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <i class="material-icons text-success text-gradient">fiber_manual_record</i>
                    </span>

                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                            {{ $formattedDate }}
                        </h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"> at {{ $primary->heurepassage }}:00
                        </p>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"> Today
                        </p>
                    </div>
                </div>
            </div>
            @else
            <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <i class="material-icons text-success text-gradient" >book</i>
                    </span>

                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                           <s class="strikethrough">{{ $formattedDate }}</s>
                        </h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                            <s class="strikethrough">
                            at {{ $primary->heurepassage }}:00
                            </s>
                        </p>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                            Done

                        </p>




                    </div>
                </div>
            </div>
            @endif

        @endif
    @endforeach


</div>
@if ($hasplanning == 0)
<div class="d-flex justify-content-center mb-3">

    <a class="d-flex justify-content-center mb-10" >
        <h4 class="p-65"> <strong>NA</strong></h4>
    </a>

</div>
@else
<form action="{{ route('send-email') }}" method="POST">
    <div class="d-flex justify-content-center mb-3">
        @csrf
        <button class="btn btn-success btn-lg w-90" type="submit">
            <span class="btn-inner--icon"><i class="material-icons">email</i></span>
            <span class="btn-inner--text">Transfer this planning to my email</span>
        </button>
    </div>

</form>
@endif


</div>



<style>
    .strikethrough {
  text-decoration: line-through;
  text-decoration-thickness: 3px;
  text-decoration-color: #e91e63;
}
</style>
