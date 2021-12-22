<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Promocode
 * @package App\Models
 * @version December 5, 2021, 6:44 pm UTC
 *
 * @property string $code
 * @property integer $type
 * @property integer $status
 * @property integer $sale
 */
class Promocode extends Model
{


    public $table = 'promocodes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'code',
        'type',
        'status',
        'sale'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'type' => 'integer',
        'status' => 'integer',
        'sale' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:255',
        'type' => 'required',
        'status' => 'required',
        'sale' => 'required'
    ];

    
}
