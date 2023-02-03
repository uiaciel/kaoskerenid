<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderan;
use App\Models\Produk;
use Illuminate\Http\Request;

class OrderanController extends Controller
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
     * @param  \App\Models\Orderan  $orderan
     * @return \Illuminate\Http\Response
     */
    public function show(Orderan $orderan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderan  $orderan
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderan $orderan)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderan  $orderan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderan $orderan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderan  $orderan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderan $orderan)
    {
        $orderan->delete();
        return redirect()->back()->with('flash_message','Produk telah dihapus!');
    }

    public function destroyall($orderanid)
    {
        Orderan::where('order_id', '=', $orderanid)->delete();

        return redirect()->back()->with('flash_message','Semua Produk telah dihapus !');

    }
}
