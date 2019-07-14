<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return collection of articles
        return ArticleResource::collection(Article::orderBy('created_at', 'desc')->paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        $article = new Article();
        $article->user_id   = Auth::user()->id;
        $article->title     = $request->input('title');
        $article->body      = $request->input('body');

        if ($file = $request->file('image')) {
            $name = uniqid('threedium_', true).'.'.$file->getClientOriginalExtension();
            \Image::make($file)->save(public_path('images/').$name);
        }

        $article->image = $name;

        if ($article->save()) {
            return redirect()->back()->with('success', 'Article added!');
        }

        // $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;
        // $article->id    = $request->input('article_id');
        // $article->user_id = $request->input('user_id');
        // $article->title = $request->input('title');
        // $article->body = $request->input('body');

        // if($request->get('image')){
        //     $image = $request->get('image');
        //     $name = uniqid('threedium_', true) .'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        //     \Image::make($request->get('image'))->save(public_path('images/').$name);
        // }
        //     $image= new FileUpload();
        //     $image->image_name = $name;
        //     $image->save();

        // if ($article->save()) {
        //     return new ArticleResource($article);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        // return a single article
        // return new ArticleResource(Article::findOrFail($id));
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        // delete article
        if ($article->delete()) {
            return new ArticleResource($article);
        }
    }
}
