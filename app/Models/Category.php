<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Kalnoy\Nestedset\NodeTrait;
use DB;


/**
 * Class Category
 * @package App\Models
 * @version December 5, 2021, 6:40 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $categoryPaths
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property string $name
 * @property string $img
 * @property string $type
 * @property integer $order
 * @property string $status
 * @property string $descr
 * @property integer $parent_id
 */
class Category extends Model
{
    use NodeTrait;

    public $table = 'categories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const TYPE_PRODUCTS = 'products';
    const TYPE_CONSTR_MAIN = 'constr_main';
    const TYPE_CONSTR_SUB = 'constr_sub';
    const TYPE_CONSTR_OAZIS = 'constr_oazis';
    const TYPE_ADDITIONALLY = 'additionallies';
    const TYPE_URGENTLY = 'urgentlies';

    const TYPES = [
        self::TYPE_PRODUCTS => 'Букеты',
        self::TYPE_CONSTR_MAIN => 'Конструктор цветы',
        self::TYPE_CONSTR_SUB => 'Конструктор упаковка',
        self::TYPE_CONSTR_OAZIS => 'Конструктор оазис',
        self::TYPE_ADDITIONALLY => 'Дополнительные товары',
        self::TYPE_URGENTLY => 'Срочный заказ',
    ];

    public $fillable = [
        'name',
        'img',
        'type',
        'order',
        'status',
        'descr',
        'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'img' => 'string',
        'type' => 'string',
        'order' => 'integer',
        'status' => 'string',
        'descr' => 'string',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'img' => 'nullable|string|max:255',
        'type' => 'required|string',
        'order' => 'integer',
        'status' => 'required|string|max:255',
        'descr' => 'string',
        'parent_id' => 'nullable'
    ];

    public function scopeByType($model, $type) {
        $city = City::find(\Cookie::get('city_id'));
        return self::from('categories AS c')
        ->select(['c.id', 'c.name', 'c.img', 'c.descr', DB::raw(
            'COALESCE('.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "City" AND cp.model_id = "'.$city->id.'" AND cp.`charge` IS NOT NULL),'.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Region" AND cp.model_id = "'.$city->region->id.'" AND cp.`charge` IS NOT NULL),'.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Country" AND cp.model_id = "'.$city->region->country->id.'" AND cp.`charge` IS NOT NULL)'.
            ') as charge'
        )])->whereRaw('(1 = (SELECT COALESCE('.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "City" AND cp.model_id = "'.$city->id.'" AND cp.`status` IS NOT NULL),'.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Region" AND cp.model_id = "'.$city->region->id.'" AND cp.`status` IS NOT NULL),'.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Country" AND cp.model_id = "'.$city->region->country->id.'" AND cp.`status` IS NOT NULL),'.
            'c.`status`)))'
        )->where('c.type', $type)->whereNull('parent_id');
    }

    public function scopeById($model, $id) {
        $city = City::find(\Cookie::get('city_id'));
        $r = self::from('categories AS c')
        ->select(['c.id', 'c.name', 'c.img', 'c.descr', \DB::raw(
            'COALESCE('.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "City" AND cp.model_id = "'.$city->id.'" AND cp.`charge` IS NOT NULL),'.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Region" AND cp.model_id = "'.$city->region->id.'" AND cp.`charge` IS NOT NULL),'.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Country" AND cp.model_id = "'.$city->region->country->id.'" AND cp.`charge` IS NOT NULL)'.
            ') as charge'
        )])->whereRaw('(1 = (SELECT COALESCE('.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "City" AND cp.model_id = "'.$city->id.'" AND cp.`status` IS NOT NULL),'.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Region" AND cp.model_id = "'.$city->region->id.'" AND cp.`status` IS NOT NULL),'.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Country" AND cp.model_id = "'.$city->region->country->id.'" AND cp.`status` IS NOT NULL),'.
            'c.`status`)))'
        );
        if (is_array($id)) {
            $r->whereIn('id', $id);
        } else {
            $r->where('id', $id);
        }
        return $r;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function categoryPaths()
    {
        return $this->hasMany(\App\Models\CategoryPath::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'category_id');
    }

    public function parent()
    {
        $city = City::find(\Cookie::get('city_id'));
        return self::from('categories AS c')
        ->select(['c.id', 'c.name', 'c.img', 'c.descr', DB::raw(
            'COALESCE('.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "City" AND cp.model_id = "'.$city->id.'" AND cp.`charge` IS NOT NULL),'.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Region" AND cp.model_id = "'.$city->region->id.'" AND cp.`charge` IS NOT NULL),'.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Country" AND cp.model_id = "'.$city->region->country->id.'" AND cp.`charge` IS NOT NULL)'.
            ') as charge'
        )])->whereRaw('(1 = (SELECT COALESCE('.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "City" AND cp.model_id = "'.$city->id.'" AND cp.`status` IS NOT NULL),'.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Region" AND cp.model_id = "'.$city->region->id.'" AND cp.`status` IS NOT NULL),'.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Country" AND cp.model_id = "'.$city->region->country->id.'" AND cp.`status` IS NOT NULL),'.
            'c.`status`)))'
        )->where('id', $this->parent_id);
    }

    public function scopeChild()
    {
        $city = City::find(\Cookie::get('city_id'));
        return self::from('categories AS c')
        ->select(['c.id', 'c.name', 'c.img', 'c.descr', DB::raw(
            'COALESCE('.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "City" AND cp.model_id = "'.$city->id.'" AND cp.`charge` IS NOT NULL),'.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Region" AND cp.model_id = "'.$city->region->id.'" AND cp.`charge` IS NOT NULL),'.
            '(SELECT cp.`charge` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Country" AND cp.model_id = "'.$city->region->country->id.'" AND cp.`charge` IS NOT NULL)'.
            ') as charge'
        )])->whereRaw('(1 = (SELECT COALESCE('.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "City" AND cp.model_id = "'.$city->id.'" AND cp.`status` IS NOT NULL),'.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Region" AND cp.model_id = "'.$city->region->id.'" AND cp.`status` IS NOT NULL),'.
            '(SELECT cp.`status` FROM category_paths AS cp WHERE c.id = cp.category_id AND cp.model = "Country" AND cp.model_id = "'.$city->region->country->id.'" AND cp.`status` IS NOT NULL),'.
            'c.`status`)))'
        )->where('parent_id', $this->id);
    }
}
