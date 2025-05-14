@extends('backend.layouts.app')
@section('content')
<?php
    $id = $product->id ?? null;
    $name = $product->name ?? null;
    $address = $product->address ?? null;
    $location = $product->location ?? null;
    $hotline = $product->hotline ?? null;
    $phone = $product->phone ?? null;
    $email = $product->email ?? null;
    $website = $product->website ?? null;
    $facebook = $product->facebook ?? null;
    $instagram = $product->instagram ?? null;
    $twitter = $product->twitter ?? null;
    $youtube = $product->youtube ?? null;
    $tiktok = $product->tiktok ?? null;
    $link360 = $product->link360 ?? null;
    $content = $product->content ?? null;
    $map = $product->map ?? null;
    $chatbot = $product->chatbot ?? null;
    $extension_fk = $product->extension_fk ?? null;
    $menu_fk = $product->menu_fk ?? null;
    $active = $product->active ?? '';
    $slug = $product->slug ?? null;
    $meta_keywords = $product->meta_keywords ?? null;
    $meta_description = $product->meta_description ?? null;
    $image = isset($product->image) ? $product->image->ten : null;
    $vr360 = isset($product->vr360) ? $product->vr360->ten : null;
    $images = $product->images ?? null;
    $banners = $product->banners ?? null;
