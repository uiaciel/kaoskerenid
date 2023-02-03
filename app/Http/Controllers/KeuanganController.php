<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Order;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $keuangans = Keuangan::orderBy('created_at', 'desc')->limit(100)->get();
        $pemasukan = Keuangan::orderBy('updated_at', 'desc')->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->where('jenis', 'Pemasukan')
        ->get();

        $pengeluaran = Keuangan::orderBy('created_at', 'desc')->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->where('jenis', 'Pengeluaran')
        ->get();

        return view('keuangans.index', [
            'pemasukans' => $pemasukan,
            'pengeluarans' => $pengeluaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keuangans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $keuangan = new Keuangan;
        $keuangan->tanggal = $request->tanggal;
        $keuangan->kategori = $request->kategori;
        $keuangan->order_id = $request->order_id;
        $keuangan->nominal = $request->nominal;
        $keuangan->metode = $request->metode;
        $keuangan->jenis = $request->jenis;
        $keuangan->detail = $request->detail;
        $keuangan->save();

        if($request->status == "LUNAS")
        {
            Order::where('inv', $request->detail)->update([
                'pembayaran' => 'LUNAS'
            ]);
        }

        if($request->status == "MASUK DP")
        {
            Order::where('inv', $request->detail)->update([
                'pembayaran' => 'MASUK DP'
            ]);
        }


        return redirect()->back()
        ->with('flash_message','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keuangan $keuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->back()->with('flash_message','Data telah dihapus!');
    }

    
}
