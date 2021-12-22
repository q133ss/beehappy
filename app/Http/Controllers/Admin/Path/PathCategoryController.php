<?php

namespace App\Http\Controllers\Admin\Path;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPath;

class PathCategoryController extends Controller
{
    public function index(Request $request){
        $path = CategoryPath::byFilter($request)->get();
        return view('admin.catalog.path.category.index', [
            'path' => $path
        ]);
    }

    public function edit(Request $request,$id){
        $path = CategoryPath::find($id);
        $path->model = $request['model'];
        $path->model_id = $request['model_id'];
        $path->category_id = $request['category_id'];
        $path->status = $request['status'];
        $path->charge = $request['charge'];
        $path->save();
        return redirect()->back()->withSuccess('Патч успешно обновлен');
    }

    public function delete($id){
        $path = CategoryPath::find($id);
        $path->delete();
        return redirect()->back()->withSuccess('Патч успешно удален');
    }

    public function create(Request $request){
        $path = new CategoryPath();
        $path->model = $request['model'];
        $path->model_id = $request['model_id'];
        $path->category_id = $request['category_id'];
        $path->status = $request['status'];
        $path->charge = $request['charge'];
        $path->save();
        return redirect()->back()->withSuccess('Патч успешно создан');
    }
}
