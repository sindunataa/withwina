<?php

namespace App\Http\Controllers;

use App\Models\Kusirs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;

class KusirsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kusir = User::all();
        $kusirs = Kusirs::with('user')->latest()->get();

        return view('pages.kusir.index', compact('kusir', 'kusirs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kusir.create');
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
            'weight' => 'required',
            'max' => 'required',
            'max_person' => 'required',
            'cost' => 'required',
            'status' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();

        $data_kusir = [
            'name' => $request->name,
            'weight' => $request->weight,
            'max' => $request->max,
            'max_person' => $request->max_person,
            'cost' => $request->cost,
            'status' => $request->status,
        ];
        
        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('kusirs', $request->image);
            $data_kusir['image'] = $image;
        }

        $data_user = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'kusir',
            'password' => Hash::make($request->password),
        ];
        
        $user = User::create($data_user);
        
        $data_kusir['user_id'] = $user->id;

        

        Kusirs::create($data_kusir);


        return redirect()->route('kusirs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kusirs  $kusirs
     * @return \Illuminate\Http\Response
     */
    public function show(Kusirs $kusirs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kusirs  $kusirs
     * @return \Illuminate\Http\Response
     */
    public function edit(Kusirs $kusirs, $id)
    {
        $kusirs = User::all();
        $kusir = Kusirs::all();
        $edit = Kusirs::where('id', $id)->first();

        return view('pages.kusir.edit', compact('kusirs', 'kusir', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kusirs  $kusirs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kusirs $kusirs, $id)
    {
        $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'max' => 'required',
            'max_person' => 'required',
            'cost' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $kusirs = Kusirs::findorfail($id);

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('kusirs', $request->image);
            $object['image'] = $image;
            // dd($object['avatar']);
            if ($kusirs->image) {
                FacadesFile::delete('./uploads/' . $kusirs->image);
            }
        }


        $kusirs->update($input);
        //dd($galery->toArray());
        return redirect()->route('kusirs.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kusirs  $kusirs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kusirs $kusirs, $id)
    {
        $kusir = Kusirs::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $kusir->image);
        $kusir->user()->delete();
        $kusir->DELETE();
        

        return redirect()->route('kusirs.index')
            ->with('success', 'Product deleted successfully');
    }
}
