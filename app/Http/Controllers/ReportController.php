<?php

namespace App\Http\Controllers;

use App\Charts\OrderHarianChart;
use App\Models\Keuangan;
use App\Models\Klien;
use App\Models\Order;
use App\Models\Orderan;
use App\Models\Design;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderHarianChart $chart)
    {
        $orders = Order::orderby('created_at', 'desc')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        $kliens = Klien::orderby('created_at', 'desc')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        $pemasukan = Keuangan::orderBy('tanggal', 'desc')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->where('jenis', 'Pemasukan')
            ->get();
        $pemasukanharian = Keuangan::orderBy('tanggal', 'desc')
            ->whereDay('tanggal', date('d'))
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->where('jenis', 'Pemasukan')
            ->get();
        $pengeluaranharian = Keuangan::orderBy('tanggal', 'desc')
            ->whereDay('tanggal', date('d'))
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->where('jenis', 'Pengeluaran')
            ->get();
        $pengeluaran = Keuangan::orderBy('tanggal', 'desc')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->where('jenis', 'Pengeluaran')
            ->get();
        // ->whereDay('created_at', date('d'))
        $bulan = Carbon::now()->format("M");
        $tahun = Carbon::now()->format("Y");
        $bt = $bulan . '-' . $tahun;
        $periode = Order::where('periode', $bt)->get();
        return view('reports.harian', [
            'orders' => $orders,
            'kliens' => $kliens,
            'pemasukans' => $pemasukan,
            'pemasukanharian' => $pemasukanharian,
            'pengeluaranharian' => $pengeluaranharian,
            'chart' => $chart->build(),
            'pengeluarans' => $pengeluaran,
            'bt' => $bt,
            'periode' => $periode
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
    public function status($id)
    {
        $order = Order::where('inv', $id)->first();
        $orderan = Orderan::where('order_id', $order->id)->get();
        $keuangan = Keuangan::where('order_id', $order->id)->get();
        $jumlah = Keuangan::where('order_id', $order->id)->pluck('nominal')->sum();
        $total = $orderan->pluck('harga')->sum();
        $designs = Design::where('order_id', $order->id)->where('kategori', 'Mockup')->get();
        $files = Design::where('order_id', $order->id)->where('kategori', 'EPS')->get();
        $grandtotal = $total + $order->ongkir;
        $sisa = $grandtotal - $jumlah;
        return view('orders.status', [
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
}
