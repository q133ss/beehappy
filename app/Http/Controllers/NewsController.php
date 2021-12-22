<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsComment;
use App\Models\User;

class NewsController extends Controller
{
    public function index(){
        $news = News::paginate(6);
        return view('news.index', compact('news'));
    }

    public function single($news_id){
        $news = News::find($news_id);
        $news_more = News::orderBy('created_at','desc')->where('id','!=', $news_id)->limit(4)->get();
        return view('news.single', [
            'news' => $news,
            'news_more' => $news_more
        ]);
    }

    public function add_comment(Request $request, $news_id){
        if(\Auth::check()) {
            $comment = new NewsComment();
            $comment->news_id = $news_id;
            $comment->author_id = \Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect()->back();
        }else{
            return redirect()->back()->with('message','Войдите в систему');
        }
    }

    public function sort(Request $request,$sort){
        if($sort == 'new'){
            $news = News::orderBy('created_at', 'ASC')->paginate(6);
                return view('news.items', compact('news'))->render();
        }elseif($sort == 'old'){
            $news = News::orderBy('created_at', 'DESC')->paginate(6);
                return view('news.items', compact('news'))->render();
        }
    }
}
