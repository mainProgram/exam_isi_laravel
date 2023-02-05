<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Gestion des formations</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('types.index') }}">Types</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('referentiels.index') }}">Référentiels</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('formations.index') }}">Formations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('candidats.index') }}">Candidats</a>
        </li>
      </ul>
    </div>
</nav>