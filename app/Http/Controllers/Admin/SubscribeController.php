<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;
use App\Models\Product;

class SubscribeController extends Controller
{
    public function index(){
        $subscribes = Subscribe::get();
        $products = Product::get();
        return view('admin.subscribe.index', [
            'subscribes' => $subscribes,
            'products' => $products
        ]);
    }

    public function create(Request $request){
        $subscribe = new Subscribe();
        $subscribe->title = $request->title;
        $subscribe->description = $request->description;
        $subscribe->products = json_encode($request->products);
        $subscribe->gifts = json_encode($request->gifts);
        $subscribe->price = $request->price;
        $subscribe->salePrice = $request->salePrice;
        $subscribe->bals = $request->bals;
        $subscribe->status = 1;
        $subscribe->save();
        return redirect()->back()->withSuccess('Подписка успешно добавлена');
    }

    public function update(Request $request, $id){
        $subscribe = Subscribe::find($id);
        $subscribe->title = $request->title;
        $subscribe->description = $request->description;
        $subscribe->products = json_encode($request->products);
        $subscribe->gifts = json_encode($request->gifts);
        $subscribe->price = $request->price;
        $subscribe->salePrice = $request->salePrice;
        $subscribe->bals = $request->bals;
        $subscribe->status = 1;
        $subscribe->save();
        return redirect()->back()->withSuccess('Подписка успешно обновлена');
    }
}
