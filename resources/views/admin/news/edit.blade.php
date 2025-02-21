@extends('admin.layout')

@section('title', 'Редактировать новость')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Редактировать новость</h1>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Назад
        </a>
    </div>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $news->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Описание</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $news->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Изображение</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" onchange="previewImage(event)">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="mt-2">
                    <img id="imagePreview" src="{{ asset('images/'. $news->image) }}" class="img-fluid {{ $news->image ? '' : 'd-none' }}" style="max-height: 200px;">
                </div>
            </div>

            <button class="btn btn-primary">
                <i class="bi bi-save"></i> Обновить
            </button>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function () {
            let img = document.getElementById('imagePreview');
            img.src = reader.result;
            img.classList.remove('d-none');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
