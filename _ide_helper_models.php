<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{

    use Database\Factories\CategoryFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Category
     *
     * @property int $id
     * @property string $name
     * @property string $slug
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static CategoryFactory factory(...$parameters)
     * @method static Builder|Category newModelQuery()
     * @method static Builder|Category newQuery()
     * @method static Builder|Category query()
     * @method static Builder|Category whereCreatedAt($value)
     * @method static Builder|Category whereId($value)
     * @method static Builder|Category whereName($value)
     * @method static Builder|Category whereSlug($value)
     * @method static Builder|Category whereUpdatedAt($value)
     */
    class Category extends Eloquent
    {
    }
}

namespace App\Models {

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Coupon
     *
     * @method static find($coupon_id)
     * @method static where(string $string, $couponCode)
     * @property int $id
     * @property string $code
     * @property string $type
     * @property string $value
     * @property string $cart_value
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property string $expired_date
     * @method static Builder|Coupon newModelQuery()
     * @method static Builder|Coupon newQuery()
     * @method static Builder|Coupon query()
     * @method static Builder|Coupon whereCartValue($value)
     * @method static Builder|Coupon whereCode($value)
     * @method static Builder|Coupon whereCreatedAt($value)
     * @method static Builder|Coupon whereExpiredDate($value)
     * @method static Builder|Coupon whereId($value)
     * @method static Builder|Coupon whereType($value)
     * @method static Builder|Coupon whereUpdatedAt($value)
     * @method static Builder|Coupon whereValue($value)
     */
    class Coupon extends Eloquent
    {
    }
}

namespace App\Models {

    use Database\Factories\HomeCategoryFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\HomeCategory
     *
     * @property int $id
     * @property string $sel_categories
     * @property int $no_of_products
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static HomeCategoryFactory factory(...$parameters)
     * @method static Builder|HomeCategory newModelQuery()
     * @method static Builder|HomeCategory newQuery()
     * @method static Builder|HomeCategory query()
     * @method static Builder|HomeCategory whereCreatedAt($value)
     * @method static Builder|HomeCategory whereId($value)
     * @method static Builder|HomeCategory whereNoOfProducts($value)
     * @method static Builder|HomeCategory whereSelCategories($value)
     * @method static Builder|HomeCategory whereUpdatedAt($value)
     */
    class HomeCategory extends Eloquent
    {
    }
}

namespace App\Models {

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\HomeSlide
     *
     * @property int $id
     * @property string $title
     * @property string $subtitle
     * @property string $price
     * @property string $link
     * @property string $image
     * @property string $status
     * @property string|null $colortitle
     * @property string|null $colorsubtitle
     * @property string|null $colorsaleinfo
     * @property string|null $colorsale
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static Builder|HomeSlide newModelQuery()
     * @method static Builder|HomeSlide newQuery()
     * @method static Builder|HomeSlide query()
     * @method static Builder|HomeSlide whereColorsale($value)
     * @method static Builder|HomeSlide whereColorsaleinfo($value)
     * @method static Builder|HomeSlide whereColorsubtitle($value)
     * @method static Builder|HomeSlide whereColortitle($value)
     * @method static Builder|HomeSlide whereCreatedAt($value)
     * @method static Builder|HomeSlide whereId($value)
     * @method static Builder|HomeSlide whereImage($value)
     * @method static Builder|HomeSlide whereLink($value)
     * @method static Builder|HomeSlide wherePrice($value)
     * @method static Builder|HomeSlide whereStatus($value)
     * @method static Builder|HomeSlide whereSubtitle($value)
     * @method static Builder|HomeSlide whereTitle($value)
     * @method static Builder|HomeSlide whereUpdatedAt($value)
     */
    class HomeSlide extends Eloquent
    {
    }
}

