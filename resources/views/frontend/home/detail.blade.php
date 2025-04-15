@extends('frontend.layout.app')
@section('title', $product->name)
@section('content')
<div class="widthMain">
    <div class="mainTitle"><h2>Thông tin chi tiết</h2></div>
    <div class="row">
        <div class="col-md-4 d-flex justify-content-center">
            <div class="productDetailTxtImg">
                <div class="detailProImg w-100 h-100">
                    <a href="{{ $product->image ? asset('uploads/'.$product->image->ten) : asset('images/default.jpg') }}" class="highslide" onclick="return hs.expand(this)">
                        <img src="{{ $product->image ? asset('uploads/'.$product->image->ten) : asset('images/default.jpg') }}" class="productDetailImg" />
                    </a>
                    <div class="zoomImg"><img src="{{ asset('assets/frontend/images/icon_zoom.gif') }}" /> Nhấn vào để xem ảnh lớn</div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="productDetailTxt" style="width: 100%;">
                <div class="proName"><h2>{{ $product->name }}</h2></div>
                <div class="proNum" style="font-size: 14px;"><b>Model: </b>{{ $product->model }}</div>
                <p></p>
                <div style="line-height: 1.5;">
                    <b style="font-size: 14px;">Tài liệu kỹ thuật</b>: 
                    @foreach ($product->documents as $document)
                    <a href="{{ asset('uploads/documents/'.$document->name) }}" target="_blank">
                        <img src="{{ asset('assets/frontend/images/page_pdf.png') }}" alt="{{ $document->name }}" /> 
                        {{ $document->name }}
                    </a>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <div class="mainProduct">
        <div class="proDes">
            <div class="titleDes"><h2>Mô tả sản phẩm</h2></div>
            <div class="mt-2" style="font-size: 14px; line-height: 1.5;">
                {!! $product->long_description !!}
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="mainTitle"><h2>Sản phẩm cùng loại</h2></div>
    <div class="row product-container">
        @foreach ($products as $product)
        <div class="product-item">
            <a href="{{ route('frontend.home.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">
                <img loading="lazy" src="{{ $product->image ? asset('uploads/'.$product->image->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}" />
                <span>{{ $product->name }}</span>
            </a>
        </div>
        @endforeach
        
        <div class="clear"></div>
        <div class="clear"></div>
    </div>
</div>
@endsection