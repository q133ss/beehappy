<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class UserEvent
 * @package App\Models
 * @version December 5, 2021, 6:46 pm UTC
 *
 * @property integer $user_id
 * @property string|\Carbon\Carbon $date
 * @property string $type
 * @property string $subject
 * @property string $phone
 * @property string $city
 * @property string $adress
 */
class UserEvent extends Model
{


    public $table = 'user_events';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'user_id',
        'date',
        'type',
        'subject',
        'phone',
        'city',
        'adress'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'date' => 'datetime',
        'type' => 'string',
        'subject' => 'string',
        'phone' => 'string',
        'city' => 'string',
        'adress' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'date' => 'required',
        'type' => 'required|string|max:255',
        'subject' => 'required|string|max:255',
        'phone' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'adress' => 'nullable|string|max:255'
    ];

    
}
