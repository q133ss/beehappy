<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Region
 * @package App\Models
 * @version December 5, 2021, 6:45 pm UTC
 *
 * @property \App\Models\Country $country
 * @property \Illuminate\Database\Eloquent\Collection $cities
 * @property integer $country_id
 * @property string $title
 * @property integer $charge
 * @property integer $order
 */
class Region extends Model
{


    public $table = 'regions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'country_id',
        'title',
        'charge',
        'order'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'title' => 'string',
        'charge' => 'integer',
        'order' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required',
        'title' => 'required|string|max:255',
        'charge' => 'required',
        'order' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cities()
    {
        return $this->hasMany(\App\Models\City::class, 'region_id');
    }
}
