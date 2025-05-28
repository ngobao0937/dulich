@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#bannerModal">
                        Thêm mới
                    </a>
                    <form method="GET" action="{{ route('backend.banner.index') }}" class="form-inline" id="search-form">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.banner.index') }}"><i class="fas fa-times"></i></a>
                                @endif 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="table_" class="table table-hover text-nowrap">
                    <thead class="thead-light">
                        <tr class="table-bg">
                            <th style="width: 60px;">#</th>
                            <th style="width: 90px;">Hình ảnh</th>
                            <th>Tên Banner</th>
                            <th style="width: 200px;">Thuộc trang</th>
                            <th style="width: 100px;">Thứ tự</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse($banners as $banner)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            {{-- <td>
                                <div style="background: #ededed  url('{{$banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                                <div style="background: #ededed  url('{{$banner->image ? 'https://s3-hcm-r1.longvan.net/kaholding/'.$banner->image->ten : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                            </td> --}}
                            <td>
                                <div style="background: #ededed url('{{ $banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}') no-repeat center center; background-size: contain; width: 100%;height: 30px;">
                                </div>
                            </td>
                            
                            <td>
                                {{ $banner->name }}
                            </td>
                            <td>
                                @if ($banner->type == 'main')
                                    Trang chủ ({{$banner->isMobile == 1 ? 'M' : 'D'}})
                                @elseif ($banner->type == 'event')
                                    Trang sự kiện
                                @elseif ($banner->type == 'promotion')
                                    Trang ưu đãi
                                @elseif ($banner->type == 'blog')
                                    Trang blog
                                @endif
                            </td>
                            <td>{{ $banner->position }}</td>
                            <td class="text-center">
                                @if ($banner->active != 1)
                                <span class="badge badge-warning">Tạm dừng</span>
                                @else
                                <span class="badge badge-success">Hoạt động</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bannerModal" onclick="alertBanner({{ $banner->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $banner->id }}, '{{ $banner->type }}')">
                                <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="justify-content-center d-flex mt-3">
                {{ $banners->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@include('backend.banner.modal')
@endsection
@section('styles')

@endsection
@section('scripts')
<script>
    function alertDelete(id,type) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
        $('#deleteId').val(id);
        $('#deleteType').val(type);
    }

    $('#bannerModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        $('#isMobile').val(0);
        $('#position').val('');
        $('#type').val('main');
        $('#link').val('');
        $('#active').prop('checked', false);
        $('#picture').val('');
        $('#imagePreview').attr('src', defaultImage);
    });
    function alertBanner(bannerId){
        $.ajax({
            type: 'GET',
            url: 'banner/edit' + '?id=' + bannerId,
            success: function(data){
                $('#id').val(data.banner.id);
                $('#name').val(data.banner.name ?? '');
                $('#isMobile').val(data.banner.isMobile ?? 0);
                $('#position').val(data.banner.position ?? '');
                $('#type').val(data.banner.type ?? 'main');
                $('#link').val(data.banner.link ?? '');
                if(data.banner.active == 1){
                    $('#active').prop('checked', true);
                }

                if(data.banner.image){
                    // $('#imagePreview').attr('src', 'https://s3-hcm-r1.longvan.net/kaholding/' + data.banner.image.ten);
                    // originalImage = 'https://s3-hcm-r1.longvan.net/kaholding/' + data.banner.image.ten;
                    $('#imagePreview').attr('src', '/uploads/' + data.banner.image.ten);
                    originalImage = '/uploads/' + data.banner.image.ten;
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
@endsection