namespace App\Models {

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Order
     *
     * @method static find($order_id)
     * @property int $id
     * @property int $user_id
     * @property string $subtotal
     * @property string $discount
     * @property string $tax
     * @property string $total
     * @property string $firstname
     * @property string $lastname
     * @property string $mobile
     * @property string $email
     * @property string $line1
     * @property string|null $line2
     * @property string $city
     * @property string $province
     * @property string $country
     * @property string $zipcode
     * @property string $status
     * @property int $is_shipping_different
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property string|null $delivered_date
     * @property string|null $canceled_date
     * @property-read Collection|OrderItem[] $orderItems
     * @property-read int|null $order_items_count
     * @property-read Shipping|null $shipping
     * @property-read Transaction|null $transaction
     * @property-read User $user
     * @method static Builder|Order newModelQuery()
     * @method static Builder|Order newQuery()
     * @method static Builder|Order query()
     * @method static Builder|Order whereCanceledDate($value)
     * @method static Builder|Order whereCity($value)
     * @method static Builder|Order whereCountry($value)
     * @method static Builder|Order whereCreatedAt($value)
     * @method static Builder|Order whereDeliveredDate($value)
     * @method static Builder|Order whereDiscount($value)
     * @method static Builder|Order whereEmail($value)
     * @method static Builder|Order whereFirstname($value)
     * @method static Builder|Order whereId($value)
     * @method static Builder|Order whereIsShippingDifferent($value)
     * @method static Builder|Order whereLastname($value)
     * @method static Builder|Order whereLine1($value)
     * @method static Builder|Order whereLine2($value)
     * @method static Builder|Order whereMobile($value)
     * @method static Builder|Order whereProvince($value)
     * @method static Builder|Order whereStatus($value)
     * @method static Builder|Order whereSubtotal($value)
     * @method static Builder|Order whereTax($value)
     * @method static Builder|Order whereTotal($value)
     * @method static Builder|Order whereUpdatedAt($value)
     * @method static Builder|Order whereUserId($value)
     * @method static Builder|Order whereZipcode($value)
     */
    class Order extends Eloquent
    {
    }
}

namespace App\Models {

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\OrderItem
     *
     * @property int $id
     * @property int $product_id
     * @property int $order_id
     * @property string $price
     * @property int $quantity
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property int $rstatus
     * @property-read Order $order
     * @property-read Product $product
     * @method static Builder|OrderItem newModelQuery()
     * @method static Builder|OrderItem newQuery()
     * @method static Builder|OrderItem query()
     * @method static Builder|OrderItem whereCreatedAt($value)
     * @method static Builder|OrderItem whereId($value)
     * @method static Builder|OrderItem whereOrderId($value)
     * @method static Builder|OrderItem wherePrice($value)
     * @method static Builder|OrderItem whereProductId($value)
     * @method static Builder|OrderItem whereQuantity($value)
     * @method static Builder|OrderItem whereRstatus($value)
     * @method static Builder|OrderItem whereUpdatedAt($value)
     */
    class OrderItem extends Eloquent
    {
    }
}

namespace App\Models {

    use Database\Factories\ProductFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Product
     *
     * @property int $id
     * @property string $name
     * @property string $slug
     * @property string|null $short_description
     * @property string $description
     * @property string $regular_price
     * @property string|null $sale_price
     * @property string $SKU
     * @property string $stock_status
     * @property int $featured
     * @property int $quantify
     * @property string|null $image
     * @property string|null $images
     * @property int|null $category_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read Category|null $category
     * @method static ProductFactory factory(...$parameters)
     * @method static Builder|Product newModelQuery()
     * @method static Builder|Product newQuery()
     * @method static Builder|Product query()
     * @method static Builder|Product whereCategoryId($value)
     * @method static Builder|Product whereCreatedAt($value)
     * @method static Builder|Product whereDescription($value)
     * @method static Builder|Product whereFeatured($value)
     * @method static Builder|Product whereId($value)
     * @method static Builder|Product whereImage($value)
     * @method static Builder|Product whereImages($value)
     * @method static Builder|Product whereName($value)
     * @method static Builder|Product whereQuantify($value)
     * @method static Builder|Product whereRegularPrice($value)
     * @method static Builder|Product whereSKU($value)
     * @method static Builder|Product whereSalePrice($value)
     * @method static Builder|Product whereShortDescription($value)
     * @method static Builder|Product whereSlug($value)
     * @method static Builder|Product whereStockStatus($value)
     * @method static Builder|Product whereUpdatedAt($value)
     */
    class Product extends Eloquent
    {
    }
}

namespace App\Models {

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Review
     *
     * @property int $id
     * @property int $rating
     * @property string $comment
     * @property int $order_item_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static Builder|Review newModelQuery()
     * @method static Builder|Review newQuery()
     * @method static Builder|Review query()
     * @method static Builder|Review whereComment($value)
     * @method static Builder|Review whereCreatedAt($value)
     * @method static Builder|Review whereId($value)
     * @method static Builder|Review whereOrderItemId($value)
     * @method static Builder|Review whereRating($value)
     * @method static Builder|Review whereUpdatedAt($value)
     */
    class Review extends Eloquent
    {
    }
}

