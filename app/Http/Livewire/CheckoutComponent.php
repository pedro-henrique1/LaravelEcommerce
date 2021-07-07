<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $ship_to_different;
    public $firstName;
    public $lastName;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;


    public $s_firstName;
    public $s_lastName;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;


    public $paymentmode;
    public $tanksyou;

    /**
     * @throws ValidationException
     */
    public function updated($fields)
    {
        $this->validateOnly(
            $fields,
            [
                'ship_to_different' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'line2' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
                'paymentmode' => 'required'
            ]
        );
        if ($this->ship_to_different) {
            $this->validateOnly(
                $fields,
                [
                    's_ship_to_different' => 'required',
                    's_firstName' => 'required',
                    's_lastName' => 'required',
                    's_email' => 'required|email',
                    's_mobile' => 'required|numeric',
                    's_line1' => 'required',
                    's_line2' => 'required',
                    's_city' => 'required',
                    's_province' => 'required',
                    's_country' => 'required',
                    's_zipcode' => 'required',

                ]
            );
        }
    }

    public function placeOrder()
    {
        $this->validate(
            [
                'ship_to_different' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'line1' => 'required',
                'line2' => 'required',
                'city' => 'required',
                'province' => 'required',
                'country' => 'required',
                'zipcode' => 'required',
                'paymentmode' => 'required'

            ]
        );
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->ship_to_different = $this->ship_to_different;
        $order->firstName = $this->firstName;
        $order->lastName = $this->lastName;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->ship_to_different = $this->ship_to_different ? 1 : 0;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $item->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }


        if ($this->ship_to_different) {
            $this->validate(
                [
                    's_ship_to_different' => 'required',
                    's_firstName' => 'required',
                    's_lastName' => 'required',
                    's_email' => 'required|email',
                    's_mobile' => 'required|numeric',
                    's_line1' => 'required',
                    's_line2' => 'required',
                    's_city' => 'required',
                    's_province' => 'required',
                    's_country' => 'required',
                    's_zipcode' => 'required',
                ]
            );

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstName = $this->s_firstName;
            $shipping->lastName = $this->s_lastName;
            $shipping->email = $this->s_email;
            $shipping->mobile = $this->s_mobile;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->save();
        }

        if ($this->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
        $this->tanksyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif ($this->tanksyou) {
            return redirect()->route('thanksYou');
        } elseif (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
