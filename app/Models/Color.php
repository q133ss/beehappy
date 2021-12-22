<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Color
 * @package App\Models
 * @version December 5, 2021, 6:41 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $orderProducts
 * @property \Illuminate\Database\Eloquent\Collection $productColors
 * @property string $name
 * @property string $hex
 * @property string $icon
 */
class Color extends Model
{


    public $table = 'colors';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'hex',
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
        'hex' => 'string',
        'icon' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'hex' => 'nullable|string|max:255',
        'icon' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'color_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productColors()
    {
        return $this->hasMany(\App\Models\ProductColor::class, 'color_id');
    }
}
