<div>
    <style>
        span.error {
    color: red;
}

    </style>

    <section id="basic-form-layouts">
        <div class="row match-height">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="basic-layout-form">Exams</h4>
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
              <div class="card-content collapse show">
                <div class="card-body">

                  <form class="form" wire:submit.prevent="creatExam">
                    <div class="form-body">

                      <h4 class="form-section"><i class="ft-user"></i> Exam Info</h4>
                      @error('name_exam') <span class="error">{{ $message }}</span> @enderror
                      @error('year_exam') <span class="error">{{ $message }}</span> @enderror

                      @if(Session::has("message"))
                      <span class="error">{{ Session::get("message") }}</span>
                      @endif
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="projectinput1">Name Exam</label>
                            <input type="text" id="units" class="form-control" placeholder="Name Exam"
                            name="fname" wire:model="name_exam">
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="projectinput1">Time Exam (time with minutes)</label>
                              <input type="text" id="units" class="form-control" placeholder="Time Exam"
                              name="fname" wire:model="time">
                            </div>
                          </div>
                        <div class="col-md-12">

                            <div  wire:ignore class="form-group">
                                <select class="select2 form-control" id="select2-dropdown" multiple  >
                                    @foreach(   $units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      </div>
                          </div>
                          <div>




                    </div>
                    <div class="form-actions">
                      <a type="button" class="btn btn-warning mr-1" href="{{ route("home_admin") }}">
                        <i class="ft-x"></i> Cancel
                      </a>
                      <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

      </section>
</div>
@push('scripts')
  <script>

    $(document).ready(function () {


        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function (e) {
            var data = $('#select2-dropdown').select2("val");
            @this.set('unit_selected', data);


        });
    });
</script>
@endpush
