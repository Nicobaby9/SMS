<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Model\Category;
use File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/article/');
            $file->move($destinationPath, $filename);
            $insert['image'] = "$filename";

            $user = auth()->user();

            $article = Article::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'image' => $filename,
                'slug' => \Str::slug(request('title', '-')),
            ]);

            // dd($article);

            return redirect(route('article.index'))->with(['success' => 'Data was successfully created.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('article.show', compact('article', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
            if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/article/');
            $file->move($destinationPath, $filename);
            $insert['image'] = "$filename";
            $a = File::delete($destinationPath . $article->image); 

            $user = auth()->user();

            $article->update([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'image' => $filename,
                'slug' => \Str::slug(request('title', '-')),
            ]);

            return redirect(route('article.index'))->with(['success' => 'Data was successfully created.']);
        }//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect(route('article.index'))->with(['success' => 'Data was successfully created.']);
    }
}
