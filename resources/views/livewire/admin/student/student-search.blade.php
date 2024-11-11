<div class="container-fluid card">
    <div class="row mb-4 mt-4">
        <div class="col-md-5">
            <label for="subscriptionType" class="form-label">year filter</label>
            <select class="form-select" aria-label="Default select example" id="subscriptionType" wire:model="year">
                <option value="0" selected>choose year</option>
                <option value="ONE">first year</option>
                <option value="TWO">second year</option>
                <option value="THREE">third year</option>
            </select>
        </div>
        <div class="col-md-5">
            <label for="searchTerm" class="form-label">Search</label>
            <input type="text" class="form-control" id="searchTerm" wire:model.debounce.50ms="searchTerm" placeholder="Search for Students or Codes..." />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Student Name</th>
                        <th scope="col">Student Code</th>
                        <th scope="col">Student Mobile</th>
                        <th scope="col">Parent Mobile</th>
                        <th scope="col">Student Wallet</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->student_code }}</td>
                            <td>{{ $user->mobile_phone }}</td>
                            <td>{{ $user->mobile_father }}</td>
                            <td>{{ $user->wallet }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('student_edit',$user->id)}}">Edit</a>
                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $user->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
