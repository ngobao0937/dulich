<!DOCTYPE html>
<html lang="vi">
<head>
    @include('backend.layouts.head')
    @yield('styles')
</head>
<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('backend.layouts.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('backend.layouts.footer')
    </div>
    @include('backend.layouts.modal')
    <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @foreach ($errors->all() as $error)
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Lỗi',
                        subtitle: 'Vui lòng kiểm tra lại',
                        body: '{{ $error }}'
                    });
                @endforeach
            });
        </script>
    @endif
    <script>
        
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            function isLargeScreen() {
                return $(window).width() >= 768;
            }

            if (isLargeScreen()) {
                let isCollapsed = localStorage.getItem("sidebarCollapsed") === "true";
                $("body").toggleClass("sidebar-collapse", isCollapsed);
            }

            $(".navbar-nav").on("click", function () {
                if (!isLargeScreen()) return;

                let isCollapsed = $("body").hasClass("sidebar-collapse");
                localStorage.setItem("sidebarCollapsed", !isCollapsed); 
            });

            $(window).on("resize", function () {
                if (!isLargeScreen()) {
                    localStorage.removeItem("sidebarCollapsed");
                }
            });

            $('[data-toggle="tooltip"]').tooltip()
        });

        toastr.options = {
            "closeButton": true,
            "positionClass": "toast-top-right",
        };

        $('.select2').select2();
        $('.select2-multiple').select2({
            closeOnSelect: false // Giữ cửa sổ mở khi chọn item
        });
        var options = {
            height: 150,
            extraPlugins: 'image2,justify,colorbutton,colordialog,indent,clipboard,pastefromword,pastetools,pastefromgdocs,pastefromlibreoffice',
            removePlugins: 'image',
            forcePasteAsPlainText: false,
            filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            
            clipboard_defaultContentType: 'html',
            clipboard_notification: false,
            allowedContent: true,
            enterMode: CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P,
        };

        CKEDITOR.on("instanceReady", function(event) {
            event.editor.on("beforeCommandExec", function(event) {
                if (event.data.name == "paste") {
                    event.editor._.forcePasteDialog = true;
                }
                if (event.data.name == "pastetext" && event.data.commandData.from == "keystrokeHandler") {
                    event.cancel();
                }
            })
        });

        function toggleModalOverflow() {
            let ckeditorBg = $('.cke_dialog_background_cover');

            if (ckeditorBg.length > 0 && ckeditorBg.css('display') !== 'none') {
                $('.modal-open .modal').css('overflow', 'visible');
            } else {
                $('.modal-open .modal').css('overflow-y', 'auto');
            }
        }

        setInterval(toggleModalOverflow, 500);
        

        var defaultImage = '{{ asset('images/upload.png') }}';
        var originalImage = "";

        $('#uploadIcon').on('click', function() {
            $('#picture').click();
        });

        $('#imagePreview').on('click', function() {
            $('#picture').click();
        });

        $('#picture').on('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                    $('#removeIcon').show();
                };
                reader.readAsDataURL(file);
            }
        });

        $('#removeIcon').on('click', function() {
            $('#picture').val('');
            if (originalImage) {
                $('#imagePreview').attr('src', originalImage);
            } else {
                $('#imagePreview').attr('src', defaultImage);
            }
            $('#removeIcon').hide(); 
        });
    </script>
    @yield('scripts')
</body>
</html>
