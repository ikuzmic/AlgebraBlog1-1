<div class="blog-masthead">
    <div class="container">
    <nav class="nav blog-nav navbar-expand-md navbar-dark">
        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
        <a class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" href="/posts">Objave</a>

        @role('admin')
        <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="/users">Korisnici</a>
        @endrole
        
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Kategorije <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @foreach ($cats as $cat)
                    <a class="dropdown-item" href="{{ route('cats.index', $cat->name) }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
                </form>
            </div>
        </li>
        @auth
            <a class="nav-link" href="{{ route('user.posts.show', auth()->id() )}}">My Posts</a>
        @endauth
        
        <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a href="{{ route('posts.create') }}" class="dropdown-item">Dodaj novi post</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        </ul>
    </nav>
    </div>
</div>