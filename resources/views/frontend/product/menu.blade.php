@extends('frontend.layout.app')
@section('title', 'Hose and Fittings - Quality')
@section('content')
<div class="widthMain">
    <div class="mainTitle">
        <h2>Sản phẩm / <a href="">Manntek - LNG Solution</a></h2>
    </div>
    <div class="mainProduct">
        <div class="contentProduct">
            <table width="100%" cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th width="120" class="center red uppercase">
                            <img src="{{ asset('assets/frontend/images/icon_image.png') }}" align="absmiddle" /> Hình ảnh
                        </th>
                        <th class="center red uppercase">
                            <img src="{{ asset('assets/frontend/images/icon_pro.png') }}" align="absmiddle" /> Tên sản phẩm
                        </th>
                        <th width="135" class="center red uppercase">
                            <img src="{{ asset('assets/frontend/images/icon_find.png') }}" align="absmiddle" /> Tài liệu kỹ thuật
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('assets/frontend/images/pro_1702892135.png') }}" class="highslide" onclick="return hs.expand(this)">
                                <img src="{{ asset('assets/frontend/images/pro_1702892135.png') }}" class="productTDImgsize" />
                            </a>
                        </td>
                        <td class="top">
                            <h4><a href="">Dry Cryogenic Couplings</a></h4>
                            <br />
                            Model: <b></b>
                            <p>
                                DCC<br />
                                Dry Cryogenic Couplings
                            </p>
                        </td>
                        <td class="center">
                            <div>
                                <a href="{{ asset('assets/upload/file_1702892647.pdf') }}" target="_blank"><img src="{{ asset('assets/frontend/images/icon_pdf.png') }}" alt="" /></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('assets/frontend/images/pro_1702892297.png') }}" class="highslide" onclick="return hs.expand(this)">
                                <img src="{{ asset('assets/frontend/images/pro_1702892297.png') }}" class="productTDImgsize" />
                            </a>
                        </td>
                        <td class="top">
                            <h4><a href="">Cryogenic Breakaway Couplings</a></h4>
                            <br />
                            Model: <b></b>
                            <p>
                                CBC<br />
                                Cryogenic Breakaway Couplings
                            </p>
                        </td>
                        <td class="center">
                            <div>
                                <a href="" target="_blank"><img src="{{ asset('assets/frontend/images/icon_pdf.png') }}" alt="" /></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ asset('assets/frontend/images/pro_1702892498.png') }}" class="highslide" onclick="return hs.expand(this)">
                                <img src="{{ asset('assets/frontend/images/pro_1702892498.png') }}" class="productTDImgsize" />
                            </a>
                        </td>
                        <td class="top">
                            <h4><a href="">Powered Emergency Release Coupling</a></h4>
                            <br />
                            Model: <b></b>
                            <p>
                                PERC<br />
                                Powered Emergency Release Coupling
                            </p>
                        </td>
                        <td class="center">
                            <div>
                                <a href="" target="_blank"><img src="{{ asset('assets/frontend/images/icon_pdf.png') }}" alt="" /></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Page number -->
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>
@endsection
@section('styles')

@endsection
@section('script')

@endsection