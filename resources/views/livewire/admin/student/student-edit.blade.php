<div>
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($errorMessage)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errorMessage }}</li>
                        </ul>
                    </div>
                @endif
                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        {{ Session::get('success_message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        <h5>تعديل بيانات المهندس</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="update" id="editStudent">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">اسم المهندس</label>
                                <input type="text" class="form-control" wire:model="name" id="name" placeholder="ادخل اسم المهندس">
                                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mobile_phone" class="form-label">رقم هاتف المهندس</label>
                                <input type="text" class="form-control" wire:model="mobile_phone" id="mobile_phone" placeholder="ادخل رقم هاتف المهندس">
                                @error('mobile_phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">رمز المهندس</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" wire:model="code" id="code" placeholder="رمز المهندس">
                                    <button type="button" class="btn btn-success" wire:click="generateUniqueCode">توليد</button>
                                </div>
                                @error('code') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <button type="submit" class="btn btn-danger btn-block">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
