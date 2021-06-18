<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = User::all();
        return view('admin.user.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'title' => 'required',
            'body' => 'required',
            'writer_id' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('admin.user.index')
            ->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = User::where('id', $id)->first();

        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $blog = User::where('id', $id)->first();

        return view('blog.edit',compact('blog'));

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
        $blog = User::where('id', $id)->first();
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'writer_id' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        $blog->update($request->all());

        return redirect()->route('blog.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog  = User::where('id', $id);

        $blog->delete();

        return redirect()->route('blog.user.index')
            ->with('success','User deleted successfully');

    }
}
