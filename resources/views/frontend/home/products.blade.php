@extends('frontend.layout.app')
@section('title', 'Sản phẩm')
@section('content')
<div class="widthMain">
    <div class="mainTitle"><h2>Sản phẩm</h2></div>
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
    <div class="d-flex justify-content-center mt-2 mb-2">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
@section('styles')

@endsection
@section('script')

@endsection