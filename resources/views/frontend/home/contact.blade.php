@extends('frontend.layout.app')
@section('title', 'Hose and Fittings - Quality')
@section('content')
<div class="widthMain text-left">
    <div class="mainTitle"><h2>Liên hệ</h2></div>
    <div class="mt-3" style="font-size: 14px;">
        <div style="line-height: 150%;">
            <p>
                <em>
                    <span><span style="font-family: Arial;">Mọi thắc mắc, yêu cầu hỗ trợ, ...hãy liên hệ với chúng tôi:</span></span>
                </em>
            </p>
            <p>&nbsp;</p>
            <p>
                <strong>
                    CÔNG TY TNHH VẬT TƯ THIẾT BỊ Á CHÂU<br />
                    Địa chỉ: 71 Bà Huyện Thanh Quan, Phường 4, Tp Vũng Tàu<br />
                    Điện thoại: 0908 863 678<br />
                </strong>
                <strong>Email: </strong>
                <span style="background-color: rgb(245, 245, 245); font-family: Tahoma, Geneva, sans-serif; font-size: 13px; text-align: center;">&nbsp;</span>
                <span style="background-color: rgb(245, 245, 245); font-family: Tahoma, Geneva, sans-serif; font-size: 13px; text-align: center;">info@asimat.vn</span>
                <span style="background-color: rgb(245, 245, 245); font-family: Tahoma, Geneva, sans-serif; font-size: 13px; text-align: center;">&nbsp;</span><br>
                <strong>Website: </strong>
                <span style="background-color: rgb(245, 245, 245); font-family: Tahoma, Geneva, sans-serif; font-size: 13px; text-align: center;">&nbsp;</span>
                <span style="background-color: rgb(245, 245, 245); font-family: Tahoma, Geneva, sans-serif; font-size: 13px; text-align: center;">www.asimat.vn</span>
                <span style="background-color: rgb(245, 245, 245); font-family: Tahoma, Geneva, sans-serif; font-size: 13px; text-align: center;">&nbsp;</span>
            </p>
        </div>
    </div>
    <div>
        <div style="line-height: 135%; font-size: 13px; margin-top: 10px;">
            <strong>Quý khách liên hệ với chúng tôi bằng cách điền vào mẫu Form dưới đây và gửi cho chúng tôi. Thông tin của quý khách sẽ được xem xét và trả lời trong thời gian sớm nhất.</strong>
        </div>
        <div style="font-size: 13px; margin: 8px 0; color: red;">
            <em><u>Ghi chú: </u>: Những ô có dấu (*) là những ô yêu cầu nhập đầy đủ thông tin</em>
        </div>
        <form id="contactForm" name="frmPage" method="post" action="{{ route('frontend.home.post_contact') }}">
            @csrf
            <table width="100%" cellpadding="2" cellspacing="1">
                <tbody style="font-size: 13px;">
                    <tr>
                        <td width="105" class="contactTitle">Họ và tên <span style="color: red">*</span></td>
                        <td>
                            <input name="name_txt" type="text" maxlength="100" class="textForm form-control form-control-sm" style="width: 100%;" value="{{ old('name_txt') }}" />
                            @error('name_txt') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="contactTitle">Công Ty</td>
                        <td>
                            <input name="company_txt" type="text" maxlength="100" class="textForm form-control form-control-sm" style="width: 100%;" value="{{ old('company_txt') }}" />
                        </td>
                    </tr>
                    <tr>
                        <td class="contactTitle">Địa chỉ <span style="color: red">*</span></td>
                        <td>
                            <input name="address_txt" type="text" maxlength="150" class="textForm form-control form-control-sm" style="width: 100%;" value="{{ old('address_txt') }}" />
                            @error('address_txt') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="contactTitle">Điện thoại <span style="color: red">*</span></td>
                        <td>
                            <input name="phone_txt" type="tel" maxlength="15" class="textForm form-control form-control-sm" style="width: 150px;" value="{{ old('phone_txt') }}" />
                            @error('phone_txt') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="contactTitle">Fax</td>
                        <td>
                            <input name="fax_txt" type="text" class="textForm form-control form-control-sm" style="width: 150px;" value="{{ old('fax_txt') }}" />
                        </td>
                    </tr>
                    <tr>
                        <td class="contactTitle">Địa chỉ e-mail <span style="color: red">*</span></td>
                        <td>
                            <input name="email_txt" type="email" maxlength="100" class="textForm form-control form-control-sm" style="width: 100%;" value="{{ old('email_txt') }}" />
                            @error('email_txt') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="contactTitle">Tiêu đề liên hệ <span style="color: red">*</span></td>
                        <td>
                            <input name="title_txt" type="text" maxlength="100" class="textForm form-control form-control-sm" style="width: 100%;" value="{{ old('title_txt') }}" />
                            @error('title_txt') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="contactTitle">Nội dung liên hệ</td>
                        <td>
                            <textarea name="content_txt" autocomplete="off" maxlength="500" cols="" rows="6" class="textArea form-control form-control-sm" style="width: 100%;">{{ old('content_txt') }}</textarea>
                        </td>
                    </tr>
                
                    <tr>
                        <td></td>
                        <td>
                            <img src="/captcha" alt="Captcha" id="captcha-img" border="0" align="absmiddle" style="width: 200px; border: 1px solid #cecece" />
                            <button type="button" class="btn btn-danger" id="btn-captcha" title="Click để đổi mã mới">&#x21bb;</button>
                        </td>
                    </tr>
                
                    <tr>
                        <td class="contactTitle">Mã bảo vệ <span style="color: red">*</span></td>
                        <td>
                            <input name="code_security" type="text" id="code_security" class="textForm form-control form-control-sm" style="width: 120px;" value="{{ old('code_security') }}" />
                            <span style="font: normal 10px Arial; color: #999999;">Nhập những ký tự ở hình trên, không bao gồm khoảng trắng</span>
                            @error('code_security') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                    </tr>
                
                    <tr>
                        <td></td>
                        <td style="padding-top: 10px;">
                            <button type="submit" class="btn btn-secondary">Gửi yêu cầu</button>
                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                        </td>
                    </tr>
                </tbody>                
            </table>
        </form>
        <p class="mt-4 mb-4" style="color: green; font-size: 13px;">
            {{ session('notice') ?? '' }}
        </p>    
    </div>
