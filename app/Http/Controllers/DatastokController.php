<?php
namespace App\Http\Controllers;
use App\Models\Datastok;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DatastokController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        $stok = Stok::all();
        return view('stoks.update', [
            'stok' => $stok
        ]);
    }

    public function store(Request $request)
    {
        //$table->bigInteger('user_id')->unsigned();
        //$table->foreign('user_id')->references('id')->on('users');
        //$table->bigInteger('stok_id')->unsigned();
        //$table->foreign('stok_id')->references('id')->on('stoks');
        //$table->string('status');
        //$table->date('tanggal');
        //$table->integer('qty');
        $datastok = new Datastok;
        $datastok->user_id = Auth::id();
        $datastok->stok_id = $request->stok_id;
        $datastok->status = $request->status;
        $datastok->modal = $request->modal;
        $datastok->hargajual = $request->hargajual;
        $datastok->tanggal = $request->tanggal;
        $datastok->qty = $request->qty;
        $datastok->save();
        if($request->status == "Masuk") {
            $stokid = Stok::find($request->stok_id);
            $stokid->qty = $stokid->qty + $request->qty;
            $stokid->save();
        }
        if($request->status == "Keluar") {
            $stokid = Stok::find($request->stok_id);
            $stokid->qty = $stokid->qty - $request->qty;
            $stokid->save();
        }
        return redirect()->route('stok.index')
        ->with('success','Klien created successfully.');
    }

    public function show($id)
    {
        $stok = Stok::find($id)->first();
        $datastok = Datastok::where('stok_id', $id)->get();
        return view('stoks.history', [
            'stok' => $stok,
            'datastok' => $datastok
        ]);
    }

    public function edit($id)
    {
        $stok = Stok::find($id)->first();
        $datastok = Datastok::where('stok_id', $id)->get();
        return view('stoks.update', [
            'stok' => $stok,
            'datastok' => $datastok
        ]);
    }

    public function update(Request $request, Datastok $datastok)
    {
        //
    }

    public function destroy(Datastok $datastok)
    {
        //
    }
}
