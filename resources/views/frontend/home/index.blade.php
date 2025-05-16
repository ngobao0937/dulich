@extends('frontend.layout.app')
@section('title', 'Sở du lịch - Trang chủ')
@section('content')

<div>
    <div class="swiper bannerSwiper sp_container" style="width: 100%;">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ asset('uploads/' . $banner->image->ten) }}" alt="{{ $banner->name }}">
                </div>
            @endforeach
        </div>
    </div>
</div>

<div style="background: rgba(28, 77, 114, 0.1); width: 100%;">
    <div class="container pb-5 pt-5" >
        <div class="text-center">
            <div class="title1">CƠ HỘI TRẢI NGHIỆM TUYỆT VỜI</div>
            <div class="title2">ĐỪNG BỎ LỠ!</div>
            <div class="w-100 d-flex justify-content-center mt-2">
                <div class="con-desc">
                    <div class="title3 text-danger mb-2">👉 Bạn có đang lo lắng về việc tìm kiếm thông tin du lịch đáng tin cậy? </div>
                    <div class="title3 text-danger mb-2">👉 Không biết nơi nào ở, ăn gì, hay chơi gì tại Bà Rịa - Vũng Tàu? </div>
                    <div class="title3 text-danger mb-2">👉 Nếu bỏ lỡ các ưu đãi từ Sở Du lịch và các đối tác, bạn có thể <span style="color: black">tốn nhiều</span> chi phí hơn <span style="color: black">và bỏ qua</span> những trải nghiệm độc đáo!</div>
                </div>
            </div>
            
            
            <div class="d-flex justify-content-center mt-4">
                <img style="width: 60px; height: 60px;" src="{{ asset('assets/frontend/images/arrow-right-click-here-animated.gif') }}" alt="Tham gia ngay">
                <button class="btn-1"><span>THAM GIA NGAY NẾU KHÔNG BỎ LỠ!</span></button>
            </div>
        </div>
    </div>
</div>

