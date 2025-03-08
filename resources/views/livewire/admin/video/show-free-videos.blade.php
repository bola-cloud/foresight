<div>
    <div class="container-fluid">
        <div class="card">
            <div class="row m-3">
                <!-- Search & Filters -->
                <div class="col-md-4">
                    <input type="text" class="form-control" wire:model="search" placeholder="بحث عن فيديو...">
                </div>
                <div class="col-md-4">
                    <select class="form-select" wire:model="selectedUnit">
                        <option value="">اختر الكورس</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" wire:model="selectedLecture">
                        <option value="">اختر القسم</option>
                        @foreach ($lectures as $lecture)
                            <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row m-3">
                @if($freeVideos->isEmpty())
                    <p class="text-center mt-4">لا توجد فيديوهات مجانية متوفرة.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>العنوان</th>
                                    <th>القسم</th>
                                    <th>الكورس</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($freeVideos as $freeVideo)
                                    <tr>
                                        <td>{{ $freeVideo->name_video }}</td>
                                        <td>{{ $freeVideo->lecture ? $freeVideo->lecture->name : 'غير محدد' }}</td>
                                        <td>{{ $freeVideo->lecture && $freeVideo->lecture->unit ? $freeVideo->lecture->unit->name : 'غير محدد' }}</td>
                                        <td>
                                            <button
                                                class="btn btn-success"
                                                data-toggle="modal"
                                                data-target="#videoModal"
                                                onclick="openVideoModal('{{ $freeVideo->link }}')">
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
                            <iframe id="videoFrame" width="700" height="450" frameborder="0" allowfullscreen></iframe>
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

                if (!videoFrame) {
                    console.error("Error: videoFrame element not found!");
                    return;
                }

                let videoId = null;

                if (videoLink.includes('youtu.be')) {
                    videoId = videoLink.split('/').pop().split('?')[0];
                } else if (videoLink.includes('watch?v=')) {
                    videoId = new URL(videoLink).searchParams.get("v");
                }

                if (videoId) {
                    videoFrame.src = `https://www.youtube.com/embed/${videoId}?rel=0&controls=1&modestbranding=1`;
                }

                $('#videoModal').modal('show');
            }

            document.addEventListener('DOMContentLoaded', function () {
                $('#videoModal').on('hidden.bs.modal', function () {
                    const videoFrame = document.getElementById('videoFrame');
                    if (videoFrame) {
                        videoFrame.src = ''; // Clear video when modal is closed
                    }
                });

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
