<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Size
 * @package App\Models
 * @version December 5, 2021, 6:46 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $orderProducts
 * @property \Illuminate\Database\Eloquent\Collection $productSizePaths
 * @property \Illuminate\Database\Eloquent\Collection $productSizes
 * @property string $name
 * @property string $icon
 */
class Size extends Model
{


    public $table = 'sizes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'icon' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'size_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productSizePaths()
    {
        return $this->hasMany(\App\Models\ProductSizePath::class, 'size_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productSizes()
    {
        return $this->hasMany(\App\Models\ProductSize::class, 'size_id');
    }
}
