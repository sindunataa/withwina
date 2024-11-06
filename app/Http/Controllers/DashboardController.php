<?php

namespace App\Http\Controllers;

use App\Events\OrderProcessed;
use App\Models\Berat;
use App\Models\Destinations;
use App\Models\Drop_points;
use App\Models\Kusirs;
use App\Models\Orders;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destinations::latest()->limit(4)->get(); 
        $drop_points = Drop_points::latest()->limit(4)->get(); 
        return view('frontend.index', compact('destinations', 'drop_points'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function destination()
    {
        $destinations = Destinations::latest()->limit(4)->get(); 

        return view('frontend.pages.destination.index', compact('destinations'));
    }

    public function drop_point()
    {
        $drop_points = Drop_points::latest()->limit(4)->get(); 

        return view('frontend.pages.drop_point.index', compact('drop_points'));
    }

    public function detail_destination($slug)
    {
        $destinations = Destinations::where('slug', $slug)->first();


        return view('frontend.pages.destination.detail', compact('destinations'));
    }

    public function admin()
    {
        $destinations = Destinations::get();
        $count_destination = $destinations->count();
        
        $kusirs = Kusirs::get();
        $count_kusirs = $kusirs->count();

        $drop_points = Drop_points::get();
        $count_drop_points = $drop_points->count();

        $orders = Orders::limit(10)->get();

        return view('pages.dashboard.admin', compact('count_destination','count_kusirs','count_drop_points','orders'));
    }

    public function kusir(Request $request)
    {
        if ($request->expectsJson()) {
            $data = Kusirs::with('order')->latest()->get();
            return response()->json(['data' => $data], 200);
        }

        $kusir = Auth::user()->kusir;
        $orders = Orders::where('kusir_id', $kusir->id)->latest()->get();
        // dd($orders);
        return view('pages.dashboard.kusir', compact('orders'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function user(Request $request)
    {
        if ($request->expectsJson()) {
            $data = Kusirs::with('order')->latest()->get();
            return response()->json(['data' => $data], 200);
        }

        $userId = Auth::id();
        $orders = Orders::with('kusir', 'drop_point', 'destination')->where('user_id', $userId)->latest()->get();
    
        return view('pages.dashboard.user', compact('orders'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    public function showOrders(Request $request)
    {
    // Ambil ID pesanan dari permintaan
    $orderId = $request->input('order_id');

    // Query untuk mendapatkan detail pesanan berdasarkan ID
    $order = Orders::with('destination')->find($orderId);

    // Kembalikan detail pesanan dalam format JSON
    return response()->json(['order' => $order], 200);
    }



    public function search(Request $request)
    {
        $name = $request->input('name');
        $person = $request->input('person');

        // Lakukan pencarian di model atau sumber data lainnya
        $kusirs = Kusirs::where('max_person', '>=', $person)
        ->get();

        $greeting = "Hello, $name!";

        // dd($kusirs->toArray());

        if ($request->ajax()) {
            return view('frontend.pages.search.search_result', compact('kusirs', 'greeting'));
        }

        return view('frontend.pages.search.search_result', compact('kusirs', 'greeting'));
    }


    // public function getDropPoints($id)
    // {
    //     $data = DB::table('drop_points')
    //     ->select('drop_points.name as name')
    //     ->join('destinations', 'destinations.id', '=', 'drop_points.destination_id')
    //     ->groupBy('drop_points.name')
    //     ->where('drop_points.destination_id',$id)
    //     ->get();
    //     return response()->json($data);
    // }

    public function getDropPoint(Request $request)
    {
        $data = DB::table('drop_points')
        ->select('drop_points.*')
        ->where('drop_points.destination_id',$request->destination_id)
        ->get();
        // dd($data);
        return response()->json($data);
    }

    public function getKusirs(Request $request)
    {
        $data = DB::table('kusirs')
        ->select('kusirs.*')
        ->where('kusirs.max', '>=' ,$request->weight)
        ->where('kusirs.max_person', '>=' ,$request->max_person)
        ->get();
        // dd($data);
        return response()->json($data);
    }

    public function getBerat()
    {
        // Query ke database untuk mendapatkan data berat terbaru
        $latestBerat = Berat::latest()->first();

        // Jika data ditemukan, kembalikan dalam format JSON
        if ($latestBerat) {
            return response()->json(['berat' => $latestBerat->berat]);
        } else {
            return response()->json(['error' => 'Data berat tidak ditemukan'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
