<?php

namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Country;

class RegionController extends Controller
{
    public function index(){
        $countries = Country::get();
        $regions = Region::get();
        return view('admin.locations.region', [
            'regions' => $regions,
            'countries' => $countries
        ]);
    }

    public function create(Request $request){
        $region = new Region();
        $region->title = $request->name;
        $region->charge = $request->charge;
        $region->country_id = $request->country;
        $region->order = 0;
        $region->save();
        return redirect()->back()->withSuccess('Страна успешно создана!');
    }

    public function edit(Request $request){
        $region = Region::find($request->id);
        $region->title = $request->name;
        $region->charge = $request->charge;
        $region->country_id = $request->country;
        $region->order = 0;
        $region->save();
        return redirect()->back()->withSuccess('Страна успешно изменена');
    }

    public function delete($id){
        $region = Region::find($id);
        $region->delete();
        return redirect()->back()->withSuccess('Страна успешно удалена!');
    }
}
