<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        if (session('user')->role === 'content_manager') {
            $news = News::where('author_id', session('user')->id)->latest()->paginate(10);
        } else {
            $news = News::latest()->paginate(10);
        }
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        News::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'author_id' => session('user')->id,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Новость добавлена');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image && file_exists(public_path('images/' . $news->image))) {
                unlink(public_path('images/' . $news->image));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $news->update(['image' => $imageName]);
        }

        $news->update($request->only(['name', 'description']));

        return redirect()->route('admin.news.index')->with('success', 'Новость обновлена');
    }

    public function destroy(News $news)
    {
        if ($news->image && file_exists(public_path('images/' . $news->image))) {
            unlink(public_path('images/' . $news->image));
        }
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена');
    }
}

