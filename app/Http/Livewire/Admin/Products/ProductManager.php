<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;

class ProductManager extends Component
{
    use WithFileUploads;

    public $products, $categories, $title, $description, $price, $image, $category_id, $productId;
    public $isOpen = false;
    protected $listeners = ['deleteProduct' => 'delete'];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        $this->products = Product::with('category')->get();
        return view('livewire.admin.products.product-manager')->layout('layouts.admin');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->image = null;
        $this->category_id = null;
        $this->productId = null;
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];

        if (!$this->productId || ($this->image instanceof \Livewire\TemporaryUploadedFile)) {
            $rules['image'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        $new_file = null;

        if ($this->image instanceof \Livewire\TemporaryUploadedFile) {
            $filename = $this->image->getClientOriginalName();
            $this->image->storeAs('', $filename, 'public_product');
            $new_file = 'product-images/' . $filename;
        }

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ];

        if ($new_file) {
            $data['image'] = $new_file;
        }

        Product::updateOrCreate(['id' => $this->productId], $data);

        session()->flash('message', $this->productId ? 'Product updated.' : 'Product created.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->openModal();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'تم حذف المنتج بنجاح.');
    }
}
