<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Keuangan;
use App\Models\Order;
use App\Models\Orderan;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {       
        
        $orders = Cache::rememberForever('orders', function () {

            $x = Order::select('id', 'klien_id', 'inv', 'qty', 'status','pembayaran', 'created_at')
                    ->OrderBy('created_at', 'desc')
                    ->with(['klien' => function($query){
                        $query->select('id', 'nama');
                        }])
                    ->get();
                    
            return $x;
        });
        // $orders = Order::orderby('created_at', 'desc')->get();

        return view('orders.index', [
            'orders' => $orders
        ]);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->periode = Carbon::now()->format("M-Y");
        $order->inv = Carbon::now()->format("dm-").Str::random(3).Carbon::now()->format("y");
        $order->user_id = Auth::id();
        $order->klien_id = $request->klien_id;
        $order->qty = 0;
        $order->pengambilan = Carbon::now();
        $order->save();

        return redirect()->route('order.show', $order->inv)
        ->with('success','Order berhasil dibuat.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('inv', $id)->first();
        $orderan = Orderan::where('order_id', $order->id)->get();
        $keuangan = Keuangan::where('order_id', $order->id)->get();
        $jumlah = Keuangan::where('order_id', $order->id)->pluck('nominal')->sum();
        $total = $orderan->pluck('harga')->sum();
        $designs = Design::where('order_id', $order->id)->where('kategori','Mockup')->get();
        $files = Design::where('order_id', $order->id)->where('kategori','EPS')->get();

        $grandtotal = $total + $order->ongkir;
        $sisa = $grandtotal - $jumlah;

        

        return view('orders.edit', [
            'order' => $order,
            'orderan' => $orderan,
            'keuangan' => $keuangan,
            'total' => $total,
            'grandtotal' => $grandtotal,
            'jumlah' => $jumlah,
            'sisa' => $sisa,
            'designs' => $designs,
            'files' => $files
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->qty = $request->qty;
        $order->detail = $request->detail;
        $order->judul = $request->judul;
        $order->pengambilan = $request->pengambilan;
        $order->stok = $request->stok;
        $order->status = $request->status;
        $order->ongkir = $request->ongkir;
        $order->pembayaran = $request->pembayaran;
        $order->save();

        return redirect()->back()
        ->with('success','Order update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
