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
                        <h5>إضافة قسم جديد</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="store" enctype="multipart/form-data" id="store">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">عنوان القسم</label>
                                <input type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="أدخل عنوان المحاضرة">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">تكلفة القسم</label>
                                <input type="number" class="form-control" wire:model="cost" id="exampleFormControlInput2" placeholder="أدخل تكلفة المحاضرة">
                                @error('cost')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
                                <textarea class="form-control" wire:model="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" wire:model="unit_id">
                                    <option selected>اختر الكورس</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="flexRadioDefault1" value="non-active" wire:model="status">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        غير نشطة
                                    </label>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="flexRadioDefault2" value="active" wire:model="status">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        نشطة
                                    </label>
                                </div>
                            </div>
                            <div>
                                <input type="file" wire:model="image" accept="image/*">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @if($image)
                                    <div class="row col-md-4">
                                        <img src="{{$image->temporaryUrl()}}" width="120px">
                                    </div>
                                @endif
                            </div>
                            <br>
                        </form>
                        <button type="submit" class="btn btn-sm btn-block btn-success" form="store">إضافة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
