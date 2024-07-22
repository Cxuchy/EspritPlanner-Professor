@php
    $AcceptedCount = 0;
    $RejectedCount = 0;
    $PendingCount = 0;
@endphp

@foreach($complaints as $complaint)
    @if($complaint->status == "accepted")
        @php
            $AcceptedCount++;
        @endphp
    @endif

    @if($complaint->status == "rejected")
        @php
            $RejectedCount++;
        @endphp
    @endif

    @if($complaint->status == "pending")
        @php
            $PendingCount++;
        @endphp
    @endif

@endforeach


<div class="d-flex justify-content-center mb-3">

    <div class="col-lg-8">
        <div class="row">




          <div class="col-xl-6">
            <div class="row">
              <div class="col-md-6 col-6">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">layers</i>
                    </div>
                  </div>


                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Overall Complaints</h6>
                    <span class="text-xs">See overall details here</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">{{count($complaints)}}</h5>
                  </div>


                </div>
              </div>
              <div class="col-md-6 col-6">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">check</i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Accepted Complaints</h6>
                    <span class="text-xs">See overall details here</span>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">{{$AcceptedCount}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-danger shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">close</i>
                      </div>
                    </div>


                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Rejected Complaints</h6>
                      <span class="text-xs">See overall details here</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">{{$RejectedCount}}</h5>
                    </div>


                  </div>
                </div>


                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-info shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">access_time</i>
                    </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Pending Complaints</h6>
                      <span class="text-xs">See overall details here</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">{{$PendingCount}}</h5>
                    </div>
                  </div>
                </div>



              </div>
            </div>

        </div>
      </div>


</div>

