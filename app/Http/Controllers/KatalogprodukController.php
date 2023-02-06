<?php

namespace App\Http\Controllers;

use App\Models\Katalogproduk;
use Illuminate\Http\Request;

class KatalogprodukController extends Controller
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

        $produk = array_filter($request->produk_id);

        foreach ($produk as $n) {

            $katalogproduk = new Katalogproduk;
            $katalogproduk->katalog_id = $request->katalog_id;
            $katalogproduk->produk_id = $n;
            $katalogproduk->save();

            // $orderan = new Orderan;
            // $orderan->order_id = $inv;
            // $orderan->produk_id = $n;
            // $orderan->qty = $qty[$key];
            // $orderan->harga = $hrg[$key];
            // $orderan->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Katalogproduk  $katalogproduk
     * @return \Illuminate\Http\Response
     */
    public function show(Katalogproduk $katalogproduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Katalogproduk  $katalogproduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Katalogproduk $katalogproduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Katalogproduk  $katalogproduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Katalogproduk $katalogproduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Katalogproduk  $katalogproduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katalogproduk $katalogproduk)
    {
        //
    }
}
