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
                    <a class="collapsed card-link w-100 d-flex" data-toggle="collapse" href="#collapseBanner">
                        <span style="color: #333; font-weight: bold">Banner</span>
                    </a>
                </div>
                <div id="collapseBanner" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#bannerModal">
                                Thêm mới
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="table_" class="table table-hover text-nowrap">
                                <thead class="thead-light">
                                    <tr class="table-bg">
                                        <th style="width: 60px;">#</th>
                                        <th style="width: 90px;">Hình ảnh</th>
                                        <th>Văn bản</th>
                                        <th>Link</th>
                                        <th style="width: 100px;">Thứ tự</th>
                                        <th style="width: 100px;">Trạng thái</th>
                                        <th style="width: 100px;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody  id="table_tbodyBanner">
                                    @forelse($product->banners as $banner)
                                    <tr data-id="{{ $banner->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div style="background: #ededed  url('{{$banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                                        </td>
                                        
                                        <td class="text-wrap">
                                            <b>{{ $banner->name }}</b><br>
                                            {{ $banner->description }}
                                        </td>
                                        <td>{{ $banner->link ? $banner->link : '#' }}</td>
                                        <td>{{ $banner->position }}</td>
                                        <td class="text-center">
                                            @if ($banner->active != 1)
                                            <span class="badge badge-warning">Tạm dừng</span>
                                            @else
                                            <span class="badge badge-success">Hoạt động</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bannerModal" onclick="alertBanner({{ $banner->id }})">
                                            <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="alertDeleteBanner({{ $banner->id }})">
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
                    <a class="card-link w-100 d-flex" data-toggle="collapse" href="#collapseInfo" aria-expanded="true">
                        <span style="color: #333; font-weight: bold">Thông tin</span>
                    </a>
                </div>
                <div id="collapseInfo" class="collapse show" data-parent="#accordion">
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
                                    <input type="tel" name="hotline" id="hotline" class="form-control" value="{{ $hotline }}" maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone">Điện thoại</label>
                                    <input type="tel" name="phone" id="phone" class="form-control" value="{{ $phone }}" maxlength="20">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $email }}" maxlength="250">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website" name="website" placeholder="https://example.com" value="{{ $website }}" maxlength="250">
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
                                        <input type="url" class="form-control" id="facebook" name="facebook" placeholder="https://facebook.com/yourpage" value="{{ $facebook }}" maxlength="250">
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
                                        <input type="url" class="form-control" id="instagram" name="instagram" placeholder="https://instagram.com/youraccount" value="{{ $instagram }}" maxlength="250">
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
                                        <input type="url" class="form-control" id="twitter" name="twitter" placeholder="https://twitter.com/yourhandle" value="{{ $twitter }}" maxlength="250">
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
                                        <input type="url" class="form-control" id="youtube" name="youtube" placeholder="https://youtube.com/yourchannel" value="{{ $youtube }}" maxlength="250">
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
                                        <input type="url" class="form-control" id="tiktok" name="tiktok" placeholder="https://tiktok.com/@youraccount" value="{{ $tiktok }}" maxlength="250">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="link360">Link VR 360</label>
                                    <input type="url" name="link360" id="link360" class="form-control" value="{{ $link360 }}" placeholder="https://example.com/vr360" maxlength="250">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="chatbot">Chatbot</label>
                                    <input type="url" name="chatbot" id="chatbot" class="form-control" value="{{ $chatbot }}" placeholder="Nhập link script chatbot" maxlength="250">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="map">Bản đồ</label>
                                    <input type="url" name="map" id="map" class="form-control" value="{{ $map }}" maxlength="250" placeholder="Nhập link iframe bản đồ" maxlength="250">
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
                        <span style="color: #333; font-weight: bold">Thư viện ảnh</span>
                    </a>
                </div>
                <div id="collapseImage" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#imagesModal">
                                Thêm mới
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="table_" class="table table-hover text-nowrap">
                                <thead class="thead-light">
                                    <tr class="table-bg">
                                        <th style="width: 60px;">#</th>
                                        <th style="width: 90px;">Hình ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Link</th>
                                        <th style="width: 100px;">Thứ tự</th>
                                        <th style="width: 100px;">Trạng thái</th>
                                        <th style="width: 100px;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody  id="table_tbodyImages">
                                    @forelse($product->images as $image)
                                    <tr data-id="{{ $image->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div style="background: #ededed  url('{{$image->image ? asset('uploads/' . $image->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                                        </td>
                                        
                                        <td>
                                            <b>{{ $image->name }}</b>
                                        </td>
                                        <td>{{ $image->link ? $image->link : '#' }}</td>
                                        <td>{{ $image->position }}</td>
                                        <td class="text-center">
                                            @if ($image->active != 1)
                                            <span class="badge badge-warning">Tạm dừng</span>
                                            @else
                                            <span class="badge badge-success">Hoạt động</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#imagesModal" onclick="alertImages({{ $image->id }})">
                                            <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="alertDeleteImages({{ $image->id }})">
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
                                        <th style="width: 100px;">Giá phòng</th>
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
                                            <td class="text-center">{{ number_format($item->price, 0, ',', '.') }}</td>
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

