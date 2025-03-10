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
                        <h5>تعديل الفيديو</h5>
                    </div>
  
                    <div class="card-body">
                        <form wire:submit.prevent="update">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">عنوان الفيديو</label>
                                <input type="text" class="form-control" wire:model="title" id="exampleFormControlInput1" placeholder="أدخل عنوان الفيديو">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
                                <textarea class="form-control" wire:model="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="exampleFormControlInput1" class="form-label">رابط الفيديو</label>
                                <input type="text" class="form-control" wire:model="link" id="exampleFormControlInput1" placeholder="أدخل رابط الفيديو">
                                @error('link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <select class="form-select" aria-label="Default select example" wire:model="selectedUnit">
                                    <option selected>اختر الدورة</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedUnit')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <select class="form-select" aria-label="Default select example" wire:model="selectedLecture">
                                    <option selected>اختر القسم</option>
                                    @foreach ($lectures as $lecture)
                                        <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedLecture')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-sm btn-block btn-danger">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  