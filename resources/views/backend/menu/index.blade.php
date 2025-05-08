@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#menuModal">
                        Thêm mới
                    </a>
                    <form method="GET" action="{{ route('backend.menu.index') }}" class="form-inline" id="search-form">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.menu.index') }}"><i class="fas fa-times"></i></a>
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
                            <th>Tên danh mục</th>
                            {{-- <th style="width: 100px;">Trang chủ</th> --}}
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @forelse($menus as $menu)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <div style="background: #ededed  url('{{$menu->image ? asset('uploads/' . $menu->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                                    {{-- <div style="background: #ededed  url('{{$menu->image ? 'https://s3-hcm-r1.longvan.net/kaholding/'.$menu->image->ten : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div> --}}
                                </td>
                                <td>{{ $menu->name }}</td>
                                {{-- <td class="text-center">
                                    @if ($menu->public != 1)
                                    <span class="badge badge-warning">Ẩn</span>
                                    @else
                                    <span class="badge badge-success">Hiển thị</span>
                                    @endif
                                </td> --}}
                                <td class="text-center">
                                    @if ($menu->active != 1)
                                    <span class="badge badge-warning">Tạm dừng</span>
                                    @else
                                    <span class="badge badge-success">Hoạt động</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#menuModal" onclick="alertMenu({{ $menu->id }},1)">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $menu->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $menus->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.menu.modal')
@endsection
@section('styles')

@endsection
@section('scripts')
<script>
    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
        $('#deleteId').val(id);
    }


    $('#menuModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        // $('#public').prop('checked', false);
        $('#active').prop('checked', false);
        $('#picture').val('');
        $('#imagePreview').attr('src', defaultImage);
    });

    function alertMenu(menuId) {
        $.ajax({
            type: 'GET',
            url: 'menu/edit' + '?id=' + menuId,
            success: function (data) {
                $('#id').val(data.menu.id);
                $('#name').val(data.menu.name ?? '');
                if(data.menu.active == 1){
                    $('#active').prop('checked', true);
                }
                // if(data.menu.public == 1){
                //     $('#public').prop('checked', true);
                // }
                if(data.menu.image){
                    // $('#imagePreview').attr('src', 'https://s3-hcm-r1.longvan.net/kaholding/' + data.menu.image.ten);
                    // originalImage = 'https://s3-hcm-r1.longvan.net/kaholding/' + data.menu.image.ten;
                    $('#imagePreview').attr('src', '/uploads/' + data.menu.image.ten);
                    originalImage = '/uploads/' + data.menu.image.ten;
                }
            },
            error: function (error) {
                console.log("Lỗi AJAX:", error);
            }
        });
    }

</script>
@endsection