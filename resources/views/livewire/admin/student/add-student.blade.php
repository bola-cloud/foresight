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
                        <h5>Create new student</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="store" id="addStudent">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Student Name</label>
                                <input type="text" class="form-control" wire:model="name" id="name" placeholder="Enter student name">
                                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mobile_phone" class="form-label">Student Mobile</label>
                                <input type="text" class="form-control" wire:model="mobile_phone" id="mobile_phone" placeholder="Enter student mobile">
                                @error('mobile_phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="mobile_father" class="form-label">Father's Mobile</label>
                                <input type="text" class="form-control" wire:model="mobile_father" id="mobile_father" placeholder="Enter father's mobile">
                                @error('mobile_father') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="case" class="form-label">Case</label>
                                <select class="form-select" id="case" wire:model="case">
                                    <option value="0">Unpaid</option>
                                    <option value="1">Paid</option>
                                </select>
                                @error('case') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Year Type</label>
                                <select class="form-select" id="year" wire:model="year">
                                    <option value="">Select year</option>
                                    @foreach ($year_type as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                @error('year') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Student Code</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" wire:model="code" id="code" placeholder="Student code">
                                    <button type="button" class="btn btn-success" wire:click="generateUniqueCode">Generate</button>
                                </div>
                                @error('code') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            </div>
                            <button type="submit" class="btn btn-danger btn-block">Store</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
