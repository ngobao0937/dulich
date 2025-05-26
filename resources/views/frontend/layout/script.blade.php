<div id="myModal" class="modal fade" role="dialog" style="z-index: 1050; display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: #38b19e; color: white;">
            <form action="{{ route('frontend.customer.store') }}" method="post" id="registerForm" style="display: block;">
                @csrf
                <input type="hidden" name="promotion_fk" id="register_promotion_fk" value="0">
                <div class="modal-body position-relative">
                    <button type="button" class="close" data-dismiss="modal" style="color: white; font-weight: bold;">&times;</button>
                    <div class="text-center mb-3" style="font-size: clamp(20px, 4vw, 25px); font-weight: bold;">ĐĂNG KÝ NHẬN ƯU ĐÃI NGAY</div>
                    <div class="form-group">
                        <input name="name" type="text" placeholder="Họ tên" required class="form-control" maxlength="50" >
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="email" type="email" placeholder="Email" required class="form-control" maxlength="50" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="phone" type="tel" placeholder="Số điện thoại" required class="form-control" maxlength="20">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="content" rows="3" class="form-control" style="resize: vertical;" placeholder="Lời nhắn (tối đa 200 ký tự)" maxlength="200"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="agree" id="agree" checked required>
                            @php
                                $page1 = App\Models\Page::find(10000);
                                $page2 = App\Models\Page::find(10001);
                            @endphp
                            <label for="agree">Tôi đồng ý với <a href="{{ route('frontend.page.detail', ['id'=>10000, 'slug'=>$page1->slug]) }}" style="color: rgb(255, 211, 130); font-weight: bold;" target="_blank">Điều khoản dịch vụ</a> và <a href="{{ route('frontend.page.detail', ['id'=>10001, 'slug'=>$page2->slug]) }}" style="color: rgb(255, 211, 130); font-weight: bold;" target="_blank">Chính sách quyền riêng tư</a></label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-orange w-100" style="color: white; font-size: clamp(17px, 4vw, 19px); font-weight: bold;">ĐĂNG KÝ NGAY</button>
                </div>
            </form>
        </div>
    </div>
</div>

<button id="scrollToTop" type="button" class="btn btn-lg">
    <i class="fas fa-chevron-up" style="font-size: 17px; color: #38b19e;"></i>
</button>
<script src="{{ auto_version('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ auto_version('assets/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/bootstrap-4.6.2-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ auto_version('assets/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/js/script.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        background: '#ffffff',
        customClass: {
            popup: 'border border-success shadow-lg rounded-lg'
        },
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    @if (session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        });
    @endif

    function sweetAlertInfo(){
        Toast.fire({
            icon: 'info',
            title: 'Ưu đãi này hiện tại chưa hoạt động. Xin quý khách quay lại sau !'
        });
    }

    // $('.swalDefaultSuccess').click(function() {
    //     Toast.fire({
    //         icon: 'success',
    //         title: 'Xin chúc mừng! Bạn đã đăng ký thành công 🎉'
    //     });
    // });
</script>
