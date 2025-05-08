@extends('backend.layouts.app')
@section('content')
<?php
    $id = $voucher->id ?? null;
    $name = $voucher->name ?? null;
    $stt = $voucher->stt ?? null;
    $price = $voucher->price ?? null;
    $chiet_khau = $voucher->chiet_khau ?? null;
    $content = $voucher->content ?? null;
    $start_date = $voucher->start_date ?? null;
    $end_date = $voucher->end_date ?? null;
    $product_fk = $voucher->product_fk ?? null;
    $active = $voucher->active ?? '';
    $image = isset($voucher->image) ? $voucher->image->ten : null;
?>
<section class="content-header">
    <div class="container-fluid">
        <form action="{{ route('backend.voucher.store', request()->query()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row fixed-save">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success rounded-circle btn-lg" title="Lưu" data-toggle="tooltip" data-placement="top" title="Lưu"><i class="fas fa-save"></i></button>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="form-group">
                        <label for="name">Tên voucher <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $name }}" maxlength="250" required>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">STT <span class="text-danger">*</span></label>
                                <input type="number" min="1" name="stt" id="stt" class="form-control" value="{{ $stt }}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">Giá <span class="text-danger">*</span></label>
                                <input type="number" min="0" name="price" id="price" class="form-control" value="{{ $price }}" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">Chiết khấu (%) <span class="text-danger">*</span></label>
                                <input type="number" min="0" max="100" step="0.1" name="chiet_khau" id="chiet_khau" class="form-control" value="{{ $chiet_khau }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Ngày bắt đầu<span class="text-danger">*</span></label>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $start_date }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Ngày kết thúc <span class="text-danger">*</span></label>
                                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $end_date }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Thuộc khách sạn  <span class="text-danger">*</span></label>
                        <select name="product_fk" id="product_fk" class="form-control select2" required>
                            <option value="">-- Chọn khách sạn --</option>
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $product_fk ? 'selected' : '' }}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea id="content" name="content" rows="10" cols="80">{{ $content }}</textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: -5px;">
                        <label style="margin-bottom: 0;">Hình đại diện</label>
                    </div>
    
                    <div class="image-upload-container mb-2">
                        <img id="imagePreview" src="{{ $image ? asset('uploads/' . $image) : asset('images/upload.png') }}" class="preview-image" />
                        <div class="upload-icon" id="uploadIcon">
                            <i class="fa fa-camera"></i>
                        </div>
                        <div class="remove-icon" id="removeIcon" style="display: none;">
                            <i class="fa fa-times"></i>
                        </div>
                        <input type="file" id="picture" name="picture" accept="image/*" hidden />
                    </div>

                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="active" id="active" {{ $active == 1 ? 'checked' : '' }}/>
                            <label for="active">Hoạt động</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('styles')
<style>
    .fixed-save {
        position: fixed;
        bottom: 25px;
        right: 20px;
        z-index: 1000;
    }
</style>
@endsection
@section('scripts')
<script>
    CKEDITOR.replace('content', options);
</script>
@endsection
