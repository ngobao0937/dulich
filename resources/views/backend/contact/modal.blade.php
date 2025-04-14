<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.contact.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa liên hệ này?</p>
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
{{-- <div id="contactModal" class="modal fade" role="dialog" aria-labelledby="contactModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.contact.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden />
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="contactDetailModal" tabindex="-1" role="dialog" aria-labelledby="contactDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết liên hệ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <th>Họ tên</th>
                            <td id="contact-name"></td>
                        </tr>
                        <tr>
                            <th>Công ty</th>
                            <td id="contact-company"></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td id="contact-address"></td>
                        </tr>
                        <tr>
                            <th>Điện thoại</th>
                            <td id="contact-phone"></td>
                        </tr>
                        <tr>
                            <th>Fax</th>
                            <td id="contact-fax"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="contact-email"></td>
                        </tr>
                        <tr>
                            <th>Tiêu đề</th>
                            <td id="contact-title"></td>
                        </tr>
                        <tr>
                            <th>Nội dung</th>
                            <td id="contact-content"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <form action="{{ route('backend.contact.store') }}" method="post" id="form-read">
                    @csrf
                    <input type="hidden" id="id" name="id" value="" />
                    <input type="hidden" id="active" name="active" value="1" />
                    <button type="submit" class="btn btn-success">Đã đọc</button>
                </form>
            </div>
        </div>
    </div>
</div>

