@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="text-center p-3">
            <img src="{{ asset('images/' . $news->image) }}" class="img-fluid" alt="{{ $news->name }}">
        </div>
        <div class="card-body">
            <h1 class="card-title">{{ $news->name }}</h1>
            <h4 class="text-muted">Автор: {{ $news->author->login }}</h4>
            <hr>
            <p class="card-text">{{ $news->description }}</p>
            <div class="d-flex justify-content-end">
                <p class="text-muted"><strong>Дата создания:</strong> {{ $news->created_at->format('d.m.Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
