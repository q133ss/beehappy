<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        $sizes = Size::get();
        return view('admin.catalog.size.index', compact('sizes'));
    }

    public function create(Request $request){
        $size = new Size();
        $size->name = $request->name;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $size->icon = '/storage/' . $img_path;
        }
        $size->save();
        return redirect()->back()->withSuccess('Размер успешно создан!');
    }

    public function edit(Request $request){
        $size = Size::find($request->id);
        $size->name = $request->name;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $size->icon = '/storage/' . $img_path;
        }
        $size->save();
        return redirect()->back()->withSuccess('Размер успешно изменен');
    }

    public function delete($id){
        $size = Size::find($id);
        $size->delete();
        return redirect()->back()->withSuccess('Размер успешно удален!');
    }
}
