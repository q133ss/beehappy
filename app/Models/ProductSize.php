<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class ProductSize
 * @package App\Models
 * @version December 5, 2021, 6:44 pm UTC
 *
 * @property \App\Models\Product $product
 * @property \App\Models\Size $size
 * @property integer $product_id
 * @property integer $size_id
 * @property boolean $is_main
 * @property integer $price
 * @property integer $score
 * @property boolean $sale
 * @property integer $status
 */
class ProductSize extends Model
{


    public $table = 'product_sizes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'product_id',
        'size_id',
        'is_main',
        'price',
        'score',
        'sale',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'size_id' => 'integer',
        'is_main' => 'boolean',
        'score' => 'integer',
        'price' => 'integer',
        'sale' => 'boolean',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'size_id' => 'required',
        'is_main' => 'required|boolean',
        'price' => 'required',
        'score' => 'required',
        'sale' => 'nullable|boolean',
        'status' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    public function scopeByProduct($m, $pid){
        $city = City::find(\Cookie::get('city_id'));
        return self::from('product_sizes AS p')
        ->select([
            'p.id', 'p.product_id', 'p.size_id', 'p.is_main', 'p.is_main', 'p.is_main',
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`price` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`price` IS NOT NULL),'.
                    '(SELECT pp.`price` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`price` IS NOT NULL),'.
                    '(SELECT pp.`price` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`price` IS NOT NULL),'.
                    'p.sale'.
                ') AS price'
            ),
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`score` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`score` IS NOT NULL),'.
                    '(SELECT pp.`score` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`score` IS NOT NULL),'.
                    '(SELECT pp.`score` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`score` IS NOT NULL),'.
                    'p.sale'.
                ') AS score'
            ),
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`sale` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`sale` IS NOT NULL),'.
                    '(SELECT pp.`sale` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`sale` IS NOT NULL),'.
                    '(SELECT pp.`sale` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`sale` IS NOT NULL),'.
                    'p.sale'.
                ') AS sale'
            )
        ])->whereRaw('(1 = (SELECT COALESCE('.
            '(SELECT pp.`status` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`status` IS NOT NULL),'.
            '(SELECT pp.`status` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`status` IS NOT NULL),'.
            '(SELECT pp.`status` FROM product_size_paths AS pp WHERE p.product_id = pp.product_id AND p.size_id = pp.size_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`status` IS NOT NULL),'.
            'p.`status`)))'
        )->where('p.product_id', $pid)->orderBy('size_id', 'ASC');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function size()
    {
        return $this->belongsTo(\App\Models\Size::class, 'size_id');
    }
}
