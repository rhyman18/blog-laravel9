<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogsRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::Active()->paginate(10);

        $data = [
            'judul' => 'Blog List',
            'background' => 'bg-pudar',
            'blogs' => $blogs,
        ];

        return view('blogs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'judul' => 'Posting',
            'background' => 'bg-putih',
        ];

        return view('blogs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogsRequest $request)
    {
        $data['judul'] = $request->input('judul');
        $data['konten'] = $request->input('konten');
        if ($request->file('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('img');
        }
        if ($request->file('banner')) {
            $data['banner'] = $request->file('banner')->store('img');
        }
        $data['pembuat'] = Auth::user()->name;

        Blog::create($data);

        return redirect('/')->with('create', 'Posting artikel sukses.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        $recent = Blog::orderBy('updated_at', 'desc')->limit(5)->get();

        $comments = $blog->comments()->get();
        $totalComments = $blog->totalComments();

        $data = [
            'judul' => $blog->judul,
            'background' => 'bg-pudar',
            'blog' => $blog,
            'recent' => $recent,
            'comments' => $comments,
            'totalComments' => $totalComments,
        ];

        return view('blogs.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        $data = [
            'judul' => 'Edit ' . $blog->judul,
            'background' => 'bg-pudar',
            'blog' => $blog,
        ];

        return view('blogs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogsRequest $request, $id)
    {
        $blog = Blog::where('id', $id)->first();

        $judul = $request->input('judul');
        $date = now();
        $strSlug = $judul . '-' . strtotime($date);
        $slug = Str::of($strSlug)->slug('-');
        $konten = $request->input('konten');
        $directSlug = $blog->slug;
        $data = [];

        if ($blog->judul != $judul) {
            $data['judul'] = $judul;
            $data['slug'] = $slug;
            $directSlug = $slug;
        }

        if ($blog->konten != $konten) {
            $data['konten'] = $konten;
        }

        if ($request->file('thumbnail')) {
            if ($blog->thumbnail) {
                Storage::delete($blog->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('img');
        }

        if ($request->file('banner')) {
            if ($blog->banner) {
                Storage::delete($blog->banner);
            }
            $data['banner'] = $request->file('banner')->store('img');
        }

        $data['updated_at'] = $date;

        Blog::where('id', $id)->update($data);

        return redirect("blogs/{$directSlug}")->with('edit', 'Mengubah artikel sukses.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // im not using softdelete anymore
        // Blog::where('slug', $slug)->delete();

        $blog = Blog::where('slug', $slug)->first();

        if ($blog->thumbnail) {
            Storage::delete($blog->thumbnail);
        }

        if ($blog->banner) {
            Storage::delete($blog->banner);
        }

        $blog->forceDelete();

        return redirect('/')->with('delete', 'Hapus artikel sukses.');
    }
}
