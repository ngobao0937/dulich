@extends('frontend.layout.app')
@section('title', 'Sở du lịch - Trang chủ')
@section('content')

<section>
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
</section>

<div style="width: 100%;">
    <div class="container pb-5 pt-5" >
        <div class="row">
            <div class="col-md-4">
                <div class="w-100 h-100" style="background: #38b19e">

                </div>
            </div>
            <div class="col-md-8">
                <div class="text-center">
                    <div class="title1">TRẢI NGHIỆM VŨNG TÀU TRỌN VẸN</div>
                    <div class="title2">ĐỪNG BỎ LỠ!</div>
                    <div class="text-normal">Bạn đang tìm chuyến đi vừa chất, vừa chill?</div>
                    <div class="text-normal mb-4">Tất cả đã có tại đây</div>
                    <div class="text-normal mb-2">👉 Gợi ý <b><i>điểm đến đẹp, quán ăn "xịn"</i></b>, nơi <b><i>lưu trú sang trọng</i></b> 👈</div>
                    <div class="text-normal mb-2">🎁 Đừng bỏ lỡ <b><i>ưu đãi độc quyền</i></b> từ Sở Du lịch & đối tác 🎁</div>
                    <div class="text-normal mb-4">📍 Vũng Tàu đang chờ bạn khám phá theo cách riêng của mình 📍</div>
                    
                    <div class="d-flex justify-content-center">
                        <button class="btn-1"><span>KHÁM PHÁ NGAY</span></button>
                        <button class="btn-2">Xem Ưu Đãi</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div style="background: #38b19e; width: 100%;">
    <div class="container pb-5 pt-5">
        <div class="title-white">TẠI SAO NÊN CHỌN CHÚNG TÔI?</div>
        <div class="d-flex justify-content-center mt-4 mb-5"><div class="div-hr"></div></div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="hover-box position-relative overflow-hidden" style="aspect-ratio: 1/1; border-radius: 10px;">
                    <img class="w-100 h-100 position-absolute top-0 start-0" src="{{ asset('assets/frontend/images/h1.png') }}" alt="h1" style="object-fit: cover; z-index: 1;">
                    
                    <div class="hover-content position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center px-2" style="z-index: 2;">
                        <div class="title-image fs-5 fw-bold mb-2">Ở đâu?</div>
                        <div class="subtitle">Khám phá các khách sạn với ưu đãi độc quyền, từ resort sang trọng đến homestay ấm cúng.</div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6">
                        <div class="hover-box position-relative overflow-hidden" style="aspect-ratio: 1/1; border-radius: 10px;">
                            <img class="w-100 h-100 position-absolute top-0 start-0" src="{{ asset('assets/frontend/images/h2.png') }}" alt="h2" style="object-fit: cover; z-index: 1;">
                            
                            <div class="hover-content position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center px-2" style="z-index: 2;">
                                <div class="title-image fs-5 fw-bold mb-2">Ăn gì?</div>
                                <div class="subtitle">Thưởng thức ẩm thực địa phương và quốc tế với các chương trình giảm giá hấp dẫn.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hover-box position-relative overflow-hidden" style="aspect-ratio: 1/1; border-radius: 10px;">
                            <img class="w-100 h-100 position-absolute top-0 start-0" src="{{ asset('assets/frontend/images/h3.png') }}" alt="h3" style="object-fit: cover; z-index: 1;">
                            
                            <div class="hover-content position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center px-2" style="z-index: 2;">
                                <div class="title-image fs-5 fw-bold mb-2">Chơi gì?</div>
                                <div class="subtitle">Trải nghiệm các hoạt động giải trí, từ bãi biển đến công viên với vé ưu đãi..</div>
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
                <img class="w-100 h-100" style="border-radius: 10px; object-fit: cover;" src="{{ asset('assets/frontend/images/h4.jpg') }}" alt="h4">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="row">
                <div class="col-lg-12 col-6 pb-3">
                    <div class="position-relative w-100">
                        <img class="w-100" style="border-radius: 10px; object-fit: cover; aspect-ratio: 1/1;" src="{{ asset('assets/frontend/images/h5.jpg') }}" alt="h5">
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
                        <img class="w-100" style="border-radius: 10px; object-fit: cover; aspect-ratio: 1/1;" src="{{ asset('assets/frontend/images/h5.jpg') }}" alt="h5">
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

