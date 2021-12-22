<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class NotificationUser
 * @package App\Models
 * @version December 5, 2021, 6:42 pm UTC
 *
 * @property \App\Models\Notification $notifications
 * @property \App\Models\User $user
 * @property integer $notifications_id
 * @property integer $user_id
 */
class NotificationUser extends Model
{


    public $table = 'notification_users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'notifications_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'notifications_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'notifications_id' => 'required',
        'user_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function notifications()
    {
        return $this->belongsTo(\App\Models\Notification::class, 'notifications_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
