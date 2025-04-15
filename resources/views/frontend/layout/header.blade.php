<!-- HEADER -->	
<div class="Header">
    {{-- <div style="position: absolute; width: 100%; height: 50px; background: #54546d; z-index: 1;">

    </div> --}}
    <div style="position: absolute; left: 20px; top: 15px; z-index: 2;">
        <a href="{{ route('frontend.home.index') }}">
            <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Logo" width="110">
        </a>
    </div>
    <div class="headerCompany" style="position: absolute; left: 0px; top: 0px; width: 100%; height: 45px; text-align: left; background-color: #54546d; z-index: 1; padding: 15px 0 0 120px">ASIMAT CO., LTD.</div>
    <div class="headerSearch" style="margin: 15px; z-index: 2; position: relative;">
        <form name="frmsearch" method="get" action="{{ route('frontend.home.products') }}">
            <div class="searchLable">Tìm kiếm</div>
            <input name="keyword" id="keyword" type="text" placeholder="Nhập từ khóa" class="searchForm"/>
            <a href="javascript:void(0);" class="searchBtn">
                <span><img src="{{ asset('assets/frontend/images/blank.gif') }}" width="20" /></span>
            </a>
        </form>
    </div>
    
    <div class="clear"></div>
    <div class="topMenu menu-top">
        <ul>
            <li class=""><a href="/">Trang chủ</a></li>
            <li class=""><a href="{{ route('frontend.home.page', ['slug'=>$pageGt->slug]) }}">Giới thiệu</a></li>
            <li class=""><a href="{{ route('frontend.home.products') }}">Sản phẩm</a></li>
            <li class=""><a href="/lien-he">Liên hệ</a></li>
            {{-- <li class="lang">
                <div class="headerLang">
                    <a href=""><img src="{{ asset('assets/frontend/images/lang_1290412622.png') }}" alt="" /></a>
                    <a href=""><img src="{{ asset('assets/frontend/images/lang_1290412632.png') }}" alt="" /></a>
                </div>
            </li> --}}
        </ul>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<!-- end of HEADER -->

<!-- Banner -->
<div class="mainBanner">
    <div class="swiper bannerSwiper">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
            <div class="swiper-slide">
                <a href="{{ $banner->link ? $banner->link : '#' }}"><img src="{{ $banner->image ? asset('uploads/'.$banner->image->ten) : asset('images/default.jpg') }}" alt="{{ $banner->ten }}"></a>
            </div>
            @endforeach
        </div>

        <!-- Pagination dạng số -->
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- end of BANNER -->