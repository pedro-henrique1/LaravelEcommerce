<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;


    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        $this->emitTo('cart-count-component', 'refreshComponent');
        Cart::update($rowId, $qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Item has been removed');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('success_message', 'All has been removed');
    }

    public function switchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Item has benn saved for later');
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('s_success_message', 'Item has benn move to cart');
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')
            ->remove($rowId);
        session()->flash('s_success_message', 'Item has benn removed from save for later');
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponCode)
            ->where(
                'expiryd_date',
                '>=',
                Carbon::today()
            )
            ->where(
                'cart_value',
                '<=',
                str_replace(
                    ',',
                    '',
                    Cart::instance('cart')->subtotal()
                )
            )->first();

        if (!$coupon) {
            session()->flash('coupon_message', 'Coupon cod e is invalid');
            return;
        }

        session()->put(
            'coupon',
            [//                 => $coupon,
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value
            ]
        );
    }

    public function calculateDiscounts()
    {
        $cartSubtotal = str_replace(',', '', Cart::instance('cart')->subtotal());
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                Log::info(session()->get('coupon')['value']);
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = ($cartSubtotal * session()->get('coupon')['value']) / 100;
            }
            $this->subtotalAfterDiscount = $cartSubtotal - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax')) / 100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function deleteCoupon()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
        if (Auth::check()) {
            return redirect()->route('product.checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }
        if (session()->has('coupon')) {
            session()->put(
                'checkout',
                [
                    'discount' => $this->discount,
                    'subtotal' => $this->subtotalAfterDiscount,
                    'tax' => $this->taxAfterDiscount,
                    'total' => $this->totalAfterDiscount
                ]
            );
        } else {
            session()->put(
                'checkout',
                [
                    'discount' => 0,
                    'subtotal' => Cart::instance('cart')->subtotal(),
                    'tax' => Cart::instance('cart')->tax(),
                    'total' => Cart::instance('cart')->total()
                ]
            );
        }
    }


    public function render()
    {
        if (session()->has('coupon')) {
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->calculateDiscounts();
            }
        }
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
