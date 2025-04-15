@extends('frontend.layout.app')
@section('title', 'Hose and Fittings - Quality')
@section('content')
<div class="row">
    <div class="col-md-7" style="padding: 0 20px">
        <div class="mainTitle">
            <h2>Giới thiệu</h2>
        </div>
        <div class="homeAbout" style="font-size: 14px;">
            <div class="home-content">
                {!! $trang_chu->content !!}
            </div>
            <p><a href="{{ route('frontend.home.page', ['slug'=>$pageGt->slug]) }}" class="moredetail" style="font-size: 14px;">Xem chi tiết</a></p>
        </div>
    </div>
    <div class="col-md-5">
        <div class="mainTitle">
            <h2>Sản phẩm</h2>
        </div>
        <div class="row product-container">
            @foreach ($menus_public as $menu)
            <div class="product-item">
                <a href="{{ route('frontend.home.menu', ['slug'=>$menu->slug]) }}">
                    <img loading="lazy" src="{{ $menu->image ? asset('uploads/'.$menu->image->ten) : asset('images/default.jpg') }}" alt="{{ $menu->name }}" />
                    <span>{{ $menu->name }}</span>
                </a>
            </div>
            @endforeach
            
            <div class="clear"></div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="clear"></div>
@endsection
@section('styles')
<style>
    .home-content img{
        width: inherit;
        height: inherit;
        max-width: 100%;
    }
</style>
@endsection

