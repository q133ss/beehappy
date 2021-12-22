<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class SubscribeHideCity
 * @package App\Models
 * @version December 5, 2021, 6:46 pm UTC
 *
 * @property integer $product_id
 * @property integer $city_id
 */
class SubscribeHideCity extends Model
{


    public $table = 'subscribe_hide_cities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'product_id',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'city_id' => 'required'
    ];

    
}
