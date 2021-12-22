<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainBannerPath extends Model
{
    use HasFactory;

    public $table = 'main_banner_patchs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'locable_type',
        'locable_id',
        'banner_id',
        'img',
        'link',
        'status'
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
        'banner_id' => 'integer',
        'img' => 'string',
        'link' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'locable_type' => 'required|string|max:255',
        'locable_id' => 'required',
        'banner_id' => 'required',
        'img' => 'required',
        'link' => 'nullable',
        'status' => 'required|string|max:50',
    ];

    public function MainBanner()
    {
        return $this->belongsTo(\App\Models\MainBanner::class, 'banner_id');
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
            }  else {
//                $paths->orWhereHas('category', function($q) use($e){
//                    $q->where('categories.name', 'LIKE', '%'.$e.'%');
//                });
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
