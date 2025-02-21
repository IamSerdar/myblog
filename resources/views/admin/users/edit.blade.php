@extends('admin.layout')

@section('title', 'Редактировать пользователя')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Редактировать пользователя</h1>
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

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="login" class="form-label">Имя пользователя</label>
                <input type="text" name="login" id="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login', $user->login) }}" required>
                @error('login')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Роль</label>
                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Администратор</option>
                    <option value="content_manager" {{ $user->role == 'content_manager' ? 'selected' : '' }}>Контент-менеджер</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Пользователь</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль (оставьте пустым, если не хотите менять)</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Повторите пароль</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Сохранить
            </button>
        </form>
    </div>
</div>
@endsection
