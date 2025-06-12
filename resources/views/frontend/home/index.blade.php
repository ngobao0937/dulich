@extends('frontend.layout.app')
@section('title', 'Sở du lịch - Trang chủ')
@section('content')

{{-- <section>
    <div class="swiper bannerSwiper" style="width: 100%; height: 100vh; overflow: hidden;">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide position-relative">
                    <img class="w-100 h-100" style="object-fit: cover;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->name }}">
                    <div class="overlay" style="border-radius: 0"></div>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}

<section class="d-none d-md-block banner-desktop">
    <div class="swiper bannerSwiper" style="width: 100%; height: 100vh; overflow: hidden;">
        <div class="swiper-wrapper">
            @foreach ($desktopBanners as $banner)
                <div class="swiper-slide position-relative">
                    <img class="w-100 h-100" style="object-fit: cover;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->name }}">
                    <div class="overlay" style="border-radius: 0"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="d-block d-md-none banner-mobile">
    <div class="swiper bannerSwiper" style="width: 100%; height: 100vh; overflow: hidden;">
        <div class="swiper-wrapper">
            @foreach ($mobileBanners as $banner)
                <div class="swiper-slide position-relative">
                    <img class="w-100 h-100" style="object-fit: cover;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->name }}">
                    <div class="overlay" style="border-radius: 0"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="nextSection" style="width: 100%;background-image: url('{{ asset('assets/frontend/images/bg-home-1.png') }}');background-repeat: no-repeat;background-position: bottom center;background-size: 100% auto;">
    <div class="container pb-5 pt-5" >
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $other3[7]->image ? asset('uploads/'.$other3[7]->image->ten) : asset('assets/frontend/images/bariavungtau-h1.jpg') }}" alt="home1" class="w-100 h-100" style="object-fit: cover; border-radius: 10px;">
            </div>
            <div class="col-md-6">
                <div class="pt-3 pb-3">
                    <div class="title1">TRẢI NGHIỆM VŨNG TÀU TRỌN VẸN</div>
                    <div class="title2 mb-4">ĐỪNG BỎ LỠ!</div>
                    
                    <div class="text-s1 mb-2"><i class="far fa-hand-point-right"></i> Gợi ý <b><i>điểm đến đẹp, quán ăn "xịn"</i></b>, nơi <b><i>lưu trú sang trọng</i></b></div>
                    <div class="pl-2 mb-2">
                        <div class="pl-3 text-des-s1 text-justify" style="border-left: 2px solid #38b19e">
                            Bà Rịa - Vũng Tàu không chỉ nổi tiếng với bãi biển tuyệt đẹp mà còn là thiên đường ẩm thực với những quán ăn "xịn" chuẩn vị biển. Du khách có thể lựa chọn nghỉ dưỡng tại các resort sang trọng ven biển, tận hưởng không gian yên bình và dịch vụ đẳng cấp.
                        </div>
                    </div>
                    
                    <div class="text-s1 mb-2"><i class="far fa-hand-point-right"></i> Không bỏ lỡ <b><i>ưu đãi độc quyền</i></b> từ Sở Du lịch & đối tác</div>
                    <div class="pl-2 mb-2">
                        <div class="pl-3 text-des-s1 text-justify" style="border-left: 2px solid #38b19e">
                            Đừng bỏ lỡ những ưu đãi độc quyền hấp dẫn từ Sở Du lịch Bà Rịa - Vũng Tàu và các đối tác uy tín! Hàng loạt voucher nghỉ dưỡng, ẩm thực và trải nghiệm du lịch đang chờ bạn khám phá, giúp chuyến đi thêm phần trọn vẹn mà vẫn tiết kiệm chi phí.
                        </div>
                    </div>

                    <div class="text-s1 mb-2"><i class="far fa-hand-point-right"></i> Vũng Tàu chờ bạn khám phá theo cách riêng của mình</div>
                    <div class="pl-2 mb-5">
                        <div class="pl-3 text-des-s1 text-justify" style="border-left: 2px solid #38b19e">
                            Nhiều chương trình khuyến mãi hấp dẫn, combo nghỉ dưỡng – ẩm thực – vui chơi đang được triển khai, mang đến cho du khách trải nghiệm trọn vẹn tại Bà Rịa – Vũng Tàu với chi phí cực kỳ ưu đãi.
                        </div>
                    </div>

                    <div class="w-100 d-flex justify-content-center">
                        <button class="btn-1" onclick="openFormRegister(0)"><span>ĐĂNG KÝ NHẬN ƯU ĐÃI NGAY!</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div style="background: rgba(112, 113, 113, 0.1); width: 100%;">
    <div class="container pb-5 pt-5">
        <div class="title-gray mb-4">TẠI SAO NÊN CHỌN CHÚNG TÔI?</div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="flip-box">
                    <div class="flip-inner">
                        <div class="flip-front" style="background-image: url('{{ $other3[8]->image ? asset('uploads/'.$other3[8]->image->ten) : asset('assets/frontend/images/h1.png') }}');">
                            <div class="special-overlay w-100 h-100 d-flex align-items-center justify-content-center"><span style="font-size: clamp(1.5rem, 2vw, 2rem)">Ở ĐÂU</span></div>
                        </div>
                        <div class="flip-back" style="background-image: url('{{ $other3[8]->image ? asset('uploads/'.$other3[8]->image->ten) : asset('assets/frontend/images/h1.png') }}');">
                            <div class="special-overlay"></div>
                            <div class="w-100 position-absolute p-3" style="bottom: 0; background: #38b19e; color: white">
                                Khám phá các khách sạn với ưu đãi độc quyền, từ resort sang trọng đến homestay ấm cúng.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-6">
                        <div class="flip-box">
                            <div class="flip-inner">
                                <div class="flip-front" style="background-image: url('{{ $other3[9]->image ? asset('uploads/'.$other3[9]->image->ten) : asset('assets/frontend/images/h2.png') }}');">
                                    <div class="special-overlay w-100 h-100 d-flex align-items-center justify-content-center"><span style="font-size: clamp(1.5rem, 2vw, 2rem)">ĂN GÌ?</span></div>
                                </div>
                                <div class="flip-back" style="background-image: url('{{ $other3[9]->image ? asset('uploads/'.$other3[9]->image->ten) : asset('assets/frontend/images/h2.png') }}');">
                                    <div class="special-overlay"></div>
                                    <div class="w-100 position-absolute p-3" style="bottom: 0; background: #38b19e; color: white">
                                        Thưởng thức ẩm thực địa phương và quốc tế với các chương trình giảm giá hấp dẫn.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="flip-box">
                            <div class="flip-inner">
                                <div class="flip-front" style="background-image: url('{{ $other3[10]->image ? asset('uploads/'.$other3[10]->image->ten) : asset('assets/frontend/images/h3.png') }}');">
                                    <div class="special-overlay w-100 h-100 d-flex align-items-center justify-content-center"><span style="font-size: clamp(1.5rem, 2vw, 2rem)">CHƠI GÌ?</span></div>
                                </div>
                                <div class="flip-back" style="background-image: url('{{ $other3[10]->image ? asset('uploads/'.$other3[10]->image->ten) : asset('assets/frontend/images/h3.png') }}');">
                                    <div class="special-overlay"></div>
                                    <div class="w-100 position-absolute p-3" style="bottom: 0; background: #38b19e; color: white">
                                        Trải nghiệm các hoạt động giải trí, từ bãi biển đến công viên với vé ưu đãi.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pt-5 pb-5">
    <div class="title-blue">CÁC SỰ KIỆN NỔI BẬT</div>
    <div class="d-flex justify-content-center mt-4 mb-5"><div style="border-bottom: 2px solid rgb(255, 136, 0); width: 30%;"></div></div>
    <div class="row">
        <div class="col-lg-9 mb-3">
            <div class="w-100 h-100">
                <img class="w-100 h-100" style="border-radius: 10px; object-fit: cover;" src="{{ $other3[11]->image ? asset('uploads/'.$other3[11]->image->ten) : asset('assets/frontend/images/h4.jpg') }}" alt="h4">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="row">
                <div class="col-lg-12 col-6 pb-3">
                    <div class="position-relative w-100">
                        <img class="w-100" style="border-radius: 10px; object-fit: cover; aspect-ratio: 1/1;" src="{{ $other3[12]->image ? asset('uploads/'.$other3[12]->image->ten) : asset('assets/frontend/images/h5.jpg') }}" alt="h5">
                        <div class="overlay d-flex align-items-center justify-content-center" style="padding-left: 10px; padding-right: 10px; background-color: rgba(0, 0, 0, 0.4);">
                            <div class="text-center">
                                <div class="des-event mb-2">Các sự kiện đang diễn ra</div>
                                <div class="w-100 d-flex justify-content-center">
                                    <a href="{{ route('frontend.home.event') }}" class="btn-more-event"><span>Tìm hiểu thêm</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-6 pb-3">
                    <div class="position-relative w-100">
                        <img class="w-100" style="border-radius: 10px; object-fit: cover; aspect-ratio: 1/1;" src="{{ $other3[13]->image ? asset('uploads/'.$other3[13]->image->ten) : asset('assets/frontend/images/h5.jpg') }}" alt="h5">
                        <div class="overlay d-flex align-items-center justify-content-center" style="padding-left: 10px; padding-right: 10px; background-color: rgba(0, 0, 0, 0.4);">
                            <div class="text-center">
                                <div class="des-event mb-2">Các sự kiện đang diễn ra</div>
                                <div class="w-100 d-flex justify-content-center">
                                    <a href="{{ route('frontend.home.event') }}" class="btn-more-event"><span>Tìm hiểu thêm</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<div class="w-100" style="background: rgba(112, 113, 113, 0.1)">
    <div class="container pb-4 pt-5 position-relative" >
        <div class="timeline-line d-none d-md-block"></div>
        <div class="title-gray mb-4">3 BƯỚC ĐƠN GIẢN ĐỂ NHẬN ƯU ĐÃI</div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="step-wrapper">
                    <div class="step-wrapper">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="d-flex justify-content-center image-circle">
                                <svg style="width: 30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center w-100">
                            <div class="w-75 text-center p-4 step-box">
                                <div class="mb-2 step-title">Đăng ký</div>
                                <div class="step-desc">Tạo tài khoản để nhận thông tin ưu đãi và sự kiện.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="step-wrapper">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="d-flex justify-content-center image-circle" style="background: white;">
                            <svg style="width: 30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        <div class="w-75 text-center p-4 step-box">
                            <div class="mb-2 step-title">Xác nhận</div>
                            <div class="step-desc">Liên hệ cơ sở để sử dụng ưu đãi hoặc khuyến mãi.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="step-wrapper">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="d-flex justify-content-center image-circle" style="background: white;">
                            <svg style="width: 30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm177.6 62.1C192.8 334.5 218.8 352 256 352s63.2-17.5 78.4-33.9c9-9.7 24.2-10.4 33.9-1.4s10.4 24.2 1.4 33.9c-22 23.8-60 49.4-113.6 49.4s-91.7-25.5-113.6-49.4c-9-9.7-8.4-24.9 1.4-33.9s24.9-8.4 33.9 1.4zm40-89.3s0 0 0 0c0 0 0 0 0 0l-.2-.2c-.2-.2-.4-.5-.7-.9c-.6-.8-1.6-2-2.8-3.4c-2.5-2.8-6-6.6-10.2-10.3c-8.8-7.8-18.8-14-27.7-14s-18.9 6.2-27.7 14c-4.2 3.7-7.7 7.5-10.2 10.3c-1.2 1.4-2.2 2.6-2.8 3.4c-.3 .4-.6 .7-.7 .9l-.2 .2c0 0 0 0 0 0c0 0 0 0 0 0s0 0 0 0c-2.1 2.8-5.7 3.9-8.9 2.8s-5.5-4.1-5.5-7.6c0-17.9 6.7-35.6 16.6-48.8c9.8-13 23.9-23.2 39.4-23.2s29.6 10.2 39.4 23.2c9.9 13.2 16.6 30.9 16.6 48.8c0 3.4-2.2 6.5-5.5 7.6s-6.9 0-8.9-2.8c0 0 0 0 0 0s0 0 0 0zm160 0c0 0 0 0 0 0l-.2-.2c-.2-.2-.4-.5-.7-.9c-.6-.8-1.6-2-2.8-3.4c-2.5-2.8-6-6.6-10.2-10.3c-8.8-7.8-18.8-14-27.7-14s-18.9 6.2-27.7 14c-4.2 3.7-7.7 7.5-10.2 10.3c-1.2 1.4-2.2 2.6-2.8 3.4c-.3 .4-.6 .7-.7 .9l-.2 .2c0 0 0 0 0 0c0 0 0 0 0 0s0 0 0 0c-2.1 2.8-5.7 3.9-8.9 2.8s-5.5-4.1-5.5-7.6c0-17.9 6.7-35.6 16.6-48.8c9.8-13 23.9-23.2 39.4-23.2s29.6 10.2 39.4 23.2c9.9 13.2 16.6 30.9 16.6 48.8c0 3.4-2.2 6.5-5.5 7.6s-6.9 0-8.9-2.8c0 0 0 0 0 0s0 0 0 0s0 0 0 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        <div class="w-75 text-center p-4 step-box">
                            <div class="mb-2 step-title">Tận hưởng</div>
                            <div class="step-desc">Thoả sức khám phá Bà Rịa - Vũng Tàu với chi phí tiết kiệm!</div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<section class="w-100" class="promotion_section">
    <div class="container pt-5">
        <h1 class="title-blue mb-3">ƯU ĐÃI KHÁCH SẠN</h1>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="special-offer-card" style="background-image: url({{ $other3[14]->image ? asset('uploads/'.$other3[14]->image->ten) : asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi khách sạn!</div>
                        <a class="btn-view-offer" href="{{ route('frontend.product.promotions') }}">Khám phá ngay</a>
                    </div>
                </div>
            </div>
            
            @foreach ($promotions_KS as $promotion_p)
                @php
                    $startDate = \Carbon\Carbon::parse($promotion_p->promotion->start_date);
                    $endDate = $startDate->copy()->addDays($promotion_p->promotion->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="resort-card d-flex flex-column h-100 w-100">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 1/1;" src="{{ $promotion_p->promotion->image ? asset('uploads/'.$promotion_p->promotion->image->ten) : asset('images/default.jpg') }}" alt="{{ $promotion_p->name }}">
                            </a>
                        </div>
                        <div class="resort-details d-flex flex-column flex-grow-1">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}">{{ $promotion_p->promotion->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $promotion_p->promotion->description }}
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="countdown-container" 
                                    data-target="{{ $targetDate->toIso8601String() }}" 
                                    data-mode="{{ $isComing ? 'coming' : 'expiring' }}">
                                    <div class="mr-2 mt-1">{{ $isComing ? 'Có sau:' : 'Hết hạn:' }}</div>
                                    
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Ngày</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giờ</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Phút</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giây</div></div>
                                </div>
                                <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}">Nhận ưu đãi</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        
        <a class="btn-view-more" href="{{ route('frontend.product.promotions') }}">Xem thêm về các ưu đãi</a>
    </div>
