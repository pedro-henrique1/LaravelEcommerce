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
        $product = Product::find($id);
        if ($product->image) {
            unlink('assets/images/product' . '/' .$product->image);
        }
        if ($product->images) {
            $images = explode(',', $product->images);
            foreach ($images as $image) {
                if ($image) {
                    unlink('assets/images/product' . '/' . $image);
                }
            }
        }
        $product->delete();
        session()->flash('message', 'Category has been deleted successfully!');
    }

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.admin-product-component', compact('products'))->layout('layouts.base');
    }
}
