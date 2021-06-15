<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlide;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $colortitle;
    public $colorsubtitle;
    public $colorsaleinfo;
    public $colorsale;

    public function mount()
    {
        $this->status = 0;
    }

    public function addSlide()
    {
        $slide = new HomeSlide();
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        $slide->link = $this->link;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imageName);
        $slide->image = $imageName;
        $slide->status = $this->status;
        $slide->colortitle = $this->colortitle;
        $slide->colorsubtitle = $this->colorsubtitle;
        $slide->colorsaleinfo = $this->colorsaleinfo;
        $slide->colorsale = $this->colorsale;
        $slide->save();
        session()->flash('message', 'Slide has been deleted successfully!');
        $this->redirect(route('admin.slider'));
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
