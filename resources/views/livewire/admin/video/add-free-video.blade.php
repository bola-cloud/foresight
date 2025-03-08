<div>
    <style>
        span.error {
            color: red;
        }
    </style>
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>رفع فيديو</h5>
                    </div>

                    <div class="card-body">
                        <form wire:submit.prevent="store">
                            <!-- Video Title -->
                            <div class="mb-3">
                                <label for="name" class="form-label">عنوان الفيديو</label>
                                <input type="text" class="form-control" wire:model="name" id="name" placeholder="أدخل عنوان الفيديو">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Video Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">الوصف</label>
                                <textarea class="form-control" wire:model="description" id="description" rows="3"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Video Link -->
                            <div class="mb-3">
                                <label for="link" class="form-label">رابط الفيديو</label>
                                <input type="text" class="form-control" wire:model="link" id="link" placeholder="أدخل رابط الفيديو">
                                @error('link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Select Course -->
                            <div class="mb-3">
                                <label for="selectedUnit" class="form-label">اختر الكورس</label>
                                <select class="form-select" wire:model="selectedUnit">
                                    <option selected>اختر الكورس</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Select Section -->
                            <div class="mb-3">
                                <label for="selectedLecture" class="form-label">اختر القسم</label>
                                <select class="form-select" wire:model="selectedLecture">
                                    <option selected>اختر القسم</option>
                                    @foreach ($lectures as $lecture)
                                        <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br><br>
                            <button type="submit" class="btn btn-sm btn-block btn-success">رفع الفيديو</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
