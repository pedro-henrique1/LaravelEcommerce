<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 1000;
    }


    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
    }

    public function render()
    {
        $popular_products = Product::inRandomOrder()->limit(4)->get();
//        $products = Product::paginate(12);
        if ($this->sorting == 'date') {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy(
                'created_at',
                'DESC'
            )->paginate($this->pagesize);
        } elseif ($this->sorting == "price") {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy(
                'regular_price',
                'ASC'
            )->paginate($this->pagesize);
        } elseif ($this->sorting == "price-desc") {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->orderBy(
                'regular_price',
                'DESC'
            )->paginate($this->pagesize);
        } else {
            $products = Product::whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate(
                $this->pagesize
            );
        }
        $categories = Category::all();

        return view(
            "livewire.shop-component",
            compact('products', 'popular_products', 'categories')
        )->layout("layouts.base");
    }
}
