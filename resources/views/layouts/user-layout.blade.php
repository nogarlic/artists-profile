
@if (str_contains($title, 'Post'))
    
@else
<div class="user-layout">
    <div class="header-layout">
    @if (isset($posts[0]->user->header_photo))
        <img src="{{ asset('storage/' . $posts[0]->user->header_photo) }}" alt="" height="200px" width="650px" class="image-fluid header-photo">
    @else
        <img src="{{ asset('storage/layout/header-blank.jpg') }}" alt="" height="200px" width="650px" class="image-fluid header-photo">
    @endif
    </div>
    <div class="profile-photo">
    @if (isset($posts[0]->user->photo_profile))
        <img src="{{ asset('storage/' . $posts[0]->user->photo_profile) }}" alt="" width="150px" height="150px" class="image-fluid rounded-circle shadow profile-photo">
    @else
        <img src="{{ asset('storage/layout/profil-blank.png') }}" alt="" width="150px" height="150px" class="image-fluid rounded-circle shadow profile-photo">
    @endif
    </div>
    <div class="row">
        <div class="col">
            <div class="bio">
                <h3>{{ $posts[0]->user->name }}</h3>
                <p>{{ '@'.$posts[0]->user->username }}</p>
                {!! $posts[0]->user->bio  !!}
            </div>
        </div>
        <div class="col profile-edit">
            @if ($posts[0]->user_id == Auth::user()->id)
                <a href="/user/{{ $posts[0]->user_id }}/edit"><button>Edit Profile</button></a>
            @endif
        </div>
    </div>

</div>
@endif

