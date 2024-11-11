<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class ProductManager extends Component
{
    use WithFileUploads;

    public $products, $title, $description, $price, $image, $productId;
    public $isOpen = false;

    public function render()
    {
        $this->products = Product::all();
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
        $this->productId = null;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|max:1024', // 1MB Max
        ]);

        $imagePath = $this->image ? $this->image->store('images', 'public') : null;

        Product::updateOrCreate(['id' => $this->productId], [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imagePath,
        ]);

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
        $this->openModal();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product deleted.');
    }
}
