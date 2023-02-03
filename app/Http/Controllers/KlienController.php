<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Order;
use App\Models\Design;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class KlienController extends Controller
{

    public function index(Request $request)
    {
        // $kliens = Klien::OrderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            return DataTables::of(Klien::query()->orderBy('updated_at', 'desc'))
                ->addColumn('action', 'kliens.action')
                ->toJson();
        }

        return view('kliens.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:kliens',
            'hp' => 'required|numeric',
        ]);
        if ($request->input('order', 1)) {
            $klien = Klien::create([
                'nama' => $request->nama,
                'hp' => $request->hp,
                'user_id' => Auth::id(),
                'alamat' => $request->alamat,
            ]);
            $order = new Order;
            $order->periode = Carbon::now()->format("M-Y");
            $order->inv = Carbon::now()->format("dm-") . Str::random(3) . Carbon::now()->format("y");
            $order->klien_id = $klien->id;
            $order->user_id = Auth::id();
            $order->save();
            return redirect()->route('order.show', $order->inv)->with('flash', [
                'message' => 'Orderan berhasil dibuat'
            ]);
        } else {
            $klien = new Klien;
            $klien->user_id = Auth::id();
            $klien->nama = $request->nama;
            $klien->hp = $request->hp;
            $klien->alamat = $request->alamat;
            $klien->save();
            return redirect()->route('klien.index')
                ->with('success', 'Klien created successfully.');
        }
    }

    public function show($id)
    {
        $klien = Klien::find($id);
        $orders = Order::where('klien_id', $id)->orderBy('created_at', 'desc')->get();
        $design = Design::where('klien_id', $id)->orderBy('updated_at', 'desc')->get();
        $jumlahinv = $orders->whereNotIn('status', "Cancel")->count();
        $jumlahqty = $orders->whereNotIn('status', "Cancel")->pluck('qty')->sum();
        $mockups = Design::where('kategori', 'MOCKUP')->get();

        return view('kliens.edit', [
            'klien' => $klien,
            'orders' => $orders,
            'jumlahinv' => $jumlahinv,
            'jumlahqty' => $jumlahqty,
            'designs' => $design,
            'mockups' => $mockups
        ]);
    }

    public function update(Request $request, Klien $klien)
    {

        $klien->nama = $request->nama;
        $klien->hp = $request->hp;
        $klien->alamat = $request->alamat;
        $klien->save();

        return redirect()->back()
            ->with('success', 'Klien created successfully.');
    }

    public function destroy(Klien $klien)
    {
        //
    }

    public function export(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($request->from_date)) {
                $data = Klien::query()->whereBetween('created_at', array($request->from_date, $request->to_date))
                    ->orderBy('updated_at', 'asc');
            } else {
                $data = Klien::query()->orderBy('updated_at', 'desc');
            }


            return DataTables::of($data)
                ->addColumn('action', 'kliens.action')
                ->editColumn('created_at', function ($data) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y');
                    return $formatedDate;
                })
                ->make(true);
        }

        return view('kliens.export');
    }

    public function bulanini(Request $request)
    {
        $data = Klien::select('*')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)

            ->get();



        return view('kliens.data', [
            'datas' => $data
        ]);
    }
}
