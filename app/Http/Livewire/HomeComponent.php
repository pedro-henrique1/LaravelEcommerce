<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlide;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{

    public function render()
    {
        $sliders = HomeSlide::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->take(8)->get();
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id', $cats)->get();
        $no_of_products = $category->no_of_products;
        $sproducts = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        return view(
            'livewire.home-component',
            compact('sale', 'sliders', 'lproducts', 'categories', 'no_of_products', 'sproducts')
        )->layout(
            'layouts.base'
        );
    }
}
