<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.extension.delete', request()->query()) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa tiện ích này ?</p>
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
<div id="extensionModal" class="modal fade" role="dialog" aria-labelledby="extensionModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.extension.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <div class="form-group">
                        <label>Tên danh mục <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Tên tiện ích ..." required>
                    </div>

                    <div class="form-group">
                        <label>Thuộc danh mục <span class="text-danger">*</span></label>
                        <select name="menu_fk" id="menu_fk" class="form-control" required>
                            <option value="">Thuộc danh mục</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                            
                        </select>
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