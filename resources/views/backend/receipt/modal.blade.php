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
                        <label>Chọn khách sạn</label> <small><span class="text-muted">(có thể chọn nhiều)</span></small>
                        <div class="select2-primary">
                            <select name="product_fk[]" id="product_fk" class="select2-multiple" multiple="multiple" data-placeholder="-- Chọn khách sạn --" required>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="product_fk_name_div" style="display: none;">
                        <label>Khách sạn</label>
                        <input type="text" class="form-control" id="product_fk_name" value="" readonly>
                        <input type="hidden" name="product_fk[]" id="product_fk_hidden" disabled>
                    </div>

                    <div class="form-group" id="period_fk_name_div" style="display: none;">
                        <label>Gói hiện tại</label>
                        <input type="text" class="form-control" id="period_fk_name" value="" readonly>
                    </div>

                    <div class="form-group">
                        <label>Chọn gói</label>
                        <select name="period_fk" id="period_fk" class="form-control" required>
                            <option value="">-- Chọn gói phiếu thu --</option>
                            @foreach ($periods as $period)
                                <option value="{{ $period->id }}">{{ $period->name }} - Giá: {{ number_format($period->price, 0, ',', '.') }} ₫ - Hạn: {{ $period->het_han_sau }} ngày</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày thu</label>
                                <input type="date" class="form-control" name="ngay_thu" id="ngay_thu" required>
                            </div>
                        </div>
                        <div class="col-md-6">
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
