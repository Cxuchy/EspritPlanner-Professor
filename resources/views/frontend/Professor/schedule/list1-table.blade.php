

<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Hour</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Choice Type</th>
                </tr>
            </thead>
            <tbody>



                @php
                    $hasAccepted = false;
                @endphp

                @foreach ($myprimaryplanning as $primary)
                    @php

                        if ($primary->status == 'accepted' or $primary->status == 'rejected') {
                            $hasAccepted = true;
                        }

                    @endphp
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div>
                                    <img src="https://pbs.twimg.com/profile_images/1394261489054277638/rijXG1C__400x400.jpg"
                                        class="avatar avatar-sm rounded-circle me-2">
                                </div>
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">
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
                                        @endphp
                                        {{ $formattedDate }}
                                    </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-normal mb-0">at {{ $primary->heurepassage }}:00</p>
                        </td>

                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                <span class="text-dark text-xs">{{ $primary->status }}</span>
                            </span>
                        </td>


                        <td>
                            <span class="badge badge-dot me-4">
                                <i class="bg-info"></i>
                                @if ($primary->type == 1)
                                    <span class="badge bg-gradient-info">Primary</span>
                                @else
                                    <span class="badge bg-gradient-secondary">Secondary</span>
                                @endif
                            </span>
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
    @if ($hasAccepted)

    <div class="d-flex justify-content-center mb-3">
    </div>
    <div class="d-flex justify-content-center mb-3">
    </div>
    <div class="d-flex justify-content-center mb-3">
    </div>


        <div class="d-flex justify-content-center mb-3">
            <form action="{{ route('primaryplanning.destroy', $primary->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-primary btn-lg w-100" type="submit" disabled>
                    <span class="btn-inner--icon"><i class="material-icons">delete</i></span>
                    <span class="btn-inner--text">You cannot delete your request now because you already generated a
                        final planning</span>
                </button>
            </form>

        </div>
    @else


    <div class="d-flex justify-content-center mb-3">
    </div>
    <div class="d-flex justify-content-center mb-3">
    </div>
    <div class="d-flex justify-content-center mb-3">
    </div>

    @if ($hasplanning == 0)
    <div class="d-flex justify-content-center mb-3">

        <a class="d-flex justify-content-center mb-10" >
            <h4 class="p-65"> <strong>You did not choose a planning yet</strong></h4>
        </a>

    </div>
    @else
    <form action="{{ route('primaryplanning.destroy') }}" method="POST">

        <div class="d-flex justify-content-center mb-3">
            @csrf
            @method('DELETE')

            <button class="btn btn-primary btn-lg w-90" type="submit">
                <span class="btn-inner--icon"><i class="material-icons">delete</i></span>
                <span class="btn-inner--text">Delete requested planning</span>
            </button>


        </div>
    </form>


    <form action="{{ route('generate-planning') }}" method="POST">
        <div class="d-flex justify-content-center mb-3">
            @csrf
            <button class="btn btn-success btn-lg w-90" type="submit">
                <span class="btn-inner--icon"><i class="material-icons">check_circle</i></span>
                <span class="btn-inner--text">Generate my planning</span>
            </button>
        </div>

    </form>
    @endif

    @endif

    <div class="d-flex justify-content-center mb-3">

    </div>

</div>
