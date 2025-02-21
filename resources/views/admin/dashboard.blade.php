@extends('admin.layout')

@section('title', 'Дашборд')

@section('content')
    <div class="container">
        <h1 class="mb-4">Дашборд</h1>

        <div class="card mb-4">
            <div class="card-header">🔥 Топ-5 новостей</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($topNews as $news)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ $news->name }}</span>
                            <span class="badge bg-primary">{{ $news->views }} просмотров</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if(session('user')->role === 'admin')
            <div class="card">
                <div class="card-header">🏆 Топ-5 авторов</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($topAuthors as $author)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $author->login }}</span>
                                <span class="badge bg-success">{{ $author->news_count }} новостей</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
