@extends('frontend.layout.app')
@section('title', $page->name)
@section('content')
<div class="widthMain">
    <!-- About us -->
    <div class="mainTitle"><h2>{{ $page->name }}</h2></div>
    <div class="aboutUs" style="font-size: 14px;">
        {!! $page->content !!}

        {{-- <div class="gioithieukhac">
            <h4>Bài giới thiệu khác</h4>
            <ul>
                <li><a href="./index.php?mod=common&amp;cid=2">Chính sách bảo mật</a></li>
                <li><a href="./index.php?mod=common&amp;cid=3">Chính sách bảo hành và đổi trả</a></li>
                <li><a href="./index.php?mod=common&amp;cid=4">Chính sách xử lý khiếu nại</a></li>
            </ul>
        </div> --}}
    </div>
</div>

@endsection
@section('styles')

@endsection
@section('script')

@endsection