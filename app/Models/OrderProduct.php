<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class OrderProduct
 * @package App\Models
 * @version December 5, 2021, 6:42 pm UTC
 *
 * @property \App\Models\Color $color
 * @property \App\Models\Order $order
 * @property \App\Models\Product $product
 * @property \App\Models\Size $size
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $size_id
 * @property integer $color_id
 * @property integer $price
 * @property boolean $score
 * @property boolean $sale
 * @property boolean $charge
 * @property integer $qty
 * @property string $delivery_date
 */
class OrderProduct extends Model
{


    public $table = 'order_products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'order_id',
        'product_id',
        'size_id',
        'color_id',
        'price',
        'score',
        'sale',
        'charge',
        'qty',
        'delivery_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'product_id' => 'integer',
        'size_id' => 'integer',
        'color_id' => 'integer',
        'price' => 'integer',
        'score' => 'boolean',
        'sale' => 'boolean',
        'charge' => 'boolean',
        'qty' => 'integer',
        'delivery_date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'product_id' => 'required',
        'size_id' => 'required',
        'color_id' => 'required',
        'price' => 'nullable|integer',
        'score' => 'nullable|boolean',
        'sale' => 'nullable|boolean',
        'charge' => 'nullable|boolean',
        'qty' => 'required',
        'delivery_date' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function color()
    {
        return $this->belongsTo(\App\Models\Color::class, 'color_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function size()
    {
        return $this->belongsTo(\App\Models\Size::class, 'size_id');
    }
}
