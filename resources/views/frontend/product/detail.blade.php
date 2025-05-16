@extends('frontend.layout.app')
@section('title', $product->name)
@section('content')
<div>
    <div class="swiper product-banner-swiper w-100">
        <div class="swiper-wrapper">
            @foreach ($product->banners as $banner)
                <div class="swiper-slide">
                    <div class="position-relative">
                        <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 21/9;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->name }}">
                        
                        {{-- <div id="TITLE360" style="z-index: 2">
                            <h3>{{ $banner->name }}</h3>
                        </div>
                        <div id="PARAGRAPH26" style="z-index: 2">
                            <p>{{ $banner->description }}</p>
                        </div> --}}
                    </div>
                    <div class="overlay d-flex align-items-center" style="border-radius: 0;">
                        <div class="text-white container">
                            <div style="font-size: clamp(20px, 4vw, 30px); font-weight: bold;">{{ $banner->name }}</div>
                            <div style="font-size: clamp(14px, 4vw, 20px);">{{ $banner->description }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<section class="mt-4 mb-4 section-description">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                {{-- <img src="{{ asset('images/default.jpg') }}" alt="" class="w-100 h-100" style="aspect-ratio: 4/3; object-fit: cover;"> --}}
                <iframe id="embed_iframe_box" src="{{ $product->link360 }}" scrolling="no" frameborder="0" allowvr="yes" allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay;" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" width="100%" height="100%" style="aspect-ratio: 4/3" ></iframe>
            </div>
            <div class="col-md-6 mb-3">
                <div class="title-welcome">Chào mừng đến với</div>
                <div class="title155">{{ $product->name }}</div>
                <div><i class=" far  fa-map-marker-alt" style="font-size: 18px; color: rgb(51, 51, 51); cursor: pointer;"></i> <b>Vị trí địa lý:</b></div>
                <div><b>- Địa chỉ:</b> {{ $product->address }}</div>
                <div><b>- Vị trí & Điểm tham quan gần:</b></div>
                <div class="ml-4">{!! $product->location !!}</div>
                <div><i class=" far  fa-user-headset" style="font-size: 18px; color: rgb(51, 51, 51); cursor: pointer;"></i> <b>Hotline:</b> {{ $product->hotline }}</div>
                <div><i class=" far  fa-at" style="font-size: 18px; color: rgb(51, 51, 51); cursor: pointer;"></i> <b>Email: </b> {{ $product->email }}</div>
                <div><i class=" far  fa-browser" style="font-size: 18px; color: rgb(51, 51, 51); cursor: pointer;"></i> <b>Website:</b> {{ $product->website }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! $product->content !!}
            </div>
            
        </div>
    </div>
</section>

@php
    $galleryImages = $product->images->where('active', 1)->take(5)->values(); // ->values() để có chỉ số tuần tự
@endphp

<section class="pt-4" style="background-color: rgb(227, 239, 249);">
    <div class="container">
        <div class="banner-grid-wrapper">
            <div class="row">
                @foreach ($galleryImages as $index => $img)
                    @php
                        $src = $img->image->ten ? asset('uploads/' . $img->image->ten) : asset('assets/frontend/images/image-lib.png');
                    @endphp

                    @if ($index === 0)
                        <div class="col-md-6 mb-4">
                            <div class="col-inner">
                                <div class="img position-relative">
                                    <a href="javascript:void(0);">
                                        <div class="img-inner dark">
                                            <img src="{{ $src }}" class="img-fluid gallery-img" data-index="{{ $index }}">
                                            <div class="gradient-overlay"></div>
                                            <div class="img-caption-text">Thư viện ảnh</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6">
                            <div class="row">
                                @foreach ($galleryImages->skip(1) as $i => $imgSmall)
                                    @php
                                        $srcSmall = $imgSmall->image->ten ? asset('uploads/' . $imgSmall->image->ten) : asset('assets/frontend/images/image-lib.png');
                                    @endphp
                                    <div class="col-6 mb-4">
                                        <div class="col-inner">
                                            <div class="img">
                                                <a href="javascript:void(0);">
                                                    <div class="img-inner dark">
                                                        <img src="{{ $srcSmall }}" class="img-fluid gallery-img" data-index="{{ $i }}">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="promotion_section">
    <div class="container pt-5">
        <div class="title-blue mb-3">CÁC ƯU ĐÃI KHÁC</div>
        
        <div class="row">
            @foreach ($product->promotionsThuong->where('active', 1)->take(6) as $promotion)
                @php
                    $startDate = \Carbon\Carbon::parse($promotion->start_date);
                    $endDate = $startDate->copy()->addDays($promotion->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="resort-card">
                        <div class="resort-image" style="background-image: url({{ $promotion->image ? asset('uploads/'.$promotion->image->ten) : asset('images/default.jpg') }});"></div>
                        <div class="resort-details">
                            <div class="resort-name">{{ $promotion->name }}</div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $promotion->description }}
                                </div>
                            </div>
                            <div class="countdown-container" 
                                data-target="{{ $targetDate->toIso8601String() }}" 
                                data-mode="{{ $isComing ? 'coming' : 'expiring' }}">
                                <div class="mr-2 mt-1">{{ $isComing ? 'Có sau:' : 'Hết hạn:' }}</div>
                                
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Ngày</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giờ</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Phút</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giây</div></div>
                            </div>
                            <button class="btn-get-offer" onclick="openPopup()">Nhận ưu đãi</button>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        
        <a class="btn-view-more" href="{{ route('frontend.product.promotions') }}">Xem thêm về các ưu đãi</a>
    </div>
