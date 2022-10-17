<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Klien;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderby('created_at', 'desc')->whereDay('created_at', date('d'))
        ->whereMonth ('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->get();

        $kliens = Klien::orderby('created_at', 'desc')->whereDay('created_at', date('d'))
        ->whereMonth ('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->get();

        $pemasukan = Keuangan::orderBy('created_at', 'desc')->whereDay('created_at', date('d'))
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->where('jenis', 'Pemasukan')
        ->get();

        
        return view('reports.harian', [
            'orders' => $orders,
            'kliens' => $kliens,
            'pemasukans' => $pemasukan, 
        ]);
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
        //
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
