@extends('frontend.layout.app')
@section('title', $page->name)
@section('content')
<div class="widthMain">
    <!-- About us -->
    <div class="mainTitle"><h2>{{ $page->name }}</h2></div>
    <div class="aboutUs" style="font-size: 14px;">
        {!! $page->content !!}
    </div>
</div>
@endsection