</section>

<section class="promotion_section mt-5">
    <div class="container">
        <div class="title-blue mb-3">ƯU ĐÃI HẠNG PHÒNG</div>
        
        <div class="row">
            @foreach ($product->promotionsPhong->where('active', 1)->take(6) as $promotion)
                @php
                    $startDate = \Carbon\Carbon::parse($promotion->start_date);
                    $endDate = $startDate->copy()->addDays($promotion->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="resort-card">
                        <div class="resort-image">
                            @if ($promotion->link360)
                                <iframe id="embed_iframe_box" src="{{ $promotion->link360 }}" scrolling="no" frameborder="0" allowvr="yes" allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay;" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" style="width: 100%; height: 100%;"></iframe>
                            @else
                                <img class="w-100 h-100" style="object-fit: cover" src="{{ $promotion->image ? asset('uploads/'.$promotion->image->ten) : asset('images/default.jpg') }}" alt="{{ $promotion->ten }}">
                            @endif
                        </div>
                        <div class="resort-details">
                            <div class="resort-name">{{ $promotion->name }}</div>
                            <div class="room-price">{{ $promotion->price ? number_format($promotion->price, 0, ',', '.') . ' VNĐ/đêm' : '' }} </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {!! $promotion->description !!}
                                </div>
                            </div>
                            <div class="room-price" style="color: green; font-size: 14px;">{{ $promotion->tagline }} </div>

                            
                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn-get-offer" style="width: fit-content;"  onclick="{{ $isComing ? '' : 'openPopup()' }}">{{ $isComing ? 'Sắp có sau' : 'Nhận ưu đãi' }}</button>
                                <div class="countdown-container"  
                                    data-target="{{ $targetDate->toIso8601String() }}" 
                                    data-mode="{{ $isComing ? 'coming' : 'expiring' }}" style="margin: 0;">                                    
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Ngày</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giờ</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Phút</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giây</div></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <a class="btn-view-more" href="{{ route('frontend.product.promotions') }}">Xem thêm về các ưu đãi</a>
    </div>
</section>

<section class="w-100">
    <iframe
        src="{{ $product->map }}"
        width="100%"
        style="border:0; aspect-ratio: 23/9;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>

</section>

<div id="customGalleryModal" class="custom-modal">
    <div class="custom-modal-content">
        <button class="custom-modal-close" id="closeGalleryModal">&times;</button>

        <div class="position-relative w-100 h-100">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($product->images->where('active', 1)->values() as $img)
                        <div class="swiper-slide text-center">
                            <img src="{{ $img->image->ten ? asset('uploads/' . $img->image->ten) : asset('assets/frontend/images/image-lib.png') }}"
                                class="img-fluid"
                                style="max-height: 80vh; object-fit: contain;"
                                alt="Gallery Image">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        
    </div>
</div>


@endsection
@section('styles')
<link rel="stylesheet" href="{{ auto_version('assets/frontend/css/chitiet.css') }}">
<style>
    
</style>
@endsection
@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper;
        const modal = document.getElementById('customGalleryModal');
        const closeBtn = document.getElementById('closeGalleryModal');

        document.querySelectorAll('.gallery-img').forEach(function (img) {
            img.addEventListener('click', function () {
                const index = parseInt(this.dataset.index) || 0;
                modal.classList.add('show');

                setTimeout(() => {
                    if (!swiper) {
                        swiper = new Swiper('.mySwiper', {
                            loop: true,
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                        });
                    }
                    swiper.slideToLoop(index);
                }, 200);
            });
        });

        closeBtn.addEventListener('click', function () {
            modal.classList.remove('show');
            if (swiper) swiper.slideToLoop(0);
        });

        const productBannerSwiper = new Swiper('.product-banner-swiper', {
            effect: 'fade',
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: false,
            navigation: false,
        });
    });
</script>


@endsection