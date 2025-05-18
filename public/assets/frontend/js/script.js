document.addEventListener('DOMContentLoaded', function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
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
                required: "Bạn phải đồng ý với Điều khoản dịch vụ"
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") === "checkbox") {
                error.insertAfter(element.closest('.icheck-primary'));
            } else {
                error.insertAfter(element);
            }
        }
    });

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
                required: "Bạn phải đồng ý với Điều khoản dịch vụ"
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") === "checkbox") {
                error.insertAfter(element.closest('.icheck-primary'));
            } else {
                error.insertAfter(element);
            }
        }
    });

});