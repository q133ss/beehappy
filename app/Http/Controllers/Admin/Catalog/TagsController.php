<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index(){
        $tags = Tag::get();
        return view('admin.catalog.tags.index', compact('tags'));
    }

    public function create(Request $request){
        $tag = new Tag();
        $tag->name = $request->name;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $tag->icon = '/storage/' . $img_path;
        }
        $tag->save();
        return redirect()->back()->withSuccess('Тег успешно создан!');
    }

    public function edit(Request $request){
        $tag = Tag::find($request->id);
        $tag->name = $request->name;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $tag->icon = '/storage/' . $img_path;
        }
        $tag->save();
        return redirect()->back()->withSuccess('Тег успешно изменен');
    }

    public function delete($id){
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back()->withSuccess('Тег успешно удален!');
    }
}
