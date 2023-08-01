<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where('status', 'publish')->get();

        return view('blog.index', [
            'blogs' => $blog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->user_id = Auth::id();
        $blog->judul = $request->judul;
        $blog->slug = Str::slug($request->judul);
        $blog->kategori = $request->kategori;
        $blog->konten = $request->konten;
        $blog->ringkasan = Str::excerpt($request->konten, 100);

        $blog->save();

        $alertnya = $request->judul . " Berhasil di update";

        toast($alertnya, 'success');
        return redirect()->back()
            ->with('success', 'Order update successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = BLog::where('slug', $slug)->first();
        $blogs = Blog::where('id', '!=', $blog->id)->inRandomOrder()->limit(6)->get();

        $blog->dibaca();

        return view(
            'frontend.blog',
            [
                'blog' => $blog,
                'blogs' => $blogs,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::where('id', $blog->id)->first();

        return view('blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->user_id = Auth::id();
        $blog->judul = $request->judul;
        $blog->slug = Str::slug($request->judul);
        $blog->kategori = $request->kategori;
        $blog->konten = $request->konten;
        $blog->ringkasan = Str::excerpt($request->konten, 100);
        $blog->save();

        $alertnya = $blog->judul . " Berhasil di update";

        toast($alertnya, 'success');
        return redirect()->back()
            ->with('success', 'Order update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        toast('Berhasil di hapus', 'success');

        return redirect()->back()
            ->with('success', 'Order update successfully.');
    }

    public function tinimyce(Request $request)
    {
        $originName = $request->file('file')->getClientOriginalName();
        $slugName = str_replace(' ', '_', $originName);
        $fileName = time() . '_' . $slugName;
        $request->file('file')->move(public_path() . '/storage/uploads/', $fileName);
        return response()->json(['location' => "/storage/uploads/$fileName"]);
    }
}
