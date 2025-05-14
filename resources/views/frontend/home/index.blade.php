@extends('frontend.layout.app')
@section('title', 'Du lịch')
@section('content')

<div>
    <div class="swiper bannerSwiper sp_container" style="width: 100%;">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <img class="w-100 h-100" style="object-fit: cover; aspect-ratio: 16/9;" src="{{ asset('uploads/' . $banner->image->ten) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
</div>


<section class="w-100" id="SECTION14">
    <div class="sp_container">
        <div id="GROUP572">
            <div>
                <div id="BUTTON83"><button type="button" data-funnel="yes"> <span> THAM GIA NGAY NẾU KHÔNG BỎ LỠ!</span> </button></div>
                <div id="GROUP509">
                    <div>
                        <div id="TITLE399">
                            <h3><font color="#fa541c">👉 Bạn có đang lo lắng về việc <span style="color: rgb(255, 22, 22);">tìm kiếm</span> thông tin du lịch <span style="color: rgb(255, 22, 22);">đáng tin cậy</span>?&nbsp;</font></h3>
                        </div>
                        <div id="TITLE400">
                            <h3><font color="#fa541c">👉 Không biết nơi nào ở, ăn gì, hay chơi gì tại <span style="color: rgb(255, 22, 22);"><span style="color: rgb(255, 22, 22);">Bà Rịa - Vũng Tàu</span></span><span style="color: rgb(0, 0, 0);">?&nbsp;</span><span style="color: rgb(0, 0, 0);"></span></font></h3>
                        </div>
                        <div id="TITLE401">
                            <h3><font color="#fa541c">👉 Nếu bỏ lỡ các <span style="color: rgb(255, 22, 22);">ưu đãi</span> từ Sở Du lịch và các đối tác, bạn có thể&nbsp;<span style="color: rgb(0, 0, 0); background-color: initial; -webkit-text-fill-color: unset; display: inline !important;">tốn&nbsp;</span><span style="background-color: initial; color: rgb(0, 0, 0);">nhiều&nbsp;</span><span style="background-color: initial; color: rgb(255, 22, 22);">chi phí </span><span style="background-color: initial; color: rgb(0, 0, 0); -webkit-text-fill-color: unset; display: inline !important;">hơn và bỏ qua những </span><span style="background-color: initial; color: rgb(255, 87, 87);">trải nghiệm độc đáo</span><span style="background-color: initial; color: rgb(0, 0, 0); -webkit-text-fill-color: unset; display: inline !important;">!</span></font></h3>
                        </div>
                    </div>
                </div>
                <div id="IMAGE452">
                    <div class="image_background"></div>
                </div>
                <div id="TITLE293">
                    <h2>CƠ HỘI TRẢI NGHIỆM TUYỆT VỜI</h2>
                </div>
                <div id="TITLE295">
                    <h2>ĐỪNG BỎ LỠ!</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-100" id="SECTION19">
    <div class="sp_container">
        <div id="TITLE409">
            <h3>TẠI SAO NÊN CHỌN CHÚNG TÔI?</h3>
        </div>
        <div id="LINE18">
            <div></div>
        </div>
        <div id="GROUP721">
            <div>
                <div id="GROUP514">
                    <div>
                        <div id="IMAGE455">
                            <div class="image_background"></div>
                        </div>
                        <div id="TITLE414">
                            <h3>Trải nghiệm các hoạt động giải trí, từ bãi biển đến công viên với vé ưu đãi.</h3>
                        </div>
                        <div id="TITLE415">
                            <h3>Chơi gì?</h3>
                        </div>
                        <div id="LINE14">
                            <div></div>
                        </div>
                    </div>
                </div>
                <div id="GROUP510">
                    <div>
                        <div id="IMAGE453">
                            <div class="image_background"></div>
                        </div>
                        <div id="TITLE410">
                            <h3>Thưởng thức ẩm thực địa phương và quốc tế với các chương trình giảm giá hấp dẫn.</h3>
                        </div>
                        <div id="TITLE411">
                            <h3>Ăn gì?</h3>
                        </div>
                        <div id="LINE12">
                            <div></div>
                        </div>
                    </div>
                </div>
                <div id="GROUP511">
                    <div>
                        <div id="IMAGE454">
                            <div class="image_background"></div>
                        </div>
                        <div id="TITLE412">
                            <h3>Khám phá các khách sạn với ưu đãi độc quyền, từ resort sang trọng đến homestay ấm cúng.</h3>
                        </div>
                        <div id="TITLE413">
                            <h3>Ở đâu?</h3>
                        </div>
                        <div id="LINE13">
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-100" id="SECTION15">
    <div class="sp_container">
        <div id="IMAGE594">
            <div class="image_background"></div>
            <div id="OVERLAY8"></div>
        </div>
        <div id="GROUP759">
            <div>
                <div id="IMAGE593">
                    <div class="image_background"></div>
                    <div id="OVERLAY7"></div>
                </div>
                <div id="TITLE632">
                    <h3>Các sự kiện đang diễn ra</h3>
                </div>
                <a id="BUTTON120" href="https://giaiphap.vtlink.vn" target="_blank"><button type="button" data-funnel="yes"> <span>  Tìm hiểu thêm</span> </button></a>
            </div>
        </div>
        <div id="GROUP583">
            <div>
                <div id="TITLE301">
                    <h3>CÁC SỰ KIỆN NỔI BẬT</h3>
                </div>
                <div id="LINE19">
                    <div></div>
                </div>
            </div>
        </div>
        <div id="GROUP760">
            <div>
                <div id="IMAGE504">
                    <div class="image_background"></div>
                    <div id="OVERLAY3"></div>
                </div>
                <a id="BUTTON91" href="https://giaiphap.vtlink.vn" target="_blank"><button type="button" data-funnel="yes"> <span> Thông tin sự kiện</span> </button></a>
                <div id="GROUP724">
                    <div>
                        <div id="BOX192">
                            <div></div>
                        </div>
                        <div id="GROUP723">
                            <div>
                                <div id="COUNTDOWN1">
                                    <div>
                                        <div style="width: 100%; height: 100%; display: flex; justify-content: center;align-items: center;" class="day reset_fontSize ">00</div>
                                        <div style="width: 100%; height: 100%; display: flex; justify-content: center;align-items: center;" class="hours reset_fontSize ">12</div>
                                        <div style="width: 100%; height: 100%; display: flex; justify-content: center;align-items: center;" class="minute reset_fontSize ">00</div>
                                        <div style="width: 100%; height: 100%; display: flex; justify-content: center;align-items: center;" class="second reset_fontSize ">00</div>
                                    </div>
                                </div>
                                <div id="TITLE443">
                                    <h3>Thời gian còn lại:</h3>
                                </div>
                                <div id="GROUP722">
                                    <div>
                                        <div id="TITLE447">
                                            <h3>Giây</h3>
                                        </div>
                                        <div id="TITLE444">
                                            <h3>Ngày</h3>
                                        </div>
                                        <div id="TITLE445">
                                            <h3>Giờ</h3>
                                        </div>
                                        <div id="TITLE446">
                                            <h3>Phút</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="GROUP729">
                    <div>
                        <div id="BOX210">
                            <div></div>
                        </div>
                        <div id="SHAPE73">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 13.5 18">
                                <foreignObject x="0" y="0" width="13.5" height="18"><i class=" far  fa-angle-double-right" style="font-size: 18px; color: rgb(0, 0, 0); cursor: pointer;"></i></foreignObject>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="TITLE633">
            <h3>Sự kiện sắp tới</h3>
        </div>
        <a id="BUTTON121" href="https://giaiphap.vtlink.vn" target="_blank"><button type="button" data-funnel="yes"> <span>   Khám phá ngay!</span> </button></a>
    </div>
