<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class PersonalAccessToken
 * @package App\Models
 * @version December 5, 2021, 6:43 pm UTC
 *
 * @property string $tokenable_type
 * @property integer $tokenable_id
 * @property string $name
 * @property string $token
 * @property string $abilities
 * @property string|\Carbon\Carbon $last_used_at
 */
class PersonalAccessToken extends Model
{


    public $table = 'personal_access_tokens';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'tokenable_type',
        'tokenable_id',
        'name',
        'token',
        'abilities',
        'last_used_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tokenable_type' => 'string',
        'tokenable_id' => 'integer',
        'name' => 'string',
        'token' => 'string',
        'abilities' => 'string',
        'last_used_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tokenable_type' => 'required|string|max:255',
        'tokenable_id' => 'required',
        'name' => 'required|string|max:255',
        'token' => 'required|string|max:64',
        'abilities' => 'required|string',
        'last_used_at' => 'nullable'
    ];

    
}
