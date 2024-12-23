<div>
    <div class="container-fluid">
        <div class="row mt-3 mb-5 d-flex justify-content-center">
            <h3 class="d-flex justify-content-center">كل الاقسام</h3>
            <div class="mb-3 col-md-4 mt-3">
                <input type="text" class="form-control" placeholder="بحث باسم المحاضرة" wire:model="search">
            </div>
            <div class="mb-3 col-md-4 mt-3">
                <select class="form-select" aria-label="Default select example" wire:model="unit_id">
                    <option selected>اختر الكورس</option>
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
                            <th>صورة القسم</th>
                            <th>اسم القسم</th>
                            {{-- <th>تكلفة القسم</th> --}}
                            <th>الحالة</th>
                            <th>الوصف</th>
                            <th>اسم الكورس</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lectures as $lecture)
                        <tr>
                            <td>
                                <img src="{{ asset($lecture->image) }}" alt="" style="width: 75px; height: 75px" class="rounded-circle">
                            </td>
                            <td>{{ $lecture->name }}</td>
                            {{-- <td>{{ $lecture->cost }}</td> --}}
                            <td>
                                @if($lecture->status === "active")
                                    <span class="badge badge-success rounded-pill d-inline">نشطة</span>
                                @else
                                    <span class="badge badge-danger rounded-pill d-inline">غير نشطة</span>
                                @endif
                            </td>
                            <td>{{ $lecture->description }}</td>
                            <td>{{ $lecture->unit->name }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $lecture->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a href="{{ route('lecture_edit', $lecture->id) }}" class="btn btn-warning">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $lecture->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">حذف القسم</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        هل تريد بالتأكيد حذف {{ $lecture->name }}؟
                                    </div>
                                    <div class="modal-footer">
                                        <form wire:submit.prevent="delete({{ $lecture->id }})">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
