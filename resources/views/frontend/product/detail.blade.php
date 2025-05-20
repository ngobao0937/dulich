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
                        <div class="overlay d-flex align-items-center" style="border-radius: 0;">
                            <div class="text-white container">
                                <div style="font-size: clamp(18px, 4vw, 30px); font-weight: bold;">{{ $banner->name }}</div>
                                <div style="font-size: clamp(13px, 4vw, 20px);">{{ $banner->description }}</div>
                            </div>
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
                <div><i class="fas fa-map-marker-alt" style="font-size: 18px; color: rgb(51, 51, 51);"></i> <b>Vị trí địa lý:</b></div>
                <div><b>- Địa chỉ:</b> {{ $product->address }}</div>
                <div><b>- Vị trí & Điểm tham quan gần:</b></div>
                <div class="ml-4">{!! $product->location !!}</div>
                <div><i class=" fas  fa-headset" style="font-size: 18px; color: rgb(51, 51, 51);"></i> <b>Hotline:</b> {{ $product->hotline }}</div>
                <div><i class=" fas  fa-envelope" style="font-size: 18px; color: rgb(51, 51, 51);"></i> <b>Email: </b> {{ $product->email }}</div>
                <div><i class=" far  fa-window-maximize" style="font-size: 18px; color: rgb(51, 51, 51);"></i> <b>Website:</b> {{ $product->website }}</div>
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
                <div class="col-lg-4 col-md-6 mb-4 d-flex">
                    <div class="resort-card d-flex flex-column h-100 w-100">
                        <div class="resort-image" style="background-image: url({{ $promotion->image ? asset('uploads/'.$promotion->image->ten) : asset('images/default.jpg') }});"></div>
                        <div class="resort-details d-flex flex-column flex-grow-1">
                            <div class="resort-name">{{ $promotion->name }}</div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description">
                                    {{ $promotion->description }}
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
                                <button class="btn-get-offer" @if(!$isComing) onclick="openFormRegister({{ $promotion->id }})" @else onclick="sweetAlertInfo()" @endif>Nhận ưu đãi</button>
                            </div>
                            
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
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="resort-card d-flex flex-column h-100">
                        <div class="resort-image">
                            @if ($promotion->link360)
                                <iframe id="embed_iframe_box" src="{{ $promotion->link360 }}" scrolling="no" frameborder="0" allowvr="yes" allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay;" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" style="width: 100%; height: 100%;"></iframe>
                            @else
                                <img class="w-100" style="object-fit: cover; aspect-ratio: 8/5" src="{{ $promotion->image ? asset('uploads/'.$promotion->image->ten) : asset('images/default.jpg') }}" alt="{{ $promotion->ten }}">
                            @endif
                        </div>
                        <div class="resort-details flex-grow-1 d-flex flex-column">
                            <div class="resort-name">{{ $promotion->name }}</div>
                            <div class="room-price">{{ $promotion->price ? number_format($promotion->price, 0, ',', '.') . ' VNĐ/đêm' : '' }} </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                <div class="promotion-description mb-2">
                                    {!! $promotion->description !!}
                                </div>
                            </div>
                            <div class="room-price" style="color: green; font-size: 14px;">{{ $promotion->tagline }} </div>

                            
                            <div class="d-flex justify-content-between mt-auto">
                                <button class="btn-get-offer" style="width: fit-content;" @if(!$isComing) onclick="openFormRegister({{ $promotion->id }})" @else onclick="sweetAlertInfo()" @endif>{{ $isComing ? 'Sắp có sau' : 'Nhận ưu đãi' }}</button>
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

