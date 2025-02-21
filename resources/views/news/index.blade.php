@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach($news as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card mb-4">
                    <a href="{{ route('news.show', $item->id) }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <h1 class="card-title">{{ $item->name }}</h1>
                            
                            <div class="text-center my-3">
                                <img src="{{ asset('images/' . $item->image) }}" class="img-fluid" alt="{{ $item->name }}">
                            </div>
                            <div class="d-flex justify-content-between">
                                <div></div> 
                                <p class="card-text text-muted"><strong>Дата:</strong> {{ $item->created_at->format('d.m.Y') }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Пагинация -->
    <div class="d-flex justify-content-center mt-4">
        {{ $news->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
