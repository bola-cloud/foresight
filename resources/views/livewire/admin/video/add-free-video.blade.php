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
                        <h5>Upload File</h5>
                    </div>

                    <div class="card-body">
                        <form wire:submit.prevent="store">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Video title</label>
                                <input type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="enter video title">
                                @error('name')
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
                                <label for="exampleFormControlInput1" class="form-label">Video link</label>
                                <input type="text" class="form-control" wire:model="link" id="exampleFormControlInput1" placeholder="enter video link">
                                @error('link')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="projectinput5">year school</label>
                                <select id="projectinput5" name="interested" class="form-control"  wire:model="year_type">
                                    <option value="none" selected="">choose</option>
                                    <option value="ONE">ONE</option>
                                    <option value="TWO">TWO</option>
                                    <option value="THREE">THREE</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div>
                                    <input type="radio" wire:model="status" id="active" value="1">
                                    <label for="active">Active</label>
                                </div>
                                <div>
                                    <input type="radio" wire:model="status" id="nonActive" value="0">
                                    <label for="nonActive">Non-Active</label>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-sm btn-block btn-danger">Upload</button>
                        </form>      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