<div id="uuDaiThuongModal" class="modal fade" role="dialog">
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
                        <input name="name" id="nameUuDaiThuong" type="text" class="form-control" placeholder="Tên chương trình ..." maxlength="250" required>
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
                                <label class="form-label">Thời gian bắt đầu</label>
                                <input type="date" class="form-control" id="start_dateUuDaiThuong" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Kết thúc sau số ngày</label>
                                <input type="number" class="form-control" id="end_inUuDaiThuong" name="end_in" min="1" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Độ ưu tiên (1-10)</label>
                                <input type="number" class="form-control" id="positionUuDaiThuong" name="position" min="1" max="10" value="1" maxlength="10">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email nhận đăng ký</label>
                                <input type="email" class="form-control" id="emailUuDaiThuong" name="email" maxlength="250">
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

<div id="uuDaiPhongModal" class="modal fade" role="dialog">
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
                        <input name="name" id="nameUuDaiPhong" type="text" class="form-control" placeholder="Tên chương trình ..." maxlength="250" required>
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
                                <label class="form-label">Thời gian bắt đầu</label>
                                <input type="date" class="form-control" id="start_dateUuDaiPhong" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Kết thúc sau số ngày</label>
                                <input type="number" class="form-control" id="end_inUuDaiPhong" name="end_in" min="1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Độ ưu tiên (1-10)</label>
                                <input type="number" class="form-control" id="positionUuDaiPhong" name="position" min="1" max="10" value="1">
                            </div>
                        </div>
                         
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email nhận đăng ký</label>
                                <input type="email" class="form-control" id="emailUuDaiPhong" name="email" maxlength="250">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Giá phòng:</label>
                                <input type="number" class="form-control" id="priceUuDaiPhong" name="price" maxlength="250">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Link VR 360</label> <i class="fas fa-question-circle ml-1" data-toggle="tooltip" title="Mặc định ưu tiên hiển thị VR 360 hơn hình ảnh nếu có"></i>
                                <input type="url" class="form-control" id="link360UuDaiPhong" name="link360" maxlength="250">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Ghi chú</label>
                                <input type="text" class="form-control" id="taglineUuDaiPhong" name="tagline" maxlength="250">
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

<div id="bannerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.banner.store', request()->query()) }}" method="post" enctype="multipart/form-data" id="formBanner">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="idBanner" name="id" value="" hidden />
                    <input type="hidden" name="product_fk" value="{{ $id }}">
                    <input type="hidden" name="type" value="product">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Tên <span class="text-danger">*</span></label>
                                <input name="name" id="nameBanner" type="text" class="form-control" placeholder="Nhập tên ..." maxlength="250" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Thứ tự <span class="text-danger">*</span></label>
                                <input name="position" id="positionBanner" type="number" min="1" step="1" class="form-control" placeholder="Thứ tự ..." required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <input name="description" id="descriptionBanner" type="text" class="form-control" maxlength="250"  placeholder="Mô tả ..."/>
                    </div>
                    
                    <div class="form-group">
                        <label>Link</label>
                        <input name="link" id="linkBanner" type="url" class="form-control" placeholder="Liên kết ..." maxlength="250"/>
                    </div>

                    <div class="form-group" style="margin-bottom: -5px;">
                        <label style="margin-bottom: 0;">Hình ảnh</label>
                    </div>

                    <div class="image-upload-container">
                        <img id="imagePreviewBanner" src="{{ asset('images/upload.png') }}" class="preview-image" />
                        <div class="upload-icon" id="uploadIconBanner">
                            <i class="fa fa-camera"></i>
                        </div>
                        <div class="remove-icon" id="removeIconBanner" style="display: none;">
                            <i class="fa fa-times"></i>
                        </div>
                        <input type="file" id="pictureBanner" name="picture" accept="image/*" hidden />
                    </div>
                    
                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="active" id="activeBanner" />
                            <label for="activeBanner">Hoạt động</label>
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

