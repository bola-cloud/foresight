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
              <h4 class="card-title" id="basic-layout-form">إضافة كورس</h4>
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
                <form class="form" wire:submit.prevent="create_unit">
                  <div class="form-body">
                    <h4 class="form-section"><i class="ft-user"></i> معلومات الكورس</h4>
                    @error('name_unit') <span class="error">{{ $message }}</span> @enderror
                    @error('year_unit') <span class="error">{{ $message }}</span> @enderror

                    @if(Session::has("message"))
                    <span class="error">{{ Session::get("message") }}</span>
                    @endif
                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">اسم الكورس</label>
                          <input type="text" id="projectinput1" class="form-control" placeholder="اسم الكورس" wire:model="name_unit">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">تكلفة الكورس</label>
                          <input type="number" id="projectinput1" class="form-control" placeholder="تكلفة الكورس" wire:model="cost">
                        </div>
                      </div>
                        <div class="col-md-12">
                          <label class="col-md-3 label-control" for="projectinput1">صورة الكورس</label>
                          <div class="col-md-5">
                            <input type="file" class="form-control" wire:model="image_unit" accept="image/*">
                          </div>
                          <div class="col-md-4">
                                  @if($image_unit)
                                  <img src="{{$image_unit->temporaryUrl()}}" width="120px">
                                  @endif
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-actions">
                    <a type="button" class="btn btn-warning mr-1" href="{{ route("home_admin") }}">
                      <i class="ft-x"></i> إلغاء
                    </a>
                    <button type="submit" class="btn btn-primary">
                      <i class="la la-check-square-o"></i> حفظ
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
</div>