</section>

<section class="w-100" class="promotion_section mt-5">
    <div class="container pt-5">
        <h1 class="title-blue mb-3">ƯU ĐÃI NHÀ HÀNG ẨM THỰC</h1>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="special-offer-card" style="background-image: url({{ $other3[15]->image ? asset('uploads/'.$other3[15]->image->ten) : asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi nhà hàng ẩm thực!</div>
                        <a class="btn-view-offer" href="{{ route('frontend.product.promotions') }}">Khám phá ngay</a>
                    </div>
                </div>
            </div>
            
            @foreach ($promotions_NH as $promotion_p)
                @php
                    $startDate = \Carbon\Carbon::parse($promotion_p->promotion->start_date);
                    $endDate = $startDate->copy()->addDays($promotion_p->promotion->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="resort-card d-flex flex-column h-100 w-100">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 1/1;" src="{{ $promotion_p->promotion->image ? asset('uploads/'.$promotion_p->promotion->image->ten) : asset('images/default.jpg') }}" alt="{{ $promotion_p->name }}">
                            </a>
                        </div>
                        <div class="resort-details d-flex flex-column flex-grow-1">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}">{{ $promotion_p->promotion->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $promotion_p->promotion->description }}
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="countdown-container" 
                                    data-target="{{ $targetDate->toIso8601String() }}" 
                                    data-mode="{{ $isComing ? 'coming' : 'expiring' }}">
                                    <div class="mr-2 mt-1">{{ $isComing ? 'Có sau:' : 'Hết hạn:' }}</div>
                                    
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Ngày</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giờ</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Phút</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giây</div></div>
                                </div>
                                <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}">Nhận ưu đãi</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        
        <a class="btn-view-more" href="{{ route('frontend.product.promotions') }}">Xem thêm về các ưu đãi</a>
    </div>
