<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class QuizSetting
 * @package App\Models
 * @version December 5, 2021, 6:45 pm UTC
 *
 * @property string $title
 * @property string $img
 * @property integer $block
 */
class QuizSetting extends Model
{


    public $table = 'quiz_settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'img',
        'block'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'img' => 'string',
        'block' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'img' => 'nullable|string|max:255',
        'block' => 'required'
    ];

    
}
