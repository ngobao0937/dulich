@extends('backend.layouts.app')
@section('content')
<?php
    $id = $product->id ?? null;
    $name = $product->name ?? null;
    $address = $product->address ?? null;
    $phone = $product->phone ?? null;
    $email = $product->email ?? null;
    $link = $product->link ?? null;
    $content = $product->content ?? null;
    $menu_fk = $product->menu_fk ?? null;
    $active = $product->active ?? '';
    $meta_keywords = $product->meta_keywords ?? null;
    $meta_description = $product->meta_description ?? null;
    $image = isset($product->image) ? $product->image->ten : null;
    $vr360 = isset($product->vr360) ? $product->vr360->ten : null;
    $images = $product->images ?? null;

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
                    <div class="form-group">
                        <label for="name">Tên khách sạn <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $name }}" maxlength="250" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Địa chỉ<span class="text-danger">*</span></label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $address }}" maxlength="250" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Số điện thoại<span class="text-danger">*</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control" value="{{ $phone }}" maxlength="250" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $email }}" maxlength="250" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Thuộc danh mục</label>
                        <div class="select2-primary">
                            <select name="menus_fk[]" id="menus_fk" class="select2-multiple" multiple="multiple" data-placeholder="-- Chọn các danh mục --">
                                @php
                                    $selectedMenus = (isset($product) && $product != null) ? $product->menus->pluck('id')->toArray() : [];
                                @endphp
                                @foreach (\App\Models\Menu::where('menu_fk', 0)->get() as $menu)
                                    <option value="{{ $menu->id }}" 
                                        {{ in_array($menu->id, $selectedMenus) ? 'selected' : '' }}>
                                        {{ $menu->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label for="name">Link video<span class="text-danger">*</span></label>
                        <input type="text" name="link" id="link" class="form-control" value="{{ $link }}">
                    </div>

                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea id="content" name="content" rows="10" cols="80">{{ $content }}</textarea>
                    </div>

                    <div class="d-flex flex-wrap">
                        <div class="mr-3">
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
                        </div>

                        <div>
                            <div class="form-group" style="margin-bottom: -5px;">
                                <label style="margin-bottom: 0;">VR 360</label>
                            </div>
            
                            <div class="image-upload-container mb-2">
                                <img id="imagePreview360" src="{{ $vr360 ? asset('uploads/' . $vr360) : asset('images/upload.png') }}" class="preview-image" />
                                <div class="upload-icon" id="uploadIcon360">
                                    <i class="fa fa-camera"></i>
                                </div>
                                <div class="remove-icon" id="removeIcon360" style="display: none;">
                                    <i class="fa fa-times"></i>
                                </div>
                                <input type="file" id="picture360" name="picture360" accept="image/*" hidden />
                            </div>
                        </div>
                    </div>

                    

                    @if($images && count($images)>0)
                    <div class="form-group" style="margin-bottom: 0;" id="labelPictures">
                        <label>Hình ảnh khác</label><i class="fa fa-info-circle" style="margin-left: 5px;" data-toggle="tooltip" data-placement="right" title="Kéo thả và nhấn lưu để thay đổi thứ tự ảnh"></i>
                    </div>
                    <div class="row image-container" style="padding-left: 15px; margin-bottom: 15px;" id="pictures">
                        @foreach($images as $item)
                        <div class="image-item" data-id="{{ $item->id }}" style="cursor: grab;">
                            <div class="wrap-btn-delete" style="position: absolute; margin-top: -3px;">
                                <a href="javascript:void(0);" class="btn-delete-image" onclick="alertDelete({{ $item->id }})">
                                    <b>×</b>
                                </a>
                            </div>
                            <img style="width: 100px; height: 80px; background-size: contain; display: block; border: 1px solid gray; object-fit: cover;" src="{{ asset('uploads/'.$item->ten) }}">
                        </div>
                        @endforeach
                    </div>
                    @endif

                    @if(isset($product) && $images && count($images) > 0)
                    <button id="save-order" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">Lưu thứ tự</button>
                    @endif
    
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                              <a class="collapsed card-link w-100 d-flex" data-toggle="collapse" href="#collapseThree">
                                <span style="color: #333; font-weight: bold">Tải hình ảnh khác</span>
                              </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                              <div class="card-body">
                                <div class="form-group">
                                    <div id="dropzone-pictures" class="dropzone custom-dropzone">
                                        <div class="dz-message">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Kéo & thả ảnh vào đây hoặc <span>nhấn để chọn ảnh</span></p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="uploaded_pictures" id="uploaded_pictures">
                                </div>
                              </div>
                            </div>
                          </div>
                    </div> 
    
                    <div class="form-group">
                        <label>Meta Keywords</label><i class="fas fa-question-circle ml-1" data-toggle="tooltip" title="Các từ khóa hỗ trợ trang web xuất hiện ưu tiên khi người dùng tìm kiếm, mỗi từ cách nhau bằng dấu phẩy (VD: 'key 1, key 2')"></i>
                        <input type="text" name="meta_keywords" class="form-control" value="{{ $meta_keywords }}">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label><i class="fas fa-question-circle ml-1" data-toggle="tooltip" title="Hiển thị nội dung mô tả khi chia sẻ liên kết khách sạn qua Messenger, Zalo, ..."></i>
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
               <p>Bạn có muốn xóa ảnh này?</p>
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
<script src="{{ asset('assets/backend/plugins/dropzone6/dropzone-min.js') }}"></script>
<link href="{{ asset('assets/backend/plugins/dropzone6/dropzone.css') }}" rel="stylesheet" type="text/css" />
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
    .custom-dropzone {
        border: 2px dashed #007bff;
        background: rgba(0, 123, 255, 0.05);
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .custom-dropzone .dz-message {
        font-size: 16px;
        color: #007bff;
        font-weight: bold;
    }
    
    .custom-dropzone .dz-message i {
        font-size: 50px;
        color: #007bff;
        margin-bottom: 10px;
    }
    
    .custom-dropzone .dz-message span {
        color: #ff5722;
        cursor: pointer;
        text-decoration: underline;
    }
    
    .custom-dropzone:hover {
        background: rgba(0, 123, 255, 0.1);
        border-color: #0056b3;
    }
    .dropzone .dz-preview.dz-image-preview{
        background: none !important;
    }
    .dropzone .dz-preview .dz-image{
        background: white !important;
    }
    .dropzone .dz-preview .dz-remove{
        color: red;
        margin-top: 5px;
    }
    .image-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 10px;
    }

    .row:before {
        content: none !important;
    }
    .image-item {
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
<script src="{{ asset('assets/backend/plugins/sortable/Sortable.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var pictures = document.getElementById("pictures");
        var saveOrderBtn = document.getElementById("save-order");

        if (pictures) {
            new Sortable(pictures, {
                animation: 150,
                ghostClass: "sortable-ghost"
            });
        }

        if (saveOrderBtn) {
            saveOrderBtn.addEventListener("click", function(event) {
                event.preventDefault();

                var pictureIDs = pictures 
                    ? [...pictures.querySelectorAll(".image-item")].map(item => item.dataset.id) 
                    : [];

                fetch("{{ route('backend.update.image.order') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ 
                        order: pictureIDs 
                    })
                })
                .then(response => response.json())
                .then(data => toastr.success(data.message))
                .catch(error => console.error("Error:", error));
            });
        }
    });
