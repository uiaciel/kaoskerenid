<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class KlienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kliens = Klien::OrderBy('created_at', 'desc')->get();

        return view('kliens.index', [
            'kliens' => $kliens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kliens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|unique:kliens',
            'hp' => 'required|numeric',
        ]);


        if($request->input('order', 1)) {

            $klien = Klien::create([
                'nama' => $request->nama,
                'hp' => $request->hp,
                'user_id' => Auth::id(),
                'alamat' => $request->alamat,
            ]);

            $order = new Order;
            $order->periode = Carbon::now()->format("M-Y");
            $order->inv = Carbon::now()->format("dm-").Str::random(3).Carbon::now()->format("y");
            $order->klien_id = $klien->id;
            $order->user_id = Auth::id();
            $order->save();

            return redirect()->route('order.show', $order->inv)->with('flash', [
                'message' => 'Orderan berhasil dibuat'
            ]);
        }

        else {
            $klien = new Klien;
        $klien->user_id = Auth::id();
        $klien->nama = $request->nama;
        $klien->hp = $request->hp;
        $klien->alamat = $request->alamat;
        $klien->save();

        return redirect()->route('klien.index')
        ->with('success','Klien created successfully.');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $klien = Klien::find($id)->first();
        $orders = Order::where('klien_id', $id)->orderBy('created_at', 'desc')->get();
        $jumlahinv = $orders->whereNotIn('status', "Cancel")->count();
        $jumlahqty = $orders->whereNotIn('status', "Cancel")->pluck('qty')->sum();

        return view('kliens.edit', [
            'klien' => $klien,
            'orders' => $orders,
            'jumlahinv' => $jumlahinv,
            'jumlahqty' => $jumlahqty
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function edit(Klien $klien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klien $klien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klien $klien)
    {
        //
    }
}