</section>

<section class="w-100" class="promotion_section mt-5">
    <div class="container pt-5">
        <h1 class="title-blue mb-3">ƯU ĐÃI VUI CHƠI GIẢI TRÍ</h1>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="special-offer-card" style="background-image: url({{ $other3[16]->image ? asset('uploads/'.$other3[16]->image->ten) : asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi vui chơi giải trí!</div>
                        <a class="btn-view-offer" href="{{ route('frontend.product.promotions') }}">Khám phá ngay</a>
                    </div>
                </div>
            </div>
            
            @foreach ($promotions_KVC as $promotion_p)
                @php
                    $startDate = \Carbon\Carbon::parse($promotion_p->promotion->start_date);
                    $endDate = $startDate->copy()->addDays($promotion_p->promotion->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="resort-card d-flex flex-column h-100 w-100">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 1/1;" src="{{ $promotion_p->promotion->image ? asset('uploads/'.$promotion_p->promotion->image->ten) : asset('images/default.jpg') }}" alt="{{ $promotion_p->name }}">
                            </a>
                        </div>
                        <div class="resort-details d-flex flex-column flex-grow-1">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}">{{ $promotion_p->promotion->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $promotion_p->promotion->description }}
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="countdown-container" 
                                    data-target="{{ $targetDate->toIso8601String() }}" 
                                    data-mode="{{ $isComing ? 'coming' : 'expiring' }}">
                                    <div class="mr-2 mt-1">{{ $isComing ? 'Có sau:' : 'Hết hạn:' }}</div>
                                    
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Ngày</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giờ</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Phút</div></div>
                                    <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giây</div></div>
                                </div>
                                <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$promotion_p->promotion->product->id, 'slug'=>$promotion_p->promotion->product->slug]) }}">Nhận ưu đãi</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        
        <a class="btn-view-more" href="{{ route('frontend.product.promotions') }}">Xem thêm về các ưu đãi</a>
    </div>
