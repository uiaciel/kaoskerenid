<?php

namespace App\Http\Controllers;

use App\Models\Datastok;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatastokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stok = Stok::all();
        return view('stoks.update', [
            'stok' => $stok

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$table->bigInteger('user_id')->unsigned();
        //$table->foreign('user_id')->references('id')->on('users');
        //$table->bigInteger('stok_id')->unsigned();
        //$table->foreign('stok_id')->references('id')->on('stoks');
        //$table->string('status');
        //$table->date('tanggal');
        //$table->integer('qty');

        $datastok = new Datastok;
        $datastok->user_id = Auth::id();
        $datastok->stok_id = $request->stok_id;
        $datastok->status = $request->status;
        $datastok->tanggal = $request->tanggal;
        $datastok->qty = $request->qty;
        $datastok->save();

        if($request->status == "Masuk") {
            $stokid = Stok::find($request->stok_id);
            $stokid->qty = $stokid->qty + $request->qty;
            $stokid->save();
        }



        if($request->status == "Keluar") {
            $stokid = Stok::find($request->stok_id);
            $stokid->qty = $stokid->qty - $request->qty;
            $stokid->save();
        }

        return redirect()->route('stok.index')
        ->with('success','Klien created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datastok  $datastok
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stok = Stok::find($id)->first();
        $datastok = Datastok::where('stok_id', $id)->get();

        return view('stoks.history', [
            'stok' => $stok,
            'datastok' => $datastok
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datastok  $datastok
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok = Stok::find($id)->first();
        $datastok = Datastok::where('stok_id', $id)->get();

        return view('stoks.update', [
            'stok' => $stok,
            'datastok' => $datastok
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datastok  $datastok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datastok $datastok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datastok  $datastok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datastok $datastok)
    {
        //
    }
}