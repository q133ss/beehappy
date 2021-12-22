<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Review
 * @package App\Models
 * @version December 5, 2021, 6:45 pm UTC
 *
 * @property \App\Models\Product $product
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $reviewsPhotos
 * @property integer $product_id
 * @property integer $user_id
 * @property string $review
 * @property integer $rating
 */
class Review extends Model
{


    public $table = 'reviews';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'product_id',
        'user_id',
        'review',
        'rating'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'user_id' => 'integer',
        'review' => 'string',
        'rating' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'user_id' => 'required',
        'review' => 'required|string',
        'rating' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reviewsPhotos()
    {
        return $this->hasMany(\App\Models\ReviewsPhoto::class, 'review_id');
    }
}
