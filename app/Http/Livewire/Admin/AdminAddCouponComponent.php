<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;

    /**
     * @throws ValidationException
     */
    public function update($field)
    {
        $this->validateOnly(
            $field,
            [
                'code' => 'required|unique:coupons',
                'type' => 'required',
                'value' => 'required|numeric',
                'cart_value' => 'required|numeric'
            ]
        );
    }


    public function addCoupon()
    {
        $this->validate(
            [
                'code' => 'required|unique:coupons',
                'type' => 'required',
                'value' => 'required|numeric',
                'cart_value' => 'required|numeric'
            ]
        );
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        session()->flash('message', 'Slide has been deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.base');
    }
}
