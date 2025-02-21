@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Изменение пароля</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('change.password') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Новый пароль</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Повторите пароль</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning">Сохранить</button>
    </form>
</div>

@endsection
