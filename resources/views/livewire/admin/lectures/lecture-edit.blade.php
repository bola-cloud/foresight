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
                        <h5>Create lecture</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="edit({{$lecture->id}})" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Video title</label>
                                <input type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="Enter video name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Lecture cost</label>
                                <input type="number" class="form-control" wire:model="cost" id="exampleFormControlInput2" placeholder="Enter video name">
                                @error('cost')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" wire:model="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" wire:model="unit_id">
                                    <option selected>Select Unit</option>
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
                                        Non-Active
                                    </label>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="flexRadioDefault2" value="active" wire:model="status">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div>
                                <input type="file" wire:model="image" accept="image/*" id="avatar">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @if($image)
                                    <div class="row col-md-4">
                                        <img src="{{$image->temporaryUrl()}}" width="120px">
                                    </div>
                                @else
                                    <div class="row col-md-4">
                                        <img src="{{asset($lecture->image)}}" width="120px">
                                    </div>
                                @endif
                            </div>
                            <br>
                            <button type="submit" class="btn btn-sm btn-block btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