</section>
<section class="w-100" id="SECTION21">
    <div class="sp_container">
        <div id="GROUP580">
            <div>
                <div id="TITLE471">
                    <h3>CHÚNG TÔI LÀ NGƯỜI HƯỚNG DẪN ĐÁNG TIN CẬY CỦA BẠN!</h3>
                </div>
                <div id="TITLE472">
                    <h3>Được bảo chứng bởi Sở Du lịch Bà Rịa - Vũng Tàu, chúng tôi cung cấp thông tin đầy đủ và chính xác về khách sạn, nhà hàng, và địa điểm vui chơi. Hãy để chúng tôi đồng hành cùng bạn trong hành trình khám phá!</h3>
                </div>
                <div id="BUTTON92"><button type="button" data-funnel="yes"> <span> Tìm hiểu thêm về chúng tôi</span> </button></div>
            </div>
        </div>
    </div>
</section>
<section class="w-100" id="SECTION22">
    <div class="sp_container">
        <div id="GROUP725">
            <div>
                <div id="TITLE473">
                    <h3>3 BƯỚC ĐƠN GIẢN ĐỂ NHẬN ƯU ĐÃI</h3>
                </div>
                <div id="BUTTON93"><button type="button" data-funnel="yes"> <span> BẮT ĐẦU NGAY</span> </button></div>
                <div id="GROUP573">
                    <div>
                        <div id="IMAGE506">
                            <div class="image_background"></div>
                        </div>
                        <div id="TITLE474">
                            <h3>Xác nhận</h3>
                        </div>
                        <div id="TITLE475">
                            <h3>Liên hệ cơ sở để sử dụng ưu đãi hoặc khuyến mãi.</h3>
                        </div>
                    </div>
                </div>
                <div id="GROUP575">
                    <div>
                        <div id="IMAGE507">
                            <div class="image_background"></div>
                        </div>
                        <div id="TITLE476">
                            <h3>Đăng ký</h3>
                        </div>
                        <div id="TITLE477">
                            <h3>Tạo tài khoản để nhận thông tin ưu đãi và sự kiện.</h3>
                        </div>
                    </div>
                </div>
                <div id="GROUP576">
                    <div>
                        <div id="IMAGE508">
                            <div class="image_background"></div>
                        </div>
                        <div id="TITLE478">
                            <h3>Tận hưởng</h3>
                        </div>
                        <div id="TITLE479">
                            <h3>Thoả sức khám phá Bà Rịa - Vũng Tàu với chi phí tiết kiệm!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-100" id="SECTION23">
    <div class="sp_container">
        <div id="GROUP726">
            <div>
                <div id="TITLE480">
                    <h3>HÀNH TRÌNH ĐÁNG NHỚ ĐANG CHỜ BẠN!</h3>
                </div>
                <div id="TITLE481">
                    <h3>Hãy tưởng tượng bạn đang thư giãn tại một resort sang trọng với giá ưu đãi, thưởng thức hải sản tươi ngon tại nhà hàng địa phương, và tham gia các hoạt động thú vị mà không lo về chi phí. Tất cả đều bắt đầu từ đây!</h3>
                </div>
                <div id="BUTTON94"><button type="button" data-funnel="yes"> <span> Đăng ký để trải nghiệm</span> </button></div>
            </div>
        </div>
    </div>
