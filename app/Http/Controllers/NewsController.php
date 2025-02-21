<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(4);
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $news->increment('views');
        return view('news.show', compact('news'));
    }

    public function showAddNewsForm()
    {
        return view('profile.add-news');
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        DB::table('news')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'author_id' => session('user')->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('news.index')->with('success', 'Новость добавлена!');
    }
}
