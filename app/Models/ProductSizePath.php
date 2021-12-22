<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class ProductSizePath
 * @package App\Models
 * @version December 5, 2021, 6:44 pm UTC
 *
 * @property \App\Models\Product $product
 * @property \App\Models\Size $size
 * @property string $model
 * @property integer $model_id
 * @property boolean $main
 * @property integer $product_id
 * @property integer $size_id
 * @property string $status
 * @property integer $price
 * @property boolean $score
 * @property boolean $sale
 */
class ProductSizePath extends Model
{


    public $table = 'product_size_paths';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'locable_type',
        'locable_id',
        'main',
        'product_id',
        'size_id',
        'status',
        'price',
        'score',
        'sale'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'locable_type' => 'string',
        'locable_id' => 'integer',
        'main' => 'boolean',
        'product_id' => 'integer',
        'size_id' => 'integer',
        'status' => 'string',
        'price' => 'integer',
        'score' => 'boolean',
        'sale' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'locable_type' => 'required|string|max:50',
        'locable_id' => 'required',
        'main' => 'required|boolean',
        'product_id' => 'required',
        'size_id' => 'required',
        'status' => 'required|string|max:50',
        'price' => 'nullable|integer',
        'score' => 'nullable|boolean',
        'sale' => 'nullable|boolean'
    ];

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


    public function scopeByFilter($model, $r){
        $s = $r->get('search');
        $sArr = explode(' ', $s);

        $paths = self::select(['*']);
        foreach($sArr as $e) {
            if (in_array(strtolower($e), ['city', 'country', 'region'])) {
                $paths->orWhere('locable_type', ucfirst(strtolower($e)));
            } else if (in_array(strtolower($e), ['on', 'off'])) {
                $paths->orWhere('status', strtolower($e) == 'on' ? 1 : 0);
            } else if (preg_match('#^([0-9]{1,9999})(-([0-9]{1,9999})){0,1}$#', $e, $matches)) {
                if (count($matches) > 2) {
                    $paths->whereBetween('price', [$matches[1], $matches[3]]);
                } else {
                    $paths->where('price', $matches[1]);
                }
            }else if (preg_match('#^([0-9]{1,9999})(-([0-9]{1,9999})){0,1}$#', $e, $matches)) {
                $paths->whereBetween('score', [$matches[1], $matches[3]]);
            }else if (preg_match('#^([0-9]{1,99})(-([0-9]{1,99})){0,1}$#', $e, $matches)) {
                $paths->whereBetween('sale', [$matches[1], $matches[3]]);
            }else if (preg_match('#^([0-9]{1,99})(-([0-9]{1,99})){0,1}$#', $e, $matches)) {
                $paths->whereBetween('score', [$matches[1], $matches[3]]);
            }else {
                $paths->orWhereHas('product', function($q) use($e){
                    $q->where('products.name', 'LIKE', '%'.$e.'%');
                });
                //dd($e);
                $paths->orWhereHasMorph(
                    'locable',
                    [City::class,  Region::class, Country::class],
                    function(Builder $q, $a) use($e) {
                        $name = \Str::plural(str_replace('App\\Models\\', '', $a));
                        $name = strtolower($name);
                        $q->where($name.'.title', 'LIKE', '%'.$e.'%');
                    }
                );
            }
        }

        return $paths;
    }

    public function locable(){
        return $this->morphTo();
    }

}
