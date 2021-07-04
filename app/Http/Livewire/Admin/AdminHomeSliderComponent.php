<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlide;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{

    public function deleteSlide($id)
    {
        $slide = HomeSlide::find($id);
        $slide->delete();
        session()->flash('message', 'Category has been deleted successfully!');
    }

    public function render()
    {
        $sliders = HomeSlide::all();
        return view('livewire.admin.admin-home-slider-component', compact('sliders'))->layout('layouts.base');
    }
}
