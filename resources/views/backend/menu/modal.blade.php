<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.menu.delete', request()->query()) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa menu này và các menu con (nếu có) ?</p>
                    <input type="text" id="deleteId" name="id" hidden>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger delete">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="menuModal" class="modal fade" role="dialog" aria-labelledby="menuModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.menu.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <div class="form-group">
                        <label>Tên danh mục <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Tên danh mục ..." required>
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
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="icheck-success d-inline">
                                    <input type="checkbox" name="active" id="active" />
                                    <label for="active">Hoạt động</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col">
                            <div class="form-group">
                                <div class="icheck-success d-inline">
                                    <input type="checkbox" name="public" id="public" />
                                    <label for="public">Hiển thị trang chủ</label>
                                </div>
                            </div>
                        </div> --}}
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