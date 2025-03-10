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
              <h4 class="card-title" id="basic-layout-form">تعديل الامتحان</h4>
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

                <form class="form" wire:submit.prevent="edit_exam">
                  <div class="form-body">

                    <h4 class="form-section"><i class="ft-user"></i> معلومات الامتحان</h4>
                    @error('name_exam') <span class="error">{{ $message }}</span> @enderror
                    @error('time') <span class="error">{{ $message }}</span> @enderror
                    @error('unit_selected') <span class="error">{{ $message }}</span> @enderror

                    @if(Session::has("message"))
                    <span class="error">{{ Session::get("message") }}</span>
                    @endif
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="projectinput1">اسم الامتحان</label>
                          <input type="text" id="units" class="form-control" placeholder="اسم الامتحان"
                          name="fname" wire:model="name_exam">
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="projectinput1">مدة الامتحان (بالدقائق)</label>
                            <input type="text" id="units" class="form-control" placeholder="مدة الامتحان"
                            name="fname" wire:model="time">
                          </div>
                        </div>

                      <div class="col-md-12">
                        <div wire:ignore class="form-group">
                          <label for="select2-dropdown">الوحدات المرتبطة</label>
                          <select class="select2 form-control" id="select2-dropdown" multiple>
                            @foreach($units as $unit)
                            <option value="{{ $unit->id }}"
                                @if(is_array($unit_selected) && in_array($unit->id, $unit_selected)) selected @endif>
                                {{ $unit->name }}
                            </option>
                            @endforeach
                          </select>                        
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
@push('scripts')

<script>
  $(document).ready(function () {
      $('#select2-dropdown').select2();

      // Pre-fill selected units
      $('#select2-dropdown').val(@json($unit_selected ?? [])).trigger('change');

      // Update Livewire property when select2 changes
      $('#select2-dropdown').on('change', function (e) {
          var data = $(this).val() || []; // Default to an empty array
          @this.set('unit_selected', data);
      });
  });

  document.addEventListener("livewire:load", function (event) {
      window.livewire.hook('afterDomUpdate', () => {
          $('#select2-dropdown').select2();
          $('#select2-dropdown').val(@json($unit_selected ?? [])).trigger('change');
      });
  });

</script>

@endpush
