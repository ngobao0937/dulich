<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.receipt.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa phiếu thu này?</p>
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
<div id="receiptModal" class="modal fade" role="dialog" aria-labelledby="receiptModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.receipt.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden />
                    <div class="form-group">
                        <label>Chọn khách sạn</label>
                        <select name="product_fk" id="product_fk" class="form-control select2" data-placeholder="-- Chọn khách sạn --" required></select>
                    </div>

                    <div class="form-group">
                        <label>Số tiền</label>
                        <input type="text" class="form-control" name="so_tien" id="so_tien" placeholder="Nhập số tiền" 
                                data-inputmask="'alias': 'numeric',
                                            'groupSeparator': '.',
                                            'digits': 0,
                                            'autoGroup': true,
                                            'prefix': '',
                                            'suffix': ' ₫',
                                            'rightAlign': false" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày thu</label>
                                <input type="date" class="form-control" name="ngay_thu" id="ngay_thu" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày hết hạn</label>
                                <input type="date" class="form-control" name="ngay_het_han" id="ngay_het_han" required>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea class="form-control" name="ghi_chu" id="ghi_chu" rows="3" placeholder="Nhập ghi chú"></textarea>
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
