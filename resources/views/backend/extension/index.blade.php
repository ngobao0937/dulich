@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#extensionModal">
                        Thêm mới
                    </a>
                    <form method="GET" action="{{ route('backend.extension.index') }}" class="form-inline" id="search-form">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.extension.index') }}"><i class="fas fa-times"></i></a>
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
                            <th>Tên tiện ích</th>
                            <th>Thuộc danh mục</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @forelse($extensions as $extension)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $extension->name }}</td>
                                <td>{{ $extension->menu->name }}</td>
                                <td class="text-center">
                                    @if ($extension->active != 1)
                                    <span class="badge badge-warning">Tạm dừng</span>
                                    @else
                                    <span class="badge badge-success">Hoạt động</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#extensionModal" onclick="alertExtension({{ $extension->id }},1)">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $extension->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $extensions->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.extension.modal')
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

    $('#extensionModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        $('#menu_fk').val('');
        $('#active').prop('checked', false);
    });

    function alertExtension(extensionId) {
        $.ajax({
            type: 'GET',
            url: 'extension/edit' + '?id=' + extensionId,
            success: function (data) {
                $('#id').val(data.extension.id);
                $('#name').val(data.extension.name ?? '');
                $('#menu_fk').val(data.extension.menu_fk ?? '');
                if(data.extension.active == 1){
                    $('#active').prop('checked', true);
                }
            },
            error: function (error) {
                console.log("Lỗi AJAX:", error);
            }
        });
    }

</script>
@endsection