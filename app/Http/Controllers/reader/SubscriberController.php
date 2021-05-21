<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('subscriber.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscriber.create');
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
            'writer_id' => 'required',
            'subscriber_id' => 'required',
        ]);

        Subscriber::create($request->all());

        return redirect()->route('subscriber.index')
            ->with('success', 'Subscriber created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscriber = Subscriber::where('id', $id)->first();

        return view('subscriber.show', compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $subscriber = Subscriber::where('id', $id)->first();

        return view('subscriber.edit', compact('subscriber'));

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

        $subscriber = Subscriber::where('id', $id)->first();

        $request->validate([
            'writer_id' => 'required',
            'subscriber_id' => 'required',
        ]);

        $subscriber->update($request->all());

        return redirect()->route('subscriber.index')->with('success', 'Subscriber updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::where('id', $id);

        $subscriber->delete();

        return redirect()->route('subscriber.index')
            ->with('success', 'Subscriber deleted successfully');

    }
}
