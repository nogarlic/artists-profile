@extends('layouts.main')

@section('container')

<div class="container discography">
    <div id="albumCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#albumCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <?php $slide = 1; ?>
      @foreach ($albums->skip(1) as $album)
        <button type="button" data-bs-target="#albumCarousel" data-bs-slide-to="{{ $slide }}" aria-label="Slide {{ $slide+1 }}"></button>
        <?php $slide++ ?>
      @endforeach
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" id="1">
        <img src="img/disco-1-to_be_one.jpg" class="d-block album" alt="...">
      </div>

      @foreach ($albums->skip(1) as $album)
      <div class="carousel-item" id="{{ $album['id'] }}">
        <img src="img/{{ $album['album_cover'] }}" class="d-block album" alt="...">
      </div>
      @endforeach



      <div class="carousel-caption d-none d-md-block">
        <div class="" id="button1">
          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#detailCanvas1" aria-controls="detailCanvas">Detail</button>
          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#videoCanvas1" aria-controls="videoCanvas">Video</button>
          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#audioCanvas1" aria-controls="audioCanvas">Audio</button>
        </div>
      @foreach ($albums->skip(1) as $album)
      <div class="d-none" id="button{{ $album['id'] }}">
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#detailCanvas{{ $album['id'] }}" aria-controls="detailCanvas">Detail</button>
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#videoCanvas{{ $album['id'] }}" aria-controls="videoCanvas">Video</button>
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#audioCanvas{{ $album['id'] }}" aria-controls="audioCanvas">Audio</button>
      </div>
      @endforeach
      </div>

      @foreach ($albums as $album)
      <div class="detail-canvas">
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="detailCanvas{{ $album['id'] }}" aria-labelledby="detailCanvas{{ $album['id'] }}Label">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="detailCanvas{{ $album['id'] }}Label">{{ $album['album_name'] }}</h5>
            <button type="button" class="btn-close text-reset bg-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small">
            <p>{{ $album['album_caption'] }}</p>
          </div>
        </div>
      </div>

      <div class="video-canvas">
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="videoCanvas{{ $album['id'] }}" aria-labelledby="videoCanvas{{ $album['id'] }}Label">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="videoCanvas{{ $album['id'] }}Label">{{ $album['album_name'] }} - {{ $album['title_track'] }} (title track)</h5>
            <button type="button" class="btn-close text-reset bg-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small">
            <iframe width="960" height="540" src="{{ $album['youtube_embed'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    
      <div class="audio-canvas">
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="audioCanvas{{ $album['id'] }}" aria-labelledby="audioCanvas{{ $album['id'] }}Label">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="audioCanvas{{ $album['id'] }}Label">{{ $album['album_name'] }}</h5>
            <button type="button" class="btn-close text-reset bg-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Play</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($albums as $album_audio)
                  @if ($album['id'] == $album_audio['id'])
                      <?php $album_songs = $album_audio->songs ?>
                  @endif
                @endforeach
                  @foreach ($album_songs as $song)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $song['name'] }}</td>
                    <td><iframe style="border-radius:12px" src="{{ $song['embed_spotify'] }}" width="100%" height="80" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endforeach

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#albumCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#albumCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
  @endsection

  @section('jsscript')
  <script>
    var myCarousel = document.getElementById('albumCarousel');
    var nAlbum = {{ $albums->count() }};

    myCarousel.addEventListener('slide.bs.carousel', function (ev) {
      var id = ev.relatedTarget.id;
      var element = document.getElementById("button"+(id));
      for (let i = 1; i <= nAlbum; i++) {
        if (id == i) console.log('this is slide ' + i);
        if (id == i) {
          element.classList.remove("d-none");
          for (let j = 1; j <= nAlbum; j++) {
            if (j!=i) {
              var el = document.getElementById("button"+j);
              el.classList.add("d-none");
            }
            
          }
        } 
      }
    })

    


    </script>
  @endsection

