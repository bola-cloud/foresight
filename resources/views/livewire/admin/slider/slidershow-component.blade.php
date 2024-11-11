<div>


    <div class="row" id="header-styling">
        <div class="col-md-12">
            <div class="form-group">
              <label for="projectinput5">year school</label>
              <select id="projectinput5" name="interested" class="form-control"  wire:model="year_type">
                <option value="none" selected="">choose</option>
                <option value="ONE">ONE</option>
                <option value="TWO">TWO</option>
                <option value="THREE">THREE</option>
              </select>
            </div>
          </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Units</h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                  <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">

              <div class="table-responsive">
                <table class="table">
                  <thead class="table table-bordered mb-0">
                    <tr>
                      <th>Title</th>
                      <th>image</th>
                      <th>case</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider )
                      <tr>
                        <td>{{ $slider->title }}
                            <td>
                                <img src="{{ Storage::url('photos/' . $slider->image) }}" width="60" height="60">
                              </td>
                        </td>
                        <td>

                            <a type="button" class="btn btn-primary" href="{{ route("edit_slider",['id_slider'=>$slider->id]) }}">edit</a>

                            <button type="button" class="btn btn-danger manual" wire:click="delete_slider({{$slider->id}})">delete</button>

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
