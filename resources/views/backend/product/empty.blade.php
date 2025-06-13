@extends('backend.layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <h6 class="text-center">Bạn chưa sở hữu khách sạn nào. Vui lòng liên hệ quản trị viên.</h6>
    </div>
</section>
@endsection
@section('scripts')
@if (Auth::user()->role->id == 2 && $chatbotKS->link)
    <script id="chat-init" src="{{ $chatbotKS->link }}"></script>
@endif
@endsection