<?php

namespace App\Http\Controllers\Admin\Path;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductSizePath;
use App\Models\Product;
use App\Models\Size;

class PathSizeController extends Controller
{
    public function index(Request $request){
        $path = ProductSizePath::byFilter($request)->get();
        $products = Product::get();
        $sizes = Size::get();
        return view('admin.catalog.path.size.index', [
            'path' => $path,
            'products' => $products,
            'sizes' => $sizes
        ]);
    }

    public function edit(Request $request,$id){
        $path = ProductSizePath::find($id);
        $path->locable_type = $request['model'];
        $path->locable_id = $request['model_id'];
        $path->main = $request['main'];
        $path->product_id = $request['product_id'];
        $path->size_id = $request['size_id'];
        $path->status = $request['status'];
        $path->price = $request['price'];
        $path->score = $request['score'];
        $path->sale = $request['sale'];
        $path->save();
        return redirect()->back()->withSuccess('Патч успешно обновлен');
    }

    public function delete($id){
        $path = ProductSizePath::find($id);
        $path->delete();
        return redirect()->back()->withSuccess('Патч успешно удален');
    }

    public function create(Request $request){
        $path = new ProductSizePath();
        $path->locable_type = $request['model'];
        $path->locable_id = $request['model_id'];
        $path->main = $request['main'];
        $path->product_id = $request['product_id'];
        $path->size_id = $request['size_id'];
        $path->status = $request['status'];
        $path->price = $request['price'];
        $path->score = $request['score'];
        $path->sale = $request['sale'];
        $path->save();
        return redirect()->back()->withSuccess('Патч успешно создан');
    }
}
