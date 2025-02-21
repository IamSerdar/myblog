<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends BaseApiController
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return $this->success(
            NewsResource::collection($news),
            [
                "next" => $news->nextPageUrl() ? true : false,
                "current" => $news->currentPage(),
                "total" => $news->total()
            ]
        );
    }

    public function show($id)
    {
        $news = News::with('author')->find($id);

        if (!$news) {
            return $this->singleError('404', 'News not found', 404);
        }
    
        return response()->json([
            'success' => 1,
            'data' => new NewsResource($news),
        ]);
        return $this->success(NewsResource::make($news));
    }
}

