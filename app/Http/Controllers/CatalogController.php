<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\MainBanner as Banner;

//
// class="js-modal-open" data-url="asd"
//

class CatalogController extends Controller
{
    //
    public function index()
    {
        $banners = Banner::byType(Banner::TYPE_MAIN)->limit(20)->get();

        $cats = Category::byType(Category::TYPE_PRODUCTS)->get();
        $addits = Category::byType(Category::TYPE_ADDITIONALLY)->get();
        
        return view('catalog.index', compact('banners', 'cats', 'addits'));
    }

    public function category(Request $request, $id)
    {
        $cat = Category::byId($id)->first();
        $products = Product::byCategory($id, $request);
        $products = $products->paginate(8);

        if($request->ajax()){
            return view('catalog.products', compact('products', 'cat'))->render();
        }

        return view('catalog.cat', [
            'products' => $products,
            'cat' => $cat,
            'req' => $request,
        ]);
    }

    public function product()
    {
        $product = Product::byId($id);
        $addits = Category::byType(Category::TYPE_ADDITIONALLY);

        // Возвращает html для модального окна

        dd($product, $addits);
    }
}

