@extends('backend.layouts.app')
@section('content')
<?php
    $id = $product->id ?? null;
    $name = $product->name ?? null;
    $model = $product->model ?? null;
    $short_description = $product->short_description ?? null;
    $long_description = $product->long_description ?? null;
    $menu_fk = $product->menu_fk ?? null;
    $active = $product->active ?? '';
    $meta_keywords = $product->meta_keywords ?? null;
    $meta_description = $product->meta_description ?? null;
    $image = isset($product->image) ? $product->image->ten : null;
    $documents = $product->documents ?? null;

?>
<section class="content-header">
    <div class="container-fluid">
        <form action="{{ route('backend.product.store', request()->query()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row fixed-save">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success rounded-circle btn-lg" title="Lưu" data-toggle="tooltip" data-placement="top" title="Lưu"><i class="fas fa-save"></i></button>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $id }}">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $name }}" maxlength="250" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="model">Mã sản phẩm</label>
                                <input type="text" name="model" id="model" class="form-control" value="{{ $model }}" maxlength="50" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="menu_fk">Danh mục</label>
                                <select name="menu_fk" id="menu_fk" class="form-control" required>
                                    <option value="">-- Chọn danh mục --</option>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}" {{ $menu_fk == $menu->id ? 'selected' : '' }}>{{$menu->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short_description">Mô tả ngắn</label>
                        <textarea id="short_description" name="short_description" rows="2" class="form-control" maxlength="250">{{ $short_description }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="long_description">Mô tả chi tiết</label>
                        <textarea id="long_description" name="long_description" rows="10" cols="80">{{ $long_description }}</textarea>
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
                        <label for="document">Tài liệu</label>
                        <input type="file" id="document" name="document[]" accept=".pdf" multiple>
                    </div>

                    @if($documents && count($documents)>0)
                    <div class="row image-container" style="padding-left: 15px; margin-bottom: 15px;" id="documents_pdf">
                        @foreach($documents as $item)
                        <div class="document-item" data-id="{{ $item->id }}">
                            <div class="wrap-btn-delete" style="position: absolute; margin-top: -3px;">
                                <a href="javascript:void(0);" class="btn-delete-image" onclick="alertDelete({{ $item->id }})">
                                    <b>×</b>
                                </a>
                            </div>
                            <a href="{{ asset('uploads/documents/'.$item->name) }}" target="_blank">
                                <img style="width: 90px; height: 60px; display: block; object-fit: contain;" src="{{ asset('images/pdf.webp') }}">
                            </a>
                            <p>{{ $item->name }}</p>
                        </div>
                        @endforeach
                    </div>
                    @endif
    
                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" value="{{ $meta_keywords }}">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control" rows="2" style="resize: vertical;" maxlength="150">{{ $meta_description }}</textarea>
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
<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Xác nhận xóa</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
               <p>Bạn có muốn xóa file này?</p>
           </div>
           <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
               <button type="button" class="btn btn-danger delete">Xóa</button>
           </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    .fixed-save {
        position: fixed;
        bottom: 25px;
        right: 20px;
        z-index: 1000;
    }
    .collapse-btn {
        display: flex;
        justify-content: space-between;
        align-items: center;  
        width: 100%;    
        color: #333;
        font-size: 15px;
        border: none;                 
        background-color: transparent;
        cursor: pointer;
    }

    .image-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
        gap: 10px;
    }

    .row:before {
        content: none !important;
    }
    .document-item {
        position: relative;
        display: inline-block;
    }
    .btn-delete-image{
        color: rgb(216, 25, 25) !important; 
        font-size: 15px; 
        background-color: white; 
        padding: 0 5px; 
        border: 1px solid gainsboro; 
        cursor: pointer;
    }
    .btn-delete-image:hover{
        background-color: rgb(240, 240, 240); 
    }
</style>
@endsection
@section('scripts')
<script>
    document.getElementById('document').addEventListener('change', function () {
        const maxSize = 2 * 1024 * 1024; // 2MB
        let isValid = true;

        Array.from(this.files).forEach(file => {
            if (file.size > maxSize) {
                toastr.error(`File "${file.name}" quá lớn. Giới hạn là 2MB.`);
                isValid = false;
            }
        });

        if (!isValid) {
            this.value = ""; 
        }
    });
</script>

<script>
    CKEDITOR.replace('long_description', options);

    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
    }

    $('#myModal button.delete').on('click', function(e) {
       e.preventDefault();

       var documentId = $('#myModal').data('id');

       $.ajax({
            url: '{{ route('backend.product.deletePDF') }}',
            method: 'delete',
            data: {
                id: documentId,
            },
            success: function (response) {
                if (response.success) {
                    $('#myModal').modal('toggle');
                    $('.document-item[data-id="' + documentId + '"]').remove();

                    if ($("#documents_pdf .document-item").length === 0) {
                        $("#documents_pdf").remove();
                    }
                    toastr.success('Xóa file thành công!');
                } else {
                    toastr.error('Không thể xóa file!');
                }
            },
            error: function () {
                toastr.error('Đã xảy ra lỗi. Vui lòng thử lại!');
            }
        });
    });
</script>
@endsection
