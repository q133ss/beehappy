<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;



/**
 * Class Product
 * @package App\Models
 * @version December 5, 2021, 6:44 pm UTC
 *
 * @property \App\Models\Category $category
 * @property \Illuminate\Database\Eloquent\Collection $orderProducts
 * @property \Illuminate\Database\Eloquent\Collection $photos
 * @property \Illuminate\Database\Eloquent\Collection $productColors
 * @property \Illuminate\Database\Eloquent\Collection $productPaths
 * @property \Illuminate\Database\Eloquent\Collection $productSizePaths
 * @property \Illuminate\Database\Eloquent\Collection $productSizes
 * @property \Illuminate\Database\Eloquent\Collection $productTags
 * @property \Illuminate\Database\Eloquent\Collection $productViews
 * @property \Illuminate\Database\Eloquent\Collection $reviews
 * @property string $name
 * @property string $descr
 * @property string $img
 * @property integer $price
 * @property boolean $score
 * @property boolean $sale
 * @property string $status
 * @property integer $order
 * @property integer $category_id
 */
class Product extends Model implements Sortable
{

    use SortableTrait;

    public $table = 'products';

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'descr',
        'img',
        'price',
        'score',
        'sale',
        'status',
        'order',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'descr' => 'string',
        'img' => 'string',
        'price' => 'integer',
        'score' => 'boolean',
        'sale' => 'boolean',
        'status' => 'string',
        'order' => 'integer',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'descr' => 'required|string',
        'img' => 'nullable|string|max:255',
        'price' => 'required|integer',
        'score' => 'nullable|boolean',
        'sale' => 'nullable|boolean',
        'status' => 'required|string|max:50',
        'order' => 'integer',
        'category_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }


    public function scopeByCategory($model, $id, $request) {
        $r = $this->getDefProds();

        if ($request->has('order') && $request->get('order') == 'all') {
            $cat = Category::find($id);
            $ids = [];
            foreach(Category::where('type', $cat->type)->get() as $c) {
                $ids[] = $c->id;
            }
            $r->whereIn('category_id', $ids);
        } else {
            $r->where('category_id', $id);
        }

        if(isset($request->order_by)){
            if($request->order_by == 'low-to-height'){
                $r->orderBy('price', 'ASC');
            }

            if($request->order_by == 'height-to-low'){
                $r->orderBy('price', 'DESC');
            }

            if($request->order_by == 'last-add'){
                $r->orderBy('created_at', 'ASC');
            }
        }

        if(isset($request->min) && isset($request->max)){
            $r->whereBetween('price', [$request->min, $request->max]);
        } else if (isset($request->min)) {
            $r->where('price', '>=', $request->min);
        } else if (isset($request->max)) {
            $r->where('price', '<=', $request->max);
        }
        return $r;
    }


    public function scopeById($model, $id) {
        if(is_array($id)){
            return $this->getDefProds()->whereIn('id', $id);
        }else {
            return $this->getDefProds()->where('id', $id);
        }
    }

    private function getDefProds(){
        $city = City::find(\Cookie::get('city_id'));
        return self::from('products AS p')
        ->select([
            'p.id', 'p.name', 'p.img', 'p.descr',
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`price` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`price` IS NOT NULL),'.
                    '(SELECT pp.`price` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`price` IS NOT NULL),'.
                    '(SELECT pp.`price` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`price` IS NOT NULL),'.
                    'p.price'.
                ') AS price'
            ),
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`score` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`score` IS NOT NULL),'.
                    '(SELECT pp.`score` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`score` IS NOT NULL),'.
                    '(SELECT pp.`score` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`score` IS NOT NULL),'.
                    'p.score'.
                ') AS score'
            ),
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`sale` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`sale` IS NOT NULL),'.
                    '(SELECT pp.`sale` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`sale` IS NOT NULL),'.
                    '(SELECT pp.`sale` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`sale` IS NOT NULL),'.
                    'p.sale'.
                ') AS sale'
            ),
            \DB::raw(
                'COALESCE('.
                    '(SELECT pp.`charge` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`charge` IS NOT NULL),'.
                    '(SELECT pp.`charge` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`charge` IS NOT NULL),'.
                    '(SELECT pp.`charge` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`charge` IS NOT NULL)'.
                ') AS charge'
            )
        ])->whereRaw('(1 = (SELECT COALESCE('.
            '(SELECT p.`status` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "City" AND pp.model_id = "'.$city->id.'" AND pp.`status` IS NOT NULL),'.
            '(SELECT p.`status` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Region" AND pp.model_id = "'.$city->region->id.'" AND pp.`status` IS NOT NULL),'.
            '(SELECT p.`status` FROM product_paths AS pp WHERE p.id = pp.product_id AND pp.model = "Country" AND pp.model_id = "'.$city->region->country->id.'" AND pp.`status` IS NOT NULL),'.
            'p.`status`)))'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderProducts()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function photos()
    {
        return $this->hasMany(\App\Models\Photo::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productColors()
    {
        return $this->hasMany(\App\Models\ProductColor::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productPaths()
    {
        return $this->hasMany(\App\Models\ProductPath::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productSizePaths()
    {
        return $this->hasMany(\App\Models\ProductSizePath::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productSizes()
    {
        return \App\Models\ProductSize::byProduct($this->id);
        //return $this->hasMany(\App\Models\ProductSize::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productTags()
    {
        return $this->hasMany(\App\Models\ProductTag::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productViews()
    {
        return $this->hasMany(\App\Models\ProductView::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'product_id');
    }
}
