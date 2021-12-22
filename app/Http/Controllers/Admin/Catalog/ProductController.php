<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\City;
use App\Models\Region;
use App\Models\Country;
use App\Models\ProductPath;
use App\Models\ProductSizePath;
use App\Models\Photo;
use App\Models\ProductSize;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate();
        $category = Category::where('parent_id', NULL)->get();
        return view('admin.catalog.products.index', [
            'products' => $products,
            'categories' => $category
        ]);
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::get();
        $colors = Color::get();
        $sizes = Size::get();

        $city = City::get();
        $region = Region::get();
        $country = Country::get();

        $product_sizes = ProductSize::where('product_id', $id)->get();

        return view('admin.catalog.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'cities' => $city,
            'regions' => $region,
            'countries' => $country,
            'product_sizes' => $product_sizes
        ]);
    }

    public function update(Request $request,$id){
        $product = Product::find($id);
        $product->name = $request->title;
        $product->descr = $request->description;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->score = $request->score;
        $product->sale = $request->sale;
        $product->category_id = $request->cat_id;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $product->img = '/storage/' . $img_path;
        }
        $product->save();

        //Sizes
        foreach ($request->sizes as $size){
            $size_price = new ProductSize();
            $size_price->product_id = $product->id;
            $size_price->size_id = $size;
            if($request['size_is_main'] == $size) {
                $size_price->is_main = 1;
            }else{
                $size_price->is_main = 0;
            }
            $size_price->price = $request['size_price'.$size];
            $size_price->sale = $request['size_price_sale'.$size];
            $size_price->status = $request['size_price_status'.$size];
            $size_price->score = $request['size_price_score'.$size];
            $size_price->save();
        }

        //Gallery
        if(isset($request->gallery)){
            foreach ($request->gallery as $photo){
                $img = new Photo();
                $img_path = $photo->store('uploads', 'public');
                $img->filename = '/storage/' . $img_path;
                $img->product_id = $product['id'];
                $img->save();
            }
        }

        //Product path
        if($request->location != NULL){
            //Check and remove old path's
            $paths = ProductPath::where('product_id', $product->id)->get();
            if($paths->count() > 0){
                foreach ($paths as $path){
                    $path->delete();
                }
            }
            //Create new path's

            foreach ($request->location as $key => $location){
                $count = $key + 1;
                $product_path = new ProductPath();
                if($location == 'Город'){
                    $model = 'City';
                    $model_id = $request['path-city'.$count];
                }elseif($location == 'Регион'){
                    $model = 'Region';
                    $model_id = $request['path-region'.$count];
                }elseif($location == 'Страна'){
                    $model = 'Country';
                    $model_id = $request['path-country'.$count];
                }

                $product_id = $product->id;
                if($request['path-status'.$count] == 'Да') {
                    $status = 0;
                }else{
                    $status = 1;
                }
                $price = $request['path-price'.$count];
                $score = $request['path-score'.$count];
                $sale = $request['path-sale'.$count];
                $charge = $request['path-charge'.$count];

                $product_path->locable_type = $model;
                $product_path->locable_id = $model_id;
                $product_path->product_id = $product_id;
                $product_path->status = $status;
                $product_path->price = $price;
                $product_path->sale = $sale;
                $product_path->score = $score;
                $product_path->charge = $charge;

                if(isset($model_id)) {
                    $product_path->save();
                }
            }
        }
        //Category path
        if($request->size_location != NULL){
            //Check and remove old path's
            $paths = ProductSizePath::where('product_id', $product->id)->get();
            if($paths->count() > 0){
                foreach ($paths as $path){
                    $path->delete();
                }
            }
            //Create new path's

            foreach ($request->size_location as $key => $location){
                $count = $key + 1;
                $product_path = new ProductSizePath();
                if($location == 'Город'){
                    $model = 'City';
                    $model_id = $request['path-size-city'.$count];
                }elseif($location == 'Регион'){
                    $model = 'Region';
                    $model_id = $request['path-size-region'.$count];
                }elseif($location == 'Страна'){
                    $model = 'Country';
                    $model_id = $request['path-size-country'.$count];
                }

                $size_id = $request['size-path'.$count];
                if($request['path-size-status'.$count] == 'Да') {
                    $status = 0;
                }else{
                    $status = 1;
                }
                $product_id = $product->id;
                $price = $request['path-size-price'.$count];
                $score = $request['path-size-score'.$count];
                $sale = $request['path-size-sale'.$count];
                $main = $request['main1'];

                $product_path->locable_type = $model;
                $product_path->locable_id = $model_id;
                $product_path->product_id = $product_id;
                $product_path->size_id = $size_id;
                $product_path->status = $status;
                $product_path->price = $price;
                $product_path->sale = $sale;
                $product_path->score = $score;
                if($size_id == $main) {
                    $product_path->main = $main;
                }else{
                    $product_path->main = 0;
                }

                if(isset($model_id)) {
                    $product_path->save();
                }
            }
        }

        return redirect()->back()->withSuccess('Товар успешно изменен');
    }

    public function search(Request $request){
        $products = Product::where('name','LIKE', "%$request->search%")->get();
        $categories = Category::where('parent_id', NULL)->get();
        return view('admin.catalog.products.search',[
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function filter(Request $request, $id){
        $cat = Category::find($id);
        //dd($cat['_lft']);
        $products = Product::whereBetween('category_id', [$cat['_lft'],$cat['_rgt']])->orWhere('category_id', $id)->get();
        $categories = Category::where('parent_id', NULL)->get();
        return view('admin.catalog.products.search',[
            'products' => $products,
            'categories' => $categories,
            'id' => $id
        ]);
    }

    public function create(){
        $categories = Category::get();
        $colors = Color::get();
        $sizes = Size::get();
        $cities = City::get();
        $regions = Region::get();
        $countries = Country::get();

        return view('admin.catalog.products.create',[
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'cities' => $cities,
            'regions' => $regions,
            'countries' => $countries
        ]);
    }

    public function store(Request $request){
        $product = new Product();
        $product->name = $request->title;
        $product->descr = $request->description;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->score = $request->score;
        $product->sale = $request->sale;
        $product->category_id = $request->cat_id;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $product->img = '/storage/' . $img_path;
        }
        $product->save();

        //Sizes
        foreach ($request->sizes as $size){
            $size_price = new ProductSize();
            $size_price->product_id = $product->id;
            $size_price->size_id = $size;
            if($request['size_is_main'] == $size) {
                $size_price->is_main = 1;
            }else{
                $size_price->is_main = 0;
            }
            $size_price->price = $request['size_price'.$size];
            $size_price->sale = $request['size_price_sale'.$size];
            $size_price->status = $request['size_price_status'.$size];
            $size_price->score = $request['size_price_score'.$size];
            $size_price->save();
        }

        //Gallery
        if(isset($request->gallery)){
            foreach ($request->gallery as $photo){
                $img = new Photo();
                $img_path = $photo->store('uploads', 'public');
                $img->filename = '/storage/' . $img_path;
                $img->product_id = $product['id'];
                $img->save();
            }
        }

        //Product path
        if($request->location != NULL){
            //Check and remove old path's
            $paths = ProductPath::where('product_id', $product->id)->get();
            if($paths->count() > 0){
                foreach ($paths as $path){
                    $path->delete();
                }
            }
            //Create new path's

            foreach ($request->location as $key => $location){
                $count = $key + 1;
                $product_path = new ProductPath();
                if($location == 'Город'){
                    $model = 'City';
                    $model_id = $request['path-city'.$count];
                }elseif($location == 'Регион'){
                    $model = 'Region';
                    $model_id = $request['path-region'.$count];
                }elseif($location == 'Страна'){
                    $model = 'Country';
                    $model_id = $request['path-country'.$count];
                }

                $product_id = $product->id;
                if($request['path-status'.$count] == 'Да') {
                    $status = 0;
                }else{
                    $status = 1;
                }
                $price = $request['path-price'.$count];
                $score = $request['path-score'.$count];
                $sale = $request['path-sale'.$count];
                $charge = $request['path-charge'.$count];

                $product_path->locable_type = $model;
                $product_path->locable_id = $model_id;
                $product_path->product_id = $product_id;
                $product_path->status = $status;
                $product_path->price = $price;
                $product_path->sale = $sale;
                $product_path->score = $score;
                $product_path->charge = $charge;

                if(isset($model_id)) {
                    $product_path->save();
                }
            }
        }
        return redirect()->back()->withSuccess('Товар успешно добавлен');
    }
}
