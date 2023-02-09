<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Klien;
use App\Models\Design;
use App\Models\Order;
use App\Models\Orderan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $klien = Klien::select('nama', 'hp')->orderBy('created_at', 'desc')->limit(5)->get();
        $klienx = Klien::select('nama', 'hp')->orderBy('created_at', 'desc')->get();
        // $pemasukan = Keuangan::where('jenis', 'Pemasukan')->orderBy('created_at', 'desc')->get();
        // $pengeluaran = Keuangan::where('jenis', 'Pengeluaran')->orderBy('created_at', 'desc')->get();

        $aktiforder = Order::select('id', 'klien_id', 'inv', 'qty', 'status', 'stok', 'judul', 'detail', 'pembayaran', 'pengambilan')
            ->where('pembayaran', 'MASUK DP')
            ->where(function ($query) {
                $query->where('status', 'KONFRIM')
                    ->orWhere('status', 'DESIGN OK')
                    ->orWhere('status', 'REQUEST DESIGN')
                    ->orWhere('status', 'PRODUKSI');
            })
            ->OrderBy('updated_at', 'desc')
            ->get();

        $lunas = Order::select('id', 'klien_id', 'inv', 'qty', 'status', 'stok', 'judul', 'detail', 'pembayaran', 'pengambilan')
            ->where('pembayaran', 'LUNAS')
            ->where(function ($query) {
                $query->where('status', 'KONFRIM')
                    ->orWhere('status', 'DESIGN OK')
                    ->orWhere('status', 'REQUEST DESIGN')
                    ->orWhere('status', 'PRODUKSI');
            })
            ->OrderBy('updated_at', 'desc')
            ->get();

        $orders = Order::select('klien_id', 'inv')
            ->where('status', 'KONFRIM')
            ->orWhere('status', 'DESIGN OK')
            ->orWhere('status', 'REQUEST DESIGN')
            ->orWhere('status', 'PRODUKSI')
            ->orWhere('status', 'BERES')
            ->OrderBy('created_at', 'desc')
            ->get();

        $belumbayar = Order::select('inv', 'klien_id')
            ->where('pembayaran', 'Belum Bayar')
            ->where('status', 'KONFRIM')
            ->OrderBy('created_at', 'desc')
            ->with(['klien' => function ($query) {
                $query->select('id', 'nama');
            }])
            ->get();
        $beresorder = Order::select('id', 'klien_id', 'inv', 'qty', 'status', 'stok', 'judul', 'detail', 'pembayaran')
            ->OrderBy('created_at', 'desc')
            ->where('status', 'BERES')->get();
        $selesaiorder = Order::select('klien_id', 'inv')
            ->OrderBy('updated_at', 'desc')
            ->where('status', 'SELESAI')
            ->limit(5)
            ->get();
        // 'pemasukan' => $pemasukan,
        // 'pengeluaran' => $pengeluaran,

        $designs = Design::where('kategori', 'MOCKUP')->get();
        $files = Design::where('kategori', 'EPS')->get();
        return view('home', [
            'kliens' => $klien,
            'allkliens' => $klienx,
            'orders' => $orders,
            'lunas' => $lunas,
            'belumbayar' => $belumbayar,
            'aktiforder' => $aktiforder,
            'beresorder' => $beresorder,
            'selesaiorder' => $selesaiorder,
            'designs' => $designs,
            'files' => $files,
        ]);
    }
    public function nota($id)
    {

        $order = Order::where('inv', $id)->first();
        $orderan = Orderan::where('order_id', $order->id)->get();
        $keuangan = Keuangan::where('order_id', $order->id)->get();
        $jumlah = Keuangan::where('order_id', $order->id)->pluck('nominal')->sum();
        $total = $orderan->pluck('harga')->sum();

        $grandtotal = $total + $order->ongkir;
        $sisa = $grandtotal - $jumlah;

        return view('orders.nota', [
            'order' => $order,
            'orderan' => $orderan,
            'keuangan' => $keuangan,
            'total' => $total,
            'grandtotal' => $grandtotal,
            'jumlah' => $jumlah,
            'sisa' => $sisa,

        ]);
    }
    public function invoice($id)
    {

        $order = Order::where('inv', $id)->first();
        $orderan = Orderan::where('order_id', $order->id)->get();
        $keuangan = Keuangan::where('order_id', $order->id)->get();
        $jumlah = Keuangan::where('order_id', $order->id)->pluck('nominal')->sum();
        $total = $orderan->pluck('harga')->sum();

        $grandtotal = $total + $order->ongkir;
        $sisa = $grandtotal - $jumlah;

        return view('orders.invoice', [
            'order' => $order,
            'orderan' => $orderan,
            'keuangan' => $keuangan,
            'total' => $total,
            'grandtotal' => $grandtotal,
            'jumlah' => $jumlah,
            'sisa' => $sisa,

        ]);
    }
    public function tambah($id)
    {
        $produk = Produk::All();
        $order = Order::where('inv', $id)->first();
        return view('orders.produk', [
            'inv' => $order,
            'produk' => $produk,
        ]);
    }
    public function listproduk()
    {
        $produk = Produk::where('status', 'Aktif')->OrderBy('kategori', 'desc')->OrderBy('nama', 'asc')->get();
        return json_encode($produk);
    }
    public function tambahproduk(Request $request)
    {
        $produk = array_filter($request->produk);
        $qty = array_filter($request->qty);
        $inv = $request->inv;
        $hrg = $request->harga;
        // $total = Order::where('id', $inv )->first();
        // $total->tipe = $request->tipe;

        // $total->user_id = Auth::id();
        // $total->save();
        foreach ($produk as $key => $n) {
            $orderan = new Orderan;
            $orderan->order_id = $inv;
            $orderan->produk_id = $n;
            $orderan->qty = $qty[$key];
            $orderan->harga = $hrg[$key];
            $orderan->save();
        }
        $idorder = Order::where('id', $inv)->first();
        Session::flash('flash_message', 'Orderan berhasil di tambahkan');
        return redirect()->route('order.show', $idorder->inv);
    }

    public function belanja()
    {
        $aktiforder = Order::select('id', 'klien_id', 'inv', 'qty', 'status', 'stok', 'judul', 'detail', 'pembayaran', 'pengambilan')
            ->whereNot('pembayaran', 'BELUM BAYAR')
            ->whereNot('status', 'CANCEL')
            ->OrderBy('updated_at', 'desc')
            ->get();

        return view('orders.belanja', [
            'orders' => $aktiforder
        ]);
    }
}
