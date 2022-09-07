<nav class="navbar navbar-expand-lg {{ ($title !== "WANNA ONE" ? 'fixed-top navbar-e-gate' : '') }}">
    <div class="container main-navbar">
      <a class="navbar-brand" href="/"><img src="img/logo-wannaone-1.png" height="40px" style="margin-top: 10px; margin-bottom: 10px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ $title === "Profile" ? 'nav-link-active' : '' }}" href="/profile">PROFILE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $title === "Discography" ? 'nav-link-active' : '' }}" href="/discography">DISCOGRAPHY</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link {{ str_contains($title, 'Multimedia') ? 'nav-link-active' : '' }}" href="/gallery" data-bs-toggle="dropdown">MULTIMEDIA</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/gallery">GALLERY</a></li>
                <li><a class="dropdown-item" href="/activity">ACTIVITY</a></li>
              </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/forum">FORUM</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
