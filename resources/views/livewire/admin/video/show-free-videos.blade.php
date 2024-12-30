<div>
    <div class="container-fluid">
        <div class="card">
            <div class="row m-3">
                @if($freeVideos->isEmpty())
                    <p class="text-center mt-4">لا توجد فيديوهات مجانية متوفرة.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>العنوان</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($freeVideos as $freeVideo)
                                    <tr>
                                        <td>{{ $freeVideo->name }}</td>
                                        <td>
                                            @if ($freeVideo->status == 1)
                                                <span class="text-success">نشط</span>
                                            @elseif($freeVideo->status == 0)
                                                <span class="text-danger">غير نشط</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button 
                                                class="btn btn-success"
                                                data-toggle="modal"
                                                data-target="#videoModal"
                                                onclick="openVideoModal('{{ $freeVideo->embed_link }}')">
                                                عرض الفيديو
                                            </button>
                                            <a href="{{ route('edit_free_video', $freeVideo->id) }}" class="btn btn-warning">تعديل</a>
                                            <button class="btn btn-danger" wire:click="confirmDelete({{ $freeVideo->id }})">حذف</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">تشغيل الفيديو</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="plyr__video-embed">
                                <iframe id="videoFrame" src="" height="450" width="700" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
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
            function openVideoModal(videoLink) {
                const videoFrame = document.getElementById('videoFrame');
                videoFrame.src = `${videoLink}?rel=0&controls=1&modestbranding=1`;
            }

            document.addEventListener('DOMContentLoaded', () => {
                $('#videoModal').on('hidden.bs.modal', function () {
                    const videoFrame = document.getElementById('videoFrame');
                    videoFrame.src = ''; // Clear the iframe when the modal is closed
                });
            });

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
