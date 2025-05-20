<footer class="w-100 footer-background">
    <div class="overlay-footer"></div>
    <div class="position-relative pt-4 pb-4" style="z-index: 2">
        <div class="row mb-4">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-6">
                <div class="row">
                     <div class="col-md-6">
                        <div class="w-100 d-flex justify-content-center mb-3" style="aspect-ratio: 5/3">
                            <img class="logo-footer-c w-100" style="object-fit: contain;" src="{{ asset('images/logo-1.png') }}" alt="Logo">
                        </div>
                        <div class="title-logo-white mb-2">Sở Du Lịch Bà Rịa - Vũng Tàu</div>
                        <div class="des-logo-footer mb-2">
                            <i class="fas fa-map-marked-alt mr-2" style="color: #ffffff; font-size: 18px;"></i> Số 1 - Phạm Văn Đồng - P. Phước Trung - TP. Bà Rịa - Tỉnh Bà Rịa Vũng Tàu
                        </div>
                        <div class="des-logo-footer mb-2">
                            <i class="fas fa-phone-square-alt mr-2" style="color: #ffffff; font-size: 18px;"></i> (84-254) 3727.444 - Fax: (84-254) 3570.888
                        </div>
                            <div class="des-logo-footer mb-3">
                            <i class="fas fa-envelope-open mr-2" style="color: #ffffff; font-size: 18px;"></i> sodl@baria-vungtau.gov.vn
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-logo-white">Bài viết mới</div>
                        @foreach ($blogsF as $blog)
                            <a href="{{ route('frontend.blog.detail', ['id'=>$blog->id,'slug'=>$blog->slug]) }}">
                                <div class="post-content mb-3 mt-3">
                                    <div class="post-description mb-2">
                                        {{ $blog->name }}
                                    </div>
                                    <div><i class="post-date">{{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/y') }}</i></div>
                                </div>
                                @unless ($loop->last)
                                    <div class="post-divider"></div>
                                @endunless
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title-logo-white mb-3">Videos</div>
                        <div class="w-100 mb-3" style="background: white">
                            <div class="embed-responsive embed-responsive-16by9 h-100">
                                <iframe class="embed-responsive-item" 
                                        src="https://www.youtube.com/embed/aY7F3NKR6VA?si=gTc1nuFzogIKN8eM" 
                                        allowfullscreen 
                                        style="width: 100%; border: none; aspect-ratio: 16/9;">
                                </iframe>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="title-logo-white mb-3">Điều hướng</div>
                        <a href="/" class="mb-2 d-block">
                            <div>Trang chủ</div>
                        </a>
                        <a href="{{ route('frontend.home.event') }}" class="mb-2 d-block">
                            <div>Sự kiện du lịch</div>
                        </a>
                        <a href="{{ route('frontend.product.promotions') }}" class="mb-2 d-block">
                            <div>Khuyến mãi & ưu đãi</div>
                        </a>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="mb-2 d-block">
                            <div>Đăng ký</div>
                        </a>
                    </div>
                </div>
            </div>
                </div>
            </div>
            
        </div>
        <div class="post-divider"></div>
        <div class="d-flex justify-content-between mt-3">
            <div style="font-size: 14px">Copy right © 2025 All rights reserved</div>
            <div class="d-flex">
                <a href="#" style="width: 40px; margin-right: 10px; display: block;">
                    <i class="fab fa-facebook" style="color: #ffffff; font-size: 40px;"></i>
                </a>
                <a href="#" style="width: 40px; margin-right: 10px; display: block">
                    <img class="w-100" src="{{ asset('assets/frontend/images/icon-zalo9.png') }}" alt="zalo">
                </a>
                <a href="#" style="width: 40px; display: block">
                    <img class="w-100" src="{{ asset('assets/frontend/images/tiktok.png') }}" alt="tiktok">
                </a>
                
            </div>
        </div>
    </div>
</footer>