?>
<section class="content-header">
    <div class="container-fluid" id="accordion">
        <form action="{{ route('backend.product.store', request()->query()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="row fixed-save">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success rounded-circle btn-lg" title="Lưu" data-toggle="tooltip" data-placement="top" title="Lưu"><i class="fas fa-save"></i></button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="card-link w-100 d-flex" data-toggle="collapse" href="#collapseInfo" aria-expanded="true">
                        <span style="color: #333; font-weight: bold">Thông tin</span>
                    </a>
                </div>
                <div id="collapseInfo" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="name">Tên <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $name }}" maxlength="250" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $address }}" maxlength="250">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Thuộc danh mục</label> <small><span class="text-muted">(có thể chọn nhiều)</span></small>
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
                            <label for="location">Vị trí & điểm tham quan gần</label>
                            <textarea name="location" id="location" class="form-control">{{ $location }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="hotline">Hotline</label>
                                    <input type="tel" name="hotline" id="hotline" class="form-control" value="{{ $hotline }}" maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">Điện thoại</label>
                                    <input type="tel" name="phone" id="phone" class="form-control" value="{{ $phone }}" maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $email }}" maxlength="300">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website" name="website" placeholder="https://example.com" value="{{ $website }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                        </div>
                                        <input type="url" class="form-control" id="facebook" name="facebook" placeholder="https://facebook.com/yourpage" value="{{ $facebook }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        </div>
                                        <input type="url" class="form-control" id="instagram" name="instagram" placeholder="https://instagram.com/youraccount" value="{{ $instagram }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        </div>
                                        <input type="url" class="form-control" id="twitter" name="twitter" placeholder="https://twitter.com/yourhandle" value="{{ $twitter }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="youtube">YouTube</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                        </div>
                                        <input type="url" class="form-control" id="youtube" name="youtube" placeholder="https://youtube.com/yourchannel" value="{{ $youtube }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tiktok">Tiktok</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-tiktok"></i></span>
                                        </div>
                                        <input type="url" class="form-control" id="tiktok" name="tiktok" placeholder="https://tiktok.com/@youraccount" value="{{ $tiktok }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="link360">Link VR 360</label>
                                    <input type="url" name="link360" id="link360" class="form-control" value="{{ $link360 }}" placeholder="https://example.com/vr360">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="chatbot">Chatbot</label>
                                    <input type="url" name="chatbot" id="chatbot" class="form-control" value="{{ $chatbot }}" placeholder="Nhập link script chatbot">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="map">Bản đồ</label>
                                    <input type="text" name="map" id="map" class="form-control" value="{{ $map }}" maxlength="255" placeholder="Vĩ độ, kinh độ">
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="content">Giới thiệu</label>
                            <textarea id="content" name="content" rows="10" cols="80">{{ $content }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link w-100 d-flex" data-toggle="collapse" href="#collapseImage">
                    <span style="color: #333; font-weight: bold">Hình ảnh</span>
                    </a>
                </div>
                <div id="collapseImage" class="collapse" data-parent="#accordion">
                    <div class="card-body">
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

                        @if($banners && count($banners) > 0)
                            <div class="form-group" style="margin-bottom: 0;" id="labelBanners">
                                <label>Banner</label><i class="fas fa-question-circle" style="margin-left: 5px;" data-toggle="tooltip" data-placement="right" title="Kéo thả và nhấn lưu để thay đổi thứ tự ảnh"></i>
                            </div>
                            <div class="row image-container" id="sortable-banner-images" style="padding-left: 15px; margin-bottom: 15px;">
                                @foreach($banners as $item)
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

                        @if($images && count($images)>0)
                        <div class="form-group" style="margin-bottom: 0;" id="labelPictures">
                            <label>Thư viện ảnh</label><i class="fas fa-question-circle" style="margin-left: 5px;" data-toggle="tooltip" data-placement="right" title="Kéo thả và nhấn lưu để thay đổi thứ tự ảnh"></i>
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

                        @if(isset($product) && (is_countable($images) && count($images) > 0 || is_countable($banners) && count($banners) > 0))
                            <button id="save-order" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">Lưu thứ tự</button>
                        @endif

                        <div class="form-group">
                            <label>Tải banner</label>
                            <div id="dropzone-pictures-banner" class="dropzone custom-dropzone">
                                <div class="dz-message">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Kéo & thả ảnh vào đây hoặc <span>nhấn để chọn ảnh</span></p>
                                </div>
                            </div>
                            <input type="hidden" name="uploaded_pictures_banner" id="uploaded_pictures_banner">
                        </div>


                        <div class="form-group">
                            <label>Tải thư viện ảnh</label>
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

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link w-100 d-flex" data-toggle="collapse" href="#collapseUuDaiThuong">
                        <span style="color: #333; font-weight: bold">Ưu đãi / khuyến mãi thông thường</span>
                    </a>
                </div>
                <div id="collapseUuDaiThuong" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#uuDaiThuongModal">
                                Thêm mới
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="table_" class="table table-hover text-nowrap">
                                <thead class="thead-light">
                                    <tr class="table-bg">
                                        <th style="width: 60px;">#</th>
                                        <th style="width: 90px;">Hình ảnh</th>
                                        <th>Tên chương trình</th>
                                        <th style="width: 100px;">Độ ưu tiên</th>
                                        <th style="width: 100px;">Ngày bắt đầu</th>
                                        <th style="width: 100px;">Kết thúc sau</th>
                                        <th style="width: 100px;">Trạng thái</th>
                                        <th style="width: 100px;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="table_tbodyUuDaiThuong">
                                    @forelse ($product->promotionsThuong as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div style="background: #ededed  url('{{$item->image ? asset('uploads/' . $item->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                                            </td>
                                            <td>{{ $item->name}}</td>
                                            <td class="text-center">{{ $item->position }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}</td>

                                            <td class="text-center">{{ $item->end_in }} ngày</td>
                                            <td class="text-center">
                                                @if ($item->active != 1)
                                                <span class="badge badge-warning">Tạm dừng</span>
                                                @else
                                                <span class="badge badge-success">Hoạt động</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uuDaiThuongModal" onclick="alertUuDaiThuong({{ $item->id }})">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDeleteUuDai({{ $item->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Không có dữ liệu</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link w-100 d-flex" data-toggle="collapse" href="#collapseUuDaiPhong">
                        <span style="color: #333; font-weight: bold">Ưu đãi / khuyến mãi hạng phòng</span>
                    </a>
                </div>
                <div id="collapseUuDaiPhong" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#uuDaiPhongModal">
                                Thêm mới
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="table_" class="table table-hover text-nowrap">
                                <thead class="thead-light">
                                    <tr class="table-bg">
                                        <th style="width: 60px;">#</th>
                                        <th style="width: 90px;">Hình ảnh</th>
                                        <th>Tên chương trình</th>
                                        <th style="width: 100px;">Độ ưu tiên</th>
                                        <th style="width: 100px;">Ngày bắt đầu</th>
                                        <th style="width: 100px;">Kết thúc sau</th>
                                        <th style="width: 100px;">Trạng thái</th>
                                        <th style="width: 100px;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="table_tbodyUuDaiPhong">
                                    @forelse ($product->promotionsPhong as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div style="background: #ededed  url('{{$item->image ? asset('uploads/' . $item->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                                            </td>
                                            <td>{{ $item->name}}</td>
                                            <td class="text-center">{{ $item->position }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}</td>

                                            <td class="text-center">{{ $item->end_in }} ngày</td>
                                            <td class="text-center">
                                                @if ($item->active != 1)
                                                <span class="badge badge-warning">Tạm dừng</span>
                                                @else
                                                <span class="badge badge-success">Hoạt động</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uuDaiPhongModal" onclick="alertUuDaiPhong({{ $item->id }})">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDeleteUuDai({{ $item->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Không có dữ liệu</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Meta Keywords</label><i class="fas fa-question-circle ml-1" data-toggle="tooltip" title="Các từ khóa hỗ trợ trang web xuất hiện ưu tiên khi người dùng tìm kiếm, mỗi từ cách nhau bằng dấu phẩy và dấu cách (VD: 'key 1, key 2')"></i>
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
<div id="deleteUuDaiModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Xác nhận xóa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa ưu đãi / khuyến mãi này?</p>
                <input type="hidden" id="deleteIdUuDai">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <button type="button" class="btn btn-danger delete">Xóa</button>
            </div>
        </div>
    </div>
</div>

<div id="uuDaiThuongModal" class="modal fade" role="dialog" aria-labelledby="uuDaiThuongModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('backend.promotion.store', ) }}" method="post" enctype="multipart/form-data" id="formUuDaiThuong">
                <div class="modal-header">
                    <h4 class="modal-title">Ưu đãi thông thường</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="text" id="idUuDaiThuong" name="id" value="" hidden>
                    <input type="hidden" name="product_fk" id="product_fkUuDaiThuong" value="{{ $id }}">
                    <input type="hidden" name="type" id="typeUuDaiThuong" value="1">
                    <div class="form-group">
                        <label>Tên chương trình <span class="text-danger">*</span></label>
                        <input name="name" id="nameUuDaiThuong" type="text" class="form-control" placeholder="Tên chương trình ..." required>
                    </div>

                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea id="descriptionUuDaiThuong" name="description" class="form-control" rows="2" style="resize: vertical;"></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: -5px;">
                        <label style="margin-bottom: 0;">Hình ảnh</label>
                    </div>

                    <div class="image-upload-container">
                        <img id="imagePreviewUuDaiThuong" src="{{ asset('images/upload.png') }}" class="preview-image" />
                        <div class="upload-icon" id="uploadIconUuDaiThuong">
                            <i class="fa fa-camera"></i>
                        </div>
                        <div class="remove-icon" id="removeIconUuDaiThuong" style="display: none;">
                            <i class="fa fa-times"></i>
                        </div>
                        <input type="file" id="pictureUuDaiThuong" name="picture" accept="image/*" hidden />
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Thời gian bắt đầu:</label>
                                <input type="date" class="form-control" id="start_dateUuDaiThuong" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Kết thúc sau số ngày:</label>
                                <input type="number" class="form-control" id="end_inUuDaiThuong" name="end_in" min="1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Độ ưu tiên hiển thị (1-10):</label>
                                <input type="number" class="form-control" id="positionUuDaiThuong" name="position" min="1" max="10" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email nhận đăng ký:</label>
                                <input type="email" class="form-control" id="emailUuDaiThuong" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="active" id="activeUuDaiThuong"/>
                            <label for="activeUuDaiThuong">Hoạt động</label>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="uuDaiPhongModal" class="modal fade" role="dialog" aria-labelledby="uuDaiPhongModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('backend.promotion.store', ) }}" method="post" enctype="multipart/form-data" id="formUuDaiPhong">
                <div class="modal-header">
                    <h4 class="modal-title">Ưu đãi thông thường</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="text" id="idUuDaiPhong" name="id" value="" hidden>
                    <input type="hidden" name="product_fk" id="product_fkUuDaiPhong" value="{{ $id }}">
                    <input type="hidden" name="type" id="typeUuDaiPhong" value="2">
                    <div class="form-group">
                        <label>Tên chương trình <span class="text-danger">*</span></label>
                        <input name="name" id="nameUuDaiPhong" type="text" class="form-control" placeholder="Tên chương trình ..." required>
                    </div>

                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea id="descriptionUuDaiPhong" name="description" class="form-control" rows="2" style="resize: vertical;"></textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: -5px;">
                        <label style="margin-bottom: 0;">Hình ảnh</label>
                    </div>

                    <div class="image-upload-container">
                        <img id="imagePreviewUuDaiPhong" src="{{ asset('images/upload.png') }}" class="preview-image" />
                        <div class="upload-icon" id="uploadIconUuDaiPhong">
                            <i class="fa fa-camera"></i>
                        </div>
                        <div class="remove-icon" id="removeIconUuDaiPhong" style="display: none;">
                            <i class="fa fa-times"></i>
                        </div>
                        <input type="file" id="pictureUuDaiPhong" name="picture" accept="image/*" hidden />
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Thời gian bắt đầu:</label>
                                <input type="date" class="form-control" id="start_dateUuDaiPhong" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Kết thúc sau số ngày:</label>
                                <input type="number" class="form-control" id="end_inUuDaiPhong" name="end_in" min="1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Độ ưu tiên hiển thị (1-10):</label>
                                <input type="number" class="form-control" id="positionUuDaiPhong" name="position" min="1" max="10" value="1">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email nhận đăng ký:</label>
                                <input type="email" class="form-control" id="emailUuDaiPhong" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="active" id="activeUuDaiPhong"/>
                            <label for="activeUuDaiPhong">Hoạt động</label>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu thông tin</button>
                </div>
            </form>
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
        var bannerImages = document.getElementById("sortable-banner-images");
        var pictures = document.getElementById("pictures");
        var saveOrderBtn = document.getElementById("save-order");

        if (bannerImages) {
            new Sortable(bannerImages, {
                animation: 150,
                ghostClass: "sortable-ghost"
            });
        }

        if (pictures) {
            new Sortable(pictures, {
                animation: 150,
                ghostClass: "sortable-ghost"
            });
        }

        if (saveOrderBtn) {
            saveOrderBtn.addEventListener("click", function(event) {
                event.preventDefault();

                var bannerIDs = bannerImages 
                    ? [...bannerImages.querySelectorAll(".image-item")].map(item => item.dataset.id) 
                    : [];

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
                        banner: bannerIDs, 
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
$(document).ready(function () {
    $('#formUuDaiThuong').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var id = $('#idUuDaiThuong').val();

        $.ajax({
            url: "{{ route('backend.promotion.store') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#uuDaiThuongModal').modal('hide');

                    if (id) {
                        $('#table_tbodyUuDaiThuong tr[data-id="' + id + '"]').replaceWith(res.html);
                        toastr.success('Cập nhật ưu đãi thành công!');
                    } else {
                        $('#table_tbodyUuDaiThuong tr').each(function () {
                            if ($(this).find('td[colspan]').length && $(this).text().includes('Không có dữ liệu')) {
                                $(this).remove();
                            }
                        });
                        $('#table_tbodyUuDaiThuong').append(res.html);
                        toastr.success('Thêm mới ưu đãi thành công!');
                    }

                    updateSttUuDaiThuong();
                }
            },
            error: function (err) {
                toastr.error('Lỗi khi lưu dữ liệu');
                console.log(err.responseJSON);
            }
        });
    });

    function updateSttUuDaiThuong() {
        $('#table_tbodyUuDaiThuong tr').each(function (index) {
            $(this).find('td:first').text(index + 1);
        });
    }
});
</script>

<script>
$(document).ready(function () {
    $('#formUuDaiPhong').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var id = $('#idUuDaiPhong').val(); // Lấy id để kiểm tra là thêm hay sửa

        $.ajax({
            url: "{{ route('backend.promotion.store') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#uuDaiPhongModal').modal('hide');

                    if (id) {
                        $('#table_tbodyUuDaiPhong tr[data-id="' + id + '"]').replaceWith(res.html);
                        toastr.success('Cập nhật ưu đãi thành công!');
                    } else {
                        $('#table_tbodyUuDaiPhong tr').each(function () {
                            if ($(this).find('td[colspan]').length && $(this).text().includes('Không có dữ liệu')) {
                                $(this).remove();
                            }
                        });
                        $('#table_tbodyUuDaiPhong').append(res.html);
                        toastr.success('Thêm mới ưu đãi thành công!');
                    }

                    updateSttUuDaiPhong();
                }
            },
            error: function (err) {
                toastr.error('Lỗi khi lưu dữ liệu');
                console.log(err.responseJSON);
            }
        });
    });

    function updateSttUuDaiPhong() {
        $('#table_tbodyUuDaiPhong tr').each(function (index) {
            $(this).find('td:first').text(index + 1);
        });
    }
});
</script>

