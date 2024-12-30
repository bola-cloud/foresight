<div>
    @push('style')
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    @endpush

    <div class="container">
        <div class="row card">
            <div class="col-md-12">
                <div class="row mt-4">
                    <div class="col-md-5">
                        <label for="unid_id" class="form-label">التصفية حسب الوحدة</label>
                        <select class="form-select" id="unid_id" wire:model="unid_id">
                            <option value="">اختر الوحدة</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="lecture_id" class="form-label">التصفية حسب الاقسام</label>
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
                                        <th>الوحدة</th>
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
                                                <button class="btn btn-success" wire:click="playVideo('{{ $video->embed_link }}')">تشغيل</button>
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
    </div>

    <!-- Video Modal -->
    <div wire:ignore.self class="modal fade" id="videoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تشغيل الفيديو</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="plyr__video-embed">
                        <iframe id="videoFrame" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأكيد الحذف</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
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
        <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
        <script>
            document.addEventListener('livewire:load', () => {
                Livewire.on('playVideo', (event) => {
                    const videoFrame = document.getElementById('videoFrame');
                    videoFrame.src = `${event.link}?rel=0&controls=1&modestbranding=1`;
                    $('#videoModal').modal('show');
                });

                $('#videoModal').on('hidden.bs.modal', function () {
                    const videoFrame = document.getElementById('videoFrame');
                    videoFrame.src = ''; // Clear the iframe when the modal is closed
                });
            });
        </script>
    @endpush
</div>
