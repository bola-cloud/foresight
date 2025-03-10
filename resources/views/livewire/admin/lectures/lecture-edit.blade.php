<div>
    <div class="container-fluid pt-4">
        <div class="row">
            @if($errorMessage)
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ $errorMessage }}</li>
                    </ul>
                </div>
            @endif
            @if(Session::has('danger'))
                <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('warning'))
                <div class="alert alert-warning">{{ Session::get('warning') }}</div>
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>تعديل القسم</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="edit({{ $lecture->id }})" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="lectureName" class="form-label">عنوان القسم</label>
                                <input type="text" class="form-control" wire:model="name" id="lectureName" placeholder="أدخل عنوان المحاضرة">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="lectureCost" class="form-label">تكلفة المحاضرة</label>
                                <input type="number" class="form-control" wire:model="cost" id="lectureCost" placeholder="أدخل تكلفة المحاضرة">
                                @error('cost')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label for="lectureDescription" class="form-label">الوصف</label>
                                <textarea class="form-control" wire:model="description" id="lectureDescription" rows="3"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lectureUnit" class="form-label">الكورس</label>
                                <select class="form-select" wire:model="unit_id" id="lectureUnit">
                                    <option selected>اختر الكورس</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="nonActiveStatus" value="non-active" wire:model="status">
                                    <label class="form-check-label" for="nonActiveStatus">
                                        غير نشطة
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="activeStatus" value="active" wire:model="status">
                                    <label class="form-check-label" for="activeStatus">
                                        نشطة
                                    </label>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lectureImage" class="form-label">صورة القسم</label>
                                <input type="file" wire:model="image" accept="image/*" id="lectureImage">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @if($image)
                                    <div class="row col-md-4">
                                        <img src="{{ $image->temporaryUrl() }}" width="120px">
                                    </div>
                                @else
                                    <div class="row col-md-4">
                                        <img src="{{ asset($lecture->image) }}" width="120px">
                                    </div>
                                @endif
                            </div>
                            <br>
                            <button type="submit" class="btn btn-warning btn-block">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
