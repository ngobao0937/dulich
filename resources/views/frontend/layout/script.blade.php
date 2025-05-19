<div id="myModal" class="modal fade" role="dialog" style="z-index: 1050; display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: rgb(28, 77, 114); color: white;">
            <form action="{{ route('frontend.customer.store') }}" method="post" id="registerForm" style="display: block;">
                @csrf
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
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" name="agree" id="agree" checked required>
                            @php
                                $page1 = App\Models\Page::find(10000);
                                $page2 = App\Models\Page::find(10001);
                            @endphp
                            <label for="agree">Tôi đồng ý với <a href="{{ route('frontend.page.detail', ['id'=>10000, 'slug'=>$page1->slug]) }}" style="color: #64bfff; font-weight: bold;" target="_blank">Điều khoản dịch vụ</a> và <a href="{{ route('frontend.page.detail', ['id'=>10001, 'slug'=>$page2->slug]) }}" style="color: #64bfff; font-weight: bold;" target="_blank">Chính sách quyền riêng tư</a></label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-orange w-100" style="color: white; font-size: clamp(17px, 4vw, 19px); font-weight: bold;">ĐĂNG KÝ NGAY</button>
                </div>
            </form>
        </div>
    </div>
</div>

<button id="scrollToTop" type="button" class="btn btn-lg">
    <i class="fas fa-chevron-up" style="font-size: 17px; color: #084c7e;"></i>
</button>
<script src="{{ auto_version('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ auto_version('assets/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/bootstrap-4.6.2-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/lib/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ auto_version('assets/frontend/js/script.js') }}"></script>