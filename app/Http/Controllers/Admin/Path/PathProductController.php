<?php

namespace App\Http\Controllers\Admin\Path;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductPath;

class PathProductController extends Controller
{
    public function index(Request $request){
        $path = ProductPath::byFilter($request)->get();
        return view('admin.catalog.path.product.index', [
            'path' => $path
        ]);
    }

    public function edit(Request $request,$id){
       $path = ProductPath::find($id);
       $path->locable_type = $request['model'];
       $path->locable_id = $request['model_id'];
       $path->product_id = $request['product_id'];
       $path->status = $request['status'];
       $path->price = $request['price'];
       $path->score = $request['score'];
       $path->sale = $request['sale'];
       $path->save();
       return redirect()->back()->withSuccess('Патч успешно обновлен');
    }

    public function delete($id){
        $path = ProductPath::find($id);
        $path->delete();
        return redirect()->back()->withSuccess('Патч успешно удален');
    }

    public function create(Request $request){
        $path = new ProductPath();
        $path->locable_type = $request['model'];
        $path->locable_id = $request['model_id'];
        $path->product_id = $request['product_id'];
        $path->status = $request['status'];
        $path->price = $request['price'];
        $path->score = $request['score'];
        $path->sale = $request['sale'];
        $path->save();
        return redirect()->back()->withSuccess('Патч успешно создан');
    }
}
