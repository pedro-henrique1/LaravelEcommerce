<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    /**
     * @throws ValidationException
     */
    public function updated($fields)
    {
        $this->validateOnly(
            $fields,
            [
                'rating' => 'required',
                'comment' => 'required'
            ]
        );
    }

    public function addReview()
    {
        $this->validate(
            [
                'rating' => 'required',
                'comment' => 'required'
            ]
        );
        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_item_id = $this->order_item_id;
        $review->save();
        session()->flash('message', 'Your review has been added successfully');


        $orderItem = Order::find($this->order_item_id);
        $orderItem->rstatus = true;
        $orderItem->save();
        session()->flash('message', 'Your review has been added successfully');
    }

    public function render()
    {
        $orderItem = OrderItem::find($this->order_item_id);
        return view('livewire.user.user-review-component', compact('orderItem'))->layout('layouts.base');
    }
}
