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
                <h4 class="card-title" id="basic-layout-form">Sliders</h4>
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
                <div class="card-body">

                  <form class="form" wire:submit.prevent="addslider">
                    <div class="form-body">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="projectinput1">slider  Title</label>
                            <input type="text" id="projectinput1" class="form-control" placeholder="Name slider"
                            name="fname" wire:model="title">
                          </div>
                        </div>
                        <div class="col-md-6">
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
                          <div class="col-md-12">
                            <label class="col-md-3 label-control" for="projectinput1"> image slider</label>
                            <div class="col-md-5">
                              <input type="file" class="form-control"
                              name="name_company" wire:model="image">
                            </div>
                            <div class="col-md-4">
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120px">
                                    @endif
                              </div>
                          </div>

                      </div>


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
