<div class="card">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Owner</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Submission Date</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Resolution Date</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Resolution Mesasge</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>


            @foreach ($complaints as $complaint)
            <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcDzaMv-LCHCbQ3akUSKL_lZihGVzy5dFJ2g&s" class="avatar avatar-sm me-3">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-xs">{{$user->nom}}</h6>
                      <p class="text-xs text-secondary mb-0">Professor</p>
                    </div>
                  </div>
                </td>

                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$complaint->submissionDate}}</p>
                  <p class="text-xs text-secondary mb-0">From the Esprit planner website</p>
                </td>


                <td class="align-middle text-center text-sm">

                    @if ($complaint->status == "accepted")
                    <span class="badge bg-gradient-success">Accepted</span>

                    @elseif ($complaint->status == "rejected")
                    <span class="badge bg-gradient-danger">Rejected</span>

                    @else
                    <span class="badge bg-gradient-warning">Pending</span>

                    @endif

                </td>


                <td class="align-middle text-center">
                @if ($complaint->status == "accepted" or $complaint->status == "rejected")
                    <span class="text-xs font-weight-bold mb-0">{{$complaint->resolutionDate}}</span>
                @else
                <span class="text-xs font-weight-bold mb-0">NA</span>

                @endif
                </td>




                <td class="align-middle">
                    @if ($complaint->status == "accepted" or $complaint->status == "rejected")

                      <p>{{$complaint->resolutionMessage}}</p>

                      @else
                      <p hidden>{{$complaint->resolutionMessage}}</p>

                      @endif



                </td>
              </tr>
            @endforeach

        </tbody>
      </table>
    </div>
  </div>
