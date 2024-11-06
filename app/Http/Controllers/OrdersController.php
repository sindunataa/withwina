<?php

namespace App\Http\Controllers;

use App\Events\OrderProcessed;
use App\Models\Destinations;
use App\Models\Drop_points;
use App\Models\Kusirs;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kusirs = Kusirs::all();
        $drop_point = Drop_points::all();
        $destination = Destinations::all();
        $orders = Orders::with('kusir', 'drop_point', 'destination')->latest()->get();

        return view('pages.order.index', compact('kusirs', 'drop_point', 'destination', 'orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kusirs = Kusirs::all();
        $drop_points = Drop_points::all();
        $destinations = Destinations::all();

        return view('pages.order.create', compact('kusirs', 'drop_points', 'destinations'));
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
            'distance' => 'required',
            'cost' => 'required',
            'total' => 'required',
            'status' => 'required',
            'drop_point_id' => 'required',
            'kusir_id' => 'required',
            'destination_id' => 'required',
        ]);
        
        
        $input = $request->all();
        
        $data_order = [
            'name' => $request->name,
            'weight' => $request->weight,
            'max' => $request->max,
            'distance' => $request->distance,
            'cost' => $request->cost,
            'total' => $request->total,
            'status' => $request->status,
            'drop_point_id' => $request->drop_point_id,
            'kusir_id' => $request->kusir_id,
            'destination_id' => $request->destination_id,
            'user_id' => Auth::id(),
        ];

        
    
        try {
            $order = Orders::create($data_order);
            // dd($order);
            if ($order) {
                event(new OrderProcessed($order));
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        
        if (Auth::user()->role === 'admin') {
            return redirect()->route('orders.admin.index')->with('success', 'Pesanan berhasil dibuat.');
        } else {
            return redirect()->route('user.dashboard')->with('success', 'Pesanan berhasil dibuat.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders, $id)
    {
        $kusirs = Kusirs::all();
        $drop_points = Drop_points::all();
        $destinations = Destinations::all();
        $edit = Orders::where('id', $id)->first();
        
        
        return view('pages.order.edit', compact('kusirs', 'drop_points', 'destinations', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders, $id)
    {
        $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'max' => 'required',
            'distance' => 'required',
            'cost' => 'required',
            'total' => 'required',
            'status' => 'required',
            'drop_point_id' => 'required',
            'kusir_id' => 'required',
            'destination_id' => 'required',
        ]);

        $orders = Orders::findorfail($id);
        
        $data_order = [
            'name' => $request->name,
            'weight' => $request->weight,
            'max' => $request->max,
            'distance' => $request->distance,
            'cost' => $request->cost,
            'total' => $request->total,
            'cost' => $request->cost,
            'status' => $request->status,
            'drop_point_id' => $request->drop_point_id,
            'kusir_id' => $request->kusir_id,
            'destination_id' => $request->destination_id,
        ];

        $orders->update($data_order);

        //dd($galery->toArray());

        return redirect()->route('orders.admin.index')
            ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Orders::where('id', $id)->firstOrFail();
        $order->DELETE();

        return redirect()->route('orders.admin.index')
            ->with('success', 'Product deleted successfully');
    }

    public function complete(Orders $order)
    {
        $order->status = 'dropped-off';
        $order->save();

        return response()->json(['message' => 'Order successfully completed'], 200);
    }
}
