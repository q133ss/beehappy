<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @version December 5, 2021, 10:19 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $newsComments
 * @property \Illuminate\Database\Eloquent\Collection $notificationUsers
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property \Illuminate\Database\Eloquent\Collection $productViews
 * @property \Illuminate\Database\Eloquent\Collection $reviews
 * @property string $name
 * @property string $avatar_url
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $two_factor_secret
 * @property string $two_factor_recovery_codes
 * @property string $phone
 * @property number $money
 * @property integer $city_id
 * @property string $date_of_birthday
 * @property integer $scores
 * @property string $remember_token
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'avatar_url',
        'email',
        'password',
        'phone',
        'money',
        'city_id',
        'date_of_birthday',
        'scores',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'avatar_url' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'two_factor_secret' => 'string',
        'two_factor_recovery_codes' => 'string',
        'phone' => 'string',
        'money' => 'decimal:2',
        'city_id' => 'integer',
        'date_of_birthday' => 'string',
        'scores' => 'integer',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:255',
        'avatar_url' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:255',
        'two_factor_secret' => 'required|string',
        'two_factor_recovery_codes' => 'required|string',
        'phone' => 'nullable|string|max:255',
        'money' => 'required|numeric',
        'city_id' => 'nullable',
        'date_of_birthday' => 'required|string|max:255',
        'scores' => 'required',
        'remember_token' => 'nullable|string|max:100'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function newsComments()
    {
        return $this->hasMany(\App\Models\NewsComment::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function notificationUsers()
    {
        return $this->hasMany(\App\Models\NotificationUser::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productViews()
    {
        return $this->hasMany(\App\Models\ProductView::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'user_id');
    }
}
