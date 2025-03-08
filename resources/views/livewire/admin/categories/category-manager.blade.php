<div class="container-fluid">
    <div class="card p-3">
        <div class="card-header d-flex justify-content-between">
            <button wire:click="openModal" class="btn btn-primary">إضافة فئة</button>
        </div>

        @if($isOpen)
            <div class="modal fade show" style="display: block;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $categoryId ? 'تعديل الفئة' : 'إضافة فئة' }}</h5>
                            <button wire:click="closeModal" class="close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="store">
                                <div class="form-group">
                                    <label>اسم الفئة</label>
                                    <input type="text" wire:model="name" class="form-control">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Category Table -->
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>اسم الفئة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button wire:click="edit({{ $category->id }})" class="btn btn-info btn-sm">تعديل</button>
                            <button onclick="confirmDelete({{ $category->id }})" class="btn btn-danger btn-sm">حذف</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(id) {
        if (confirm('هل أنت متأكد أنك تريد حذف هذه الفئة؟')) {
            Livewire.emit('deleteCategory', id);
        }
    }
</script>
