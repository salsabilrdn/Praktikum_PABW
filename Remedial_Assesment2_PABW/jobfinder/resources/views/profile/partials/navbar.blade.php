<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">JobFinder</a>

        <ul class="navbar-nav me-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>

                @if(auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/lowongan">Lowongan</a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="/lamaran">Lamaran</a>
                </li>
            @endauth
        </ul>

        @auth
        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
        @endauth
    </div>
</nav>
