@extends('frontend.layout.app')
@section('title', $menu->name)
@section('content')
<div class="widthMain">
    <div class="mainTitle">
        <h2>Sản phẩm / {{ $menu->name }}</h2>
    </div>
    <div class="mainProduct" style="margin-top: -5px;">
        <div class="contentProduct table-responsive">
            <table class="table table-hover" width="100%" cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th width="120" class="uppercase red text-center" style="min-width: 120px;">
                            <img src="{{ asset('assets/frontend/images/icon_image.png') }}" /> Hình ảnh
                        </th>
                        <th class="uppercase red text-center" style="min-width: 250px;">
                            <img src="{{ asset('assets/frontend/images/icon_pro.png') }}" /> Tên sản phẩm
                        </th>
                        <th width="120" class="uppercase red text-center" style="min-width: 120px;">
                            <img src="{{ asset('assets/frontend/images/icon_find.png') }}" /> Tài liệu
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse ($products as $product)
                    <tr style="font-size: 14px;">
                        <td>
                            <a href="{{ $product->image ? asset('uploads/'.$product->image->ten) : asset('images/default.jpg') }}" class="highslide" onclick="return hs.expand(this)">
                                <img src="{{ $product->image ? asset('uploads/'.$product->image->ten) : asset('images/default.jpg') }}" class="productTDImgsize" />
                            </a>
                        </td>
                        <td class="top">
                            <h4><a href="{{ route('frontend.home.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->name }}</a></h4>
                            <br />
                            Model: <b>{{ $product->model }}</b>
                            <p>
                                {{ $product->short_description }}
                            </p>
                        </td>
                        <td class="text-center">
                            <div class="text-center">
                                @foreach ($product->documents as $document)
                                <a href="{{ asset('uploads/documents/'.$document->name) }}" target="_blank" title="{{ $document->name }}">
                                    <img src="{{ asset('assets/frontend/images/icon_pdf.png') }}" alt="{{ $document->name }}" />
                                </a>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="3">
                            Không có sản phẩm
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Page number -->
        </div>
        <div class="d-flex justify-content-center mt-3 mb-2">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
@endsection