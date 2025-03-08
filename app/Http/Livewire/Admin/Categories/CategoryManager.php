<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;

class CategoryManager extends Component
{
    public $categories, $name, $categoryId;
    public $isOpen = false;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.admin.categories.category-manager')->layout('layouts.admin');
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
        $this->name = '';
        $this->categoryId = null;
    }

    public function store()
    {
        $this->validate(['name' => 'required|unique:categories,name']);
        Category::updateOrCreate(['id' => $this->categoryId], ['name' => $this->name]);

        session()->flash('message', $this->categoryId ? 'Category updated.' : 'Category created.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $id;
        $this->name = $category->name;
        $this->openModal();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'تم حذف الفئة بنجاح.');
    }
}
