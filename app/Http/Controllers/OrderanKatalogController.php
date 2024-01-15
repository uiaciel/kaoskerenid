<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Katalogproduk;
use App\Models\Order;
use App\Models\Orderan;
use App\Models\OrderanKatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderanKatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderanKatalog = OrderanKatalog::All();

        return view('orderanKatalog.index', [
            'orderanKatalogs' => $orderanKatalog
        ]);
    }

    public function create()
    {
        return view('orderanKatalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $katalog = array_filter($request->katalog);
        // $qty = array_filter($request->qty);
        // $inv = $request->order_id;

        $orderan = new OrderanKatalog;
        $orderan->order_id = $request->order_id;
        $orderan->katalog_id = $request->katalog_id;
        $orderan->qty = $request->qty;
        $orderan->save();

        $paket = Katalogproduk::with('produk')->where('katalog_id', $request->katalog_id)->get();

        $order_id = $request->order_id;

        foreach ($paket as $key => $n) {

            $orderan = new Orderan;
            $orderan->order_id = $order_id;
            $orderan->produk_id = $n->produk->id;
            $orderan->qty = $request->qty;
            $orderan->harga = $n->produk->harga * $request->qty;
            $orderan->save();

        }

        // foreach ($katalog as $key => $n) {
        //     $orderan = new OrderanKatalog;
        //     $orderan->order_id = $inv;
        //     $orderan->katalog_id = $n;
        //     $orderan->qty = $qty[$key];

        //     $orderan->save();
        // }
        $idorder = Order::where('id', $request->order_id)->first();

        Session::flash('flash_message', 'Orderan berhasil di tambahkan');
        return redirect()->route('order.show', $idorder->inv);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderanKatalog  $orderanKatalog
     * @return \Illuminate\Http\Response
     */
    public function show(OrderanKatalog $orderanKatalog)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderanKatalog  $orderanKatalog
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderanKatalog $orderanKatalog)
    {
        return view('orderanKatalog.edit', compact('orderanKatalog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderanKatalog  $orderanKatalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderanKatalog $orderanKatalog)
    {
        $orderanKatalog->update($request->all());

        return redirect()->back()->with('success', 'OrderanKatalog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderanKatalog  $orderanKatalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderanKatalog $orderankatalog)
    {
        $orderankatalog->delete();
        Orderan::where('order_id', '=', $orderankatalog->order_id)->delete();

        return redirect()->back()->with('success', 'OrderanKatalog deleted successfully.');
    }
}