</script>
<script>
    CKEDITOR.replace('content', options);

    var vr360Image = "";

    $('#uploadIcon360').on('click', function() {
        $('#picture360').click();
    });

    $('#imagePreview360').on('click', function() {
        $('#picture360').click();
    });

    $('#picture360').on('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview360').attr('src', e.target.result);
                $('#removeIcon360').show();
            };
            reader.readAsDataURL(file);
        }
    });

    $('#removeIcon360').on('click', function() {
        $('#picture360').val('');
        if (vr360Image) {
            $('#imagePreview360').attr('src', vr360Image);
        } else {
            $('#imagePreview360').attr('src', defaultImage);
        }
        $('#removeIcon360').hide(); 
    });
    
    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
    }

    $('#myModal button.delete').on('click', function(e) {
       e.preventDefault();

       var imageId = $('#myModal').data('id');

       $.ajax({
            url: '{{ route('backend.product.delete.img') }}',
            method: 'delete',
            data: {
                id: imageId,
            },
            success: function (response) {
                if (response.success) {
                    $('#myModal').modal('toggle');
                    $('.image-item[data-id="' + imageId + '"]').remove();

                    if ($("#pictures .image-item").length === 0) {
                        $("#labelPictures").remove();
                        $("#pictures").remove();
                    }
                    if(($("#pictures .image-item").length === 0)){
                        $("#save-order").remove();
                    }
                    toastr.success('Xóa ảnh thành công!');
                } else {
                    toastr.error('Không thể xóa ảnh!');
                }
            },
            error: function () {
                toastr.error('Đã xảy ra lỗi. Vui lòng thử lại!');
            }
        });
    });
