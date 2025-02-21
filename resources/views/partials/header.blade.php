<header class="bg-light shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-0">MyNEWS</h2>
        @if(session('user'))
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Выйти</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Войти</a>
        @endif
    </div>
</header>