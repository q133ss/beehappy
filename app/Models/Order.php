<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Order
 * @package App\Models
 * @version December 5, 2021, 6:43 pm UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $orderPhotos
 * @property \Illuminate\Database\Eloquent\Collection $orderProducts
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $receiver_name
 * @property string $receiver_phone
 * @property string $delivery_city
 * @property string $delivery_date
 * @property integer $check_the_date
 * @property string $street
 * @property integer $home_number
 * @property integer $entrance
 * @property integer $floor
 * @property integer $flat
 * @property string $delivery_time
 * @property string $deliver_outside
 * @property string $call_customer
 * @property string $give_photo
 * @property string $card
 * @property string $card_text
 * @property string $big_card
 * @property string $big_card_text
 * @property integer $delivery_price
 * @property integer $status
 * @property integer $user_id
 */
class Order extends Model
{


    public $table = 'orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'customer_name',
        'customer_phone',
        'receiver_name',
        'receiver_phone',
        'delivery_city',
        'delivery_date',
        'check_the_date',
        'street',
        'home_number',
        'entrance',
        'floor',
        'flat',
        'delivery_time',
        'deliver_outside',
        'call_customer',
        'give_photo',
        'card',
        'card_text',
        'big_card',
        'big_card_text',
        'delivery_price',
        'status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_name' => 'string',
        'customer_phone' => 'string',
        'receiver_name' => 'string',
        'receiver_phone' => 'string',
        'delivery_city' => 'string',
        'delivery_date' => 'string',
        'check_the_date' => 'integer',
        'street' => 'string',
        'home_number' => 'integer',
        'entrance' => 'integer',
        'floor' => 'integer',
        'flat' => 'integer',
        'delivery_time' => 'string',
        'deliver_outside' => 'string',
        'call_customer' => 'string',
        'give_photo' => 'string',
        'card' => 'string',
        'card_text' => 'string',
        'big_card' => 'string',
        'big_card_text' => 'string',
        'delivery_price' => 'integer',
        'status' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:255',
        'receiver_name' => 'nullable|string|max:255',
        'receiver_phone' => 'nullable|string|max:255',
        'delivery_city' => 'required|string|max:255',
        'delivery_date' => 'required|string|max:255',
        'check_the_date' => 'nullable',
        'street' => 'required|string|max:255',
        'home_number' => 'required',
        'entrance' => 'required',
        'floor' => 'required',
        'flat' => 'nullable',
        'delivery_time' => 'required|string|max:255',
        'deliver_outside' => 'required|string|max:255',
        'call_customer' => 'required|string|max:255',
        'give_photo' => 'required|string|max:255',
        'card' => 'required|string|max:255',
        'card_text' => 'nullable|string|max:255',
        'big_card' => 'required|string|max:255',
        'big_card_text' => 'nullable|string|max:255',
        'delivery_price' => 'nullable',
        'status' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderPhotos()
    {
        return $this->hasMany(\App\Models\OrderPhoto::class, 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'order_id');
    }
}
