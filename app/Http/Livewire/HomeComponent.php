<?php

namespace App\Http\Livewire;

use App\Models\HomeSlide;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{

    public function render()
    {
        $sliders = HomeSlide::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->take(8)->get();
        return view('livewire.home-component', ['sliders' => $sliders, 'lproducts' => $lproducts])->layout(
            'layouts.base'
        );
    }
}
