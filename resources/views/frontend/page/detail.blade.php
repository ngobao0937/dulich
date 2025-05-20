@extends('frontend.layout.app')
@section('title', 'Du lịch')
@section('content')
<div class="swiper bannerSwiper sp_container" style="width: 100%;">
    <div class="swiper-wrapper">
        @foreach ($banners as $banner)
            <div class="swiper-slide position-relative">
                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 21/5;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->ten }}">

                <div class="overlay" style="border-radius: 0">
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container pb-3 pt-4">
    <h2 class="text-center" style="font-weight: bold; color: rgb(28, 77, 114)">{{ $page->name }}</h2>
    <div class="mt-3">
        {!! $page->content !!}
    </div>
</div>
@endsection
@section('styles')

@endsection
@section('script')

@endsection