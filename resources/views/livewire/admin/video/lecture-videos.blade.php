<div>
    @push('style')
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
        <style>
            a.ytp-watermark.yt-uix-sessionlink {
                display: none !important;
            }
            .ytp-chrome-top.ytp-show-cards-title {
                display: none !important;
            }
        </style>
    @endpush
    <div class="container">
        <div class="row card">
            <div class="col-md-12">
                <div class="row mt-4">
                    <div class="col-md-5">
                        <label for="unid_id" class="form-label">التصفية حسب الكورس</label>
                        <select class="form-select" id="unid_id" wire:model="unid_id">
                            <option value="">اختر الكورس</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="lecture_id" class="form-label">التصفية حسب الأقسام</label>
                        <select class="form-select" id="lecture_id" wire:model="lecture_id">
                            <option value="">اختر القسم</option>
                            @foreach ($lectures as $lecture)
                                <option value="{{ $lecture['id'] }}">{{ $lecture['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="row mt-4 mb-5">
                    @if ($videos && count($videos) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>اسم الفيديو</th>
                                        <th>الكورس</th>
                                        <th>القسم</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videos as $video)
                                        <tr>
                                            <td>{{ $video->name_video }}</td>
                                            <td>{{ $video->lecture->unit->name ?? 'غير متوفر' }}</td>
                                            <td>{{ $video->lecture->name ?? 'غير متوفر' }}</td>
                                            <td>
                                                <button 
                                                    class="btn btn-success" 
                                                    data-toggle="modal" 
                                                    data-target="#videoModal" 
                                                    onclick="openVideoModal('{{ $video->embed_link }}')">
                                                    تشغيل
                                                </button>
                                                <a href="{{ route('video_edit', $video->id) }}" class="btn btn-warning">تعديل</a>
                                                <button class="btn btn-danger" wire:click="confirmDelete({{ $video->id }})">حذف</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center mt-4">لا توجد فيديوهات متاحة.</p>
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
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="إغلاق">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        هل أنت متأكد أنك تريد حذف هذا الفيديو؟
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteVideo">حذف</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@push('scripts')
<script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
<script>
    document.addEventListener('livewire:load', () => {
        Livewire.hook('message.processed', (message, component) => {
            const players = Array.from(document.querySelectorAll('.plyr__video-embed')).map(p => new Plyr(p));
        });
        window.addEventListener('show-delete-modal', event => {
            $('#deleteModal').modal('show');
        });

        window.addEventListener('hide-delete-modal', event => {
            $('#deleteModal').modal('hide');
        });
    });
</script>
<script>
    function openVideoModal(videoLink) {
        const videoFrame = document.getElementById('videoFrame');
        videoFrame.src = `${videoLink}?rel=0&controls=1&modestbranding=1`;
    }

    // Clear the video when the modal is closed
    document.addEventListener('DOMContentLoaded', () => {
        $('#videoModal').on('hidden.bs.modal', function () {
            const videoFrame = document.getElementById('videoFrame');
            videoFrame.src = '';
        });
    });
</script>

@endpush