<div id="deleteBannerModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.banner.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa banner này?</p>
                    <input type="text" id="deleteBannerId" name="id" hidden />
                    <input type="hidden" name="type" id="deleteBannerType" value="product">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger delete">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="imagesModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.banner.store', request()->query()) }}" method="post" enctype="multipart/form-data" id="formImages">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="idImages" name="id" value="" hidden />
                    <input type="hidden" name="product_fk" value="{{ $id }}">
                    <input type="hidden" name="type" value="product_images">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Tên <span class="text-danger">*</span></label>
                                <input name="name" id="nameImages" type="text" class="form-control" placeholder="Nhập tên ..." maxlength="250" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Thứ tự <span class="text-danger">*</span></label>
                                <input name="position" id="positionImages" type="number" min="1" step="1" class="form-control" placeholder="Thứ tự ..." required />
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Link</label>
                        <input name="link" id="linkImages" type="url" class="form-control" placeholder="Liên kết ..."/>
                    </div>

                    <div class="form-group" style="margin-bottom: -5px;">
                        <label style="margin-bottom: 0;">Hình ảnh</label>
                    </div>

                    <div class="image-upload-container">
                        <img id="imagePreviewImages" src="{{ asset('images/upload.png') }}" class="preview-image" />
                        <div class="upload-icon" id="uploadIconImages">
                            <i class="fa fa-camera"></i>
                        </div>
                        <div class="remove-icon" id="removeIconImages" style="display: none;">
                            <i class="fa fa-times"></i>
                        </div>
                        <input type="file" id="pictureImages" name="picture" accept="image/*" hidden />
                    </div>
                    
                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="active" id="activeImages" />
                            <label for="activeImages">Hoạt động</label>
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

