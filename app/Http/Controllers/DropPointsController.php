<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use App\Models\Drop_points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;

class DropPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drop_points = Drop_points::latest()->get();

        return view('pages.drop_point.index', compact('drop_points'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destinations::get();

        return view('pages.drop_point.create', compact('destinations'));
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
            'name' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'link' => 'required',
            'destination_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);

        $input = $request->all();

        $data_drop_points = [
            'name' => $request->name,
            'long' => $request->long,
            'lat' => $request->lat,
            'link' => $request->link,
            'destination_id' => $request->destination_id,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('drop_points', $request->image);
            $data_drop_points['image'] = $image;

            Drop_points::create($data_drop_points);

            return redirect()->route('drop_points.index')
                            ->with('success','Product created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drop_points  $drop_points
     * @return \Illuminate\Http\Response
     */
    public function show(Drop_points $drop_points)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drop_points  $drop_points
     * @return \Illuminate\Http\Response
     */
    public function edit(Drop_points $drop_points, $id)
    {
        $destinations = Destinations::all();
        $drop_points = Drop_points::all();
        $edit = Drop_points::where('id', $id)->first();
        
        
        return view('pages.drop_point.edit', compact('destinations','drop_points', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drop_points  $drop_points
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drop_points $drop_points, $id)
    {
        $request->validate([
            'name' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'link' => 'required',
            'destination_id' => 'required',
        ]);

        $drop_points = Drop_points::findorfail($id);

        
        $data_drop_points = [
            'name' => $request->name,
            'long' => $request->long,
            'lat' => $request->lat,
            'link' => $request->link,
            'destination_id' => $request->destination_id,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('drop_points', $request->image);
            $data_drop_points['image'] = $image;
            if ($drop_points->image) {
                FacadesFile::delete('./uploads/' . $drop_points->image);
            }
        }

        $drop_points->update($data_drop_points);

        // dd($drop_points->toArray());

        return redirect()->route('drop_points.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drop_points  $drop_points
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drop_point = Drop_points::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $drop_point->image);
        $drop_point->DELETE();

        return redirect()->route('drop_points.index')
            ->with('success', 'Product deleted successfully');
    }
}
