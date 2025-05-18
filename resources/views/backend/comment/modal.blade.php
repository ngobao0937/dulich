<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.comment.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa phản hồi này?</p>
                    <input type="text" id="deleteId" name="id" hidden />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger delete">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="commentModal" class="modal fade" role="dialog" aria-labelledby="commentModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.comment.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden />
                    <input type="hidden" name="product_fk" id="product_fk_modal" value="">
                    <input type="hidden" name="rating" id="rating" value="">
                    <div class="form-group">
                        <label>Họ tên <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Nhập tên ..." required />
                    </div>

                    <div class="form-group">
                        <label>Nội dung <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="active" id="active" />
                            <label for="active">Duyệt</label>
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