<div id="deleteImagesModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.banner.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa hình ảnh này?</p>
                    <input type="text" id="deleteImagesId" name="id" hidden />
                    <input type="hidden" name="type" id="deleteImagesType" value="product">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger delete">Xóa</button>
                </div>
            </form>
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

    $('#formBanner').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var id = $('#idBanner').val();

        $.ajax({
            url: "{{ route('backend.banner.store') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#bannerModal').modal('hide');

                    if (id) {
                        $('#table_tbodyBanner tr[data-id="' + id + '"]').replaceWith(res.html);
                        toastr.success('Cập nhật banner thành công!');
                    } else {
                        $('#table_tbodyBanner tr').each(function () {
                            if ($(this).find('td[colspan]').length && $(this).text().includes('Không có dữ liệu')) {
                                $(this).remove();
                            }
                        });
                        $('#table_tbodyBanner').append(res.html);
                        toastr.success('Thêm mới banner thành công!');
                    }

                    updateSttBanner();
                }
            },
            error: function (err) {
                toastr.error('Lỗi khi lưu dữ liệu');
                console.log(err.responseJSON);
            }
        });
    });

    function updateSttBanner() {
        $('#table_tbodyBanner tr').each(function (index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    $('#formImages').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var id = $('#idImages').val();

        $.ajax({
            url: "{{ route('backend.banner.store') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#imagesModal').modal('hide');

                    if (id) {
                        $('#table_tbodyImages tr[data-id="' + id + '"]').replaceWith(res.html);
                        toastr.success('Cập nhật hình ảnh thành công!');
                    } else {
                        $('#table_tbodyImages tr').each(function () {
                            if ($(this).find('td[colspan]').length && $(this).text().includes('Không có dữ liệu')) {
                                $(this).remove();
                            }
                        });
                        $('#table_tbodyImages').append(res.html);
                        toastr.success('Thêm mới hình ảnh thành công!');
                    }

                    updateSttImages();
                }
            },
            error: function (err) {
                toastr.error('Lỗi khi lưu dữ liệu');
                console.log(err.responseJSON);
            }
        });
    });

    function updateSttImages() {
        $('#table_tbodyImages tr').each(function (index) {
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
                    $('#uuDaiPhongModal').modal('toggle');

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
        $('#taglineUuDaiPhong').val('');
        $('#priceUuDaiPhong').val('');
        $('#link360UuDaiPhong').val('');
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
                $('#priceUuDaiPhong').val(data.promotion.price ?? '');
                $('#taglineUuDaiPhong').val(data.promotion.tagline ?? '');
                $('#link360UuDaiPhong').val(data.promotion.link360 ?? '');

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

    var bannerImage = "";

    $('#uploadIconBanner').on('click', function() {
        $('#pictureBanner').click();
    });

    $('#imagePreviewBanner').on('click', function() {
        $('#pictureBanner').click();
    });

    $('#pictureBanner').on('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewBanner').attr('src', e.target.result);
                $('#removeIconBanner').show();
            };
            reader.readAsDataURL(file);
        }
    });

    $('#removeIconBanner').on('click', function() {
        $('#pictureBanner').val('');
        if (bannerImage) {
            $('#imagePreviewBanner').attr('src', bannerImage);
        } else {
            $('#imagePreviewBanner').attr('src', defaultImage);
        }
        $('#removeIconBanner').hide(); 
    });

    $('#bannerModal').on('hidden.bs.modal', function() {
        $('#idBanner').val('');
        $('#nameBanner').val('');
        $('#descriptionBanner').val('');
        $('#positionBanner').val('');
        $('#linkBanner').val('');
        $('#activeBanner').prop('checked', false);
        $('#pictureBanner').val('');
        $('#imagePreviewBanner').attr('src', defaultImage);
    });
    function alertBanner(bannerId){
        $.ajax({
            type: 'GET',
            url: '/admin/banner/edit' + '?id=' + bannerId,
            success: function(data){
                $('#idBanner').val(data.banner.id);
                $('#nameBanner').val(data.banner.name ?? '');
                $('#descriptionBanner').val(data.banner.description ?? '');
                $('#positionBanner').val(data.banner.position ?? '');
                $('#linkBanner').val(data.banner.link ?? '');
                if(data.banner.active == 1){
                    $('#activeBanner').prop('checked', true);
                }

                if(data.banner.image){
                    $('#imagePreviewBanner').attr('src', '/uploads/' + data.banner.image.ten);
                    bannerImage = '/uploads/' + data.banner.image.ten;
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }
    function alertDeleteBanner(id) {
        $('#deleteBannerModal').data('id', id);
        $('#deleteBannerModal').modal('toggle');
    }

    $('#deleteBannerModal button.delete').on('click', function(e) {
       e.preventDefault();

       var bannerId = $('#deleteBannerModal').data('id');
       var type = $('#deleteBannerType').val();

       $.ajax({
            url: '{{ route('backend.banner.delete') }}',
            method: 'delete',
            data: {
                id: bannerId,
                type: type
            },
            success: function (response) {
                if (response.success) {
                    $('#deleteBannerModal').modal('toggle');
                    $('tr[data-id="' + bannerId + '"]').remove();
                    
                    toastr.success('Xóa banner thành công!');
                } else {
                    toastr.error('Không thể xóa banner!');
                }
            },
            error: function () {
                toastr.error('Đã xảy ra lỗi. Vui lòng thử lại!');
            }
        });
    });

    var imagesImage = "";

    $('#uploadIconImages').on('click', function() {
        $('#pictureImages').click();
    });

    $('#imagePreviewImages').on('click', function() {
        $('#pictureImages').click();
    });

    $('#pictureImages').on('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewImages').attr('src', e.target.result);
                $('#removeIconImages').show();
            };
            reader.readAsDataURL(file);
        }
    });

    $('#removeIconImages').on('click', function() {
        $('#pictureImages').val('');
        if (imagesImage) {
            $('#imagePreviewImages').attr('src', imagesImage);
        } else {
            $('#imagePreviewImages').attr('src', defaultImage);
        }
        $('#removeIconImages').hide(); 
    });

    $('#imagesModal').on('hidden.bs.modal', function() {
        $('#idImages').val('');
        $('#nameImages').val('');
        $('#positionImages').val('');
        $('#linkImages').val('');
        $('#activeImages').prop('checked', false);
        $('#pictureImages').val('');
        $('#imagePreviewImages').attr('src', defaultImage);
    });
    function alertImages(imagesId){
        $.ajax({
            type: 'GET',
            url: '/admin/banner/edit' + '?id=' + imagesId,
            success: function(data){
                $('#idImages').val(data.banner.id);
                $('#nameImages').val(data.banner.name ?? '');
                $('#positionImages').val(data.banner.position ?? '');
                $('#linkImages').val(data.banner.link ?? '');
                if(data.banner.active == 1){
                    $('#activeImages').prop('checked', true);
                }

                if(data.banner.image){
                    $('#imagePreviewImages').attr('src', '/uploads/' + data.banner.image.ten);
                    imagesImage = '/uploads/' + data.banner.image.ten;
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }
    function alertDeleteImages(id) {
        $('#deleteImagesModal').data('id', id);
        $('#deleteImagesModal').modal('toggle');
    }

    $('#deleteImagesModal button.delete').on('click', function(e) {
        e.preventDefault();

        var imagesId = $('#deleteImagesModal').data('id');
        var type = $('#deleteImagesType').val();

        $.ajax({
            url: '{{ route('backend.banner.delete') }}',
            method: 'delete',
            data: {
                id: imagesId,
                type: type
            },
            success: function (response) {
                if (response.success) {
                    $('#deleteImagesModal').modal('toggle');
                    $('tr[data-id="' + imagesId + '"]').remove();
                    
                    toastr.success('Xóa hình ảnh thành công!');
                } else {
                    toastr.error('Không thể xóa hình ảnh!');
                }
            },
            error: function () {
                toastr.error('Đã xảy ra lỗi. Vui lòng thử lại!');
            }
        });
    });
</script>

@endsection
