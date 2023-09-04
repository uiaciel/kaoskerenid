<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Order;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klien = Klien::all();

        return view('toko.create', [
            'kliens' => $klien
        ]);
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->periode = Carbon::now()->format("M-Y");
        $order->inv = Carbon::now()->format("dm-") . Str::random(3) . Carbon::now()->format("y");
        $order->user_id = Auth::id();
        $order->klien_id = $request->klien_id;
        $order->qty = 0;
        // $order->pengambilan = Carbon::now();
        $order->tanggalambil = Carbon::now()->toDateTimeString();
        $order->save();
        // return redirect()->route('orderan', $order->inv);
        return redirect('/transaksi/' . $order->inv)
            ->with('success', 'Order berhasil dibuat.');
    }

    public function transaksi($id)
    {
        $produk = Produk::All();
        $order = Order::where('inv', $id)->first();
        return view('toko.transaksi', [
            'inv' => $order,
            'produk' => $produk,
        ]);
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
