<?php

namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\City;

class AdminCityController extends Controller
{
    public function index(){
        $regions = Region::get();
        $city = City::paginate(20);
        return view('admin.locations.city', [
            'regions' => $regions,
            'cities' => $city
        ]);
    }

    public function create(Request $request){
        $city = new City();
        $city->title = $request->name;
        $city->charge = $request->charge;
        $city->region_id = $request->region;
        $city->order = 0;
        $city->save();
        return redirect()->back()->withSuccess('Город успешно создан!');
    }

    public function edit(Request $request){
        $city = City::find($request->id);
        $city->title = $request->name;
        $city->charge = $request->charge;
        $city->region_id = $request->region;
        $city->order = 0;
        $city->save();
        return redirect()->back()->withSuccess('Город успешно изменен');
    }

    public function delete($id){
        $city = Сity::find($id);
        $city->delete();
        return redirect()->back()->withSuccess('Страна успешно удалена!');
    }

    public function search(Request $request){
        $cities = City::where('title','LIKE', "%$request->search%")->get();
        $regions = Region::get();
        return view('admin.locations.city_search',[
            'regions' => $regions,
            'cities' => $cities,
            'request' => $request
        ]);
    }
}
