<?php
namespace App\Http\Controllers;
use App\Models\Stok;
use Illuminate\Http\Request;
class StokController extends Controller
{
    public function index(Request $request)
    {
        $stoks = Stok::all();
        $kategori = collect(Stok::pluck('kategori'))->unique()->values()->all();
        $bahan = collect(Stok::pluck('supplier'))->unique()->values()->all();


        return view('stoks.index', [
            'stoks' => $stoks,
            'kategoris' => $kategori,
            'bahans' => $bahan

        ]);
    }

    public function create()
    {
        return view('stoks.create');
    }

    public function store(Request $request)
    {
        $stok = new Stok;
        $stok->nama = $request->nama;
        $stok->kategori = $request->kategori;
        $stok->supplier = $request->supplier;
        $stok->kode = $request->kode;
        $stok->qty = $request->qty;
        $stok->save();
        return redirect()->route('stok.index')
        ->with('success','Data created successfully.');
        // $table->string('nama');
        // $table->string('kategori');
        // $table->string('supplier');
        // $table->string('kode');
        // $table->integer('qty');
    }

    public function show(Stok $stok)
    {
        //
    }

    public function edit($id)
    {
        $stok = Stok::find($id)->first();
        return view('stoks.edit', [
            'stok' => $stok,
        ]);
    }

    public function update(Request $request, Stok $stok)
    {
        //
    }

    public function destroy(Stok $stok)
    {
        //
    }
}
