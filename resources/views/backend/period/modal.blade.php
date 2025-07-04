<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.period.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa gói này?</p>
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
<div id="periodModal" class="modal fade" role="dialog" aria-labelledby="periodModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.period.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden />

                    <div class="form-group">
                        <label>Tên gói</label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Nhập tên gói ..." required />
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Nhập giá..." 
                                        data-inputmask="'alias': 'numeric',
                                                    'groupSeparator': '.',
                                                    'digits': 0,
                                                    'autoGroup': true,
                                                    'prefix': '',
                                                    'suffix': ' ₫',
                                                    'rightAlign': false" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hết hạn sau</label>
                                <input type="number" class="form-control" name="het_han_sau" id="het_han_sau" placeholder="Nhập số ngày..." min="1" max="999999" required>
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
