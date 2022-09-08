@extends('layouts.main')

@section('container')
    <div class="container">
        <form action="/gallery">
            @if (request('member'))
                <input type="hidden" name="member" value="{{ request('member') }}">
            @endif
        </form>
        <div class="ot11">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Multimedia ' ? 'active' : '' }}" aria-current="page" href="/gallery">WANNA ONE</a>
                </li>
                @foreach ($members as $member)
                <li class="nav-item {{ str_contains($title, $member['name']) ? 'active' : '' }}">
                    <a class="nav-link" href="/gallery?member={{ $member['name'] }}">{{ $member['name'] }}</a>
                </li>
                @endforeach
              </ul>
        </div>
        <div class="name d-flex justify-content-center">
            @if (request('member'))
                <h1>{{ request('member') }} GALLERY</h1>
            @else
                <h1>WANNA ONE GALLERY</h1>
            @endif
        </div>
        <div class="photo-member">
            <div class="row">
            @foreach ($photos as $photo)
                <div class="col-sm-4 d-flex justify-content-center">
                    <img src="img/photo/{{ $photo['picture'] }}" class="photo">
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center photo-pagination">
        {{ $photos->links() }}
    </div>

@endsection