<div class="container pt-4 pb-4">
    <div class="title-blue mb-3">PHẢN HỒI</div>
    <div class="d-flex align-items-center">
        <div style="font-weight: bold; font-size: 19px; margin-right: 5px;">Đánh giá chung: </div>
                
        <div class="ratingG" style="height: 48px">
            <input type="radio" {{ $product->average_rating == 5 ? 'checked' : '' }} disabled>
            <label></label>
            <input type="radio" {{ $product->average_rating == 4 ? 'checked' : '' }} disabled>
            <label></label>
            <input type="radio" {{ $product->average_rating == 3 ? 'checked' : '' }} disabled>
            <label></label>
            <input type="radio" {{ $product->average_rating == 2 ? 'checked' : '' }} disabled>
            <label></label>
            <input type="radio" {{ $product->average_rating == 1 ? 'checked' : '' }} disabled>
            <label></label>
        </div>
    </div>

    @forelse ($product->approvedComments()->get() as $comment)
        <div class="w-100 mb-3" style="border-radius: 5px; border: 1px solid gainsboro; padding: 10px">
            <div class="d-flex">
                <div class="mr-3">
                    <div class="w-100 d-flex justify-content-center">
                        <img style="width: 60px; aspect-ratio: 1/1; border-radius: 50%" src="{{ asset('assets/frontend/images/duong-mai-linh.jpg') }}" alt="user">

                    </div>
                    
                </div>
                <div>
                    <div class="d-flex align-items-center">
                        <span style="font-weight: bold; font-size: 18px;">{{ $comment->name }}</span>

                        <div class="d-flex justify-content-center" style="width: 100px; height: 30px;">
                            <div class="ratingCmt">
                                <input type="radio" {{ $comment->rating == 5 ? 'checked' : '' }} disabled>
                                <label></label>
                                <input type="radio" {{ $comment->rating == 4 ? 'checked' : '' }} disabled>
                                <label></label>
                                <input type="radio" {{ $comment->rating == 3 ? 'checked' : '' }} disabled>
                                <label></label>
                                <input type="radio" {{ $comment->rating == 2 ? 'checked' : '' }} disabled>
                                <label></label>
                                <input type="radio" {{ $comment->rating == 1 ? 'checked' : '' }} disabled>
                                <label></label>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1" style="font-size: 16px;">
                        {{ $comment->content }}
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div style="color: gray">Chưa có phản hồi nào.</div>
    @endforelse

    

    

    <form action="{{ route('frontend.comment.store') }}" method="POST" id="commentForm"> 
        @csrf
        <input type="hidden" name="product_fk" value="{{ $product->id }}">
        <div class="d-flex align-items-center">
            <div style="font-weight: bold; font-size: 19px; margin-right: 5px;">Đánh giá của bạn: </div>
            
            <div class="rating mr-3" style="height: 48px">
                <input value="5" name="rating" id="star5" type="radio">
                <label for="star5"></label>
                <input value="4" name="rating" id="star4" type="radio">
                <label for="star4"></label>
                <input value="3" name="rating" id="star3" type="radio">
                <label for="star3"></label>
                <input value="2" name="rating" id="star2" type="radio">
                <label for="star2"></label>
                <input value="1" name="rating" id="star1" type="radio">
                <label for="star1"></label>
            </div>

            <div class="rating-error"></div>
        </div>
        
        <div class="form-group">
            <textarea name="content" class="form-control" placeholder="Để lại cảm nhận của bạn cho chúng tôi (tối đa 300 ký tự)" rows="3" maxlength="300" minlength="10" required></textarea>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Họ tên của bạn" maxlength="50" minlength="2" required>
        </div>
        <button type="submit" class="btn btn-dark-blue w-100">GỬI PHẢN HỒI</button>
    </form>

</div>

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

        $('#commentForm').validate({
            ignore: [],
            rules: {
                rating: {
                    required: true
                },
                content: {
                    required: true,
                    minlength: 10,
                    maxlength: 300
                },
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                }
            },
            messages: {
                rating: {
                    required: "Vui lòng chọn đánh giá sao."
                },
                content: {
                    required: "Vui lòng nhập nội dung phản hồi.",
                    minlength: "Nội dung phải có ít nhất 10 ký tự.",
                    maxlength: "Nội dung không được vượt quá 300 ký tự."
                },
                name: {
                    required: "Vui lòng nhập họ tên.",
                    minlength: "Họ tên phải có ít nhất 2 ký tự.",
                    maxlength: "Họ tên không được vượt quá 50 ký tự."
                }
            },
            errorElement: 'div',
            errorClass: 'text-danger',
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "rating") {
                    error.appendTo(".rating-error");
                } else {
                    error.insertAfter(element);
                }
            }
        });


    });
</script>


@endsection