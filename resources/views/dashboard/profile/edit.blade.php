@extends('layouts.app')

@section('content')
<div class="container col-6">
    <div class="row justify-content-center other-posts">
        @extends('layouts.header')

        @if (str_contains($title, 'Post'))
    
        @else
        <form method="post" action="/user/{{ $user->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
        <div class="user-layout">
            <div class="helayout">
                <div class="mb-3">
                    <label for="header_photo" class="form-label @error('header_photo') is-invalid @enderror">Header Photo</label>
                    <input type="hidden" name="oldImage" value="{{ $user->header_photo }}">
                    @if ($user->header_photo )
                        <img src="{{ asset('storage/' . $user->header_photo ) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img src="http://project2.test:85/storage/layout/header-blank.jpg" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control" type="file" id="image" name="header_photo" onchange="previewImage()">
                    @error('header_photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="pfp">
                <div class="mb-3">
                    <label for="photo_profile" class="form-label @error('photo_profile') is-invalid @enderror">Photo Profile</label>
                    <input type="hidden" name="oldImage" value="{{ $user->photo_profile }}">
                    @if ($user->photo_profile )
                        <img src="{{ asset('storage/' . $user->photo_profile ) }}" alt="" class="img-preview-photo img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img src="{{ asset('storage/post-images/profil-null.png') }}" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control" type="file" id="image-photo" name="photo_profile" onchange="previewImageProfile()">
                    @error('photo_profile')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="bio">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" >
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" >
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Bio</label>
                        <div class="input-t">
                            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" value="" cols="10" rows="10">{{ old('bio', $user->bio) }}</textarea>
                        </div>
                            @error('bio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
            </div>
        </div>
        <div class="d-flex justify-content-end update-btn">
            <button type="submit" class="btn">Update Profile</button>
        </div>
    </form>
        @endif
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

function previewImageProfile() {
    const image = document.querySelector('#image-photo');
    const imgPreview = document.querySelector('.img-preview-photo');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection






