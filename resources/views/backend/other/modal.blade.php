<div id="otherModal1" class="modal fade" role="dialog" aria-labelledby="otherModal1Label">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.other.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden />

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
                        <label>Tiêu đề <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" maxlength="60" placeholder="Nhập tiêu đề ..." required />
                    </div>

                    <div class="form-group">
                        <label>Mô tả <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="2" maxlength="100" style="resize: vertical;" class="form-control" placeholder="Nhập mô tả .."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input name="link" id="link" type="url" class="form-control" placeholder="Nhập link ..."/>
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

<div id="otherModal2" class="modal fade" role="dialog" aria-labelledby="otherModal2Label">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.other.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id_2" name="id" value="" hidden />

                    <div class="form-group">
                        <label>Tiêu đề <span class="text-danger">*</span></label>
                        <input name="name" id="name_2" type="text" class="form-control" placeholder="Nhập tiêu đề ..." required disabled/>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input name="link" id="link_2" type="url" class="form-control" placeholder="Nhập link ..."/>
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

<div id="otherModal3" class="modal fade" role="dialog" aria-labelledby="otherModal3Label">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.other.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id_3" name="id" value="" hidden />

                    <div class="form-group">
                        <label>Tiêu đề <span class="text-danger">*</span></label>
                        <input name="name" id="name_3" type="text" class="form-control" maxlength="60" disabled required />
                    </div>

                    <div class="form-group" style="margin-bottom: -5px;">
                        <label style="margin-bottom: 0;">Hình ảnh</label>
                    </div>

                    <div class="image-upload-container">
                        <img id="imagePreview_3" src="{{ asset('images/upload.png') }}" class="preview-image" />
                        <div class="upload-icon" id="uploadIcon_3">
                            <i class="fa fa-camera"></i>
                        </div>
                        <div class="remove-icon" id="removeIcon_3" style="display: none;">
                            <i class="fa fa-times"></i>
                        </div>
                        <input type="file" id="picture_3" name="picture" accept="image/*" hidden />
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
