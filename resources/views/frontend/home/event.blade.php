@extends('frontend.layout.app')
@section('title', 'Sự kiện du lịch')
@section('content')
{{-- <div class="swiper bannerSwiper" style="width: 100%;">
    <div class="swiper-wrapper">
        @foreach ($banners as $banner)
            <div class="swiper-slide position-relative">
                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 8/5;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->name }}">
                <div class="overlay" style="border-radius: 0"></div>
            </div>
        @endforeach
    </div>
</div> --}}

<section class="d-none d-md-block banner-desktop" id="bannerDesktop">
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

<section class="d-block d-md-none banner-mobile" id="bannerMobile">
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

<section id="nextSection" class="w-100" style="background: rgba(28, 77, 114, 0.1)">
    <div id="app">
        <div class="container pt-4 pb-2">
            <div class="title-blue mb-3">LỊCH TRÌNH SỰ KIỆN</div>

            <button class="btn btn-default mb-3" @click="showModal = true" style="color: #38b19e; font-size: clamp(17px, 4vw, 18px); font-weight: bold; background: white; border-radius: 7px; padding: 5px 10px">
                <i class="fas fa-list"></i> Các sự kiện đang / sắp diễn ra
            </button>

            <div v-for="event in events" v-cloak :key="event.id" class="w-100 mb-3" style="background: white; padding: 15px 15px 0 15px; border-radius: 7px;">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <img class="w-100" style="aspect-ratio: 4/3; border-radius: 5px;" :src="event.image_url" alt="event">
                    </div>
                    <div class="col-md-9 mb-3">
                        <div class="mb-2" style="background: rgba(28, 77, 114, 0.1); color: #333; width: fit-content; padding: 5px; border-radius: 5px">
                            <i class="far fa-clock"></i> @{{ event.time_start }} - @{{ event.time_end }}
                            <span class="ml-3 mr-3" style="height: 100%; border-right: 2px solid #333"></span>
                            <i class="far fa-calendar-alt"></i> @{{ event.date_range }}
                            <span class="ml-3 mr-3" style="height: 100%; border-right: 2px solid #333"></span>
                            <i class="fas fa-map-marker-alt"></i> @{{ event.address }}
                        </div>
                        <div class="title-blue text-left mb-1" style="font-size: clamp(22px, 4vw, 26px);">@{{ event.name }}</div>
                        <div class="mb-2" style="color: #333; min-height: 4em;">
                            @{{ event.description }}
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a :href="event.link || '#'" target="_blank" class="btn btn-dark-blue" style="width: fit-content; height: fit-content;">Chi tiết sự kiện</a>
                            <div class="countdown-event-container" :data-start="event.date_start" :data-end="event.date_end">
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

            <div v-if="events.length === 0" class="text-center mb-3">Không có sự kiện nào ngay lúc này.</div>

            <div class="justify-content-center d-flex mt-4" v-cloak v-if="events.length !== 0 && pagination.last_page > 1">
                <ul class="pagination">
                    <li class="page-item" :class="{ disabled: pagination.current_page === 1 }">
                        <a class="page-link" href="#" @click.prevent="goToPage(pagination.current_page - 1)">&lsaquo;</a>
                    </li>
                    <li class="page-item" v-for="page in pagination.last_page" :key="page" :class="{ active: pagination.current_page === page }">
                        <a class="page-link" href="#" @click.prevent="goToPage(page)">@{{ page }}</a>
                    </li>
                    <li class="page-item" :class="{ disabled: pagination.current_page === pagination.last_page }">
                        <a class="page-link" href="#" @click.prevent="goToPage(pagination.current_page + 1)">&rsaquo;</a>
                    </li>
                </ul>
            </div>

            <div v-if="showModal" v-cloak class="modal fade show d-block" style="z-index: 1050; background: rgba(0,0,0,0.5);">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title" style="font-weight: bold; font-size: 20px;">Các loại sự kiện</div>
                            <button type="button" class="close" @click="showModal = false">&times;</button>
                        </div>
                        <div class="modal-body position-relative">
                            <div class="form-group" v-for="type in ['now', 'coming', 'end']" :key="type">
                                <div class="icheck-success d-inline">
                                    <input type="checkbox" :id="type" :value="type" v-model="filters" @change="applyFilters">
                                    <label :for="type" style="font-weight: bold">Sự kiện @{{ type === 'now' ? 'đang diễn ra' : type === 'coming' ? 'sắp diễn ra' : 'đã kết thúc' }}</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" @click="showModal = false">Đóng</button>
                            <button type="button" class="btn btn-success" @click="applyFilters">Áp dụng</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
<link rel="stylesheet" href="{{ asset('assets/frontend/css/event.css') }}">
<style>
    [v-cloak] {
        display: none !important;
    }
</style>
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
    });
</script>
<script src="{{ asset('assets/frontend/js/vue.js') }}"></script>

<script>
    function initCountdownTimers() {
        document.querySelectorAll('.countdown-event-container').forEach(function (container) {
            const startDate = new Date(container.dataset.start);
            const endDate = new Date(container.dataset.end);
            const values = container.querySelectorAll('.countdown-event-value');

            function updateCountdown() {
                const now = new Date();

                if (now < startDate) {
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
                    container.innerHTML = `<div class='countdown-event-status' style='color: green; font-weight: bold; font-size: clamp(17px, 4vw, 20px)'>Đang diễn ra</div>`;
                } else {
                    container.innerHTML = `<div class='countdown-event-status' style='color: red; font-weight: bold; font-size: clamp(17px, 4vw, 20px)'>Đã kết thúc</div>`;
                }
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    }

    new Vue({
        el: '#app',
        data: {
            events: [],
            pagination: {
                current_page: 1,
                last_page: 1
            },
            filters: ['now', 'coming'],
            showModal: false
        },
        methods: {
            async loadEvents(page = 1) {
                const params = new URLSearchParams();
                params.append('page', page);
                this.filters.forEach(type => params.append('loai[]', type));

                const res = await fetch(`/load-danh-sach-su-kien?${params.toString()}`);
                const data = await res.json();

                this.events = data.events.data.map(e => ({
                    ...e,
                    image_url: e.image?.ten ? `/uploads/${e.image.ten}` : '/assets/frontend/images/event-photo.jpg'
                }));
                this.pagination.current_page = data.events.current_page;
                this.pagination.last_page = data.events.last_page;

                this.$nextTick(() => initCountdownTimers());
            },
            goToPage(page) {
                if (page !== this.pagination.current_page && page >= 1 && page <= this.pagination.last_page) {
                    this.loadEvents(page);
                }
            },
            applyFilters() {
                this.loadEvents();
            }
        },
        mounted() {
            this.loadEvents();
        }
    });
</script>
@endsection