<div style="background: rgb(28, 77, 114); width: 100%;">
    <div class="container pb-5 pt-5">
        <div class="title-white">TẠI SAO NÊN CHỌN CHÚNG TÔI?</div>
        <div class="d-flex justify-content-center mt-4 mb-5"><div class="div-hr"></div></div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="w-100 text-center">
                    <img class="w-100 mb-2" style="aspect-ratio: 5/3; object-fit: cover; border-radius: 10px" src="{{ asset('assets/frontend/images/h1.png') }}" alt="h1">
                    <div class="title-image mb-2">Ở đâu?</div>
                    <div class="w-100 mb-3" style="border-bottom: 1px solid white;"></div>
                    <div class="des-image">Khám phá các khách sạn với ưu đãi độc quyền, từ resort sang trọng đến homestay ấm cúng.</div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="w-100 text-center">
                    <img class="w-100 mb-2" style="aspect-ratio: 5/3; object-fit: cover; border-radius: 10px" src="{{ asset('assets/frontend/images/h2.png') }}" alt="h2">
                    <div class="title-image mb-2">Ăn gì?</div>
                    <div class="w-100 mb-3" style="border-bottom: 1px solid white;"></div>
                    <div class="des-image">Thưởng thức ẩm thực địa phương và quốc tế với các chương trình giảm giá hấp dẫn.</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w-100 text-center">
                    <img class="w-100 mb-2" style="aspect-ratio: 5/3; object-fit: cover; border-radius: 10px" src="{{ asset('assets/frontend/images/h3.png') }}" alt="h3">
                    <div class="title-image mb-2">Chơi gì?</div>
                    <div class="w-100 mb-3" style="border-bottom: 1px solid white;"></div>
                    <div class="des-image">Trải nghiệm các hoạt động giải trí, từ bãi biển đến công viên với vé ưu đãi.</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pt-5 pb-5">
    <div class="title-blue">CÁC SỰ KIỆN NỔI BẬT</div>
    <div class="d-flex justify-content-center mt-4 mb-5"><div style="border-bottom: 2px solid rgb(255, 136, 0); width: 30%;"></div></div>
    <div class="row">
        <!-- Col trái: chiếm 8 trên màn hình lớn, full trên mobile -->
        <div class="col-md-9 mb-3">
            <div class="w-100 h-100">
                <img class="w-100 h-100" style="border-radius: 10px; object-fit: cover;" src="{{ asset('assets/frontend/images/h4.jpg') }}" alt="h4">
            </div>
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12 col-6 pb-3">
                    <div class="position-relative w-100">
                        <img class="w-100" style="border-radius: 10px; object-fit: cover; aspect-ratio: 1/1;" src="{{ asset('assets/frontend/images/h5.jpg') }}" alt="h5">
                        <div class="overlay d-flex align-items-center justify-content-center" style="padding-left: 10px; padding-right: 10px;">
                            <div class="text-center">
                                <div class="des-event mb-2">Các sự kiện đang diễn ra</div>
                                <div class="w-100 d-flex justify-content-center">
                                    <button class="btn-more-event"><span>Tìm hiểu thêm</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-6 pb-3">
                    <div class="position-relative w-100">
                        <img class="w-100" style="border-radius: 10px; object-fit: cover; aspect-ratio: 1/1;" src="{{ asset('assets/frontend/images/h5.jpg') }}" alt="h5">
                        <div class="overlay d-flex align-items-center justify-content-center" style="padding-left: 10px; padding-right: 10px;">
                            <div class="text-center">
                                <div class="des-event mb-2">Các sự kiện đang diễn ra</div>
                                <div class="w-100 d-flex justify-content-center">
                                    <button class="btn-more-event"><span>Tìm hiểu thêm</span></button>
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
            <div class="title-blue mb-3">CHÚNG TÔI LÀ NGƯỜI HƯỚNG DẪN ĐÁNG TIN CẬY CỦA BẠN!</div>
            <div class="text-normal">Được bảo chứng bởi Sở Du lịch Bà Rịa - Vũng Tàu, chúng tôi cung cấp thông tin đầy đủ và chính xác về khách sạn, nhà hàng, và địa điểm vui chơi. Hãy để chúng tôi đồng hành cùng bạn trong hành trình khám phá!</div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn-learn-more"><span>Tìm hiểu thêm về chúng tôi</span></button>
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
            <div class="title-blue mb-3">HÀNH TRÌNH ĐÁNG NHỚ ĐANG CHỜ BẠN!</div>
            <div class="text-normal">Hãy tưởng tượng bạn đang thư giãn tại một resort sang trọng với giá ưu đãi, thưởng thức hải sản tươi ngon tại nhà hàng địa phương, và tham gia các hoạt động thú vị mà không lo về chi phí. Tất cả đều bắt đầu từ đây!</div>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn-learn-more"><span>Đăng ký để trải nghiệm</span></button>
            </div>
        </div>
    </div>
</div>

<section class="w-100" class="promotion_section">
    <div class="container pt-5">
        <h1 class="title-blue mb-3">ƯU ĐÃI KHÁCH SẠN</h1>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi khách sạn!</div>
                        <a class="btn-view-offer" href="{{ route('frontend.product.promotions') }}">Khám phá ngay</a>
                    </div>
                </div>
            </div>
            
            @foreach ($products_KS as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-md-4 mb-4">
                    
                    <div class="resort-card">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ $product->promotionThuongMain->image ? asset('uploads/'.$product->promotionThuongMain->image->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $product->promotionThuongMain->description }}
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
                            <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">Nhận ưu đãi</a>
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
            <div class="col-md-4 mb-4">
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi nhà hàng ẩm thực!</div>
                        <a class="btn-view-offer" href="{{ route('frontend.product.promotions') }}">Khám phá ngay</a>
                    </div>
                </div>
            </div>
            
            @foreach ($products_NH as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="resort-card">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ $product->promotionThuongMain->image ? asset('uploads/'.$product->promotionThuongMain->image->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $product->promotionThuongMain->description }}
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
                            <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">Nhận ưu đãi</a>
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
            <div class="col-md-4 mb-4">
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi vui chơi giải trí!</div>
                        <a class="btn-view-offer" href="{{ route('frontend.product.promotions') }}">Khám phá ngay</a>
                    </div>
                </div>
            </div>
            
            @foreach ($products_KVC as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="resort-card">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ $product->promotionThuongMain->image ? asset('uploads/'.$product->promotionThuongMain->image->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $product->promotionThuongMain->description }}
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
                            <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">Nhận ưu đãi</a>
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
            <div class="title-blue mb-3">TÀI NGUYÊN HỖ TRỢ DU LỊCH</div>
            <div class="row">
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
            </div>
        </div>
    </div>
