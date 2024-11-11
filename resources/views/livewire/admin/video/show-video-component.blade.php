<div>


    <div class="row" id="header-styling">
        <div class="col-md-12">
            <div class="form-group">
              <label for="projectinput5">year school/{{ $year_type }}</label>

            </div>
          </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Videos</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements" style="top: 4px">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                  <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
              </div>
            </div>

            @if(Session::has("message"))


                    <div class="col-md-4 mb-2">
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get("message") }}
                          <a class="alertAnimation float-right" data-animation="zoomIn">
                            <i class="icon-arrow-right"></i>
                          </a>
                        </div>
                      </div>
            @endif
            <div class="card-content collapse show">

              <div class="table-responsive">
                <table class="table">
                  <thead class="table table-bordered mb-0">
                    <tr>
                      <th>name video </th>
                      <th>title</th>
                      <th>decsription</th>
                      <th>month</th>
                      <th>photo video </th>
                      <th>show</th>
                      <th>case</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($videos as $video )
                      <tr>
                        <td>{{$video->name_video}}</td>
                        <td>{{$video->video_title}}</td>
                        <td>{{$video->description}}</td>
                        <td>{{$video->month}}</td>
                        <td>
                            <!-- <img src="{{ asset('storage/photos/'.$video->image_video) }}" width="60" height="60"> -->
                        </td>
                        <td>
                            <a type="button" class="btn btn-primary" href="{{ route("show_data_video",['ide'=>$video->id]) }}">show</a>
                        </td>
                        <td>

                            <a type="button" class="btn btn-primary" href="{{ route("edit_video",['id_video'=>$video->id]) }}">edit</a>

                            <button type="button" class="btn btn-danger manual" wire:click="delete_video({{ $video->id }})">delete</button>

                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
</div>
