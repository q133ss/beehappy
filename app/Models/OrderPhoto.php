<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class OrderPhoto
 * @package App\Models
 * @version December 5, 2021, 6:42 pm UTC
 *
 * @property \App\Models\Order $order
 * @property integer $order_id
 * @property string $img
 */
class OrderPhoto extends Model
{


    public $table = 'order_photos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'order_id',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'img' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id');
    }
}
