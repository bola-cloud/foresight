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
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">عنوان الفيديو</label>
                                <input type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="أدخل عنوان الفيديو">
                                @error('name')
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
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">رابط الفيديو</label>
                                <input type="text" class="form-control" wire:model="link" id="exampleFormControlInput1" placeholder="أدخل رابط الفيديو">
                                @error('link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">الحالة</label>
                                <div>
                                    <input type="radio" wire:model="status" id="active" value="1">
                                    <label for="active">نشطة</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="status" id="nonActive" value="0">
                                    <label for="nonActive">غير نشطة</label>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-sm btn-block btn-danger">رفع</button>
                        </form>      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
