<?php



namespace App\Http\Controllers;



use App\Models\Design;

use App\Models\Order;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;



class DesignController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $designs = Design::where('kategori', 'mockup')->inRandomOrder()
            ->limit(20)
            ->get();

        return view('designs.index', compact('designs'));
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

        //klien_id, order_id, kategori, path



        if ($request->file('mockup')) {

            $fileName = str_replace(' ', '_', $request->file('mockup')->getClientOriginalName());

            $folder = $request->klienpath;

            $request->file('mockup')->move(public_path() . '/storage/' . $folder . '/', $fileName);



            $design = new Design;

            $design->path = '/storage/' . $folder . '/' . $fileName;

            $design->order_id = $request->order_id;

            $design->klien_id = $request->klien_id;

            $design->kategori = $request->kategori;

            $design->save();



            return redirect()->back()->with('flash_message', 'Berhasil di upload');
        }



        if ($request->has('imagecheck')) {

            //             $fileName = str_replace(' ', '_', $request->file('mockups')->getClientOriginalName());

            // $folder = $request->klienpath;

            // $request->file('mockups')->move(public_path() . '/storage/'. $folder . '/', $fileName);



            $design = new Design;

            $design->path = $request->imagecheck;

            $design->order_id = $request->order_id;

            $design->klien_id = $request->klien_id;

            $design->kategori = $request->kategori;

            $design->save();



            return redirect()->back()->with('flash_message', 'Berhasil di upload');
        }
    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\Design  $design

     * @return \Illuminate\Http\Response

     */

    public function show(Design $design)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Models\Design  $design

     * @return \Illuminate\Http\Response

     */

    public function edit(Design $design)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Models\Design  $design

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Design $design)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\Design  $design

     * @return \Illuminate\Http\Response

     */

    public function destroy(Design $design)

    {

        $design->delete();

        return redirect()->back()->with('flash_message', 'Design telah dihapus!');
    }
}
