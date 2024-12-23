<div>
    <style>
        span.error {
            color: red;
        }
    </style>
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12 mb-3">
                <input 
                    type="text" 
                    class="form-control" 
                    placeholder="ابحث عن الكورس" 
                    wire:model="search" 
                />
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">الكورسات</h4>
                        <div class="heading-elements" style="top: 4px">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table table-bordered mb-0">
                                    <tr>
                                        <th>اسم الكورس</th>
                                        <th>التكلفة</th>
                                        <th>الصورة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $unit->name }}</td>
                                        <td><img src="{{ asset($unit->image_unit) }}" width="60" height="60"></td>
                                        <td>{{ $unit->cost }}</td>
                                        <td>
                                            <a type="button" class="btn btn-primary" href="{{ route('edit_unit', ['ide' => $unit->id]) }}">تعديل</a>
                                            <button type="button" class="btn btn-danger" wire:click="confirmDelete({{ $unit->id }})">حذف</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل أنت متأكد أنك تريد حذف هذه الوحدة؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-danger" wire:click="$emit('deleteConfirmed')">حذف</button>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
</div>
<script>
    window.addEventListener('show-delete-modal', event => {
        $('#deleteModal').modal('show');
    });
  
    window.addEventListener('hide-delete-modal', event => {
        $('#deleteModal').modal('hide');
    });
</script>
