<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizSetting;

class QuizController extends Controller
{
    public function index(){
        $block1 = QuizSetting::where('block', 1)->get();
        $block2 = QuizSetting::where('block', 2)->get();
        $block3_1 = QuizSetting::where('block', '31')->first();
        $block3_2 = QuizSetting::where('block', '32')->first();
        $block41 = QuizSetting::where('block', '41')->first();
        $block42 = QuizSetting::where('block', '42')->first();
        return view('quiz.index',[
            'block1' => $block1,
            'block2' => $block2,
            'block3_1' => $block3_1,
            'block3_2'=> $block3_2,
            'block41'=> $block41,
            'block42'=> $block42
        ]);
    }
}