<div style="background: rgba(28, 77, 114, 0.1); width: 100%;">
    <div class="container pb-5 pt-5" >
        <div class="text-center">
            <div class="title-mint mb-3">CHÚNG TÔI LÀ NGƯỜI HƯỚNG DẪN ĐÁNG TIN CẬY CỦA BẠN!</div>
            <div class="text-normal">Được bảo chứng bởi Sở Du lịch Bà Rịa - Vũng Tàu, chúng tôi cung cấp thông tin đầy đủ và chính xác về khách sạn, nhà hàng, và địa điểm vui chơi. Hãy để chúng tôi đồng hành cùng bạn trong hành trình khám phá!</div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn-learn-more-mint"><span>Về chúng tôi</span></button>
            </div>
        </div>
    </div>
</div>

<div class="w-100">
    <div class="container pb-5 pt-5" >
        <div class="title-blue mb-3">3 BƯỚC ĐƠN GIẢN ĐỂ NHẬN ƯU ĐÃI</div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6">
                        <div class="w-100 text-center">
                            <img style="width: 80px;" src="{{ asset('assets/frontend/images/add.png') }}" alt="add">
                            <div class="title-black mt-2 mb-2">Đăng ký</div>
                            <div class="text-normal">Tạo tài khoản để nhận thông tin ưu đãi và sự kiện.</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="w-100 text-center">
                            <img style="width: 80px;" src="{{ asset('assets/frontend/images/checked.png') }}" alt="add">
                            <div class="title-black mt-2 mb-2">Xác nhận</div>
                            <div class="text-normal">Liên hệ cơ sở để sử dụng ưu đãi hoặc khuyến mãi.</div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="col-md-4">
                <div class="w-100 text-center">
                    <img style="width: 80px;" src="{{ asset('assets/frontend/images/happiness.png') }}" alt="add">
                    <div class="title-black mt-2 mb-2">Tận hưởng</div>
                    <div class="text-normal">Thoả sức khám phá Bà Rịa - Vũng Tàu với chi phí tiết kiệm!</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background: rgba(28, 77, 114, 0.1); width: 100%;">
    <div class="container pb-5 pt-5" >
        <div class="text-center">
            <div class="title-mint mb-3">HÀNH TRÌNH ĐÁNG NHỚ ĐANG CHỜ BẠN!</div>
            <div class="text-normal">Hãy tưởng tượng bạn đang thư giãn tại một resort sang trọng với giá ưu đãi, thưởng thức hải sản tươi ngon tại nhà hàng địa phương, và tham gia các hoạt động thú vị mà không lo về chi phí. Tất cả đều bắt đầu từ đây!</div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn-learn-more-mint"><span>Đăng ký để trải nghiệm</span></button>
            </div>
        </div>
    </div>
</div>

<section class="w-100" class="promotion_section">
    <div class="container pt-5">
        <h1 class="title-blue mb-3">ƯU ĐÃI KHÁCH SẠN</h1>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
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
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 16/9;" src="{{ $promotion_p->promotion->image ? asset('uploads/'.$promotion_p->promotion->image->ten) : asset('images/default.jpg') }}" alt="{{ $promotion_p->name }}">
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
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
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
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 16/9;" src="{{ $promotion_p->promotion->image ? asset('uploads/'.$promotion_p->promotion->image->ten) : asset('images/default.jpg') }}" alt="{{ $promotion_p->name }}">
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
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
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
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 16/9;" src="{{ $promotion_p->promotion->image ? asset('uploads/'.$promotion_p->promotion->image->ten) : asset('images/default.jpg') }}" alt="{{ $promotion_p->name }}">
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