namespace App\Models {

    use Database\Factories\SaleFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Sale
     *
     * @method static find(int $int)
     * @property int $id
     * @property string $sale_date
     * @property int $status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static SaleFactory factory(...$parameters)
     * @method static Builder|Sale newModelQuery()
     * @method static Builder|Sale newQuery()
     * @method static Builder|Sale query()
     * @method static Builder|Sale whereCreatedAt($value)
     * @method static Builder|Sale whereId($value)
     * @method static Builder|Sale whereSaleDate($value)
     * @method static Builder|Sale whereStatus($value)
     * @method static Builder|Sale whereUpdatedAt($value)
     */
    class Sale extends Eloquent
    {
    }
}

namespace App\Models {

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Shipping
     *
     * @property int $id
     * @property int $order_id
     * @property string $firstname
     * @property string $lastname
     * @property string $mobile
     * @property string $email
     * @property string $line1
     * @property string|null $line2
     * @property string $city
     * @property string $province
     * @property string $country
     * @property string $zipcode
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read Order $order
     * @method static Builder|Shipping newModelQuery()
     * @method static Builder|Shipping newQuery()
     * @method static Builder|Shipping query()
     * @method static Builder|Shipping whereCity($value)
     * @method static Builder|Shipping whereCountry($value)
     * @method static Builder|Shipping whereCreatedAt($value)
     * @method static Builder|Shipping whereEmail($value)
     * @method static Builder|Shipping whereFirstname($value)
     * @method static Builder|Shipping whereId($value)
     * @method static Builder|Shipping whereLastname($value)
     * @method static Builder|Shipping whereLine1($value)
     * @method static Builder|Shipping whereLine2($value)
     * @method static Builder|Shipping whereMobile($value)
     * @method static Builder|Shipping whereOrderId($value)
     * @method static Builder|Shipping whereProvince($value)
     * @method static Builder|Shipping whereUpdatedAt($value)
     * @method static Builder|Shipping whereZipcode($value)
     */
    class Shipping extends Eloquent
    {
    }
}

namespace App\Models {

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
     * App\Models\Transaction
     *
     * @property int $id
     * @property int $user_id
     * @property int $order_id
     * @property string $mode
     * @property string $status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read Order $order
     * @method static Builder|Transaction newModelQuery()
     * @method static Builder|Transaction newQuery()
     * @method static Builder|Transaction query()
     * @method static Builder|Transaction whereCreatedAt($value)
     * @method static Builder|Transaction whereId($value)
     * @method static Builder|Transaction whereMode($value)
     * @method static Builder|Transaction whereOrderId($value)
     * @method static Builder|Transaction whereStatus($value)
     * @method static Builder|Transaction whereUpdatedAt($value)
     * @method static Builder|Transaction whereUserId($value)
     */
    class Transaction extends Eloquent
    {
    }
}

namespace App\Models {

    use Database\Factories\UserFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Notifications\DatabaseNotificationCollection;
    use Illuminate\Support\Carbon;
    use Laravel\Sanctum\PersonalAccessToken;

    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $name
     * @property string $email
     * @property Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $two_factor_secret
     * @property string|null $two_factor_recovery_codes
     * @property string|null $remember_token
     * @property int|null $current_team_id
     * @property string|null $profile_photo_path
     * @property string $utype ADM for Admin and USR for User or Customer
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property-read string $profile_photo_url
     * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
     * @property-read int|null $notifications_count
     * @property-read Collection|PersonalAccessToken[] $tokens
     * @property-read int|null $tokens_count
     * @method static UserFactory factory(...$parameters)
     * @method static Builder|User newModelQuery()
     * @method static Builder|User newQuery()
     * @method static Builder|User query()
     * @method static Builder|User whereCreatedAt($value)
     * @method static Builder|User whereCurrentTeamId($value)
     * @method static Builder|User whereEmail($value)
     * @method static Builder|User whereEmailVerifiedAt($value)
     * @method static Builder|User whereId($value)
     * @method static Builder|User whereName($value)
     * @method static Builder|User wherePassword($value)
     * @method static Builder|User whereProfilePhotoPath($value)
     * @method static Builder|User whereRememberToken($value)
     * @method static Builder|User whereTwoFactorRecoveryCodes($value)
     * @method static Builder|User whereTwoFactorSecret($value)
     * @method static Builder|User whereUpdatedAt($value)
     * @method static Builder|User whereUtype($value)
     */
    class User extends Eloquent
    {
    }
}

