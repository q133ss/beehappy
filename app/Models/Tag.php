<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Tag
 * @package App\Models
 * @version December 5, 2021, 6:46 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $productTags
 * @property string $name
 * @property string $icon
 */
class Tag extends Model
{


    public $table = 'tags';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'icon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'icon' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productTags()
    {
        return $this->hasMany(\App\Models\ProductTag::class, 'tag_id');
    }
}
