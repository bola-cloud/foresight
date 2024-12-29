<div>
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center p-2">
                        <h5>حذف اشتراك المهندس</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @csrf
                            <div class="row col-md-4 mb-3">
                                <div class="">
                                    <label for="exampleFormControlInput1" class="form-label">اختيار المهندس</label>
                                    @if(!$selectedStudent)
                                        <input type="text" class="form-control" wire:model.debounce.500ms="searchTerm" placeholder="ابحث برقم الكود...">
                                    @endif
                                    @if($results)
                                        <ul class="list-group">
                                            @foreach($results as $result)
                                                <button class="btn btn-outline-info" wire:click="selectStudent({{ $result->id }})" type="button">
                                                    <li class="list-group-item">
                                                        {{ $result->name }} -- {{ $result->mobile_phone }} -- {{ $result->student_code }}
                                                    </li>
                                                </button>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            @if($selectedStudent)
                            <div class="row d-flex justify-content-center mt-5">
                                <div class="col-md-12">
                                    <h5>اشتراكات الكورسات</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>اسم الكورس</th>
                                                <th>سعر الكورس</th>
                                                <th>الإجراء</th>
                                            </tr>
                                        </thead>
                                        @foreach ($selectedStudent->units as $unit)
                                        <tbody>
                                            <tr>
                                                <td>{{ $unit->name }}</td>
                                                <td>{{ $unit->cost }}</td>
                                                <td class="text-left">
                                                    <button type="button" class="btn btn-danger" wire:click="deleteUnitSub({{ $unit->id }})">حذف</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
