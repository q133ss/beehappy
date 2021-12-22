<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class News
 * @package App\Models
 * @version December 5, 2021, 6:42 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $newsComments
 * @property string $img
 * @property string $banner
 * @property string $title
 * @property string $content
 */
class News extends Model
{


    public $table = 'news';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'img',
        'banner',
        'title',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'img' => 'string',
        'banner' => 'string',
        'title' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'img' => 'required|string|max:255',
        'banner' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'content' => 'required|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function newsComments()
    {
        return $this->hasMany(\App\Models\NewsComment::class, 'news_id');
    }
}
