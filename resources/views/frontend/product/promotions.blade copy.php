@extends('frontend.layout.app')
@section('title', 'Khuyến mãi & ưu đãi')
@section('content')
{{-- <div class="swiper bannerSwiper sp_container" style="width: 100%;">
    <div class="swiper-wrapper">
        @foreach ($banners as $banner)
            <div class="swiper-slide position-relative">
                <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 21/5;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->ten }}">

                <div class="overlay position-absolute w-100 h-100 top-0 start-0" style="display: flex; justify-content: center; align-items: center; z-index: 1; border-radius: 0">
                    <h1 style="color: white; font-weight: bold; font-size: clamp(20px, 4vw, 40px);;">ƯU ĐÃI CHO HÔM NAY!</h1>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}

<section class="d-none d-md-block banner-desktop">
    <div class="swiper bannerSwiper" style="width: 100%; height: 100vh; overflow: hidden;">
        <div class="swiper-wrapper">
            @foreach ($desktopBanners as $banner)
                <div class="swiper-slide position-relative">
                    <img class="w-100 h-100" style="object-fit: cover;" src="{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->name }}">
                    <div class="overlay position-absolute w-100 h-100 top-0 start-0" style="display: flex; justify-content: center; align-items: center; z-index: 1; border-radius: 0">
                        <h1 style="color: white; font-weight: bold; font-size: clamp(20px, 4vw, 40px);;">ƯU ĐÃI CHO HÔM NAY!</h1>
                    </div>
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
                    <div class="overlay position-absolute w-100 h-100 top-0 start-0" style="display: flex; justify-content: center; align-items: center; z-index: 1; border-radius: 0">
                        <h1 style="color: white; font-weight: bold; font-size: clamp(20px, 4vw, 40px);;">ƯU ĐÃI CHO HÔM NAY!</h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="nextSection">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-outline-secondary mobile-filter-toggle" id="toggleFilters">
                    <i class="fas fa-filter mr-2"></i> Hiển thị bộ lọc
                </button>
            </div>
            
            <div class="col-lg-3">
                <div id="filterSection">
                    <form id="filterForm" method="GET" action="{{ route('frontend.product.promotions') }}">
                        <div class="filter-section">
                            <h5 class="filter-heading">Áp dụng được cho</h5>
                            <div class="filter-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input filter-checkbox" id="filter1" name="filters[]" value="10000" {{ in_array(10000, request('filters', [])) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="filter1">Nghỉ dưỡng, khách sạn</label>
                                </div>
                                <div class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" class="custom-control-input filter-checkbox" id="filter3" name="filters[]" value="10001" {{ in_array(10001, request('filters', [])) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="filter3">Ẩm thực nhà hàng</label>
                                </div>
                                <div class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" class="custom-control-input filter-checkbox" id="filter2" name="filters[]" value="10002" {{ in_array(10002, request('filters', [])) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="filter2">Vui chơi giải trí</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <div class="filter-section">
                        <h5 class="filter-heading">Ưu đãi</h5>
                        <div class="filter-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="promotion1" checked>
                                <label class="custom-control-label" for="promotion1">Phiếu giảm giá</label>
                            </div>
                            <div class="custom-control custom-checkbox mt-2">
                                <input type="checkbox" class="custom-control-input" id="promotion2" checked>
                                <label class="custom-control-label" for="promotion2">Chiến dịch đặc biệt</label>
                            </div>
                            <div class="custom-control custom-checkbox mt-2">
                                <input type="checkbox" class="custom-control-input" id="promotion3" checked>
                                <label class="custom-control-label" for="promotion3">Ưu đãi có hạn giờ</label>
                            </div>
                            <div class="custom-control custom-checkbox mt-2">
                                <input type="checkbox" class="custom-control-input" id="promotion4" checked>
                                <label class="custom-control-label" for="promotion4">Ưu đãi</label>
                            </div>
                            <div class="custom-control custom-checkbox mt-2">
                                <input type="checkbox" class="custom-control-input" id="promotion5" checked>
                                <label class="custom-control-label" for="promotion5">Tất cả</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-9">
                <div class="row mb-4">
                    <div class="col-lg-6 col-md-12"></div>
                    <div class="col-lg-6 col-md-12">
                        <form id="searchForm" method="GET" action="{{ route('frontend.product.promotions') }}">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control" name="keyword" id="keywordInput" placeholder="Tìm kiếm / Nhập mã voucher"
                                    value="{{ request('keyword') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="searchButton" type="submit" style="font-weight: bold;">Tìm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="position: relative" id="searchResultsContainer">
                    <div class="w-100 h-100" id="loadingSpinner" style="display: none; position: absolute; z-index: 2; background-color: rgba(255, 255, 255, 0.6);">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <div class="spinner-border" style="color: #38b19e" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    @forelse ($products as $product)
                        @php
                            $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                            $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                            $now = \Carbon\Carbon::now();
                            $isComing = $now->lt($startDate);
                            $targetDate = $isComing ? $startDate : $endDate;
                        @endphp
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="item-card d-flex flex-column h-100">
                                <div class="item-image">
                                    <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100">
                                        <img src="{{ $product->promotionThuongMain->image ? asset('uploads/'.$product->promotionThuongMain->image->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                                    </a>
                                </div>

                                <div class="item-details d-flex flex-column flex-grow-1">
                                    <div class="flex-grow-1">
                                        <div class="promotion-badge">{{ $product->promotionThuongMain->name }}</div>
                                        <div class="item-title">{{ $product->name }}</div>
                                        <div class="item-desc">{{ $product->promotionThuongMain->description }}</div>
                                    </div>

                                    <div class="mt-auto">
                                        <div class="timer" data-target="{{ $targetDate->toIso8601String() }}">
                                            <div class="row text-center">
                                                <div class="col-3">
                                                    <span class="time-value">00</span>
                                                    <div class="time-d">Ngày</div>
                                                </div>
                                                <div class="col-3">
                                                    <span class="time-value">00</span>
                                                    <div class="time-d">Giờ</div>
                                                </div>
                                                <div class="col-3">
                                                    <span class="time-value">00</span>
                                                    <div class="time-d">Phút</div>
                                                </div>
                                                <div class="col-3">
                                                    <span class="time-value">00</span>
                                                    <div class="time-d">Giây</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="btn-get-offer">Xem thêm về ưu đãi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 mt-3">
                            <h6 class="text-center">Hiện không có ưu đãi nào.</h6>
                        </div>
                    @endforelse

                    <div class="col-12">
                        <div class="justify-content-center d-flex mt-3">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('styles')
{{-- <link rel="stylesheet" href="{{ auto_version('assets/frontend/css/style.css') }}"> --}}
<link rel="stylesheet" href="{{ auto_version('assets/frontend/css/uudai.css') }}">

@endsection
@section('script')
<script>
    document.getElementById('toggleFilters').addEventListener('click', function () {
        const filterSection = document.getElementById('filterSection');
        filterSection.classList.toggle('show');
        
        const buttonText = this.textContent.trim();
        if (buttonText.includes('Hiển thị')) {
            this.innerHTML = '<i class="fas fa-times mr-2"></i> Ẩn bộ lọc';
        } else {
            this.innerHTML = '<i class="fas fa-filter mr-2"></i> Hiển thị bộ lọc';
        }
    });

    document.getElementById('filterForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitFilterForm(1, false);
    });

    document.getElementById('searchForm').addEventListener('submit', function (e) {
        e.preventDefault();
        submitFilterForm(1, true);
    });

    document.getElementById('searchButton').addEventListener('click', function (e) {
        e.preventDefault();
        submitFilterForm(1, true);
    });

    document.querySelectorAll('.filter-checkbox').forEach(cb => {
        cb.addEventListener('change', () => {
            submitFilterForm(1, false);
        });
    });

    document.addEventListener('click', function (e) {
        if (e.target.closest('.pagination a')) {
            e.preventDefault();
            const url = new URL(e.target.closest('a').href);
            const page = url.searchParams.get('page');
            submitFilterForm(page);
        }
    });


    function submitFilterForm(page = 1, fromSearch = false) {
        const form = fromSearch ? document.getElementById('searchForm') : document.getElementById('filterForm');
        const formData = new FormData(form);

        if (!fromSearch) {
            const keyword = document.getElementById('keywordInput').value;
            if (keyword) {
                formData.set('keyword', keyword);
            }
        }

        if (fromSearch) {
            document.querySelectorAll('.filter-checkbox').forEach(cb => cb.checked = false);
        }

        formData.set('page', page);
        const queryString = new URLSearchParams(formData).toString();

        document.getElementById('loadingSpinner').style.display = 'block';

        fetch(form.action + '?' + queryString, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newContent = doc.querySelector('#searchResultsContainer').innerHTML;
            document.querySelector('#searchResultsContainer').innerHTML = newContent;

            initCountdownTimers();
            rebindEventListeners();
        })
        .catch(error => console.error(error))
        .finally(() => {
            document.getElementById('loadingSpinner').style.display = 'none';
        });
    }

    function rebindEventListeners() {
        const searchForm = document.getElementById('searchForm');
        const searchButton = document.getElementById('searchButton');

        if (searchForm) {
            searchForm.addEventListener('submit', function (e) {
                e.preventDefault();
                submitFilterForm(1, true);
            });
        }

        if (searchButton) {
            searchButton.addEventListener('click', function (e) {
                e.preventDefault();
                submitFilterForm(1, true);
            });
        }

        document.querySelectorAll('.filter-checkbox').forEach(cb => {
            cb.addEventListener('change', () => {
                submitFilterForm(1, false);
            });
        });
    }


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

    initCountdownTimers();

    function initCountdownTimers() {
        document.querySelectorAll('.timer').forEach(function (container) {
            const targetDate = new Date(container.dataset.target);
            const values = container.querySelectorAll('.time-value');

            function updateCountdown() {
                const now = new Date();
                const diff = targetDate - now;

                if (diff <= 0) {
                    values.forEach(v => v.textContent = '00');
                    return;
                }

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                const minutes = Math.floor((diff / (1000 * 60)) % 60);
                const seconds = Math.floor((diff / 1000) % 60);

                values[0].textContent = String(days).padStart(2, '0');
                values[1].textContent = String(hours).padStart(2, '0');
                values[2].textContent = String(minutes).padStart(2, '0');
                values[3].textContent = String(seconds).padStart(2, '0');
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    }

</script>
@endsection