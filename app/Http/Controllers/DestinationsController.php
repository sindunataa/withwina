<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destinations::latest()->simplePaginate(10);

        return view('pages.destination.index', compact('destinations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.destination.create');
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
            'excerpt' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);
        
        $slug = Str::slug($request->name, '-');
        

        $input = $request->all();

        $data_destination = [
            'name' => $request->name,
            'long' => $request->long,
            'lat' => $request->lat,
            'link' => $request->link,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'description' => $request->description,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('destination', $request->image);
            $data_destination['image'] = $image;
        }

        // dd($data_news);
    
        Destinations::create($data_destination);

        return redirect()->route('destinations.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function show(Destinations $destinations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function edit(Destinations $destinations, $id)
    {
        $destinations = Destinations::all();
        $edit = Destinations::where('id', $id)->first();
        
        
        return view('pages.destination.edit', compact('destinations', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destinations $destinations, $id)
    {
        $request->validate([
            'name' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'link' => 'required',
            'excerpt' => 'required',
            'description' => 'required',

        ]);

        $destinations = Destinations::findorfail($id);


        $slug = Str::slug($request->name, '-');
        

        $data_destination = [
            'name' => $request->name,
            'long' => $request->long,
            'lat' => $request->lat,
            'link' => $request->link,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'description' => $request->description,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('destination', $request->image);
            $data_destination['image'] = $image;
            // dd($object['avatar']);
            if ($destinations->image) {
                FacadesFile::delete('./uploads/' . $destinations->image);
            }
        }

        $destinations->update($data_destination);

        //dd($galery->toArray());

        return redirect()->route('destinations.index')
            ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destinations  $destinations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination = Destinations::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $destination->image);
        $destination->drop_point()->delete();
        $destination->DELETE();

        return redirect()->route('destinations.index')
            ->with('success', 'Product deleted successfully');
    }
}
