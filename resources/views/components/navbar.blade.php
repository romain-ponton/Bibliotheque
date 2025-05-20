<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Accueil</a>
          </li>

          @guest
            <li class="nav-item">
                <a class="nav-link" href="/register">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>


          @endguest
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('books.create')}}">Ajouter</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('books.index')}}">Bibliotheque</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('profile.index')}}">Profile</a>
        </li>

        @if(auth()->user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.index')}}">Administration</a>
            </li>
        @endif

            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">Se deconnecter</button>

                </form>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