<script>
    CKEDITOR.replace('content', options);

    CKEDITOR.replace('location', {
        height: 100,
        removePlugins: 'elementspath',
        extraPlugins: 'emoji',
        toolbar: [
            ['Bold', 'Italic', 'Underline', 'Emoji']
        ],
        removeButtons: 'Subscript,Superscript',
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
    });

    var uuDaiThuongImage = "";

    $('#uploadIconUuDaiThuong').on('click', function() {
        $('#pictureUuDaiThuong').click();
    });

    $('#imagePreviewUuDaiThuong').on('click', function() {
        $('#pictureUuDaiThuong').click();
    });

    $('#pictureUuDaiThuong').on('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewUuDaiThuong').attr('src', e.target.result);
                $('#removeIconUuDaiThuong').show();
            };
            reader.readAsDataURL(file);
        }
    });

    $('#removeIconUuDaiThuong').on('click', function() {
        $('#pictureUuDaiThuong').val('');
        if (uuDaiThuongImage) {
            $('#imagePreviewUuDaiThuong').attr('src', uuDaiThuongImage);
        } else {
            $('#imagePreviewUuDaiThuong').attr('src', defaultImage);
        }
        $('#removeIconUuDaiThuong').hide(); 
    });

    function resetUuDaiThuongModal(){
        $('#idUuDaiThuong').val('');
        $('#nameUuDaiThuong').val('');
        $('#positionUuDaiThuong').val('1');
        $('#emailUuDaiThuong').val('');
        $('#descriptionUuDaiThuong').val('');
        $('#start_dateUuDaiThuong').val('');
        $('#end_inUuDaiThuong').val('');
        $('#activeUuDaiThuong').prop('checked', false);
        $('#pictureUuDaiThuong').val('');
        $('#imagePreviewUuDaiThuong').attr('src', defaultImage);
        uuDaiThuongImage = '';
    }

    $('#uuDaiThuongModal').on('hidden.bs.modal', function() {
        resetUuDaiThuongModal();
    });

    function alertUuDaiThuong(uuDaiThuongId){
        $.ajax({
            type: 'GET',
            url: '/admin/promotion/edit' + '?id=' + uuDaiThuongId,
            success: function(data){
                $('#idUuDaiThuong').val(data.promotion.id);
                $('#nameUuDaiThuong').val(data.promotion.name ?? '');
                $('#positionUuDaiThuong').val(data.promotion.position ?? '');
                $('#descriptionUuDaiThuong').val(data.promotion.description ?? '');
                $('#start_dateUuDaiThuong').val(data.promotion.start_date ?? '');
                $('#end_inUuDaiThuong').val(data.promotion.end_in ?? '');
                $('#emailUuDaiThuong').val(data.promotion.email ?? '');

                if(data.promotion.active == 1){
                    $('#activeUuDaiThuong').prop('checked', true);
                }

                if(data.promotion.image){
                    $('#imagePreviewUuDaiThuong').attr('src', '/uploads/' + data.promotion.image.ten);
                    uuDaiThuongImage = '/uploads/' + data.promotion.image.ten;
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }

    function alertDeleteUuDai(id) {
        $('#deleteUuDaiModal').data('id', id);
        $('#deleteUuDaiModal').modal('toggle');
    }

    $('#deleteUuDaiModal button.delete').on('click', function(e) {
       e.preventDefault();

       var uuDaiId = $('#deleteUuDaiModal').data('id');

       $.ajax({
            url: '{{ route('backend.promotion.delete') }}',
            method: 'delete',
            data: {
                id: uuDaiId,
            },
            success: function (response) {
                if (response.success) {
                    $('#deleteUuDaiModal').modal('toggle');
                    $('tr[data-id="' + uuDaiId + '"]').remove();
                    
                    toastr.success('Xóa ưu đãi thành công!');
                } else {
                    toastr.error('Không thể xóa ưu đãi!');
                }
            },
            error: function () {
                toastr.error('Đã xảy ra lỗi. Vui lòng thử lại!');
            }
        });
    });

    var uuDaiPhongImage = "";

    $('#uploadIconUuDaiPhong').on('click', function() {
        $('#pictureUuDaiPhong').click();
    });

    $('#imagePreviewUuDaiPhong').on('click', function() {
        $('#pictureUuDaiPhong').click();
    });

    $('#pictureUuDaiPhong').on('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewUuDaiPhong').attr('src', e.target.result);
                $('#removeIconUuDaiPhong').show();
            };
            reader.readAsDataURL(file);
        }
    });

    $('#removeIconUuDaiPhong').on('click', function() {
        $('#pictureUuDaiPhong').val('');
        if (uuDaiPhongImage) {
            $('#imagePreviewUuDaiPhong').attr('src', uuDaiPhongImage);
        } else {
            $('#imagePreviewUuDaiPhong').attr('src', defaultImage);
        }
        $('#removeIconUuDaiPhong').hide(); 
    });

    function resetUuDaiPhongModal(){
        $('#idUuDaiPhong').val('');
        $('#nameUuDaiPhong').val('');
        $('#positionUuDaiPhong').val('1');
        $('#emailUuDaiPhong').val('');
        $('#descriptionUuDaiPhong').val('');
        $('#start_dateUuDaiPhong').val('');
        $('#end_inUuDaiPhong').val('');
        $('#activeUuDaiPhong').prop('checked', false);
        $('#pictureUuDaiPhong').val('');
        $('#imagePreviewUuDaiPhong').attr('src', defaultImage);
        uuDaiPhongImage = '';
    }

    $('#uuDaiPhongModal').on('hidden.bs.modal', function() {
        resetUuDaiPhongModal();
    });

    function alertUuDaiPhong(uuDaiPhongId){
        $.ajax({
            type: 'GET',
            url: '/admin/promotion/edit' + '?id=' + uuDaiPhongId,
            success: function(data){
                $('#idUuDaiPhong').val(data.promotion.id);
                $('#nameUuDaiPhong').val(data.promotion.name ?? '');
                $('#positionUuDaiPhong').val(data.promotion.position ?? '');
                $('#descriptionUuDaiPhong').val(data.promotion.description ?? '');
                $('#start_dateUuDaiPhong').val(data.promotion.start_date ?? '');
                $('#end_inUuDaiPhong').val(data.promotion.end_in ?? '');
                $('#emailUuDaiPhong').val(data.promotion.email ?? '');

                if(data.promotion.active == 1){
                    $('#activeUuDaiPhong').prop('checked', true);
                }

                if(data.promotion.image){
                    $('#imagePreviewUuDaiPhong').attr('src', '/uploads/' + data.promotion.image.ten);
                    uuDaiPhongImage = '/uploads/' + data.promotion.image.ten;
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }

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

                    if ($("#sortable-banner-images .image-item").length === 0) {
                        $("#labelBanners").remove();
                        $("#sortable-banner-images").remove();
                    }

                    if ($("#pictures .image-item").length === 0) {
                        $("#labelPictures").remove();
                        $("#pictures").remove();
                    }
                    if(($("#sortable-banner-images .image-item").length === 0) && ($("#pictures .image-item").length === 0)){
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

        initDropzone('dropzone-pictures-banner', 'uploaded_pictures_banner'); 
        initDropzone('dropzone-pictures', 'uploaded_pictures'); 
    });

</script>
@endsection
