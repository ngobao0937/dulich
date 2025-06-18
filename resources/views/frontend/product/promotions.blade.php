@extends('frontend.layout.app')
@section('title', 'Khuyến mãi & ưu đãi')
@section('content')
<section class="d-none d-md-block banner-desktop" id="bannerDesktop">
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

<section class="d-block d-md-none banner-mobile" id="bannerMobile">
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
    <div id="app">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-outline-secondary mobile-filter-toggle" id="toggleFilters" @click="toggleFilters">
                        <i class="fas fa-filter mr-2"></i> Hiển thị bộ lọc
                    </button>
                </div>
                
                <div class="col-lg-3">
                    <div id="filterSection" :class="{ show: isFilterVisible }" style="position: sticky; z-index: 5; top: 90px;">
                        <div class="filter-section">
                            <h5 class="filter-heading">Áp dụng được cho</h5>
                            <div class="filter-group">
                                <div v-for="filter in filterOptions" :key="filter.id" class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" class="custom-control-input" :id="'filter_' + filter.id"
                                        :value="filter.id" v-model="filters" @change="onFilterChange">
                                    <label class="custom-control-label" :for="'filter_' + filter.id">@{{ filter.label }}</label>
                                </div>
                            </div>
                        </div>
                        
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
                            <div class="input-group search-bar mb-3 position-relative">
                                <input type="text" class="form-control" v-model="keyword" @keyup.enter="searchProducts" maxlength="50" placeholder="Tìm kiếm / Nhập mã voucher" style="padding-right: 40px;">
                                <span v-if="keyword"
                                    class="clear-btn"
                                    @click="clearKeyword">
                                    &times;
                                </span>
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold" @click="searchProducts">Tìm</button>
                                </div>
                            </div>
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

                        <div v-for="product in products" :key="product.id" class="col-md-6 col-lg-4 mb-3">
                            <div class="item-card d-flex flex-column h-100">
                                <div class="item-image">
                                    <a :href="`/ks${product.id}-${product.slug}`" class="w-100">
                                        <img :src="product.promotion_thuong_main?.image?.ten ? `/uploads/${product.promotion_thuong_main.image.ten}` : '/images/default.jpg'"
                                            :alt="product.name">
                                    </a>
                                </div>

                                <div class="item-details d-flex flex-column flex-grow-1">
                                    <div class="flex-grow-1">
                                        <div class="promotion-badge">@{{ product.promotion_thuong_main?.name }}</div>
                                        <div class="item-title">@{{ product.name }}</div>
                                        <div class="item-desc">@{{ product.promotion_thuong_main?.description }}</div>
                                    </div>

                                    <div class="mt-auto">
                                        <div class="timer"
                                            :data-target="product.isComing ? product.promotion_thuong_main?.start_date : getEndDate(product)">
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
                                            <a :href="`/ks${product.id}-${product.slug}`" class="btn-get-offer">Xem thêm về ưu đãi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="products.length === 0" class="col-12 mt-3">
                            <h6 class="text-center">Hiện không có ưu đãi nào.</h6>
                        </div>
                    </div>

                    <div class="col-12" v-if="products.length !== 0 && pagination.last_page > 1">
                        <div class="justify-content-center d-flex mt-3">
                            <ul class="pagination">
                                <li class="page-item" :class="{ disabled: !pagination.prev_page_url }">
                                    <a class="page-link" href="#" @click.prevent="goToPage(pagination.current_page - 1)">&lsaquo;</a>
                                </li>

                                <li class="page-item" v-for="page in pagination.last_page" :key="page"
                                    :class="{ active: page === pagination.current_page }">
                                    <a class="page-link" href="#" @click.prevent="goToPage(page)">@{{ page }}</a>
                                </li>

                                <li class="page-item" :class="{ disabled: !pagination.next_page_url }">
                                    <a class="page-link" href="#" @click.prevent="goToPage(pagination.current_page + 1)">&rsaquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('styles')
<link rel="stylesheet" href="{{ auto_version('assets/frontend/css/uudai.css') }}">

@endsection
@section('script')
<script src="{{ asset('assets/frontend/js/vue.js') }}"></script>
<script>
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

    new Vue({
        el: '#app',
        data: {
            isFilterVisible: false,
            products: [],
            pagination: {
                current_page: 1,
                last_page: 1,
                next_page_url: null,
                prev_page_url: null
            },
            keyword: '',
            filters: [],
            filterOptions: [
                { id: 10000, label: 'Nghỉ dưỡng, khách sạn' },
                { id: 10001, label: 'Ẩm thực nhà hàng' },
                { id: 10002, label: 'Vui chơi giải trí' }
            ]
        },
        computed: {
            buttonText() {
                return this.isFilterVisible ? 'Ẩn bộ lọc' : 'Hiển thị bộ lọc';
            },
            iconClass() {
                return this.isFilterVisible ? 'fas fa-times' : 'fas fa-filter';
            }
        },
        methods: {
            toggleFilters() {
                this.isFilterVisible = !this.isFilterVisible;
            },
            async loadProducts(page = 1) {
                try {
                    document.getElementById('loadingSpinner').style.display = 'block';

                    const params = new URLSearchParams();
                    params.append('page', page);
                    if (this.keyword) params.append('keyword', this.keyword);
                    this.filters.forEach(id => params.append('filters[]', id));

                    const response = await fetch(`/load-danh-sach-khuyen-mai?${params.toString()}`);
                    const data = await response.json();

                    this.products = data.products.data;
                    this.pagination = {
                        current_page: data.products.current_page,
                        last_page: data.products.last_page,
                        next_page_url: data.products.next_page_url,
                        prev_page_url: data.products.prev_page_url
                    };

                    this.$nextTick(() => initCountdownTimers());
                } catch (err) {
                    console.error('Lỗi tải sản phẩm:', err);
                } finally {
                    document.getElementById('loadingSpinner').style.display = 'none';
                }
            },
            goToPage(page) {
                if (page < 1 || page > this.pagination.last_page) return;
                this.loadProducts(page);
            },
            searchProducts() {
                this.loadProducts(1); 
            },

            // Gọi khi checkbox thay đổi
            onFilterChange() {
                this.loadProducts(1);
            },
            getEndDate(product) {
                if (!product.promotion_thuong_main || !product.promotion_thuong_main.start_date || product.promotion_thuong_main.end_in == null) {
                    return '';
                }
                const startDate = new Date(product.promotion_thuong_main.start_date);
                startDate.setDate(startDate.getDate() + product.promotion_thuong_main.end_in);
                return startDate.toISOString();
            },
            clearKeyword() {
                this.keyword = '';
                this.currentPage = 1;
                this.searchProducts();
            }

        },
        mounted() {
            this.loadProducts();
        }
    });
</script>
@endsection