<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Subscribe
 * @package App\Models
 * @version December 5, 2021, 6:46 pm UTC
 *
 * @property string $title
 * @property string $description
 * @property string $products
 * @property string $gifts
 * @property integer $price
 * @property integer $salePrice
 * @property integer $bals
 * @property integer $status
 */
class Subscribe extends Model
{


    public $table = 'subscribes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'description',
        'products',
        'gifts',
        'price',
        'salePrice',
        'bals',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'products' => 'string',
        'gifts' => 'string',
        'price' => 'integer',
        'salePrice' => 'integer',
        'bals' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'products' => 'required|string|max:255',
        'gifts' => 'required|string|max:255',
        'price' => 'required',
        'salePrice' => 'nullable',
        'bals' => 'required',
        'status' => 'required'
    ];

    
}
