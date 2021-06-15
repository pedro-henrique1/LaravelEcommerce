<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlide;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{

    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slide_id;
    public $colortitle;
    public $colorsubtitle;
    public $colorsaleinfo;
    public $colorsale;


    public function mount($slide_id)
    {
        $slide = HomeSlide::find($slide_id);
        $this->title = $slide->title;
        $this->subtitle = $slide->subtitle;
        $this->price = $slide->price;
        $this->link = $slide->link;
        $this->image = $slide->image;
        $this->status = $slide->status;
        $this->slider_id = $slide->id;
        $this->colortitle = $slide->colortitle;
        $this->colorsubtitle = $slide->colorsubtitle;
        $this->colorsaleinfo = $slide->colorsaleinfo;
        $this->colorsale = $slide->colorsale;
    }

    public function updateSlide()
    {
        $slide = HomeSlide::find($this->slide_id);
        $slide->title = $this->title;
        $slide->subtitle = $this->subtitle;
        $slide->price = $this->price;
        $slide->link = $this->link;
        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('sliders', $imageName);
            $slide->image = $imageName;
        }
        $slide->colorTitle = $this->colortitle;
        $slide->colorSubTitle = $this->colorsubtitle;
        $slide->status = $this->status;
        $slide->colorsaleinfo = $this->colorsaleinfo;
        $slide->colorsale = $this->colorsale;
        $slide->save();
        session()->flash('message', 'Slide has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
