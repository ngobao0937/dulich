<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.promotion_public.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa thứ tự ưu đãi này?</p>
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
<div id="promotionModal" class="modal fade" role="dialog" aria-labelledby="promotionModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.promotion_public.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden />
                    <div class="form-group">
                        <label class="form-label">Chọn ưu đãi <span class="text-danger">*</span></label> <i class="fas fa-question-circle ml-1" data-toggle="tooltip" title="Những ưu đãi có độ ưu tiên là 1."></i>
                        <select name="promotion_fk" id="promotion_fk" class="form-control select2-ajax" style="width: 100%;" required></select>

                        {{-- <select name="promotion_fk" id="promotion_fk" class="form-control" required>
                            <option value="">-- Chọn ưu đãi --</option>
                            @foreach($promotions as $promotion)
                                <option value="{{ $promotion->id }}">{{ $promotion->name }} - {{ $promotion->product->name }}</option>
                            @endforeach
                        </select> --}}
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="menu_fk">Mục hiển thị <span class="text-danger">*</span></label>
                                <select name="menu_fk" id="menu_fk" class="form-control" required>
                                    <option value="">-- Chọn mục hiển thị --</option>
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Thứ tự <span class="text-danger">*</span></label>
                                <input name="position" id="position" type="number" min="1" max="5" class="form-control" placeholder="Thứ tự ..." required />
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