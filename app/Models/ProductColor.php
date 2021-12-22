<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class ProductColor
 * @package App\Models
 * @version December 5, 2021, 6:43 pm UTC
 *
 * @property \App\Models\Color $color
 * @property \App\Models\Product $product
 * @property integer $product_id
 * @property integer $color_id
 * @property boolean $is_main
 */
class ProductColor extends Model
{


    public $table = 'product_colors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'product_id',
        'color_id',
        'is_main'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'color_id' => 'integer',
        'is_main' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'color_id' => 'required',
        'is_main' => 'required|boolean'
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
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }
}
