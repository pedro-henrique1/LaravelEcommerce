<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;
use Cartalyst\Stripe\Stripe;
use Exception;
use Illuminate\Support\Facades\Auth;
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

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;


    public function updated($fields)
    {
        $this->validateOnly(
            $fields,
            [
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
        if ($this->paymentmode == 'card') {
//            dd($this->paymentmode == 'card');
            $this->validateOnly(
                $fields,
                [
                    'card_no' => 'required|numeric',
                    'exp_month' => 'required|numeric',
                    'exp_year' => 'required|numeric',
                    'cvc' => 'required|numeric'
                ]
            );
        }
    }

    public function placeOrder()
    {
        $subtotalFormate = str_replace(',', '', session()->get('checkout')['subtotal']);
        $taxFormate = str_replace(',', '', session()->get('checkout')['tax']);
        $totalFormate = str_replace(',', '', session()->get('checkout')['total']);

        $this->validate(
            [
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

        if ($this->paymentmode == 'card') {
            $this->validate(
                [
                    'card_no' => 'required|numeric',
                    'exp_month' => 'required|numeric',
                    'exp_year' => 'required|numeric',
                    'cvc' => 'required|numeric'
                ]
            );
        }


        if ($subtotalFormate && $taxFormate && $totalFormate == '') {
            session()->flash('session_error', 'Error!');
            exit(300);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = $subtotalFormate;
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = $taxFormate;
        $order->total = $totalFormate;
        $order->firstname = $this->firstName;
        $order->lastname = $this->lastName;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
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
            $shipping->firstname = $this->s_firstName;
            $shipping->lastname = $this->s_lastName;
            $shipping->mobile = $this->s_mobile;
            $shipping->email = $this->s_email;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->save();
        }

        if ($this->paymentmode == 'cod') {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        } elseif ($this->paymentmode == 'card') {
            $stripe = Stripe::make(env('STRIPE_KEY'));
            try {
                $token = $stripe->tokens()->create(
                    [
                        'card' => [
                            'number' => $this->card_no,
                            'exp_month' => $this->exp_month,
                            'cvc' => $this->cvc,
                            'exp_year' => $this->exp_year,
                        ]
                    ]
                );

                if (!isset($token['id'])) {
                    session()->flash('stripe_error', 'The stripe token was not generated correctly!');
                    $this->tanksyou = 0;
                }

                $customer = $stripe->customers()->create(
                    [
                        'name' => $this->firstName . ' ' . $this->lastName,
                        'email' => $this->email,
                        'phone' => $this->mobile,
                        'address' => [
                            'line1' => $this->line1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country
                        ],
                        'shipping' => [
                            'name' => $this->firstName . '' . $this->lastName,
                            'address' => [
                                'line1' => $this->line1,
                                'postal_code' => $this->zipcode,
                                'city' => $this->city,
                                'state' => $this->province,
                                'country' => $this->country
                            ],
                        ],
                        'source' => $token['id']
                    ]
                );
                $change = $stripe->charges()->create(
                    [
                        'customer' => $customer['id'],
                        'currency' => 'USD',
                        //? session()->get('checkout')['total']
                        'amount' => $totalFormate,
                        'description' => 'Payment for order no ' . $order->id
                    ]
                );
                if ($change['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                } else {
                    session()->flash('stripe_error', 'Error in Transaction!');
                    $this->tanksyou = 0;
                }
            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->tanksyou = 0;
            }
        }
    }

    public function resetCart()
    {
        $this->tanksyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif ($this->tanksyou) {
            return redirect()->route('thanksYou');
        } elseif (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        } else {
            return;
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
