<!-- FOOTER -->
<footer>
    <div class="footerBg">
        <div class="footerLogo" style="height: 115px;">
            <h3>Khách hàng</h3>
            <div class="footerLogoList">
                <div class="swiper customerSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($customers as $customer)
                        <div class="swiper-slide">
                            <a href="{{ $customer->link ? $customer->link : '#' }}" target="_blank">
                                <img loading="lazy" src="{{ $customer->image ? asset('uploads/'.$customer->image->ten) : asset('images/default.jpg') }}" class="li_scrollImg" alt="{{ $customer->name }}" />
                            </a>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footerCopyright">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-warp">
                        <h3 class="name">CÔNG TY TNHH VẬT TƯ THIẾT BỊ Á CHÂU</h3><br>
                        <div class="mt-2" style="line-height: 1.5;">
                            Địa chỉ: 71 Bà Huyện Thanh Quan, Phường 4, Tp Vũng Tàu<br />
                            Điện thoại: 0908 863 678<br />
                            Email: info@asimat.vn <br />
                            Website: www.asimat.vn <br />
                            {{-- Mã số thuế: 0304116221  - Ngày cấp: 02/12/2005<br /> --}}
                            Copyright © 2025 - Asimat Co., Ltd.<br />
                            <a href="#" target="_blank">
                                <img src="{{ asset('assets/frontend/images/dathongbao_120x46.png') }}">
                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="footer-warp">
                                <h3 class="name">Sitemap</h3>
                                <ul class="sublist">
                                    <li><a href="/">Trang chủ</a></li>
                                    <li><a href="{{ route('frontend.home.page', ['slug'=>$pageGt->slug]) }}">Giới thiệu</a></li>
                                    <li><a href="{{ route('frontend.home.products') }}">Sản phẩm</a></li>
                                    <li><a href="/lien-he">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="footer-warp">
                                <h3 class="name">Thông tin chung</h3>
                                <ul class="sublist">
                                    @foreach ($pages as $page)
                                    <li>
                                        <a href="{{ route('frontend.home.page', ['slug'=>$page->slug]) }}">{{ $page->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end of FOOTER -->

<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/lib/bootstrap-4.6.2-dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/lib/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/lib/swiper/swiper-bundle.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('show');
            overlay.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('show');
            overlay.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        toggleButton.addEventListener('click', function () {
            if (sidebar.classList.contains('show')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        // Bấm vào overlay để đóng sidebar
        overlay.addEventListener('click', function () {
            closeSidebar();
        });
    });
</script>



<script language="javascript">
    hs.graphicsDir = 'assets/frontend/images/';
    hs.outlineType = 'rounded-white';
    hs.outlineWhileAnimating = true;

    $('.searchBtn').on('click', function () {
        var keyword = $('#keyword').val().trim();

        if (keyword !== '') {
            $('form[name="frmsearch"]').submit();
        }
    });

    function goToURL(selectElement) {
        var url = selectElement.value;
        if (url && url !== '#') {
            window.open(url, '_blank'); // Mở trong tab mới
            // window.location.href = url; // Nếu muốn mở trong chính tab hiện tại
        }
    }

    //top deals
    var speeda=40;
    var topdeals2 = document.getElementById("topdeals2");
    var topdeals1 = document.getElementById("topdeals1");
    var topdeals = document.getElementById("topdeals");
    topdeals2.innerHTML = topdeals1.innerHTML;
    
    function Marquee(){
        if(topdeals2.offsetTop-topdeals.scrollTop<=0){
            topdeals.scrollTop-=topdeals1.offsetHeight+45;
        }else{
            topdeals.scrollTop++;
        }
    }
    var MyMar=setInterval(Marquee,speeda);
    
    topdeals.onmouseover = function() {clearInterval(MyMar)}
    topdeals.onmouseout = function() {MyMar=setInterval(Marquee,speeda)}

    $(document).ready(function() {
        var swiperBanner = new Swiper(".bannerSwiper", {
            loop: true,
            effect: "fade",
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
            navigation: false,
        });

        var customerSwiper = new Swiper(".customerSwiper", {
            slidesPerView: "auto",
            spaceBetween: 20,
            loop: false,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: false,
            pagination: false,
        });
    });
</script>