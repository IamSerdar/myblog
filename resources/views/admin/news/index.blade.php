@extends('admin.layout')

@section('title', 'Новости')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Новости</h1>
        <a href="{{ route('admin.news.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Добавить новость
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Дата</th>
                    <th class="text-end">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <span class="badge bg-secondary">{{ $item->author->login }}</span>
                        </td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $item->created_at->format('d.m.Y') }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Редактировать
                            </a>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Удалить новость?')">
                                    <i class="bi bi-trash"></i> Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $news->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
