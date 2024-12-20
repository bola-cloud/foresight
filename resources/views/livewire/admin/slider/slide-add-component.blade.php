<div class="container-fluid">
  <div class="card p-3">
      <div class="card-header d-flex justify-content-start">
          <button wire:click="openModal" class="btn btn-primary">إضافة سلايدر</button>
      </div>

      <!-- Modal -->
      @if($isOpen)
          <div class="modal fade show" style="display: block;">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">{{ $sliderId ? 'تعديل السلايدر' : 'إضافة سلايدر' }}</h5>
                          <button wire:click="closeModal" class="close">&times;</button>
                      </div>
                      <div class="modal-body">
                          <form wire:submit.prevent="store">
                              <div class="form-group">
                                  <label>العنوان</label>
                                  <input type="text" wire:model="title" class="form-control">
                                  @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group">
                                  <label>الصورة</label>
                                  <input type="file" wire:model="image" class="form-control" accept="image/*">
                                  @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group">
                                  @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                      <img src="{{ $image->temporaryUrl() }}" width="120px">
                                  @elseif($image)
                                      <img src="{{ asset('storage/' . $image) }}" width="120px">
                                  @endif
                              </div>
                              <button type="submit" class="btn btn-primary">حفظ</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      @endif

      <!-- Sliders Table -->
      <table class="table">
          <thead>
              <tr>
                  <th>العنوان</th>
                  <th>الصورة</th>
                  <th>الإجراءات</th>
              </tr>
          </thead>
          <tbody>
              @foreach($sliders as $slider)
                  <tr>
                      <td>{{ $slider->title }}</td>
                      <td><img src="{{ asset($slider->image) }}" width="50"></td>
                      <td>
                          <button wire:click="edit({{ $slider->id }})" class="btn btn-info">تعديل</button>
                          <button 
                              onclick="confirmDelete({{ $slider->id }})" 
                              class="btn btn-danger">حذف</button>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>

<!-- Confirmation Script -->
<script>
  function confirmDelete(id) {
      if (confirm('هل أنت متأكد أنك تريد حذف هذا السلايدر؟')) {
          Livewire.emit('deleteSlider', id);
      }
  }
</script>
