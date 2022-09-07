
<nav class="navbar sticky-top dashboard-navbar-full">
  <div class="container-fluid col-6 dashboard-navbar" id="dashboard-navbar">
    <span class="navbar-text position-sticky">
      @if (str_contains($title, 'Post'))
        <a href="/forum"><p><i class="bi bi-arrow-left back-btn"></i> Post</p></a>
      @elseif ($title != 'Home')
        <a href="/forum"><p><i class="bi bi-arrow-left back-btn"></i> {{ $posts[0]->user->name }}</p></a>
      @else
        <a href="/forum"><p>Home</p></a>
      @endif
    </span>
  </div>
</nav>
