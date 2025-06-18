
document.addEventListener('DOMContentLoaded', function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    const header = document.querySelector('header');
    let isSticky = false;

    window.addEventListener('scroll', function () {
        if (window.scrollY > 200 && !isSticky) {
            header.classList.remove('transparent-header');
            header.classList.add('sticky');
            isSticky = true;
        } else if (window.scrollY <= 200 && isSticky) {
            header.classList.remove('sticky');
            header.classList.add('transparent-header');
            isSticky = false;
        }
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
        $('#scrollToTop').fadeIn();
        } else {
        $('#scrollToTop').fadeOut();
        }
    });

    $('#scrollToTop').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 500); // 500ms để mượt
        return false;
    });

    window.openFormRegister = function(promotion_fk) {
        $('#myModal').modal('toggle');
        $('#register_promotion_fk').val(promotion_fk);
    }

    document.querySelectorAll('.countdown-container').forEach(function (container) {
        const targetDate = new Date(container.dataset.target);
        const mode = container.dataset.mode;
        const values = container.querySelectorAll('.countdown-value');

        function updateCountdown() {
            const now = new Date();
            const diff = targetDate - now;

            if (diff <= 0) {
                values.forEach(v => v.textContent = '00');
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
            const minutes = Math.floor((diff / (1000 * 60)) % 60);
            const seconds = Math.floor((diff / 1000) % 60);

            values[0].textContent = String(days).padStart(2, '0');
            values[1].textContent = String(hours).padStart(2, '0');
            values[2].textContent = String(minutes).padStart(2, '0');
            values[3].textContent = String(seconds).padStart(2, '0');
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });

    window.openPopup = function () {
        const popup = document.getElementById("POPUP1");
        if (popup) {
            popup.style.display = "block";
        }
    }

    window.closePopup = function () {
        const popup = document.getElementById("POPUP1");
        if (popup) {
            popup.style.display = "none";
        }
    }

    const closeButton = document.querySelector("#SHAPE53, .fa-times");
    if (closeButton) {
        closeButton.addEventListener("click", closePopup);
    }

    const sidebar = document.getElementById('mobileSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggleBtn = document.getElementById('sidebarToggle');
    const closeBtn = document.getElementById('sidebarClose');

    toggleBtn.addEventListener('click', function () {
        sidebar.classList.add('show');
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden'; // chặn cuộn trang
    });

    function closeSidebar() {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
        document.body.style.overflow = ''; // khôi phục cuộn
    }

    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);
    if ($('#customerForm').length) {
        $('#customerForm').validate({
            errorElement: 'div',
            errorClass: 'invalid-feedback',
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                phone: {
                    required: true,
                    maxlength: 20
                },
                content: {
                    maxlength: 200
                },
                agree: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập họ tên",
                    maxlength: "Họ tên không được vượt quá 50 ký tự"
                },
                email: {
                    required: "Vui lòng nhập email",
                    email: "Email không đúng định dạng",
                    maxlength: "Email không được vượt quá 50 ký tự"
                },
                phone: {
                    required: "Vui lòng nhập số điện thoại",
                    maxlength: "Số điện thoại không được vượt quá 20 ký tự"
                },
                content: {
                    maxlength: "Lời nhắn không được vượt quá 200 ký tự"
                },
                agree: {
                    required: "Vui lòng đồng ý với các chính sách của chúng tôi"
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("type") === "checkbox") {
                    error.appendTo(".checkbox-error");
                } else {
                    error.insertAfter(element);
                }
            }
        });
    }
    

    if ($('#registerForm').length) {
        $('#registerForm').validate({
            errorElement: 'div',
            errorClass: 'invalid-feedback-re',
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                phone: {
                    required: true,
                    maxlength: 20
                },
                content: {
                    maxlength: 200
                },
                agree: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập họ tên",
                    maxlength: "Họ tên tối đa 50 ký tự"
                },
                email: {
                    required: "Vui lòng nhập email",
                    email: "Email không hợp lệ",
                    maxlength: "Email tối đa 50 ký tự"
                },
                phone: {
                    required: "Vui lòng nhập số điện thoại",
                    maxlength: "Số điện thoại tối đa 20 ký tự"
                },
                content: {
                    maxlength: "Lời nhắn tối đa 200 ký tự"
                },
                agree: {
                    required: "Vui lòng đồng ý với các chính sách của chúng tôi"
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("type") === "checkbox") {
                    error.appendTo(".checkbox-error-re");
                } else {
                    error.insertAfter(element);
                }
            }
        });
    }
    


    function isVisible(el) {
        return !!(el.offsetWidth || el.offsetHeight || el.getClientRects().length);
    }

    let allBanners = document.querySelectorAll(".bannerSwiper");

    let bannerSection = Array.from(allBanners).find(isVisible);

    if (bannerSection) {
        let nextSection = document.querySelector("#nextSection");

        let scrolled = false;
        const headerHeight = 50;

        window.addEventListener("wheel", function (e) {
            if (window.scrollY === 0) {
                scrolled = false;
            }

            if (!scrolled && e.deltaY > 0 && window.scrollY < 50) {
                scrolled = true;
                if (nextSection) {
                    const offsetTop = nextSection.getBoundingClientRect().top + window.scrollY - headerHeight;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    }
});

// document.addEventListener("DOMContentLoaded", function () {
//     const headerHeight = 50;
//     const nextSection = document.querySelector("#nextSection");

//     // Scroll mượt đến nextSection
//     function smoothScrollFrom(el) {
//         if (!nextSection || !el) return;

//         const offsetTop = nextSection.getBoundingClientRect().top + window.scrollY - headerHeight;

//         window.scrollTo({
//             top: offsetTop,
//             behavior: "smooth"
//         });
//     }

//     // Kiểm tra phần tử có đang hiển thị không
//     function isVisible(el) {
//         return el && el.offsetParent !== null;
//     }

//     const bannerDesktop = document.querySelector("#bannerDesktop");
//     const bannerMobile = document.querySelector("#bannerMobile");

//     // Xác định phần tử banner đang hiển thị
//     const visibleBanner = isVisible(bannerDesktop) ? bannerDesktop :
//                           isVisible(bannerMobile) ? bannerMobile : null;

//     if (!visibleBanner) return;

//     let scrolled = false;

//     window.addEventListener("wheel", function (e) {
//         if (window.scrollY <= 10) {
//             if (!scrolled && e.deltaY > 0) {
//                 scrolled = true;
//                 smoothScrollFrom(visibleBanner);
//             }
//         } else {
//             scrolled = false; // reset nếu cuộn lại đầu
//         }
//     }, { passive: true });
// });

