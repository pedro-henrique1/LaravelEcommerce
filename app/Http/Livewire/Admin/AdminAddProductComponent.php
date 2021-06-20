<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    protected $rules = [
        'name' => 'required|max:255|min:5',
        'slug' => 'required|max:255|min:5',
        'short_description' => 'required|max:600|min:20',
        'description' => 'required|max:600|min:20',
        'regular_price' => 'required|digits_between:1,4|numeric',
        'sale_price' => 'required|digits_between:1,4|numeric',
        'SKU' => 'required|min:4|max:8',
        'stock_status' => 'required',
        'featured' => 'required',
        'quantity' => 'required|numeric|min:1|max:5',
        'image' => 'required|image|size:512',
        'category_id' => 'required|unique:connection.categories'
    ];

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function addProduct()
    {
        $this->validate();
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantify = $this->quantity;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
    }

    public function render()
    {
        $category = Category::all();
        return view('livewire.admin.admin-add-product-component', ['categories' => $category])->layout('layouts.base');
    }
}
