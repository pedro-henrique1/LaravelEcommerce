<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class AdminProductComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function deleteProduct($id)
    {
        $category = Product::find($id);
        $category->delete();
        session()->flash('message', 'Category has been deleted successfully!');
    }

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-component', compact('products'))->layout('layouts.base');
    }
}
