<div class="container-fluid card">
    <div class="row mb-4 mt-4">
        <div class="col-md-5">
            <label for="searchTerm" class="form-label">البحث</label>
            <input type="text" class="form-control" id="searchTerm" wire:model.debounce.300ms="searchTerm" placeholder="ابحث عن المهندسين أو الأكواد..." />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">اسم المهندس</th>
                        <th scope="col">كود المهندس</th>
                        <th scope="col">رقم هاتف المهندس</th>
                        {{-- <th scope="col">رقم هاتف ولي الأمر</th> --}}
                        {{-- <th scope="col">رصيد المهندس</th> --}}
                        <th scope="col">الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->student_code }}</td>
                            <td>{{ $user->mobile_phone }}</td>
                            {{-- <td>{{ $user->mobile_father }}</td> --}}
                            {{-- <td>{{ $user->wallet }}</td> --}}
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{route('student_edit', $user->id)}}">تعديل</a>
                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $user->id }})">حذف</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
