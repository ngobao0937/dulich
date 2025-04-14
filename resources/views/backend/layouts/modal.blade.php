<div class="modal fade" id="modal-logout" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.logout') }}">
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận đăng xuất</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn chắc chắn muốn đăng xuất?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Đăng xuất</button>
                </div>
            </form>
        </div>
    </div>
</div>
