<div class="container-fluid">
    <div class="card p-3">
        <div class="card-header d-flex justify-content-start">
            <button wire:click="openModal" class="btn btn-primary">إضافة سلايدر</button>
        </div>
  
        <!-- Modal for Adding/Editing Slider -->
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
                                <div class="form-group text-center">
                                    @if ($image instanceof \Livewire\TemporaryUploadedFile)
                                        <img src="{{ $image->temporaryUrl() }}" width="120px" style="border-radius: 5px;">
                                    @elseif($image)
                                        <img src="{{ asset('storage/' . $image) }}" width="120px" style="border-radius: 5px;">
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
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
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
                        <td>
                            <img src="{{ asset($slider->image) }}" width="50" style="border-radius: 5px; cursor: pointer;"
                                 onclick="openImageModal('{{ asset($slider->image) }}')">
                        </td>
                        <td>
                            <button wire:click="edit({{ $slider->id }})" class="btn btn-info btn-sm">تعديل</button>
                            <button onclick="confirmDelete({{ $slider->id }})" class="btn btn-danger btn-sm">حذف</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
  
  <!-- Image Preview Modal -->
  <div id="imageModal" class="modal" tabindex="-1" role="dialog" style="display: none;">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">عرض الصورة</h5>
                  <button type="button" class="close" onclick="closeImageModal()">
                      <span>&times;</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                  <img id="modalImage" src="" alt="Slider Image" style="max-width: 100%; max-height: 80vh;">
              </div>
          </div>
      </div>
  </div>
  
  @push('style')
      <style>
          .table td {
              vertical-align: middle;
          }
  
          .modal {
              display: none;
              position: fixed;
              top: 0;
              left: 0;
              z-index: 1050;
              width: 100%;
              height: 100%;
              overflow: hidden;
              background-color: rgba(0, 0, 0, 0.5);
          }
      </style>
  @endpush
  
  <script>
      function openImageModal(imageUrl) {
          const modal = document.getElementById('imageModal');
          const modalImage = document.getElementById('modalImage');
          modalImage.src = imageUrl;
          modal.style.display = 'block';
      }
  
      function closeImageModal() {
          const modal = document.getElementById('imageModal');
          modal.style.display = 'none';
      }
  
      function confirmDelete(id) {
          if (confirm('هل أنت متأكد أنك تريد حذف هذا السلايدر؟')) {
              Livewire.emit('deleteSlider', id);
          }
      }
  </script>
  