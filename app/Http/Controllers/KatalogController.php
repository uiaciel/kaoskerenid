<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Katalogproduk;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katalog = Katalog::all();
        $katalogproduk = Katalogproduk::all();

        return view('katalog.index', [
            'katalogs' => $katalog,
            'katalogproduks' => $katalogproduk
        ]);
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
        $katalog = new Katalog;
        $katalog->nama = $request->nama;
        $katalog->save();


        return redirect()->back();
    }

    public function update(Request $request, Katalog $katalog)
    {
        $katalog->nama = $request->nama;
        $katalog->status = $request->status;
        $katalog->detail = $request->detail;
        $katalog->kategori = $request->kategori;
        if ($request->file('mockup')) {
            $fileName = str_replace(' ', '_', $request->file('mockup')->getClientOriginalName());
            $folder = 'katalog';
            $request->file('mockup')->move(public_path() . '/storage/' . $folder . '/', $fileName);

            $katalog->image = '/storage/' . $folder . '/' . $fileName;
        }

        $katalog->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katalog $katalog)
    {
        Katalogproduk::where('katalog_id', $katalog->id)->delete();
        $katalog->delete();


        return redirect()->back()->with('flash_message', 'Produk telah dihapus!');
    }
}
