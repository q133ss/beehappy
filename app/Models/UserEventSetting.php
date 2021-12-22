<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class UserEventSetting
 * @package App\Models
 * @version December 5, 2021, 6:46 pm UTC
 *
 * @property string $title
 */
class UserEventSetting extends Model
{


    public $table = 'user_event_settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255'
    ];

    
}
