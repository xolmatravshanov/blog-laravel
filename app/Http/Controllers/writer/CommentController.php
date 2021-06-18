<?php

namespace App\Http\writer\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comments = Comment::all();
        return view('comment.index', compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'blog_id' => 'required',
            'user_id' => 'required',
        ]);

        Comment::create($request->all());

        return redirect()->route('comment.index')
            ->with('success', 'Comment created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::where('id', $id)->first();

        return view('comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $comment = Comment::where('id', $id)->first();

        return view('comment.edit',compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $comment = Comment::where('id', $id)->first();

        $request->validate([
            'text' => 'required',
            'blog_id' => 'required',
            'user_id' => 'required',
        ]);

        $comment->update($request->all());

        return redirect()->route('comment.index')->with('success','Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment  = Comment::where('id', $id);

        $comment->delete();

        return redirect()->route('comment.index')
            ->with('success','Comment deleted successfully');

    }
}
