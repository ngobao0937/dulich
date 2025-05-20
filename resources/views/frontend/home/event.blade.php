@extends('frontend.layout.app')
@section('title', 'Sự kiện')
@section('content')
<div class="swiper bannerSwiper" style="width: 100%;">
    <div class="swiper-wrapper">
        @foreach ($banners as $banner)
            <div class="swiper-slide position-relative">
                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->name }}">
                <div class="overlay" style="border-radius: 0"></div>
            </div>
        @endforeach
    </div>
</div>

<div class="w-100" style="background: rgba(28, 77, 114, 0.1)">
    <div class="container pt-4">
        <div class="title-blue mb-3">LỊCH TRÌNH SỰ KIỆN</div>
        <button class="btn btn-default mb-3" data-toggle="modal" data-target="#typeModal" style="color: rgb(28, 77, 114); font-size: clamp(17px, 4vw, 18px); font-weight: bold; background: white; border-radius: 7px; padding: 5px 10px"><i class="fas fa-list"></i> Các sự kiện đang / sắp diễn ra</button>
        
        @foreach ($events as $event)
            @php
                $startDate = \Carbon\Carbon::parse($event->date_start);
                $endDate = \Carbon\Carbon::parse($event->date_end);
                $now = \Carbon\Carbon::now();
                $isComing = $now->lt($startDate);
                $targetDate = $isComing ? $startDate : $endDate;
            @endphp
            <div class="w-100 mb-3" style="background: white; padding: 15px 15px 0 15px; border-radius: 7px;">
                <div class="row">
                    <div class="col-md-3" style="margin-bottom: 15px">
                        <img class="w-100" style="aspect-ratio: 4/3; border-radius: 5px;" src="{{ $event->image ? asset('uploads/'.$event->image->ten) : asset('assets/frontend/images/event-photo.jpg') }}" alt="event">
                    </div>
                    <div class="col-md-9" style="margin-bottom: 15px">
                        <div class="mb-2" style="background: rgba(28, 77, 114, 0.1); color: rgb(28, 77, 114); width: fit-content; padding: 5px; border-radius: 5px">
                            <i class="far fa-clock"></i> {{ $event->time_start }} - {{ $event->time_end }}
                            <span class="ml-3 mr-3" style="height: 100%; border-right: 2px solid rgb(28, 77, 114)"></span>
                            <i class="far fa-calendar-alt"></i> {{ $event->date_range }}
                            <span class="ml-3 mr-3" style="height: 100%; border-right: 2px solid rgb(28, 77, 114)"></span>
                            <i class="fas fa-map-marker-alt"></i> {{ $event->address }}
                        </div>
                        <div class="title-blue text-left mb-1" style="font-size: clamp(22px, 4vw, 26px);">{{ $event->name }}</div>
                        <div class="mb-2 line-clamp-3" style="color: rgb(28, 77, 114); min-height: 4em;">
                            {{ $event->description }}
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ $event->link ?? '#' }}" target="_blank" class="btn btn-dark-blue" style="width: fit-content; height: fit-content;">Chi tiết sự kiện</a>
                            <div class="countdown-event-container" data-start="{{ $startDate->toIso8601String() }}" data-end="{{ $endDate->toIso8601String() }}">
                                <div class="countdown-event-box">
                                    <div class="countdown-event-value">00</div>
                                    <div class="countdown-event-label">Ngày</div>
                                </div>
                                <div class="countdown-event-box">
                                    <div class="countdown-event-value">00</div>
                                    <div class="countdown-event-label">Giờ</div>
                                </div>
                                <div class="countdown-event-box">
                                    <div class="countdown-event-value">00</div>
                                    <div class="countdown-event-label">Phút</div>
                                </div>
                                <div class="countdown-event-box">
                                    <div class="countdown-event-value">00</div>
                                    <div class="countdown-event-label">Giây</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach

        <div class="justify-content-center d-flex mt-4">
            {{ $events->links('pagination::bootstrap-4') }}
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
            
            @foreach ($products_KS as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="resort-card d-flex flex-column h-100 w-100">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ $product->promotionThuongMain->image ? asset('uploads/'.$product->promotionThuongMain->image->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details d-flex flex-column flex-grow-1">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $product->promotionThuongMain->description }}
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
                                <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">Nhận ưu đãi</a>
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
            
            @foreach ($products_NH as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="resort-card d-flex flex-column h-100 w-100">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ $product->promotionThuongMain->image ? asset('uploads/'.$product->promotionThuongMain->image->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details d-flex flex-column flex-grow-1">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $product->promotionThuongMain->description }}
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
                                <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">Nhận ưu đãi</a>
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
            
            @foreach ($products_KVC as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="resort-card d-flex flex-column h-100 w-100">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ $product->promotionThuongMain->image ? asset('uploads/'.$product->promotionThuongMain->image->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details d-flex flex-column flex-grow-1">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $product->promotionThuongMain->description }}
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
                                <a class="btn-get-offer" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">Nhận ưu đãi</a>
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
    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="col-lg-7 mb-3">
                <div class="title-blue text-left mb-2" style="font-size: clamp(20px, 4vw, 25px);">ĐĂNG KÝ NGAY ĐỂ NHẬN ƯU ĐÃI ĐỘC QUYỀN</div>
                <div class="text-normal text-left mb-2" style="font-size: clamp(16px, 4vw, 17px);">Hãy để chúng tôi mang đến cho bạn những thông tin du lịch mới nhất, các chương trình khuyến mãi hấp dẫn từ Sở Du lịch và các đối tác. Chỉ một bước đơn giản, bạn sẽ không bỏ lỡ bất kỳ cơ hội tiết kiệm nào cho chuyến đi đến Bà Rịa - Vũng Tàu!</div>
            </div>
            <div class="col-lg-5">
                <form action="{{ route('frontend.customer.store') }}" method="post" id="customerForm" style="display: block; border-radius: 10px; border: 1px solid rgb(184, 184, 184); padding: 15px; background: white;">
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
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" name="agree" id="agreeS" checked required>
                            @php
                                $page1 = App\Models\Page::find(10000);
                                $page2 = App\Models\Page::find(10001);
                            @endphp
                            <label for="agreeS">Tôi đồng ý với <a href="{{ route('frontend.page.detail', ['id'=>10000, 'slug'=>$page1->slug]) }}" style="color: rgb(28, 77, 114); font-weight: bold;" target="_blank">Điều khoản dịch vụ</a> và <a href="{{ route('frontend.page.detail', ['id'=>10001, 'slug'=>$page2->slug]) }}" style="color: rgb(28, 77, 114); font-weight: bold;" target="_blank">Chính sách quyền riêng tư</a></label>
                        </div>
                    </div>
                    
                    <button class="btn-register-submit w-100 mb-2" type="submit"><span>Gửi thông tin</span></button>
                    <span class="text-muted" style="font-size: 12px;">Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn theo chính sách bảo mật.</span>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="typeModal" class="modal fade" role="dialog" style="z-index: 1050; display: none;">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('frontend.home.event') }}" method="get" style="display: block;">
                <div class="modal-header">
                    <div class="modal-title" style="font-weight: bold; font-size: 20px;">Các loại sự kiện</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body position-relative">
                    <div class="form-group">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="now" name="loai[]" value="now"
                                    {{ in_array('now', request('loai', ['now', 'coming'])) ? 'checked' : '' }}>
                            <label style="font-weight: bold" for="now">Sự kiện đang diễn ra</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="coming" name="loai[]" value="coming"
                                    {{ in_array('coming', request('loai', ['now', 'coming'])) ? 'checked' : '' }}>
                            <label style="font-weight: bold" for="coming">Sự kiện sắp diễn ra</label>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 0">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" id="end" name="loai[]" value="end"
                                    {{ in_array('end', request('loai', ['now', 'coming'])) ? 'checked' : '' }}>
                            <label style="font-weight: bold" for="end">Sự kiện đã kết thúc</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Áp dụng</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/event.css') }}">

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

        document.querySelectorAll('.countdown-event-container').forEach(function (container) {
            const startDate = new Date(container.dataset.start);
            const endDate = new Date(container.dataset.end);
            const values = container.querySelectorAll('.countdown-event-value');
            const labels = container.querySelectorAll('.countdown-event-label');

            function updateCountdown() {
                const now = new Date();

                if (now < startDate) {
                    // Sự kiện sắp diễn ra - đếm ngược đến ngày bắt đầu
                    const diff = startDate - now;
                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    const minutes = Math.floor((diff / (1000 * 60)) % 60);
                    const seconds = Math.floor((diff / 1000) % 60);

                    values[0].textContent = String(days).padStart(2, '0');
                    values[1].textContent = String(hours).padStart(2, '0');
                    values[2].textContent = String(minutes).padStart(2, '0');
                    values[3].textContent = String(seconds).padStart(2, '0');
                } else if (now >= startDate && now <= endDate) {
                    // Sự kiện đang diễn ra
                    container.innerHTML = `<div class="countdown-event-status" style="color: green; font-weight: bold; font-size: clamp(17px, 4vw, 20px)">Đang diễn ra</div>`;
                } else {
                    // Sự kiện đã kết thúc
                    container.innerHTML = `<div class="countdown-event-status" style="color: red; font-weight: bold; font-size: clamp(17px, 4vw, 20px)">Đã kết thúc</div>`;
                }
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });

    });
</script>
@endsection