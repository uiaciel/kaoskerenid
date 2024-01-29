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
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderHarianChart $chart, Request $request)
    {
        $nilai = $request->tanggal;

        $bulanz = \Carbon\Carbon::parse($nilai)->format('m');
        $tanggalz = \Carbon\Carbon::parse($nilai)->format('d');
        $tahunz = \Carbon\Carbon::parse($nilai)->format('Y');



        if(empty($nilai)) {
            $orders = Order::orderby('created_at', 'desc')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();

        $kliendibulanini = Order::join('kliens', 'orders.klien_id', '=', 'kliens.id')
        ->select('kliens.id', 'kliens.nama', DB::raw('COUNT(orders.id) as orders_count'))
        ->whereMonth('orders.created_at', date('m'))
        ->whereYear('orders.created_at', date('Y'))
        ->groupBy('kliens.id', 'kliens.nama')
        ->orderBy('orders_count', 'desc')
        ->get();

        $orderhariini = Order::orderby('created_at', 'desc')
            ->whereDay('created_at', date('d'))
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();

        $orderbulanlalu =
            Order::orderby('created_at', 'desc')
            ->whereMonth('created_at', date('m', strtotime("-1 months")))
            ->whereYear('created_at', date('Y'))->get();

        $kliens = Klien::orderby('created_at', 'desc')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();

        $klienbulanlalu = Klien::orderby('created_at', 'desc')
            ->whereMonth('created_at', date('m', strtotime("-1 months")))
            ->whereYear('created_at', date('Y'))->get();

        $keuanganhariini = Keuangan::orderBy('tanggal', 'asc')
            ->whereDay('tanggal', date('d'))
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->get();

        $keuanganbulanan = Keuangan::orderBy('tanggal', 'asc')
            ->whereMonth('tanggal', date('m'))
            ->whereYear('tanggal', date('Y'))
            ->get();

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

        } else {
            $orders = Order::orderby('created_at', 'desc')
            ->whereMonth('created_at', $bulanz)
            ->whereYear('created_at', $tahunz)->get();

        $kliendibulanini = Order::join('kliens', 'orders.klien_id', '=', 'kliens.id')
        ->select('kliens.id', 'kliens.nama', DB::raw('COUNT(orders.id) as orders_count'))
        ->whereMonth('orders.created_at', $bulanz)
        ->whereYear('orders.created_at', $tahunz)
        ->groupBy('kliens.id', 'kliens.nama')
        ->orderBy('orders_count', 'desc')
        ->get();

        $orderhariini = Order::orderby('created_at', 'desc')
            ->whereDay('created_at', $tanggalz)
            ->whereMonth('created_at', $bulanz)
            ->whereYear('created_at', $tahunz)->get();

        $orderbulanlalu =
            Order::orderby('created_at', 'desc')
            ->whereMonth('created_at', date('m', strtotime("-1 months")))
            ->whereYear('created_at', $tahunz)->get();

        $kliens = Klien::orderby('created_at', 'desc')
            ->whereMonth('created_at', $bulanz)
            ->whereYear('created_at', $tahunz)->get();

        $klienbulanlalu = Klien::orderby('created_at', 'desc')
            ->whereMonth('created_at', date('m', strtotime("-1 months")))
            ->whereYear('created_at', $tahunz)->get();

        $keuanganhariini = Keuangan::orderBy('tanggal', 'asc')
            ->whereDay('tanggal', $tanggalz)
            ->whereMonth('tanggal', $bulanz)
            ->whereYear('tanggal', $tahunz)
            ->get();

        $keuanganbulanan = Keuangan::orderBy('tanggal', 'asc')
            ->whereMonth('tanggal', $bulanz)
            ->whereYear('tanggal', $tahunz)
            ->get();

        $pemasukan = Keuangan::orderBy('tanggal', 'desc')
            ->whereMonth('tanggal', $bulanz)
            ->whereYear('tanggal', $tahunz)
            ->where('jenis', 'Pemasukan')
            ->get();
        $pemasukanharian = Keuangan::orderBy('tanggal', 'desc')
            ->whereDay('tanggal', $tanggalz)
            ->whereMonth('tanggal', $bulanz)
            ->whereYear('tanggal', $tahunz)
            ->where('jenis', 'Pemasukan')
            ->get();
        $pengeluaranharian = Keuangan::orderBy('tanggal', 'desc')
            ->whereDay('tanggal', $tanggalz)
            ->whereMonth('tanggal', $bulanz)
            ->whereYear('tanggal', $tahunz)
            ->where('jenis', 'Pengeluaran')
            ->get();
        $pengeluaran = Keuangan::orderBy('tanggal', 'desc')
            ->whereMonth('tanggal', $bulanz)
            ->whereYear('tanggal', $tahunz)
            ->where('jenis', 'Pengeluaran')
            ->get();
        // ->whereDay('created_at', $tanggalz)


        $bulan = Carbon::now()->format("M");
        $tahun = Carbon::now()->format("Y");
        $bt = $bulanz. '-' . $tahunz;
        $periode = Order::where('periode', $bt)->get();
        }





        return view('reports.harian', [
            'orders' => $orders,
            'orderhariini' => $orderhariini,
            'orderbulanlalu' => $orderbulanlalu,
            'kliens' => $kliens,
            'klienbulanlalu' => $klienbulanlalu,
            'pemasukans' => $pemasukan,
            'pemasukanharian' => $pemasukanharian,
            'pengeluaranharian' => $pengeluaranharian,
            'chart' => $chart->build(),
            'pengeluarans' => $pengeluaran,
            'bt' => $bt,
            'periode' => $periode,
            'keuanganbulanan' => $keuanganbulanan,
            'keuanganhariini' => $keuanganhariini,
            'kliendibulanini' => $kliendibulanini
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

        $aktiforder = Order::select('id', 'klien_id', 'inv', 'qty', 'status', 'stok', 'total')

            ->wherenot('status', 'CANCEL')
            ->where('periode', $id)
            ->OrderBy('created_at', 'desc')
            ->get();

        $periode =
            DB::table('orders')
            ->select(DB::raw('DATE(created_at) as Tanggal'), DB::raw('count(*) as Jumlah'), DB::raw('sum(total) as Total'))
            ->where('periode', $id)
            ->groupBy('Tanggal')
            ->get();

        $pemasukans =
            DB::table('keuangans')
            ->select(DB::raw('DATE(tanggal) as Tanggal'), DB::raw('count(*) as Jumlah'), DB::raw('sum(nominal) as Total'))
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->where('jenis', 'Pemasukan')
            ->groupBy('Tanggal')
            ->get();

        return view('reports.bulanan', [
            'periode' => $periode,
            'id' => $id,
            'orders' => $aktiforder,
            'pemasukans' => $pemasukans,
        ]);
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
