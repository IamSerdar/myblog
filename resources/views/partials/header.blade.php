<header class="bg-light shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-0"><a href="{{ route('news.index') }}" class="text-decoration-none">MyNEWS</a></h2>

        @if(session('user'))
            <a href="{{ route('profile') }}" class="btn btn-outline-success">{{ session('user')->login }}</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary">Войти</a>
        @endif
    </div>
</header>