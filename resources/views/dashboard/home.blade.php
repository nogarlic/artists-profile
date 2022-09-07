@extends('layouts.app')

@section('content')
<div class="container col-6">
    <div class="row justify-content-center other-posts">
        @extends('layouts.header')

        @if ($title != 'Home')
            @include('layouts.user-layout')
        @else
        <form method="post" action="/posts" enctype="multipart/form-data">
            @csrf
            <div class="new-post">
                <div class="row">
                    <div class="d-flex justify-content-start col">
                    @if (isset(Auth::user()->photo_profile))
                        <a href="/{{ Auth::user()->username }}"><img src="{{ asset('storage/' . Auth::user()->photo_profile) }}" alt="" width="60px" height="60px" class="image-fluid rounded-circle photo-home"></a>        
                    @else
                        <a href="/{{ Auth::user()->username }}"><img src="{{ asset('storage/post-images/profil-null.png') }}" alt="" width="60px" height="60px" class="image-fluid rounded-circle photo-home"></a>      
                    @endif
                    </div>
                    <div class="col-10">
                        <div class="mb-3">
                            <input type="text" class="form-control @error('body') is-invalid @enderror form-new-post" id="body" name="body" value="{{ old('body') }}" placeholder="Make new post....">
                            @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3 mr-3">
                            <textarea class="form-control form-new-post" id="exampleFormControlTextarea1" rows="3" placeholder="Make new post"></textarea>
                        </div> --}}
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="mb-3">
                        <input type="file" id="image" name="image" class="hidden custom-file-input"/>
                        <label for="image"><i class="bi bi-card-image img-in"></i></label>
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end create-btn">
                    <button type="submit" class="d-flex justify-content-end">Create Post</button>
                </div>
            </div>
        </form>
        @endif

            <div class="post">
            @foreach ($posts as $post)
                <div class="post-single row">
                    <div class="col-2">
                        @if (isset($post->user->photo_profile))
                            <a href="/{{ $post->user->username }}"><img src="{{ asset('storage/' . $post->user->photo_profile) }}" alt="" width="60px" height="60px" class="image-fluid rounded-circle photo-home"></a>        
                        @else
                            <a href="/{{ $post->user->username }}"><img src="{{ asset('storage/post-images/profil-null.png') }}" alt="" width="60px" height="60px" class="image-fluid rounded-circle photo-home"></a>      
                        @endif
                    </div>
                    <div class="col-10">
                        <a href="/{{ $post->user->username }}"><p><strong>{{ $post->user->name }}</strong>  <span>{{ '@'.$post->user->username }}</span></a> . {{ $post->created_at->diffForHumans() }}</p>
                            <a href="/{{ $post->user->username }}/posts/{{ $post->id }}">{!! $post->body !!}</a>
                        <br>
                        @if (isset($post->image))
                            <div class="image-post">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="" srcset="" width="480px">
                            </div>
                        @endif
                        <div class="vote row" id="vote{{ $post->id }}">
                            <p class="col d-flex justify-content-end" data-postid="{{ $post->id }}">
                                <?php 
                                    $hasLike = false;
                                    foreach (Auth::user()->likes as $liked) {
                                        if ($liked->post_id == $post->id && $liked->like == 1) $hasLike = true;
                                    } 
                                    $hasDislike = false;
                                    foreach (Auth::user()->likes as $liked) {
                                        if ($liked->post_id == $post->id && $liked->like == 0) $hasDislike = true;
                                    }

                                    $like = 0;
                                    $dislike = 0;
                                    foreach ($post->likes as $postLike) {
                                        if ($postLike->like == 1) $like++;
                                        else if ($postLike->like == 0) $dislike++;
                                    }
                                ?>
                                <a  href="" class="like"><span>{{ $like }} </span> <i class="bi {{ $hasLike ? 'bi-hand-thumbs-up-fill' : 'bi-hand-thumbs-up' }} vote-s" onclick="likeButton()"></i></a>
                                <a href="" class="like"><i class="bi {{ $hasDislike ? 'bi-hand-thumbs-down-fill' : 'bi-hand-thumbs-down' }} vote-s" onclick="likeButton()"></i></a> <span>{{ $dislike }}</span> 
                            </p>
                            <div class="btn-group dropup col-1">
                                @if ($post->user_id == Auth::user()->id)
                                <button type="button" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                    ...
                                </button>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="/posts/{{ $post->id }}/edit">Edit</a></li>
                                      <form action="/posts/{{ $post->id }}" method="post" class="d-inline">
                                          @method('delete')
                                          @csrf
                                        <button class="border-0 dropdown-item" onclick="return confirm('Are you sure?')">Delete</button>
                                      </form>
                                  </ul>
                                @endif
                              </div>
                              
                        </div>
                    </div>
                </div>
            @endforeach
            @if ($title == 'Home')
            <div class="d-flex justify-content-center photo-pagination">
                {{ $posts->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    var token = '{{ Session::token() }}';

    $('.like').on('click', function(event) {
        event.preventDefault();
        console.log(event.target); // <i>
        postId = event.target.parentNode.parentNode.dataset['postid'];
        console.log(postId);
        
        var isLike = event.currentTarget.previousElementSibling == null;
        console.log(isLike);
        $.ajax({
            method: 'POST',
            url: '/like',
            data: {isLike: isLike, postId: postId, _token: token}
        })
            .done(function() {
        //         event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
        //         if (isLike) {
        //             event.target.nextElementSibling.innerText = 'Dislike';
        //         } else {
        //             event.target.previousElementSibling.innerText = 'Like';
        //         }
            });
    });
//perlu penambhana setiap unyu
    function likeButton() {
        postId = event.target.parentNode.parentNode.dataset['postid'];
        $('#vote'+postId).load(" #vote"+postId);
    }

</script>

@endsection