</section>

<div style="background: rgba(112, 113, 113, 0.1); width: 100%;">
    <div class="container pb-4 pt-5" >
        <div class="text-center">
            <div class="title-mint mb-4">HỖ TRỢ DU LỊCH</div>
            @foreach ($other1->chunk(4) as $group4)
                <div class="row">
                    @foreach ($group4->chunk(2) as $pair2)
                        <div class="col-md-6 mb-4">
                            <div class="row">
                                @foreach ($pair2 as $item)
                                    <div class="col-6">
                                        <div class="w-100 text-center">
                                            <img style="width: 80px; height: 80px; object-fit: contain" src="{{ $item->image ? asset('uploads/'.$item->image->ten) : asset('assets/frontend/images/virtual-reality.png') }}" alt="{{ $item->name }}">
                                            <div class="title-black mt-2 mb-1">{{ $item->name }}</div>
                                            <div class="text-normal mb-1">{{ $item->description }}</div>
                                            <a class="title-blue-m" style="font-size: 16px;" href="{{ $item->link ? $item->link : '#' }}" target="_blank">Xem bản đồ</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            {{-- <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="w-100 text-center">
                                <img style="width: 80px;" src="{{ asset('assets/frontend/images/virtual-reality.png') }}" alt="map">
                                <div class="title-black mt-2 mb-1">Bản đồ du lịch Vũng Tàu</div>
                                <div class="text-normal mb-1">Tìm kiếm resort, nhà hàng và hoạt động tại Vũng Tàu.</div>
                                <div class="title-blue" style="font-size: 16px;">Xem bản đồ</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="w-100 text-center">
                                <img style="width: 80px;" src="{{ asset('assets/frontend/images/hotel.png') }}" alt="map">
                                <div class="title-black mt-2 mb-1">Tham quan Tp. Vũng Tàu</div>
                                <div class="text-normal mb-1">Khám phá các địa điểm nổi bật chỉ với 1 chạm.</div>
                                <div class="title-blue" style="font-size: 16px;">Xem bản đồ</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="w-100 text-center">
                                <img style="width: 80px;" src="{{ asset('assets/frontend/images/sunbed.png') }}" alt="map">
                                <div class="title-black mt-2 mb-1">Tham quan Hồ Tràm</div>
                                <div class="text-normal mb-1">Khám phá bãi biển Hồ Tràm bằng VR360.</div>
                                <div class="title-blue" style="font-size: 16px;">Xem bản đồ</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="w-100 text-center">
                                <img style="width: 80px;" src="{{ asset('assets/frontend/images/online-booking.png') }}" alt="map">
                                <div class="title-black mt-2 mb-1">Booking khách sạn</div>
                                <div class="text-normal mb-1">Đặt khách sạn thuận tiện với nhiều ưu đãi hấp dẫn .</div>
                                <div class="title-blue" style="font-size: 16px;">Xem bản đồ</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<div style="width: 100%; background-image: url('{{ asset('assets/frontend/images/bg-home-1.png') }}'); background-repeat: no-repeat; background-position: bottom center; background-size: 100% auto;">
    <div class="container pt-5">
        <div class="title-mint mb-2">BLOG MỚI NHẤT</div>
        <div class="swiper blog-swiper" style="padding-right: 5px; padding-left: 5px;">
            <div class="swiper-wrapper mt-3 mb-3">
                @foreach ($blogs as $blog)
                    <div class="swiper-slide">
                        <div class="blog-item text-center d-flex flex-column h-100">
                            <img class="w-100 blog-image" style="aspect-ratio: 5/3; object-fit: cover; border-rasdius: 10px" 
                                src="{{ $blog->image ? asset('uploads/'.$blog->image->ten) : asset('assets/frontend/images/blog.jpg') }}" alt="{{ $blog->name }}">
                            <div class="blog-content mt-3 text-left">
                                <div class="mb-1"><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</div>
                                <div class="blog-title mb-1">{{ $blog->name }}</div>
                                <div class="text-normal text-left flex-grow-1 line-clamp-3 mb-3" style="font-size: 16px; font-weight: 350;">
                                    {{ $blog->description }}
                                </div>
                                <a class="btn-get-offer" href="{{ route('frontend.blog.detail', ['id'=>$blog->id, 'slug'=>$blog->slug]) }}">
                                    Đọc thêm
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div style="background: rgba(112, 113, 113, 0.1); width: 100%;">
    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="title-gray text-left mb-2" style="font-size: clamp(20px, 4vw, 25px);">NHẬN ƯU ĐÃI ĐẶC QUYỀN CỦA CHÚNG TÔI</div>
                <div class="text-s1 text-left mb-2" style="font-size: clamp(16px, 4vw, 17px);">Hãy để chúng tôi mang đến cho bạn những thông tin du lịch mới nhất, các chương trình khuyến mãi hấp dẫn từ Sở Du lịch tỉnh Bà Rịa - Vũng Tàu và các đối tác. Chỉ một bước đơn giản, bạn sẽ không bỏ lỡ bất kỳ cơ hội tiết kiệm nào cho chuyến đi của mình.</div>
            </div>
            <div class="col-lg-6">
                <form action="{{ route('frontend.customer.store') }}" method="post" style="border-radius: 10px; border: 1px solid rgb(184, 184, 184); padding: 15px; background: white; display: block;" id="customerForm">
                    @csrf
                     <div class="form-group">
                        <input type="text" name="name" class="form-control w-100" placeholder="Họ tên" maxlength="50" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control w-100" placeholder="Email" maxlength="50" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control w-100" placeholder="Số điện thoại" maxlength="20" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="form-control" maxlength="200" style="resize: vertical;" placeholder="Lời nhắn (tối đa 200 ký tự)"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="agree" id="agreeS" checked required>
                            <label for="agreeS">Tôi đồng ý với <a href="{{ route('frontend.page.detail', ['id'=>10000, 'slug'=>$page1->slug]) }}" style="color: #38b19e; font-weight: bold;" target="_blank">Điều khoản dịch vụ</a> và <a href="{{ route('frontend.page.detail', ['id'=>10001, 'slug'=>$page2->slug]) }}" style="color: #38b19e; font-weight: bold;" target="_blank">Chính sách quyền riêng tư</a></label>
                        </div>
                        <div class="checkbox-error"></div>
                    </div>
                    
                    <button class="btn-get-offer w-100 mb-2" type="submit"><span>Gửi thông tin</span></button>
                    <span class="text-muted" style="font-size: 12px;">Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn theo chính sách bảo mật.</span>
                </form>
            </div>
        </div>
    </div>
</div>

<div style="width: 100%;">
    <div class="container pt-5 pb-5">
        <div class="title-mint mb-4">CÁC NHÀ TÀI TRỢ</div>
        <div class="swiper sponsorSwiper">
            <div class="swiper-wrapper">
                @foreach ($sponsors as $sponsor)
                    <div class="swiper-slide d-flex justify-content-center align-items-center">
                        <img src="{{ $sponsor->image ? asset('uploads/'.$sponsor->image->ten) : asset('assets/frontend/images/images1.png') }}" alt="{{ $sponsor->name }}"
                             style="border: 2px solid #38b19e; border-radius: 10px; width: 150px; height: 120px; object-fit: cover;">
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
    document.addEventListener('DOMContentLoaded', function () {
        const blogSwiper = new Swiper('.blog-swiper', {
            slidesPerView: 3,
            centeredSlides: true,
            loop: true,
            spaceBetween: 1,
            grabCursor: true,
            slideToClickedSlide: true,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    centeredSlides: false,
                },
                768: {
                    slidesPerView: 2,
                    centeredSlides: true,
                },
                1024: {
                    slidesPerView: 3,
                    centeredSlides: true,
                }
            }
        });


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

        new Swiper(".sponsorSwiper", {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            slidesPerView: 6,
            spaceBetween: 10,
            breakpoints: {
                320: {
                    slidesPerView: 2,
                },
                576: {
                    slidesPerView: 3,
                },
                769: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 6,
                }
            }
        });
    });
</script>

@endsection