</div>

@endsection
@section('styles')
<style>
    .error-msg {
        color: red;
        font-size: 12px;
        margin-top: 4px;
        font-style: italic;
    }
</style>
@endsection
@section('script')
@if ($errors->has('code_security'))
<script>
    $(document).ready(function () {
        $('#captcha-img').attr('src', '/captcha?rand=' + Math.random());
    });
</script>
@endif
<script>
    $(document).ready(function () {
        $("#contactForm").validate({
            rules: {
                name_txt: {
                    required: true,
                    maxlength: 100
                },
                address_txt: {
                    required: true,
                    maxlength: 150
                },
                phone_txt: {
                    required: true,
                    maxlength: 15,
                    digits: true
                },
                email_txt: {
                    required: true,
                    email: true,
                    maxlength: 100
                },
                title_txt: {
                    required: true,
                    maxlength: 100
                },
                code_security: {
                    required: true
                }
            },
            messages: {
                name_txt: "Vui lòng nhập họ tên.",
                address_txt: "Vui lòng nhập địa chỉ.",
                phone_txt: {
                    required: "Vui lòng nhập số điện thoại.",
                    digits: "Chỉ được nhập số."
                },
                email_txt: {
                    required: "Vui lòng nhập email.",
                    email: "Định dạng email không hợp lệ."
                },
                title_txt: "Vui lòng nhập tiêu đề liên hệ.",
                code_security: {
                    required: "Vui lòng nhập mã bảo vệ."
                }
            },
            errorElement: "div",
            errorClass: "error-msg",
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            }
        });
        
        $("#btn-captcha").click(function () {
            $.get("/captcha", function () {
                $("#captcha-img").attr("src", "/captcha?rnd=" + Math.random());
            });
        });


    });
</script>
    
@endsection