@extends('layouts.app')

@section('content')
<div class="container col-6">
    <div class="row justify-content-center other-posts">
        @extends('layouts.header')

            <div class="post">
                <div class="post-single row">
                    <div class="col-2">
                        @if ($post->user->photo_profile )
                            <img src="{{ asset('storage/' . $post->user->photo_profile ) }}" alt="" width="80px" height="80px" class="img-preview image-fluid rounded-circle photo-home">
                        @else
                            <img src="{{ asset('storage/post-images/profil-null.png') }}" alt="" width="80px" height="80px" class="img-preview image-fluid rounded-circle photo-home">
                        @endif
                    </div>
                    <div class="col-10">
                        <a href="/{{ $post->user->username }}"><p><strong>{{ $post->user->name }}</strong>  <span>{{ '@'.$post->user->username }}</span></a> . {{ $post->created_at->diffForHumans() }}</p>
                        <form method="post" action="/posts/{{ $post->id }}" class="mb-5" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3 body-post">
                              <div class="input-text">
                                <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" value="" cols="10" rows="10">{{ old('body', $post->body) }}</textarea>
                            </div>
                                @error('body')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                            @if (isset($post->image))
                            <div class="mb-3">
                                <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>
                                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @else
                
                            @endif
                
                            <div class="d-flex justify-content-end update-btn">
                                <button type="submit" class="btn">Update Post</button>
                            </div>
                          </form>
                        <br>
                    </div>
                </div>
        </div>
    </div>
</div>
    </div>
</div>

<script>
        function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection