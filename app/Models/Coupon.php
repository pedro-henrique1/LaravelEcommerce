<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($coupon_id)
 * @method static where(string $string, $couponCode)
 */
class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';
}
