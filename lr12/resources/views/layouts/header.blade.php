<header class="border-bottom bg-white">
    <div class="container py-3">
        <nav class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">

            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/books">Книги</a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('books.create') }}">Додати книгу</a>
                </li>
                @endauth
            </ul>

            <div class="d-flex gap-2 justify-content-center">
                @guest
                    <a href="{{ route('auth') }}" class="btn btn-outline-primary btn-sm">Увійти</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Реєстрація</a>
                @endguest

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Вийти</button>
                    </form>
                @endauth
            </div>

        </nav>
    </div>
</header>
