<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $news->img = '/storage/' . $img_path;
        }
        if($request->file('banner') != NULL) {
            $img_path = $request->file('banner')->store('uploads', 'public');
            $news->banner = '/storage/' . $img_path;
        }
        $news->content = $request->content;
        $news->save();

        return redirect()->back()->withSuccess('Новость успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        if($request->file('img') != NULL) {
            $img_path = $request->file('img')->store('uploads', 'public');
            $news->img = '/storage/' . $img_path;
        }
        if($request->file('banner') != NULL) {
            $img_path = $request->file('banner')->store('uploads', 'public');
            $news->banner = '/storage/' . $img_path;
        }
        $news->content = $request->content;
        $news->save();
        return redirect()->back()->withSuccess('Новость успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->back()->withSuccess('Новость удалена');
    }
}
