<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function index()
    {
        $newslist = News::with('category')
        ->where('user_id', auth()->user()->id)
        ->latest()
        ->get();
    
    return view('backend.news.index', [
        'newslist' => $newslist
    ]);
    
    }


    public function create()
    {
        $categories = Category::latest()->select('id','name')->where('status',1)->get();

        return view('backend.news.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|unique:news|max:255',
            'details'     => 'required',
            'category_id' => 'required',
            'image'       => 'required' // Validasi bahwa ini adalah file gambar
        ]);
    
        // Menentukan status dan featured
        $status = $request->has('status');
        $featured = $request->has('featured');
    
        // Mengupload gambar
        if ($request->hasFile('image')) {
            $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }
    
        $excerpt = Str::limit(strip_tags($request->details), 180);
    
        // Mengambil ID pengguna yang terautentikasi
        $user = auth()->user()->id;
    
        // Menyimpan data ke dalam tabel news
        News::create([
            'title'       => $request->title,
            'slug'        => str_slug($request->title),
            'details'     => $request->details,
            'excerpt'     => $excerpt,
            'user_id'     => $user, // Mengisi user_id dengan ID pengguna yang terautentikasi
            'category_id' => $request->category_id,
            'image'       => $imageName,
            'status'      => $status,
            'featured'    => $featured
        ]);
    
        return redirect()->route('admin.news.index')->with(['message' => 'News created successfully!']);
    }


    public function show(News $news)
    {
        //
    }


    public function edit(News $news)
    {
        $categories = Category::latest()->select('id','name')->where('status',1)->get();
        $news       = News::findOrFail($news->id);

        return view('backend.news.edit', compact('categories','news'));
    }

 
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'         => 'required|max:255',
            'details'       => 'required',
            'category_id'   => 'required',
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        if(isset($request->featured)){
            $featured = true;
        }else{
            $featured = false;
        }

        $news = News::findOrFail($news->id);

        if ($request->hasFile('image')) {

            if(file_exists(public_path('images/') . $news->image)){
                unlink(public_path('images/') . $news->image);
            }

            $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }else{
            $imageName = $news->image;
        }
        $excerpt = Str::limit(strip_tags($request->details), 200);

        $news->update([
            'title'         => $request->title,
            'slug'          => str_slug($request->title),
            'details'       => $request->details,
            'excerpt'       => $excerpt,
            'category_id'   => $request->category_id,
            'image'         => $imageName,
            'status'        => $status,
            'featured'      => $featured
        ]);

        return redirect()->route('admin.news.index')->with(['message' => 'News updated successfully!']);
    }

 
    public function destroy(News $news)
    {
        $news = News::findOrFail($news->id);

        if(file_exists(public_path('images/') . $news->image)){
            unlink(public_path('images/') . $news->image);
        }

        $news->delete();

        return back()->with(['message' => 'News deleted successfully!']);
    }
}
