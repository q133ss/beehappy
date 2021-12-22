<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderPhoto;

class AdminOrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function photo_create(Request $request){
        $photo = new OrderPhoto();
        $photo->order_id = $request['order_id'];
        if($request->img != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $photo->img = '/storage/' . $img_path;
        }
        $photo->save();
        return redirect()->back()->withSuccess('Фото успешно добавлено');
    }

}
