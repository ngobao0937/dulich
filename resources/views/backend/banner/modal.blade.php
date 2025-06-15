<div id="myModal" class="modal fade" role="dialog" data-id="0">
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
                    <input type="text" id="deleteId" name="id" hidden />
                    <input type="hidden" name="type" id="deleteType">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger delete">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="bannerModal" class="modal fade" role="dialog" aria-labelledby="bannerModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.banner.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden />
                    {{-- <input type="hidden" name="type" value="main"> --}}
                    <div class="form-group">
                        <label>Tên Banner <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Nhập tên ..." required />
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="type">Thuộc trang <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="main">Trang chủ</option>
                                    <option value="event">Trang sự kiện</option>
                                    <option value="promotion">Trang ưu đãi</option>
                                    <option value="blog">Trang blog</option>
                                    <option value="other" disabled>Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Thứ tự <span class="text-danger">*</span></label>
                                        <input name="position" id="position" type="number" min="1" class="form-control" placeholder="Thứ tự ..." required />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label">Loại</label>

                                        <select name="isMobile" id="isMobile" class="form-control" required>
                                            <option value="0">Desktop</option>
                                            <option value="1">Mobile</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label>Link iframe</label>
                        <input name="link" id="link" type="link" class="form-control" placeholder="Link iframe ..."/>
                    </div>

                    <div class="form-group" style="margin-bottom: -5px;">
                        <label style="margin-bottom: 0;">Hình ảnh</label>
                    </div>

                    <div class="image-upload-container">
                        <img id="imagePreview" src="{{ asset('images/upload.png') }}" class="preview-image" />
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
                            <input type="checkbox" name="active" id="active" />
                            <label for="active">Hoạt động</label>
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
