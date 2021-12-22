<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdditionallyController extends Controller
{
    function category_middle($name){
        $category = Category::where('name', $name)->first();
        return redirect()->route('addit.cat', $category['id']);
    }
}
