{{-- <div id="POPUP1">
    <div data-width="414" data-height="328">
        <div id="SHAPE53" class="event_scoll_action" style="cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 11.250000953674316 17.9976863861084">
                <foreignObject x="0" y="0" width="11.250000953674316" height="17.9976863861084"><i class=" far  fa-times" style="font-size: 18px; color: rgb(255, 255, 255); cursor: pointer;"></i></foreignObject>
            </svg>
        </div>
        <div id="TITLE132">
            <h3>ĐĂNG KÝ NHẬN ƯU ĐÃI NGAY</h3>
        </div>
        <div id="FORM3" data-type="lead">
            <form id="formRegisterUuDai" action="{{ route('frontend.customer.store') }}" method="post">
                @csrf
                <div id="INPUT12">
                    <input name="name" type="text" placeholder="Họ tên" required class="form-control">
                </div>
                <div id="INPUT13">
                    <input name="email" type="email" placeholder="Email" required class="form-control">
                </div>
                <div id="INPUT14">
                    <input name="phone" type="tel" placeholder="Số điện thoại" required class="form-control">
                </div>

                <div id="BUTTON15"><button type="submit"> <span>Đăng ký ngay</span> </button></div>
            </form>
            <div class="data_thankyou" style="display: none;">Cảm ơn bạn đã quan tâm!</div>
        </div>
    </div>
</div> --}}

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