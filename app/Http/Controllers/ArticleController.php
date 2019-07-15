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
        // create new article
        $article = new Article();
        $article->user_id   = Auth::user()->id;
        $article->title     = $request->input('title');
        $article->body      = $request->input('body');

        // create image file
        if ($file = $request->file('image')) {
            $name = uniqid('threedium_', true).'.'.$file->getClientOriginalExtension();
            \Image::make($file)->save(public_path('images/').$name);
            $article->image = $name;
        }

        if ($article->save()) {
            return redirect()->back()->with('success', 'Article added successfully!');
        }
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
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, $id)
    {
        // update an article
        $article = Article::findOrFail($id);
        $article->title     = $request->input('title');
        $article->body      = $request->input('body');

        // create new image
        if ($file = $request->file('image')) {
            $name = uniqid('threedium_', true).'.'.$file->getClientOriginalExtension();
            \Image::make($file)->save(public_path('images/').$name);
            $article->image = $name;
        }

        if ($article->update()) {
            return redirect()->back()->with('success', 'Article updated successfully!');
        }
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
        if ($article->delete()) {
            return new ArticleResource($article);
        }
    }
}
