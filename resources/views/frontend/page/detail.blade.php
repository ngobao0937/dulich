@extends('frontend.layout.app')
@section('title', 'Du lịch')
@section('content')
<div class="container pb-3 pt-4">
    <h2 class="text-center" style="font-weight: bold; color: rgb(28, 77, 114)">{{ $page->name }}</h2>
    <div class="mt-3">
        {!! $page->content !!}
    </div>
</div>
@endsection
@section('styles')

@endsection
@section('script')

@endsection