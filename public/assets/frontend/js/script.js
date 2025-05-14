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

    function openPopup() {
        const popup = document.getElementById("POPUP1");
        if (popup) {
            popup.style.display = "block";
        }
    }

    function closePopup() {
        const popup = document.getElementById("POPUP1");
        if (popup) {
            popup.style.display = "none";
        }
    }

    const closeButton = document.querySelector("#SHAPE53, .fa-times");
    if (closeButton) {
        closeButton.addEventListener("click", closePopup);
    }

    window.openPopup = openPopup;
    window.closePopup = closePopup;
});