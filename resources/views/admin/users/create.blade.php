@extends('admin.layout')

@section('title', 'Добавить пользователя')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Добавить пользователя</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Назад
        </a>
    </div>

    <div class="card shadow-sm p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">Имя пользователя</label>
                <input type="text" name="login" id="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login') }}" required>
                @error('login')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Роль</label>
                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                    <option value="admin">Администратор</option>
                    <option value="content_manager">Контент-менеджер</option>
                    <option value="user" selected>Пользователь</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Повторите пароль</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-person-plus"></i> Добавить пользователя
            </button>
        </form>
    </div>
</div>
@endsection
