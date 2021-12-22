<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class SubscribeOrder
 * @package App\Models
 * @version December 5, 2021, 6:46 pm UTC
 *
 * @property integer $subscribe_id
 * @property integer $reciver
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $reciver_name
 * @property string $reciver_phone
 * @property string $city
 * @property string $check_the_adress
 * @property string $delivery_time
 * @property string $street
 * @property string $home
 * @property string $podezd
 * @property string $etage
 * @property integer $kvartira
 * @property string $call_reciver
 * @property string $outside_city
 * @property string $give_photo
 * @property string $big_cart
 * @property string $card_text
 * @property string $comment
 */
class SubscribeOrder extends Model
{


    public $table = 'subscribe_orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'subscribe_id',
        'reciver',
        'customer_name',
        'customer_phone',
        'reciver_name',
        'reciver_phone',
        'city',
        'check_the_adress',
        'delivery_time',
        'street',
        'home',
        'podezd',
        'etage',
        'kvartira',
        'call_reciver',
        'outside_city',
        'give_photo',
        'big_cart',
        'card_text',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'subscribe_id' => 'integer',
        'reciver' => 'integer',
        'customer_name' => 'string',
        'customer_phone' => 'string',
        'reciver_name' => 'string',
        'reciver_phone' => 'string',
        'city' => 'string',
        'check_the_adress' => 'string',
        'delivery_time' => 'string',
        'street' => 'string',
        'home' => 'string',
        'podezd' => 'string',
        'etage' => 'string',
        'kvartira' => 'integer',
        'call_reciver' => 'string',
        'outside_city' => 'string',
        'give_photo' => 'string',
        'big_cart' => 'string',
        'card_text' => 'string',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subscribe_id' => 'required',
        'reciver' => 'required',
        'customer_name' => 'required|string|max:255',
        'customer_phone' => 'required|string|max:255',
        'reciver_name' => 'nullable|string|max:255',
        'reciver_phone' => 'nullable|string|max:255',
        'city' => 'required|string|max:255',
        'check_the_adress' => 'required|string|max:255',
        'delivery_time' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'home' => 'required|string|max:255',
        'podezd' => 'required|string|max:255',
        'etage' => 'required|string|max:255',
        'kvartira' => 'required',
        'call_reciver' => 'nullable|string|max:255',
        'outside_city' => 'required|string|max:255',
        'give_photo' => 'required|string|max:255',
        'big_cart' => 'required|string|max:255',
        'card_text' => 'nullable|string|max:255',
        'comment' => 'nullable|string|max:255'
    ];

    
}
