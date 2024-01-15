<?php
namespace App\Http\Controllers;
use App\Models\Keuangan;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->bulan)) {

            $keuangans = Keuangan::orderBy('tanggal', 'asc')->whereMonth('tanggal', date('m'))
                ->whereYear('tanggal', date('Y'))->get();
        } else {

            $keuangans = Keuangan::orderBy('tanggal', 'asc')->whereMonth('tanggal', $request->bulan)
                ->whereYear('tanggal', $request->tahun)->get();
        }
        $debit = $keuangans->where('jenis', 'Pemasukan')->sum('nominal');
        $kredit = $keuangans->where('jenis', 'Pengeluaran')->sum('nominal');
        return view('keuangans.index', [

            'keuangans' => $keuangans,
            'debit' => $debit,
            'kredit' => $kredit
        ]);
    }

    public function print($bulan, $tahun)
    {


        $tanggal = $tahun . '-' . $bulan . '-01';
        $formatbulantahun = Carbon::parse($tanggal)->format('M-Y');

        $keuangans = Keuangan::orderBy('tanggal', 'asc')->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)->get();

        $debit = $keuangans->where('jenis', 'Pemasukan')->sum('nominal');
        $kredit = $keuangans->where('jenis', 'Pengeluaran')->sum('nominal');
        return view('keuangans.print', [

            'keuangans' => $keuangans,
            'debit' => $debit,
            'kredit' => $kredit,
            'formatbulantahun' => $formatbulantahun,
        ]);



    }

    public function create()
    {
        return view('keuangans.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keuangan = new Keuangan;
        $keuangan->tanggal = $request->tanggal;
        $keuangan->kategori = $request->kategori;
        $keuangan->order_id = $request->order_id;
        $keuangan->nominal = $request->nominal;
        $keuangan->metode = $request->metode;
        $keuangan->jenis = $request->jenis;
        $keuangan->detail = $request->detail;
        $keuangan->save();
        if ($request->status == "LUNAS") {
            Order::where('inv', $request->detail)->update([
                'pembayaran' => 'LUNAS'
            ]);
        }
        if ($request->status == "MASUK DP") {
            Order::where('inv', $request->detail)->update([
                'pembayaran' => 'MASUK DP'
            ]);
        }
        return redirect()->back()
            ->with('flash_message', 'Data created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */

     public function stores(Request $request)
     {

        $tanggal = array_filter($request->tanggal);


        foreach ($tanggal as $key => $value) {

            $keuangan = new Keuangan;
            $keuangan->tanggal = $value;
            $keuangan->kategori = $request->kategori[$key];

            $keuangan->nominal = $request->nominal[$key];
            $keuangan->metode = $request->metode[$key];
            $keuangan->jenis =$request->jenis[$key];
            $keuangan->detail = $request->detail[$key];
            $keuangan->save();

        }
        toast('Berhasil terinput', 'success');
        return redirect()->back()
            ->with('flash_message', 'Data created successfully.');
     }

     public function inputs()
    {
        return view('keuangans.multiple');
    }

    public function show(Keuangan $keuangan)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keuangan $keuangan)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keuangan  $keuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect()->back()->with('flash_message', 'Data telah dihapus!');
    }
}
