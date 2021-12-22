<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class City
 * @package App\Models
 * @version December 5, 2021, 6:40 pm UTC
 *
 * @property \App\Models\Region $region
 * @property string $title
 * @property integer $charge
 * @property integer $order
 * @property integer $region_id
 */
class City extends Model
{


    public $table = 'cities';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'charge',
        'order',
        'region_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'charge' => 'integer',
        'order' => 'integer',
        'region_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'charge' => 'required',
        'order' => 'required|integer',
        'region_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class, 'region_id');
    }
}