</section>

<section class="w-100" class="promotion_section">
    <div class="container">
        <h1 class="section-title">ƯU ĐÃI KHÁCH SẠN</h1>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi khách sạn!</div>
                        <button class="btn-view-offer">Khám phá ngay</button>
                    </div>
                </div>
            </div>
            
            @foreach ($products_KS as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="resort-card">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover" src="{{ $product->promotionThuongMainimage ? asset('uploads/'.$product->promotionThuongMainimage->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                {{ $product->promotionThuongMain->description }}
                            </div>
                            <div class="countdown-container" 
                                data-target="{{ $targetDate->toIso8601String() }}" 
                                data-mode="{{ $isComing ? 'coming' : 'expiring' }}">
                                <div class="mr-2 mt-1">{{ $isComing ? 'Có sau:' : 'Hết hạn:' }}</div>
                                
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Ngày</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giờ</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Phút</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giây</div></div>
                            </div>
                            <button class="btn-get-offer" onclick="openPopup()">Nhận ưu đãi</button>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        
        <button class="btn-view-more">Xem thêm về các ưu đãi</button>
    </div>
</section>

<section class="w-100" class="promotion_section mt-5">
    <div class="container">
        <h1 class="section-title">ƯU ĐÃI NHÀ HÀNG ẨM THỰC</h1>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi nhà hàng ẩm thực!</div>
                        <button class="btn-view-offer">Khám phá ngay</button>
                    </div>
                </div>
            </div>
            
            @foreach ($products_NH as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="resort-card">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover" src="{{ $product->promotionThuongMainimage ? asset('uploads/'.$product->promotionThuongMainimage->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                {{ $product->promotionThuongMain->description }}
                            </div>
                            <div class="countdown-container" 
                                data-target="{{ $targetDate->toIso8601String() }}" 
                                data-mode="{{ $isComing ? 'coming' : 'expiring' }}">
                                <div class="mr-2 mt-1">{{ $isComing ? 'Có sau:' : 'Hết hạn:' }}</div>
                                
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Ngày</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giờ</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Phút</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giây</div></div>
                            </div>
                            <button class="btn-get-offer" onclick="openPopup()">Nhận ưu đãi</button>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        
        <button class="btn-view-more">Xem thêm về các ưu đãi</button>
    </div>
</section>

<section class="w-100" class="promotion_section mt-5">
    <div class="container">
        <h1 class="section-title">ƯU ĐÃI VUI CHƠI GIẢI TRÍ</h1>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="special-offer-card" style="background-image: url({{ asset('assets/frontend/images/uudai-bg.png') }});">
                    <div class="special-overlay"></div>
                    <div class="special-offer-overlay">
                        <div class="special-offer-title">Ưu đãi đặc biệt</div>
                        <div class="special-offer-description">Những ngày cuối khuyến mãi độc quyền cho ưu đãi vui chơi giải trí!</div>
                        <button class="btn-view-offer">Khám phá ngay</button>
                    </div>
                </div>
            </div>
            
            @foreach ($products_KVC as $product)
                @php
                    $startDate = \Carbon\Carbon::parse($product->promotionThuongMain->start_date);
                    $endDate = $startDate->copy()->addDays($product->promotionThuongMain->end_in);
                    $now = \Carbon\Carbon::now();
                    $isComing = $now->lt($startDate);
                    $targetDate = $isComing ? $startDate : $endDate;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="resort-card">
                        <div class="resort-image">
                            <a href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}" class="w-100 h-100">
                                <img class="w-100 h-100" style="object-fit: cover" src="{{ $product->promotionThuongMainimage ? asset('uploads/'.$product->promotionThuongMainimage->ten) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="resort-details">
                            <div class="resort-name">
                                <a style="color: unset;" href="{{ route('frontend.product.detail', ['id'=>$product->id, 'slug'=>$product->slug]) }}">{{ $product->promotionThuongMain->name }}</a>
                            </div>
                            <div class="discount-info">
                                <i class="fas fa-tag discount-icon"></i>
                                {{ $product->promotionThuongMain->description }}
                            </div>
                            <div class="countdown-container" 
                                data-target="{{ $targetDate->toIso8601String() }}" 
                                data-mode="{{ $isComing ? 'coming' : 'expiring' }}">
                                <div class="mr-2 mt-1">{{ $isComing ? 'Có sau:' : 'Hết hạn:' }}</div>
                                
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Ngày</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giờ</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Phút</div></div>
                                <div class="countdown-box"><div class="countdown-value">00</div><div class="countdown-label">Giây</div></div>
                            </div>
                            <button class="btn-get-offer" onclick="openPopup()">Nhận ưu đãi</button>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        
        <button class="btn-view-more">Xem thêm về các ưu đãi</button>
    </div>
</section>

<section class="w-100" id="SECTION24">
    <div class="sp_container">
        <div id="TITLE551">
            <h3>TÀI NGUYÊN HỖ TRỢ DU LỊCH</h3>
        </div>
        <div id="GROUP703">
            <div>
                <div id="IMAGE583">
                    <div class="image_background"></div>
                </div>
                <div id="TITLE552">
                    <h3>Bản đồ tham quan Vũng Tàu</h3>
                </div>
                <div id="TITLE553">
                    <h3><span style="font-size: 19px; font-weight: bold;"></span>Khám phá các điểm đến nổi bật chỉ với 1 chạm.</h3>
                </div>
                <div id="TITLE554">
                    <h3><span style="font-size: 19px; font-weight: bold;"></span>Xem bản đồ</h3>
                </div>
            </div>
        </div>
        <div id="GROUP706">
            <div>
                <div id="IMAGE584">
                    <div class="image_background"></div>
                </div>
                <div id="TITLE555">
                    <h3>Bản đồ du lịch Hồ Tràm</h3>
                </div>
                <div id="TITLE556">
                    <h3><span style="font-size: 19px; font-weight: bold;"></span>Tìm kiếm resort, nhà hàng và hoạt động tại Hồ Tràm dễ dàng.</h3>
                </div>
                <div id="TITLE557">
                    <h3><span style="font-size: 19px; font-weight: bold;"></span>Xem bản đồ</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w-100" id="SECTION30">
    <div class="sp_container">
        <div id="TITLE640">
            <h3>CÁC BLOG MỚI NHẤT</h3>
        </div>
        <div id="GROUP771">
            <div>
                <div id="GROUP766">
                    <div>
                        <div id="BOX223">
                            <div></div>
                        </div>
                        <div id="TITLE636">
                            <h3>TIÊU ĐỀ BLOG</h3>
                        </div>
                        <div id="PARAGRAPH21">
                            <p>Văn bản ở đây / Văn bản ở đây / Văn bản ở đây /&nbsp;Văn bản ở đây / Văn bản ở đây / Văn bản ở đây /&nbsp;Văn bản ở đây / Văn bản ở đây&nbsp; &nbsp;<br>.... <b style="color: rgb(28, 77, 114);">Xem thêm</b></p>
                        </div>
                        <div id="GROUP765">
                            <div>
                                <div id="IMAGE595">
                                    <div class="image_background"></div>
                                </div>
                            </div>
                        </div>
                        <div id="BOX224">
                            <div></div>
                        </div>
                    </div>
                </div>
                <div id="GROUP767">
                    <div>
                        <div id="BOX225">
                            <div></div>
                        </div>
                        <div id="TITLE641">
                            <h3>TIÊU ĐỀ BLOG</h3>
                        </div>
                        <div id="PARAGRAPH22">
                            <p>Văn bản ở đây / Văn bản ở đây / Văn bản ở đây /&nbsp;Văn bản ở đây / Văn bản ở đây / Văn bản ở đây /&nbsp;Văn bản ở đây / Văn bản ở đây&nbsp; &nbsp;<br>.... <b style="color: rgb(28, 77, 114);">Xem thêm</b></p>
                        </div>
                        <div id="GROUP768">
                            <div>
                                <div id="IMAGE596">
                                    <div class="image_background"></div>
                                </div>
                            </div>
                        </div>
                        <div id="BOX226">
                            <div></div>
                        </div>
                    </div>
                </div>
                <div id="GROUP769">
                    <div>
                        <div id="BOX227">
                            <div></div>
                        </div>
                        <div id="TITLE642">
                            <h3>TIÊU ĐỀ BLOG</h3>
                        </div>
                        <div id="PARAGRAPH23">
                            <p>Văn bản ở đây / Văn bản ở đây / Văn bản ở đây /&nbsp;Văn bản ở đây / Văn bản ở đây / Văn bản ở đây /&nbsp;Văn bản ở đây / Văn bản ở đây&nbsp; &nbsp;<br>.... <b style="color: rgb(28, 77, 114);">Xem thêm</b></p>
                        </div>
                        <div id="GROUP770">
                            <div>
                                <div id="IMAGE597">
                                    <div class="image_background"></div>
                                </div>
                            </div>
                        </div>
                        <div id="BOX228">
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a id="BUTTON124" href="" target="_blank">
            <button type="button" data-funnel="yes" style="background: transparent;"> <span>  Các blog khác</span> </button>
        </a>
    </div>
</section>
<section class="w-100" id="SECTION32">
    <div class="sp_container">
        <div id="BOX229">
            <div></div>
        </div>
        <div id="TITLE651">
            <h2>ĐĂNG KÝ NGAY ĐỂ NHẬN ƯU ĐÃI ĐỘC QUYỀN</h2>
        </div>
        <div id="PARAGRAPH24">
            <p>Hãy để chúng tôi mang đến cho bạn những thông tin du lịch mới nhất, các chương trình khuyến mãi hấp dẫn từ Sở Du lịch và các đối tác. Chỉ một bước đơn giản, bạn sẽ không bỏ lỡ bất kỳ cơ hội tiết kiệm nào cho chuyến đi đến Bà Rịa - Vũng Tàu!</p>
        </div>
        <div id="FORM5" data-type="lead">
            <form>
                <div id="INPUT21"><input data-require="true" name="full_name" value="" type="text" data-type="text" placeholder="Họ tên"></div>
                <div id="INPUT22"><input data-require="true" name="email" value="" type="email" data-type="email" placeholder="Email"></div>
                <div id="INPUT23"><input data-require="true" name="phone" value="" type="text" data-type="phone" placeholder="Số điện thoại"></div>
                <div id="BUTTON123"><button type="submit" data-funnel="yes"> <span> Gửi thông tin</span> </button></div>
            </form>
            <div class="data_thankyou" type="popup" style="display: none;">Cảm ơn bạn đã quan tâm!</div>
        </div>
        <div id="PARAGRAPH25">
            <p>Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn theo chính sách bảo mật.</p>
        </div>
    </div>
</section>
<div id="POPUP1">
    <div data-width="414" data-height="328">
        <div id="SHAPE53">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 11.250000953674316 17.9976863861084">
                <foreignObject x="0" y="0" width="11.250000953674316" height="17.9976863861084"><i class=" far  fa-times" style="font-size: 18px; color: rgb(255, 255, 255); cursor: pointer;"></i></foreignObject>
            </svg>
        </div>
        <div id="TITLE132">
            <h3>ĐĂNG KÝ NHẬN ƯU ĐÃI NGAY</h3>
        </div>
        <div id="FORM3" data-type="lead">
            <form>
                <div id="INPUT12"><input data-require="" name="full_name" value="" type="text" data-type="text" placeholder="Họ tên"></div>
                <div id="INPUT13"><input data-require="" name="email" value="" type="email" data-type="email" placeholder="Email"></div>
                <div id="INPUT14"><input data-require="" name="phone" value="" type="text" data-type="phone" placeholder="Số điện thoại"></div>
                <div id="BUTTON15"><button type="submit" data-funnel="yes"> <span> đăng ký ngay</span> </button></div>
            </form>
            <div class="data_thankyou" type="popup" style="display: none;">Cảm ơn bạn đã quan tâm!</div>
        </div>
    </div>
</div>
<div id="POPUP2">
    <div data-width="424" data-height="227">
        <div id="TITLE133">
            <h3>Bảng giá</h3>
        </div>
        <div id="TITLE134">
            <h3>Villa</h3>
        </div>
        <div id="TITLE135">
            <h3>Câu hỏi</h3>
        </div>
        <div id="TITLE136">
            <h3>Đánh giá</h3>
        </div>
        <div id="TITLE137">
            <h3>Liên hệ</h3>
        </div>
    </div>
</div>
<div id="POPUP3">
    <div data-width="424" data-height="364">
        <div id="GROUP713">
            <div>
                <div id="GROUP712">
                    <div>
                        <div id="TITLE576">
                            <h3>Trang chủ&nbsp;</h3>
                        </div>
                        <div id="SHAPE62">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 20.25 18">
                                <foreignObject x="0" y="0" width="20.25" height="18"><i class=" far  fa-house" style="font-size: 18px; color: rgb(0, 0, 0); cursor: pointer;"></i></foreignObject>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="TITLE581">
            <h3>Vui chơi</h3>
        </div>
        <div id="SHAPE67">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 18 18">
                <foreignObject x="0" y="0" width="18" height="18"><i class=" far  fa-dharmachakra" style="font-size: 18px; color: rgb(0, 0, 0); cursor: pointer;"></i></foreignObject>
            </svg>
        </div>
        <div id="GROUP717">
            <div>
                <div id="TITLE577">
                    <h3>Sự kiện</h3>
                </div>
                <div id="SHAPE63">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 15.75 18">
                        <foreignObject x="0" y="0" width="15.75" height="18"><i class=" far  fa-calendar-alt" style="font-size: 18px; color: rgb(0, 0, 0); cursor: pointer;"></i></foreignObject>
                    </svg>
                </div>
            </div>
        </div>
        <div id="GROUP714">
            <div>
                <div id="TITLE579">
                    <h3>Ẩm thực</h3>
                </div>
                <div id="SHAPE65">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 19.125 18">
                        <foreignObject x="0" y="0" width="19.125" height="18"><i class=" far  fa-utensils" style="font-size: 18px; color: rgb(0, 0, 0); cursor: pointer;"></i></foreignObject>
                    </svg>
                </div>
            </div>
        </div>
        <div id="GROUP715">
            <div>
                <div id="TITLE578">
                    <h3>Nghỉ dưỡng</h3>
                </div>
                <div id="SHAPE64">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 22.5 18">
                        <foreignObject x="0" y="0" width="22.5" height="18"><i class=" far  fa-umbrella-beach" style="font-size: 18px; color: rgb(0, 0, 0); cursor: pointer;"></i></foreignObject>
                    </svg>
                </div>
            </div>
        </div>
        <div id="GROUP718">
            <div>
                <div id="TITLE580">
                    <h3>Về chúng tôi</h3>
                </div>
                <div id="SHAPE66">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 22.5 18">
                        <foreignObject x="0" y="0" width="22.5" height="18"><i class=" far  fa-user-friends" style="font-size: 18px; color: rgb(0, 0, 0); cursor: pointer;"></i></foreignObject>
                    </svg>
                </div>
            </div>
        </div>
        <div id="LINE20">
            <div></div>
        </div>
        <div id="GROUP720">
            <div>
                <div id="TITLE583">
                    <h3>Liên hệ</h3>
                </div>
                <div id="SHAPE69">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 15.75 18">
                        <foreignObject x="0" y="0" width="15.75" height="18"><i class=" far  fa-user-headset" style="font-size: 18px; color: rgb(0, 0, 0); cursor: pointer;"></i></foreignObject>
                    </svg>
                </div>
            </div>
        </div>
        <div id="GROUP756">
            <div>
                <div id="TITLE584">
                    <h3>Đăng ký</h3>
                </div>
                <div id="SHAPE70">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 18 18">
                        <foreignObject x="0" y="0" width="18" height="18"><i class=" far  fa-sign-in-alt" style="font-size: 18px; color: rgb(28, 77, 114); cursor: pointer;"></i></foreignObject>
                    </svg>
                </div>
                <div id="TITLE585">
                    <h3>Đã có tài khoản? <span style="color: rgb(28, 77, 114);"><span style="font-weight: bold;">Đăng nhập</span></span></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
    });
    const bannerSwiper = new Swiper('.bannerSwiper', {
        effect: 'fade',
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: false,
        navigation: false,
    });
</script>

@endsection