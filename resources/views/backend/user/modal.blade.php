<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.user.delete', request()->query()) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa tài khoản này?</p>
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

<div id="userModal" class="modal fade" role="dialog" aria-labelledby="userModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('backend.user.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tài khoản <span style="color: red">*</span></label>
                                <input name="user_name" id="user_name" type="text" class="form-control" placeholder="Nhập tên tài khoản..." required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="password" id="password" type="password" class="form-control" placeholder="Nhập mật khẩu..." autocomplete="new-password" required>
                            </div>  
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Xác nhận lại mật khẩu...">
                            </div>
                            <div class="form-group" style="margin-bottom: -5px;">
                                <label style="margin-bottom: 0;">Hình đại diện</label>
                            </div>
                    
                            <div class="image-upload-container">
                                <img id="imagePreview" src="{{ asset('images/upload.png') }}" class="preview-image">   
                                <div class="upload-icon" id="uploadIcon">
                                    <i class="fa fa-camera"></i>
                                </div>
                                <div class="remove-icon" id="removeIcon" style="display: none;">
                                    <i class="fa fa-times"></i>
                                </div>
                                <input type="file" id="picture" name="picture" accept="image/*" hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ tên <span style="color: red">*</span></label>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Nhập họ tên..." required>
                            </div>
                            <div class="form-group">
                                <label>Email <span style="color: red">*</span></label>
                                <input name="email" id="email" type="email" class="form-control" placeholder="Nhập Email..." required>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <span style="color: red">*</span></label>
                                <input name="phone" id="phone" type="tel" class="form-control" placeholder="Nhâp số điện thoại..." required>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh <span style="color: red">*</span></label>
                                <input name="birthday" id="birthday" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select name="sex" id="sex" class="form-control" required>
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
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

<div id="roleModal" class="modal fade" role="dialog" aria-labelledby="roleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.user.set.role', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="user_id" name="id" value="" hidden>
                    <div class="form-group">
                        <label for="role_fk">Chọn vai trò</label>
                        <select name="role_fk" id="role_fk" class="form-control" required>
                            <option value="">-- Chọn vai trò --</option>
                            <option value="0">Không có</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
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