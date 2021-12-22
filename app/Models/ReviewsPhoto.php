<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class ReviewsPhoto
 * @package App\Models
 * @version December 5, 2021, 6:45 pm UTC
 *
 * @property \App\Models\Review $review
 * @property integer $review_id
 * @property string $photo
 */
class ReviewsPhoto extends Model
{


    public $table = 'reviews_photos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'review_id',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'review_id' => 'integer',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'review_id' => 'required',
        'photo' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function review()
    {
        return $this->belongsTo(\App\Models\Review::class, 'review_id');
    }
}
