<div>
    <div class="container pt-4">
        @if(Session::has('success_message'))
            <div class="alert alert-success">
                {{Session::get('success_message')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Upload File</h5>
                    </div>

                    <div class="card-body"
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"            
                    >
                        <form method="POST" enctype="multipart/form-data" >
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">File title</label>
                                <input type="text" class="form-control" name="file_title" id="exampleFormControlInput1" placeholder="enter video name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="year">
                                    <option selected>for year</option>
                                    @foreach ($enumOptions as $value)
                                        <option value="{{ $value }}">{{$value}}</option>
                                    @endforeach
                                </select>  
                            </div>   
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="month">
                                    <option selected>for month</option>
                                    @foreach ($enumOptions1 as $value)
                                        <option value="{{ $value }}">{{$value}}</option>
                                    @endforeach
                                </select>  
                            </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="unit">
                                    <option selected>for units</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{$unit->name}}</option>
                                    @endforeach
                                </select>  
                            </div>           
                            <div>
                                <input type="file" name="file" class="form-control"  accept="image/*,application/pdf,application/vnd.ms-excel">
                            </div>
                            <br>
                            <!-- <div class="progress" x-show="isUploading" wire:ignore.self>
                                <progress max="100" x-bind:value="progress"></progress>                           
                            </div> -->
                            <br>
                            <button type="submit" class="btn btn-sm btn-block btn-danger">Upload</button>
                        </form>      
                    </div>
                    <!-- <button type="submit" wire:click="get" class="btn btn-sm btn-block btn-danger">get</button> -->

                </div>
            </div>
        </div>
    </div>
</div>
