@extends('layouts.main')

@section('content')
    <picture class="img-wo">
        <source srcset="img/gate-wp-hp.jpg" media="(max-width: 415px)">
        <source srcset="img/gate-wp.jpg">
        <img src="img/gate-wp.jpg" alt="Group Photo of Wanna One" width="100%" height="auto">
    </picture>
@endsection