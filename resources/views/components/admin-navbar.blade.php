<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">Acceuil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('admin.users')}}">Utilisateurs</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('admin.books')}}">Livres</a>
          </li>

            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">Se deconnecter</button>

                </form>
            </li>

        </ul>
      </div>
    </div>
  </nav>
