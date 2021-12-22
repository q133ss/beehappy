<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::get();
        return view('admin.catalog.colors.index', compact('colors'));
    }

    public function create(Request $request){
        $color = new Color();
        $color->name = $request->name;
        $color->hex = $request->hex;
        $color->save();
        return redirect()->back()->withSuccess('Тег успешно создан!');
    }

    public function edit(Request $request){
        $color = Color::find($request->id);
        $color->name = $request->name;
        $color->hex = $request->hex;
        $color->save();
        return redirect()->back()->withSuccess('Тег успешно изменен');
    }

    public function delete($id){
        $color = Color::find($id);
        $color->delete();
        return redirect()->back()->withSuccess('Тег успешно удален!');
    }
}
