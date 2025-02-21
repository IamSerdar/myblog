@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Личный кабинет</h2>
    <p><strong>Логин:</strong> {{ $user }}</p>

    <a href="{{ route('change.password') }}" class="btn btn-warning">Изменить пароль</a>
    <a href="{{ route('news.add') }}" class="btn btn-success">Добавить новость</a>

    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Выйти</button>
    </form>
</div>

@endsection
