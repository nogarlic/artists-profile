@extends('layouts.app')

@section('content')
<div class="container col-6">
    <div class="row justify-content-center other-posts">
        @extends('layouts.header')

            <div class="post">
                <div class="post-single row">
                    <div class="col-2">
                        @if (isset($post->user->photo_profile))
                            <a href="/{{ $post->user->username }}"><img src="{{ asset('storage/' . $post->user->photo_profile) }}" alt="" width="60px" height="60px" class="image-fluid rounded-circle photo-home"></a>        
                        @else
                            <a href="/{{ $post->user->username }}"><img src="{{ asset('storage/post-images/profil-null.png') }}" alt="" width="60px" height="60px" class="image-fluid rounded-circle photo-home"></a>      
                        @endif
                    </div>
                    <div class="col-10">
                        <a href="/{{ $post->user->username }}"><p><strong>{{ $post->user->name }}</strong> <br> <span>{{ '@'.$post->user->username }}</span></a> . {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="body">
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


                    <a onclick="reply()" class="reply-button"> <i class="bi bi-reply"></i> Reply</a>
                    <div class="reply-box" id="reply-box">
                        <div class="row">
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
                    </div>
                </div>
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

    function reply() {
        var x = document.getElementById("reply-box");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
@endsection
