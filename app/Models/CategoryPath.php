<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use \App\Models\City;
use \App\Models\Region;
use \App\Models\Country;


/**
 * Class CategoryPath
 * @package App\Models
 * @version December 5, 2021, 6:40 pm UTC
 *
 * @property \App\Models\Category $category
 * @property string $model
 * @property integer $model_id
 * @property integer $category_id
 * @property string $status
 * @property boolean $charge
 */
class CategoryPath extends Model
{


    public $table = 'category_paths';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'locable_type',
        'locable_id',
        'category_id',
        'status',
        'charge'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'locable_type' => 'string',
        'locable_id' => 'integer',
        'category_id' => 'integer',
        'status' => 'string',
        'charge' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'locable_type' => 'required|string|max:255',
        'locable_id' => 'required',
        'category_id' => 'required',
        'status' => 'required|string|max:50',
        'charge' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function scopeByFilter($model, $r){
        $s = $r->get('search');
        $sArr = explode(' ', $s);

        $paths = self::select(['*']);
        foreach($sArr as $e) {
            if (in_array(strtolower($e), ['city', 'country', 'region'])) {
                $paths->orWhere('locable_type', ucfirst(strtolower($e)));
            } else if (in_array(strtolower($e), ['on', 'off'])) {
                $paths->orWhere('status', strtolower($e) == 'on' ? 1 : 0);
            } else if (preg_match('#^([0-9]{1,2})(-([0-9]{1,2})){0,1}$#', $e, $matches)) {
                if (count($matches) > 2) {
                    $paths->whereBetween('charge',[$matches[1], $matches[3]]);
                }else{
                    $paths->where('charge',$matches[1]);
                }
            } else {
                $paths->orWhereHas('category', function($q) use($e){
                    $q->where('categories.name', 'LIKE', '%'.$e.'%');
                });
                //dd($e);
                $paths->orWhereHasMorph(
                    'locable',
                    [City::class,  Region::class, Country::class],
                    function(Builder $q, $a) use($e) {
                        $name = \Str::plural(str_replace('App\\Models\\', '', $a));
                        $name = strtolower($name);
                        $q->where($name.'.title', 'LIKE', '%'.$e.'%');
                    }
                );
            }
        }

        return $paths;
    }

    public function locable(){
        return $this->morphTo();
    }
}
