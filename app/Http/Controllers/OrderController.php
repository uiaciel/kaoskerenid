<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Katalog;
use App\Models\Keuangan;
use App\Models\Order;
use App\Models\Orderan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->filter_periode)) {



                $data = Order::select('id', 'judul', 'klien_id', 'inv', 'qty', 'status', 'pembayaran', 'created_at')
                    ->with(['klien' => function ($query) {
                        $query->select('id', 'nama');
                    }])
                    ->orderBy('created_at', 'desc')
                    ->where('created_at', '>', Carbon::now()->subDays($request->filter_periode))
                    ->get();

                return DataTables::of($data)

                    ->editColumn('created_at', function ($order) {
                        return $order->created_at ? with(new Carbon($order->created_at))->format('d F Y') : '';
                    })

                    ->addColumn('action', 'orders.action')
                    ->toJson();
            } else {

                return DataTables::of(Order::query()
                    ->select('id', 'judul', 'klien_id', 'inv', 'qty', 'status', 'pembayaran', 'created_at')
                    ->OrderBy('created_at', 'desc')
                    ->with(['klien' => function ($query) {
                        $query->select('id', 'nama');
                    }]))

                    ->editColumn('created_at', function ($order) {
                        return $order->created_at ? with(new Carbon($order->created_at))->format('d F Y') : '';
                    })

                    ->addColumn('action', 'orders.action')
                    ->toJson();
            }
        }

        return view('orders.index');
    }

    public function create()
    {
        return view('orders.create');
    }
    public function store(Request $request)
    {
        $order = new Order;
        $order->periode = Carbon::now()->format("M-Y");
        $order->inv = Carbon::now()->format("dm-") . Str::random(3) . Carbon::now()->format("y");
        $order->user_id = Auth::id();
        $order->klien_id = $request->klien_id;
        $order->qty = 0;
        // $order->pengambilan = Carbon::now();
        $order->tanggalambil = Carbon::now()->toDateTimeString();
        $order->save();
        // return redirect()->route('orderan', $order->inv);
        return redirect('/tambah/' . $order->inv)
            ->with('success', 'Order berhasil dibuat.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('inv', $id)->first();
        $orderan = Orderan::where('order_id', $order->id)->get();
        $keuangan = Keuangan::where('order_id', $order->id)->get();
        $jumlah = Keuangan::where('order_id', $order->id)->pluck('nominal')->sum();
        $total = $orderan->pluck('harga')->sum();
        $designs = Design::where('order_id', $order->id)->where('kategori', 'Mockup')->get();
        $files = Design::where('order_id', $order->id)->where('kategori', 'EPS')->get();
        $list = Design::where('klien_id', $order->klien_id)->get();
        $collection = collect($list);
        $alldesign = $collection->unique('path');
        $alldesign->values()->all();
        $grandtotal = $total + $order->ongkir;
        $sisa = $grandtotal - $jumlah;
        $paket = Katalog::all();

        return view('orders.edit', [
            'order' => $order,
            'orderan' => $orderan,
            'keuangan' => $keuangan,
            'total' => $total,
            'grandtotal' => $grandtotal,
            'jumlah' => $jumlah,
            'sisa' => $sisa,
            'designs' => $designs,
            'files' => $files,
            'alldesign' => $alldesign,
            'paket' => $paket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->qty = $request->qty;
        $order->total = $request->total;
        $order->detail = $request->detail;
        $order->judul = $request->judul;
        // $order->pengambilan = $request->pengambilan;
        $order->tanggalambil = $request->tanggalambil;
        $order->stok = $request->stok;
        $order->status = $request->status;
        $order->ongkir = $request->ongkir;
        $order->pembayaran = $request->pembayaran;
        $order->save();

        $alertnya = $order->inv . " Berhasil di update";

        toast($alertnya, 'success');
        return redirect()->back()
            ->with('success', 'Order update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function databelanja(Request $request)
    {
        $request->session()->put($request->sessionkey, $request->sessionvalue);

        return redirect()->back()
            ->with('success', 'Data tersimpan pada Cache.');
    }
}
