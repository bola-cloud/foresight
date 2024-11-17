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
    protected $listeners = ['deleteProduct' => 'delete'];

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
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ];
    
        // Add image validation only for new products or if a new image is uploaded
        if (!$this->productId || ($this->image instanceof \Livewire\TemporaryUploadedFile)) {
            $rules['image'] = 'required|image|max:1024'; // Required only when creating a new product or replacing the image
        }
    
        $this->validate($rules);
    
        $new_file = null;
    
        if ($this->image instanceof \Livewire\TemporaryUploadedFile) {
            // Handle image upload only if a new image is provided
            $filename = $this->image->getClientOriginalName();
            $this->image->storeAs('', $filename, 'public_product');
            $new_file = 'product-images/' . $filename;
        }
    
        // Prepare data for updating/creating
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ];
    
        // Add image to the data array only if a new image is provided
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
        $this->openModal();
    }


    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product deleted successfully.');
    }
}
