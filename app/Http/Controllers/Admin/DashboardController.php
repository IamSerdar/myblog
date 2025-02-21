<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (session('user')->role === 'content_manager') {
            $topNews = News::where('author_id', session('user')->id)->orderByDesc('views')->take(5)->get();
        } else {
            $topNews = News::orderByDesc('views')->take(5)->get();
        }

        $topAuthors = User::withCount('news')->orderByDesc('news_count')->take(5)->get();

        return view('admin.dashboard', compact('topNews', 'topAuthors'));
    }
}