</div>

<div style="background: rgb(28, 77, 114); width: 100%;">
    <div class="container pb-5 pt-5">
        <div class="title-white">CÁC BLOG MỚI NHẤT</div>
        <div class="d-flex justify-content-center mt-4 mb-5"><div class="div-hr"></div></div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="w-100 text-center" style="background: white; border-radius: 10px; padding: 5px">
                    <img class="w-100 mb-3" style="aspect-ratio: 5/3; object-fit: cover; border-radius: 10px" src="{{ asset('assets/frontend/images/blog.jpg') }}" alt="h1">
                    <div class="title-blue mb-2" style="font-size: 18px;">TIÊU ĐỀ BLOG</div>
                    <div class="text-normal text-left mb-2" style="padding: 0 10px; font-size: 16px;">Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây</div>
                    <div class="title-blue text-left" style="font-size: 17px; padding-left: 10px;">Xem thêm</div>
                    <div class="d-flex justify-content-center mt-5 mb-4"> 
                        <div style="border-bottom: 5px solid rgb(28, 77, 114); width: 50%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="w-100 text-center" style="background: white; border-radius: 10px; padding: 5px">
                    <img class="w-100 mb-3" style="aspect-ratio: 5/3; object-fit: cover; border-radius: 10px" src="{{ asset('assets/frontend/images/blog.jpg') }}" alt="h1">
                    <div class="title-blue mb-2" style="font-size: 18px;">TIÊU ĐỀ BLOG</div>
                    <div class="text-normal text-left mb-2" style="padding: 0 10px; font-size: 16px;">Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây</div>
                    <div class="title-blue text-left" style="font-size: 17px; padding-left: 10px;">Xem thêm</div>
                    <div class="d-flex justify-content-center mt-5 mb-4"> 
                        <div style="border-bottom: 5px solid rgb(28, 77, 114); width: 50%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w-100 text-center" style="background: white; border-radius: 10px; padding: 5px">
                    <img class="w-100 mb-3" style="aspect-ratio: 5/3; object-fit: cover; border-radius: 10px" src="{{ asset('assets/frontend/images/blog.jpg') }}" alt="h1">
                    <div class="title-blue mb-2" style="font-size: 18px;">TIÊU ĐỀ BLOG</div>
                    <div class="text-normal text-left mb-2" style="padding: 0 10px; font-size: 16px;">Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây / Văn bản ở đây</div>
                    <div class="title-blue text-left" style="font-size: 17px; padding-left: 10px;">Xem thêm</div>
                    <div class="d-flex justify-content-center mt-5 mb-4"> 
                        <div style="border-bottom: 5px solid rgb(28, 77, 114); width: 50%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w-100">
    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="title-blue text-left mb-2" style="font-size: clamp(20px, 4vw, 25px);">ĐĂNG KÝ NGAY ĐỂ NHẬN ƯU ĐÃI ĐỘC QUYỀN</div>
                <div class="text-normal text-left mb-2" style="font-size: clamp(16px, 4vw, 17px);">Hãy để chúng tôi mang đến cho bạn những thông tin du lịch mới nhất, các chương trình khuyến mãi hấp dẫn từ Sở Du lịch và các đối tác. Chỉ một bước đơn giản, bạn sẽ không bỏ lỡ bất kỳ cơ hội tiết kiệm nào cho chuyến đi đến Bà Rịa - Vũng Tàu!</div>
            </div>
            <div class="col-md-4">
                <form action="{{ route('frontend.customer.store') }}" method="post" style="border-radius: 10px; border: 1px solid rgb(184, 184, 184); padding: 15px">
                    @csrf
                     <div class="form-group">
                        <input type="text" name="name" class="input-register w-100" placeholder="Họ tên" maxlength="250" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="input-register w-100" placeholder="Email" maxlength="250" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="input-register w-100" placeholder="Số điện thoại" maxlength="250" required>
                    </div>
                    <button class="btn-register-submit w-100" type="submit"><span>Gửi thông tin</span></button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('styles')
<link rel="stylesheet" href="{{ auto_version('assets/frontend/css/style.css') }}">
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
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
</script>

@endsection