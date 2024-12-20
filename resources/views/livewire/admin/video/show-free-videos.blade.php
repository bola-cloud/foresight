<div>
    <div class="container-fluid">
        <div class="card">
            <div class="row m-3">
                @if($freeVideos->isEmpty())
                    <p class="text-center mt-4">لا توجد فيديوهات مجانية متوفرة.</p>
                @else
                    @foreach($freeVideos as $freeVideo)
                        <div class="col-md-6">
                            <h4 class="d-flex justify-content-center mb-3">
                                العنوان: {{ $freeVideo->name }} ------  الصف: {{ $freeVideo->year_type }}
                            </h4>
                            <br>
                            @if ($freeVideo->status == 1)
                            <h5 class="d-flex justify-content-center text-success"> نشط </h5>
                            @elseif($freeVideo->status == 0)
                            <h5 class="d-flex justify-content-center text-danger"> غير نشط </h5>
                            @endif
                            <div class="video-container d-flex flex-row justify-content-center">
                                <iframe width="560" height="315" src="{{ $freeVideo->embed_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="row d-flex flex-row justify-content-center mb-3">
                                <a href="{{ route('edit_free_video', $freeVideo->id) }}" class="btn btn-warning m-3 col-md-6">تعديل</a>
                                <button class="btn btn-danger m-3 col-md-6" wire:click="confirmDelete({{ $freeVideo->id }})">حذف</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل أنت متأكد أنك تريد حذف هذا الفيديو؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteVideo">حذف</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', () => {
                window.addEventListener('show-delete-modal', event => {
                    $('#deleteModal').modal('show');
                });

                window.addEventListener('hide-delete-modal', event => {
                    $('#deleteModal').modal('hide');
                });
            });
        </script>
    @endpush
</div>
