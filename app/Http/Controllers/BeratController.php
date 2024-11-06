<?php

namespace App\Http\Controllers;

use App\Models\Berat;
use Illuminate\Http\Request;

class BeratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Berat::get();

        return view('pages.weight.index', compact('item'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.weight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'berat'=>'required',
        ]);

        $item = new Berat([
            'berat' => $request->get('berat'),
        ]);
        $item->save();
        return redirect('/berat')->with('Success', 'Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berat  $berat
     * @return \Illuminate\Http\Response
     */
    public function show(Berat $berat)
    {
        return response()->json([
            'data' => $berat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berat  $berat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Berat::find($id);
        return view('pages.weight.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berat  $berat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'berat'=>'required',
        ]);

        $item = Berat::find($id);
        $item->berat =  $request->get('berat');
        $item->save();

        return redirect('/berat')->with('success', 'Berat updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berat  $berat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Berat::find($id);
        $item->delete();

        return redirect('/berat')->with('success', 'Contact deleted!');
    }
}
