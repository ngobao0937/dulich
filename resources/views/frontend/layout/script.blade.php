<div id="POPUP1">
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