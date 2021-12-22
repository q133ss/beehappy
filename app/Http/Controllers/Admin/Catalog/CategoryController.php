<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::where('parent_id',NULL)->get();
        return view('admin.catalog.category.index', compact('categories'));
    }

    public function create(Request $request){
        $category = new Category();
        $category->name = $request->name;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $category->img = '/storage/' . $img_path;
        }
        $category->type = $request->type;
        $category->status = $request->status;
        $category->parent_id = NULL;
        $category->save();
        return redirect()->back()->withSuccess('Категория создана');
    }

    public function edit(Request $request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $category->img = '/storage/' . $img_path;
        }
        $category->type = $request->type;
        if($request->status == "Нет") {
            $category->status = 0;
        }else{
            $category->status = 1;
        }
        $category->parent_id = NULL;
        $category->save();
        return redirect()->back()->withSuccess('Категория изменена');
    }

    public function delete(Request $request){
        $category = Category::find($request->id);

        if($category->products->count() == 0){
            $category->delete();
            return redirect()->back()->withSuccess('Категория удалена');
        }else{
            return redirect()->back()->withSuccess('Эту категорию удалить нельзя');
        }


    }

    public function sub_index($id){
        $category = Category::find($id)->first();
        $sub_cats = Category::where('parent_id', $id)->get();
        return view('admin.catalog.category.subcat', [
            'category' => $category,
            'sub_cats' => $sub_cats,
            'cat_id' => $id
        ]);
    }

    public function sub_create(Request $request, $id){
        $category = new Category();
        $category->name = $request->name;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $category->img = '/storage/' . $img_path;
        }
        $category->type = $request->type;
        $category->status = 1;
        $category->parent_id = $id;
        $category->save();
        return redirect()->back()->withSuccess('Категория создана');
    }

    public function sub_edit(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $category->img = '/storage/' . $img_path;
        }
        $category->type = $request->type;
        if($request->status == "Нет") {
            $category->status = 0;
        }else{
            $category->status = 1;
        }
        $category->parent_id = $request->parent;
        $category->save();
        return redirect()->back()->withSuccess('Категория изменена');
    }

}
