<?php

namespace App\Http\Controllers;

use App\Models\Orderan;


class OrderanController extends Controller
{

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