</script>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        function initDropzone(dropzoneId, hiddenInputId, maxFiles = null) {
            if (!document.getElementById(dropzoneId)) {
                console.error(`Element với ID '${dropzoneId}' không tồn tại`);
                return;
            }

            return new Dropzone(`#${dropzoneId}`, {
                url: '/admin/upload-image',
                paramName: 'file',
                maxFiles: maxFiles, 
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                dictDefaultMessage: "Kéo & thả ảnh vào đây hoặc nhấn để tải lên",
                dictRemoveFile: "Xóa ảnh",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                transformFile: function(file, done) {
                    const maxSize = 300 * 1024;
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        const img = new Image();
                        img.src = event.target.result;

                        img.onload = function() {
                            const canvas = document.createElement('canvas');
                            const ctx = canvas.getContext('2d');

                            let width = img.width;
                            let height = img.height;

                            const MAX_WIDTH = 1024;
                            if (width > MAX_WIDTH) {
                                height *= MAX_WIDTH / width;
                                width = MAX_WIDTH;
                            }

                            canvas.width = width;
                            canvas.height = height;
                            ctx.drawImage(img, 0, 0, width, height);

                            let quality = 0.7; 
                            let compressedDataUrl = canvas.toDataURL('image/jpeg', quality);

                            while (compressedDataUrl.length > maxSize && quality > 0.3) {
                                quality -= 0.1;
                                compressedDataUrl = canvas.toDataURL('image/jpeg', quality);
                            }

                            fetch(compressedDataUrl)
                                .then(res => res.blob())
                                .then(blob => {
                                    const compressedFile = new File([blob], file.name, { type: 'image/jpeg' });
                                    done(compressedFile);
                                });
                        };
                    };

                    reader.readAsDataURL(file);
                },
                init: function() {
                    this.on('success', function(file, response) {
                        file.uploadedFileName = response.file_name; 
                        if (maxFiles === 1) {
                            $(`#${hiddenInputId}`).val(response.file_name);
                        } else {
                            let currentFiles = JSON.parse($(`#${hiddenInputId}`).val() || '[]');
                            currentFiles.push(response.file_name);
                            $(`#${hiddenInputId}`).val(JSON.stringify(currentFiles));
                        }
                    });

                    this.on('removedfile', function(file) {
                        let currentFiles = JSON.parse($(`#${hiddenInputId}`).val() || '[]');
                        currentFiles = currentFiles.filter(name => name !== file.uploadedFileName);
                        $(`#${hiddenInputId}`).val(currentFiles.length ? JSON.stringify(currentFiles) : '');
                    });

                    this.on('error', function(file, errorMessage) {
                        alert('Tải ảnh thất bại: ' + errorMessage);
                        this.removeFile(file);
                    });
                }
            });
        }

        initDropzone('dropzone-pictures', 'uploaded_pictures'); 
    });

</script>
@endsection
