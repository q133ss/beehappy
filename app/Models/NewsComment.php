<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class NewsComment
 * @package App\Models
 * @version December 5, 2021, 6:42 pm UTC
 *
 * @property \App\Models\User $author
 * @property \App\Models\News $news
 * @property integer $news_id
 * @property integer $author_id
 * @property string $comment
 */
class NewsComment extends Model
{


    public $table = 'news_comments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'news_id',
        'author_id',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'news_id' => 'integer',
        'author_id' => 'integer',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'news_id' => 'required',
        'author_id' => 'required',
        'comment' => 'required|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function news()
    {
        return $this->belongsTo(\App\Models\News::class, 'news_id');
    }
}