<div style="background: rgba(28, 77, 114, 0.1); width: 100%;">
    <div class="container pb-5 pt-5" >
        <div class="text-center">
            <div class="title-mint mb-4">HỖ TRỢ DU LỊCH</div>
            <div class="row">
                <div class="col-md-6">
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
                
                <div class="col-md-6">
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
            </div>

            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-3">
                            <img class="w-100 h-100" style="aspect-ratio: 1/1; object-fit: contain" src="{{ asset('assets/frontend/images/maps.png') }}" alt="maps">
                        </div>
                        <div class="col-9">
                            <div class="title-black mt-3 mb-2 text-left">Bản đồ tham quan Vũng Tàu</div>
                            <div class="text-normal text-left mb-2">Khám phá các điểm đến nổi bật chỉ với 1 chạm.</div>
                            <div class="title-blue text-left" style="font-size: 17px;">Xem bản đồ</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-3">
                            <img class="w-100 h-100" style="aspect-ratio: 1/1; object-fit: contain" src="{{ asset('assets/frontend/images/maps.png') }}" alt="maps">
                        </div>
                        <div class="col-9">
                            <div class="title-black mt-3 mb-2 text-left">Bản đồ du lịch Hồ Tràm</div>
                            <div class="text-normal text-left mb-2">Tìm kiếm resort, nhà hàng và hoạt động tại Hồ Tràm dễ dàng.</div>
                            <div class="title-blue text-left" style="font-size: 17px;">Xem bản đồ</div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<div style="background: #38b19e; width: 100%;">
    <div class="container pb-5 pt-5">
        <div class="title-white">BÀI VIẾT MỚI</div>
        <div class="d-flex justify-content-center mt-4 mb-5"><div class="div-hr"></div></div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-3 d-flex">
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

<div style="background: rgba(28, 77, 114, 0.1); width: 100%;">
    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="title-mint text-left mb-2" style="font-size: clamp(20px, 4vw, 25px);">NHẬN ƯU ĐÃI ĐẶC QUYỀN CỦA CHÚNG TÔI</div>
                <div class="text-normal text-left mb-2" style="font-size: clamp(16px, 4vw, 17px);">Hãy để chúng tôi mang đến cho bạn những thông tin du lịch mới nhất, các chương trình khuyến mãi hấp dẫn từ Sở Du lịch tỉnh Bà Rịa - Vũng Tàu và các đối tác. Chỉ một bước đơn giản, bạn sẽ không bỏ lỡ bất kỳ cơ hội tiết kiệm nào cho chuyến đi của mình.</div>
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
                            @php
                                $page1 = App\Models\Page::find(10000);
                                $page2 = App\Models\Page::find(10001);
                            @endphp
                            <label for="agreeS">Tôi đồng ý với <a href="{{ route('frontend.page.detail', ['id'=>10000, 'slug'=>$page1->slug]) }}" style="color: #38b19e; font-weight: bold;" target="_blank">Điều khoản dịch vụ</a> và <a href="{{ route('frontend.page.detail', ['id'=>10001, 'slug'=>$page2->slug]) }}" style="color: #38b19e; font-weight: bold;" target="_blank">Chính sách quyền riêng tư</a></label>
                        </div>
                    </div>
                    
                    <button class="btn-register-submit w-100 mb-2" type="submit"><span>Gửi thông tin</span></button>
                    <span class="text-muted" style="font-size: 12px;">Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn theo chính sách bảo mật.</span>
                </form>
            </div>
        </div>
    </div>
</div>

<div style="background: rgba(28, 77, 114, 0.1); width: 100%;">
    <div class="container pb-5">
        <div class="title-mint text-left mb-2" style="font-size: clamp(20px, 4vw, 25px);">NHÀ TÀI TRỢ</div>
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
{{-- <link rel="stylesheet" href="{{ auto_version('assets/frontend/css/style.css') }}"> --}}
@endsection
@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
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

        let bannerSection = document.querySelector(".bannerSwiper");
        let nextSection = bannerSection.parentElement.nextElementSibling;

        let scrolled = false;
        const headerHeight = 50;

        window.addEventListener("wheel", function (e) {
            if (window.scrollY === 0) {
                scrolled = false;
            }

            if (!scrolled && e.deltaY > 0 && window.scrollY < 50) {
                scrolled = true;
                if (nextSection) {
                    const offsetTop = nextSection.getBoundingClientRect().top + window.scrollY - headerHeight;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
</script>

@endsection