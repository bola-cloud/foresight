<div class="container-fluid">
    <div class="card p-3">
        <div class="card-header d-flex justify-content-start">
            <button wire:click="openModal" class="btn btn-primary">إضافة منتج</button>
        </div>

        @if($isOpen)
            <div class="modal fade show" style="display: block;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $productId ? 'تعديل المنتج' : 'إضافة منتج' }}</h5>
                            <button wire:click="closeModal" class="close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="store">
                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" wire:model="title" class="form-control">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label>الوصف</label>
                                    <textarea wire:model="description" class="form-control"></textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label>السعر</label>
                                    <input type="number" step="0.01" wire:model="price" class="form-control">
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label>الصورة</label>
                                    <input type="file" wire:model="image" class="form-control" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>العنوان</th>
                    <th>الوصف</th>
                    <th>السعر</th>
                    <th>الصورة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                            {{ \Illuminate\Support\Str::limit($product->description, 50) }}
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <img src="{{ asset($product->image) }}" width="50" style="border-radius: 5px;">
                        </td>
                        <td>
                            <button wire:click="edit({{ $product->id }})" class="btn btn-info btn-sm">تعديل</button>
                            <button onclick="confirmDelete({{ $product->id }})" class="btn btn-danger btn-sm">حذف</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('style')
    <style>
        .table td {
            vertical-align: middle;
        }
    </style>
@endpush

<script>
    function confirmDelete(id) {
        if (confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟')) {
            Livewire.emit('deleteProduct', id); // Trigger Livewire event to delete
        }
    }
</script>
