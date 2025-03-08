<div>
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>تعديل فيديو مجاني</h5>
                    </div>

                    <div class="card-body">
                        <form wire:submit.prevent="update">
                            <!-- Video Title -->
                            <div class="mb-3">
                                <label class="form-label">عنوان الفيديو</label>
                                <input type="text" class="form-control" wire:model="title" placeholder="أدخل عنوان الفيديو">
                                @error('title') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Video Description -->
                            <div class="mb-3">
                                <label class="form-label">الوصف</label>
                                <textarea class="form-control" wire:model="description" rows="3"></textarea>
                                @error('description') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Video Link -->
                            <div class="mb-3">
                                <label class="form-label">رابط الفيديو</label>
                                <input type="text" class="form-control" wire:model="link" placeholder="أدخل رابط الفيديو">
                                @error('link') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Select Unit -->
                            <div class="mb-3">
                                <label class="form-label">اختر الكورس</label>
                                <select class="form-select" wire:model="selectedUnit">
                                    <option value="">اختر الكورس</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Select Lecture -->
                            <div class="mb-3">
                                <label class="form-label">اختر القسم</label>
                                <select class="form-select" wire:model="selectedLecture">
                                    <option value="">اختر القسم</option>
                                    @foreach ($lectures as $lecture)
                                        <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedLecture') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>

                            <br><br>
                            <button type="submit" class="btn btn-sm btn-block btn-success">تحديث</button>
                            <button type="button" class="btn btn-sm btn-block btn-danger" wire:click="delete">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
