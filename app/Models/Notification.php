<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Notification
 * @package App\Models
 * @version December 5, 2021, 6:42 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $notificationUsers
 * @property string $title
 * @property string $text
 * @property integer $all_users
 */
class Notification extends Model
{
    use SoftDeletes;

    public $table = 'notifications';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'text',
        'all_users'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'text' => 'string',
        'all_users' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'text' => 'required|string',
        'all_users' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function notificationUsers()
    {
        return $this->hasMany(\App\Models\NotificationUser::class, 'notifications_id');
    }
}
