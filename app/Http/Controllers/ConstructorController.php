<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ConstructorController extends Controller
{
    //
    public function index()
    {
        $catsMain = Category::byType(Category::TYPE_CONSTR_MAIN)->get();
        $catsSub = Category::byType(Category::TYPE_CONSTR_SUB)->get();
        $catsOazis = Category::byType(Category::TYPE_CONSTR_OAZIS)->get();
        
        return view('constr.index', compact('catsMain', 'catsSub', 'catsOazis'));
    }

    public function category(Request $request, $id)
    {
        $cat = Category::byId($id)->first();
        $products = Product::byCategory($id, $request)->get();
        dd($products);

        return view('constr.cat', compact('cat', 'products'));
    }
}
