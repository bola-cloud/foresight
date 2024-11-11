<div>
    <div class="container-fluid">
        <div class="row mt-3 mb-5 d-flex justify-content-center">
            <h3 class="d-flex justify-content-center">
                All lectures
            </h3>
            <div class="mb-3 col-md-4 mt-3">
                <select class="form-select" aria-label="Default select example" wire:model="year_type">
                    <option selected>Select Year</option>
                    <option value="ONE">First Year</option>
                    <option value="TWO">second Year</option>
                    <option value="THREE">third Year</option>
                </select>
            </div>
            <div class="mb-3 col-md-4 mt-3">
                <select class="form-select" aria-label="Default select example" wire:model="unit_id">
                    <option selected>Select Unit</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-md-12">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Lecture image</th>
                            <th> Lecture name</th>
                            <th>Lecture cost</th>
                            <th>status</th>
                            <th>description</th>
                            <th>unit name</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    @foreach($lectures as $key=>$lecture)
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img
                                        src="{{asset($lecture->image)}}"
                                        alt=""
                                        style="width: 75px; height: 75px"
                                        class="rounded-circle"
                                        />
                                    <!-- <div class="ms-3">
                                        <p class="fw-bold mb-1">John Doe</p>
                                        <p class="text-muted mb-0">john.doe@gmail.com</p>
                                    </div> -->
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{$lecture->name}}</p>
                                <p class="text-muted mb-0">IT department</p>
                            </td>
                            <td>
                                {{ $lecture->cost }}
                              </td>
                            @if($lecture->status=="active")
                            <td>
                                <span class="badge badge-success rounded-pill d-inline ">{{$lecture->status}}</span>
                            </td>
                            @else
                                <td>
                                    <span class="badge badge-danger rounded-pill d-inline ">{{$lecture->status}}</span>
                                </td>
                            @endif
                            <td>{{$lecture->description}}</td>
                            <td>{{$lecture->unit->name}}</td>
                            <td>
                                <button type="button" class="btn btn-danger" id="button-modal" data-bs-toggle="modal" data-bs-target="#delete{{$lecture->id}}" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                <a class="btn btn-warning" href="{{route('lecture_edit', $lecture->id) }}" >
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <div class="modal fade" id="delete{{$lecture->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Lecture </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Do you want to delete {{$lecture->name}}
                                </div>
                                <div class="modal-footer">
                                    <form wire:submit="delete({{$lecture->id}})" id="deleteForm"></form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                    <button type="submit" class="btn btn-danger" form="deleteForm">delete</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
