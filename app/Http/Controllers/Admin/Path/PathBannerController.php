<?php

namespace App\Http\Controllers\Admin\Path;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainBannerPath;

class PathBannerController extends Controller
{
    public function index(Request $request){
        $path = MainBannerPath::byFilter($request)->get();
        return view('admin.catalog.path.banner.index', [
            'path' => $path
        ]);
    }

    public function edit(Request $request,$id){
        $path = MainBannerPath::find($id);
        $path->locable_type = $request['locable_type'];
        $path->locable_id = $request['locable_id'];
        $path->banner = $request['banner'];
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $path->img = '/storage/' . $img_path;
        }
        $path->status = $request['status'];
        $path->link = $request['link'];
        $path->save();
        return redirect()->back()->withSuccess('Патч успешно обновлен');
    }

    public function delete($id){
        $path = MainBannerPath::find($id);
        $path->delete();
        return redirect()->back()->withSuccess('Патч успешно удален');
    }

    public function create(Request $request){
        $path = new MainBannerPath();
        $path->locable_type = $request['locable_type'];
        $path->locable_id = $request['locable_id'];
        $path->banner_id = $request['banner_id'];
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $path->img = '/storage/' . $img_path;
        }
        $path->status = $request['status'];
        $path->link = $request['link'];
        $path->save();
        return redirect()->back()->withSuccess('Патч успешно создан');
    }
}
