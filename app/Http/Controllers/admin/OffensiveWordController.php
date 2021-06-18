<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OffensiveWord;
use Illuminate\Http\Request;

class OffensiveWordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $offensiveWords = OffensiveWord::all();
        return view('offensive_word.index', compact('offensiveWords'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offensive_word.create');
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
        ]);

        OffensiveWord::create($request->all());

        return redirect()->route('offensive_word.index')
            ->with('success', 'OffensiveWord created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offensive_word = OffensiveWord::where('id', $id)->first();

        return view('offensive_word.show', compact('offensive_word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $offensive_word = OffensiveWord::where('id', $id)->first();

        return view('offensive_word.edit',compact('offensive_word'));

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

        $offensive_word = OffensiveWord::where('id', $id)->first();

        $request->validate([
            'title' => 'required',
        ]);

        $offensive_word->update($request->all());

        return redirect()->route('offensive_word.index')->with('success','OffensiveWord updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offensive_word  = OffensiveWord::where('id', $id);

        $offensive_word->delete();

        return redirect()->route('offensive_word.index')
            ->with('success','OffensiveWord deleted successfully');

    }
}
