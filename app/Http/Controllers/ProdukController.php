<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::orderBy('status', 'desc')->get();

        return view('produks.index', [
            'produks' => $produk
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produks.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
        $produk->biaya = 0;
        $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'Produk created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('produks.edit', [
            'produk' => $produk,

        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $produk->nama = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
        $produk->status = $request->status;
        $produk->save();

        toast('Data berhasil diupdate', 'success');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Produk::orderBy('status', 'desc')->get();

        return view('produks.list', [
            'datas' => $data
        ]);
    }

    public function listupdate(Request $request)
    {
        $id = array_filter($request->id);
        $status = array_filter($request->status);


        foreach ($id as $key => $value) {
            $data = array(
                'status' => $status[$key],

            );

            Produk::where('id', $value)
                ->update($data);
        }

        Session::flash('flash_message', 'Produk berhasil di update');
        return redirect()->back();
    }
}
