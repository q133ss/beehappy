<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use App\Models\City;


/**
 * Class MainBanner
 * @package App\Models
 * @version December 5, 2021, 6:41 pm UTC
 *
 * @property string $img
 * @property string $link
 * @property string $type
 * @property boolean $status
 */
class MainBanner extends Model
{

    public $table = 'main_banners';
    
    const TYPE_MAIN = 'main';
    const TYPES = [
        SELF::TYPE_MAIN => 'Главная',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'img',
        'link',
        'type',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'img' => 'string',
        'link' => 'string',
        'type' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'img' => 'required|string|max:255',
        'link' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'status' => 'required|boolean'
    ];

    public function scopeByType($model, $type){
        $city = City::find(\Cookie::get('city_id'));
        return self::from('main_banners AS mb')
        ->select([
            'mb.id',
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`img` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`img` IS NOT NULL),'.
                    '(SELECT pp.`img` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`img` IS NOT NULL),'.
                    '(SELECT pp.`img` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`img` IS NOT NULL),'.
                    'mb.img'.
                ') AS img'
            ),
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`link` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`link` IS NOT NULL),'.
                    '(SELECT pp.`link` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`link` IS NOT NULL),'.
                    '(SELECT pp.`link` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`link` IS NOT NULL),'.
                    'mb.link'.
                ') AS link'
            ),
            
        ])->whereRaw('(1 = (SELECT COALESCE('.
            '(SELECT pp.`status` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`status` IS NOT NULL),'.
            '(SELECT pp.`status` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`status` IS NOT NULL),'.
            '(SELECT pp.`status` FROM main_banner_patchs AS pp WHERE mb.id = pp.banner_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`status` IS NOT NULL),'.
            'mb.`status`)))'
        )->where('mb.type', $type);
    }
}
