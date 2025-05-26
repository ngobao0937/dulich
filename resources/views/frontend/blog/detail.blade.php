@extends('frontend.layout.app')
@section('title', $blog->name)
@section('content')
<div class="swiper bannerSwiper sp_container" style="width: 100%;">
    <div class="swiper-wrapper">
        @foreach ($banners as $banner)
            <div class="swiper-slide position-relative">
                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 21/5;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->ten }}">
            </div>
            <div class="overlay" style="border-radius: 0"></div>
        @endforeach
    </div>
</div>

<div class="w-100" style="background: rgba(28, 77, 114, 0.1);">
    <div class="container pb-4 pt-4">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="d-flex justify-content-between">
                    <div class="text-normal"><i class="fas fa-calendar-alt"></i> Ngày đăng: {{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</div>
                    <div class="text-normal">{{ $blog->view }} <i class="fas fa-eye"></i></div>
                </div>
                <div class="title-blue mb-2 mt-2 text-left">{{ $blog->name }}</div>
                <div class="text-normal">
                    {!! $blog->content !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="title-blue mb-2" style="font-size: clamp(17px, 4vw, 20px);">BÀI VIẾT KHÁC</div>
                @foreach ($blogs as $blog)
                    <div class="w-100 mb-3">
                        <a href="{{ route('frontend.blog.detail', ['id'=>$blog->id, 'slug'=>$blog->slug]) }}" style="all: unset; cursor: pointer;">
                            <div class="w-100 text-center d-flex flex-column h-100" style="background: white; border-radius: 10px; padding: 5px">
                                <img class="w-100 mb-3" style="aspect-ratio: 5/3; object-fit: cover; border-radius: 10px" src="{{ $blog->image ? asset('uploads/'.$blog->image->ten) : asset('assets/frontend/images/blog.jpg') }}" alt="h1">
                            
                                <div class="title-blue mb-2" style="font-size: 18px;">{{ $blog->name }}</div>
                                
                                <div class="text-normal text-left flex-grow-1 line-clamp-3" style="padding: 0 10px; font-size: 16px;">
                                    {{ $blog->description }}
                                </div>
                                
                                <div class="d-flex justify-content-center mt-3 mb-3"> 
                                    <div style="border-bottom: 5px solid #38b19e; width: 50%; border-radius: 10px"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
@section('styles')

@endsection
@section('script')
<script>
    const bannerSwiper = new Swiper('.bannerSwiper', {
        effect: 'fade',
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: false,
        navigation: false,
    });
</script>
@endsection