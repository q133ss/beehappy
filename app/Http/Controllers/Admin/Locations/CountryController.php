<?php

namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::get();
        return view('admin.locations.country', compact('countries'));
    }

    public function create(Request $request){
        $country = new Country();
        $country->title = $request->name;
        $country->charge = $request->charge;
        $country->save();
        return redirect()->back()->withSuccess('Страна успешно создана!');
    }

    public function edit(Request $request){
        $country = Country::find($request->id);
        $country->title = $request->name;
        $country->charge = $request->charge;
        $country->save();
        return redirect()->back()->withSuccess('Страна успешно изменена');
    }

    public function delete($id){
        $country = Country::find($id);
        $country->delete();
        return redirect()->back()->withSuccess('Страна успешно удалена!');
    }
}
