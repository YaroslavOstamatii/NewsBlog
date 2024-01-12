<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,News $id)
    {
        dd($request->all());


        $news = News::findOrFail($newsId);
        $news->comments()->create([

        ]);
        $comment = new Comment(['message' => $request->input('message')]);
        $news->comments()->save($comment);


        return redirect()->route('news.show', $news);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
