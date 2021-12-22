<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cookie;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function index(){
//        dd($_COOKIE['cart']);
//        $cart;
//        $ids = [];
//        foreach($cart $k => $q) {
//            $a = explode('_', $k);
//            $ids[] = $a[0];
//        }
//        array_unique($ids);
        $products = Product::byId($ids);

        $cartProducts =[];
        /*
         * ID
         * img
         * name
         * price
         * sale
         * score
         * k
         */
//        foreach($cart $k => $q) {
//            $a = explode('_', $k);
//            $cartProducts = [];
//        }

        return view('cart.index');
    }

    public function add(Request $request){
        $validated = $request->validate([
            'pid' => 'required|integer|exists:products,id',
            'qty' => 'integer|required|min:1',
            'size' => 'integer|exists:sizes,id',
            'color' => 'integer|exists:colors,id',
            'lenta1' => 'integer|nullable',
            'lenta2' => 'integer|nullable'
        ]);

        $basket = session('basket_main', []);
        $key  = $validated['pid'].'_';
        $key .= (isset($validated['size']) ? $validated['size'] : '').'_';
        $key .= (isset($validated['color']) ? $validated['color'] : '');

        if (isset($basket[$key])) {
            $a = [$validated['qty'] + $basket[$key][0]];
            if (isset($validated['lenta1'])) $a[] = $validated['lenta1'];
            else {
                if (isset($basket[$key][1])) $a[] = $basket[$key][1];
            }
            if (isset($validated['lenta2'])) $a[] = $validated['lenta2'];
            else {
                if (isset($basket[$key][2])) $a[] = $basket[$key][2];
            }
            $basket[$key] = $a;
        } else {
            $a = [$validated['qty']];
            if (isset($validated['lenta1'])) $a[] = $validated['lenta1'];
            if (isset($validated['lenta2'])) $a[] = $validated['lenta2'];
            $basket[$key] = $a;
        }
        session(['basket_main' => $basket]);

        return 1;
    }

    public function edit(){
        $validated = $request->validate([
            'pid' => 'required|integer|exists:products,id',
            'qty' => 'integer|required|min:1',
            'size' => 'integer|exists:sizes,id',
            'color' => 'integer|exists:colors,id',
            'lenta1' => 'integer|nullable',
            'lenta2' => 'integer|nullable'
        ]);

        $basket = session('basket_main', []);
        $key  = $validated['pid'].'_';
        $key .= (isset($validated['size']) ? $validated['size'] : '').'_';
        $key .= (isset($validated['color']) ? $validated['color'] : '');

        if (isset($basket[$key])) {
            $a = [$validated['qty']];
            if (isset($validated['lenta1'])) $a[] = $validated['lenta1'];
            if (isset($validated['lenta2'])) $a[] = $validated['lenta2'];
            $basket[$key] = $a;
        }
        session(['basket_main' => $basket]);

        return 1;
    }

    public function delete($item){
        $validated = $request->validate([
            'pid' => 'required|integer|exists:products,id',
            'size' => 'integer|exists:sizes,id',
            'color' => 'integer|exists:colors,id',
        ]);

        $basket = session('basket_main', []);
        $key  = $validated['pid'].'_';
        $key .= (isset($validated['size']) ? $validated['size'] : '').'_';
        $key .= (isset($validated['color']) ? $validated['color'] : '');

        if (isset($basket[$key])) {
            unset($basket[$key]);
        }
        session(['basket_main' => $basket]);

        return 1;
    }
}
