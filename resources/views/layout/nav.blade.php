<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="{{route('student')}}"><span class="fas fa-brain me-1">
            </span>{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('student') }}">Students</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher') }}" aria-current="page" class="nav-link active">Teacher</a>
                    </li>
                    <li class="nav_item">
                        <a class="nav-link active" aria-current="page" href="{{ route('class') }}">Class</a>
                    </li>
                    <li class="nav_item">
                        <a class="nav-link active" aria-current="page" href="{{ route('subject') }}">Subject</a>
                    </li>
                    {{-- <li class="nav_item">
                    <a class="nav-link active" aria-current="page" href="">Classes</a>
                </li> --}}
                    <li class="nav_item">
                        <a class="nav-link active" aria-current="page" href="{{ route('classReport') }}">Attendance
                            Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/register">Add Manager</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-danger">Sign out {{-- Auth::user()->email --}}</button>
                        </form>
                    </li>
                @else
                {{ route('login') }}
                @endauth
            </ul>
        </div>
    </div>
</nav>
