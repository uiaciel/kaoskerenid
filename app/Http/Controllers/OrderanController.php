<?php

namespace App\Http\Controllers;

use App\Models\Orderan;
use Illuminate\Http\Request;


class OrderanController extends Controller
{

    public function update(Request $request, Orderan $orderan)
    {
        $orderan->update(['qty' => $request->qty, 'harga' => $request->harga * $request->qty]);
        return redirect()->back()->with('flash_message', 'Produk telah diupdate!');
    }

    public function destroy(Orderan $orderan)
    {
        $orderan->delete();
        return redirect()->back()->with('flash_message', 'Produk telah dihapus!');
    }

    public function destroyall($orderanid)
    {
        Orderan::where('order_id', '=', $orderanid)->delete();
        return redirect()->back()->with('flash_message', 'Semua Produk telah dihapus !');
    }
}
