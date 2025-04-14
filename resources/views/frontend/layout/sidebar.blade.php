<!-- Categories of Product -->
<div class="leftMenu"style="width: 270px;">
    <div class="menu-left">
        <div class="leftTitle">
            <h2>MINH LAP CO., LTD.</h2>
        </div>
        <div class="topMenu pt-3 pb-3 " style="position:unset; background: #e5e5ff;">
            <ul>
                <li class=""><a href="/">Trang chủ</a></li>
                <li class=""><a href="{{ route('frontend.home.page', ['slug'=>$pageGt->slug]) }}">Giới thiệu</a></li>
                <li class=""><a href="{{ route('frontend.home.products') }}">Sản phẩm</a></li>
                <li class=""><a href="/lien-he">Liên hệ</a></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="leftTitle">
        <h2>Danh mục sản phẩm</h2>
    </div>
    <div class="ddsmoothmenu-v" style="text-align: left; font-size: 13px;">
        <ul style="width: 100%">
            @foreach ($menus as $menu)
            <li><a href="{{ route('frontend.home.menu', ['slug'=>$menu->slug]) }}">{{ $menu->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- Visitor Counter -->
<div class="visitorCounter">Số lượt truy cập <b>1060998</b><br />Số người đang xem <b>03</b></div>
<!-- Web links -->
<div class="webLink">
    <span style="font-size: 14px;">Liên kết website</span>
    <select class="webLinkForm mt-2 form-control form-control-sm w-100" onchange="goToURL(this)" style="font-size: 14px;">
        <option>Liên kết website</option>
        @foreach ($websites as $website)
        <option value="{{ $website->link ? $website->link : '#' }}" >{{ $website->name }}</option>
        @endforeach
    </select>
</div>
<!-- Banner -->
<div class="bannerLeft">
    <div class="mainTitle">
        <h2>Đối tác</h2>
    </div>
    <div class="lkw_s">
        <div id="topdeals" class="topdeals" style="position: relative;">
            <div id="topdeals1">
                @foreach ($partners as $partner)
                <div class="adsTD">
                    <a href="{{ $partner->link ? $partner->link : '#' }}" target="_blank">
                        <img loading="lazy" class="advertisingImg" src="{{ $partner->image ? asset('uploads/'.$partner->image->ten) : asset('images/default.jpg') }}" alt="{{ $partner->ten }}">
                    </a>
                </div>
                @endforeach
            </div>
            <div id="topdeals2">
                @foreach ($partners as $partner)
                <div class="adsTD">
                    <a href="{{ $partner->link ? $partner->link : '#' }}" target="_blank">
                        <img loading="lazy" class="advertisingImg" src="{{ $partner->image ? asset('uploads/'.$partner->image->ten) : asset('images/default.jpg') }}" alt="{{ $partner->ten }}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>