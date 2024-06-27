<div class="card">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Hour</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Accept rate</th>
            <th></th>
          </tr>
        </thead>
        <tbody>




            @foreach ($myprimaryplanning as $primary)
          <tr>
            <td>
              <div class="d-flex px-2">
                <div>
                  <img src="https://pbs.twimg.com/profile_images/1394261489054277638/rijXG1C__400x400.jpg" class="avatar avatar-sm rounded-circle me-2">
                </div>
                <div class="my-auto">
                  <h6 class="mb-0 text-xs">{{$primary->datepassage}}</h6>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-normal mb-0">at {{$primary->heurepassage}}:00</p>
            </td>
            <td>
              <span class="badge badge-dot me-4">
                <i class="bg-info"></i>
                <span class="text-dark text-xs">{{$primary->status}}</span>
              </span>
            </td>




                <td class="align-left text-center">
                    <div class="d-flex align-items-center justify-content-left">
                    <span class="me-2 text-xs font-weight-bold">60%</span>
                    <div>
                    <div class="progress">
                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                    </div>
                    </div>
                    </div>
                </td>

                <td>
                    delete here
                </td>



          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    </div>
