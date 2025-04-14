@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#websiteModal">
                        Thêm mới
                    </a>
                    <form method="GET" action="{{ route('backend.website.index') }}" class="form-inline" id="search-form">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.website.index') }}"><i class="fas fa-times"></i></a>
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
                            <th>Tên Website</th>
                            <th>Link</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse($websites as $website)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                {{ $website->name }}
                            </td>
                            <td>{{ $website->link }}</td>
                            <td class="text-center">
                                @if ($website->active != 1)
                                <span class="badge badge-warning">Tạm dừng</span>
                                @else
                                <span class="badge badge-success">Hoạt động</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#websiteModal" onclick="alertWebsite({{ $website->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $website->id }})">
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
                {{ $websites->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@include('backend.website.modal')
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

    $('#websiteModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        $('#link').val('');
        $('#active').prop('checked', false);
    });
    function alertWebsite(websiteId){
        $.ajax({
            type: 'GET',
            url: 'website/edit' + '?id=' + websiteId,
            success: function(data){
                $('#id').val(data.website.id);
                $('#name').val(data.website.name ?? '');
                $('#link').val(data.website.link ?? '');
                if(data.website.active == 1){
                    $('#active').prop('checked', true);
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
@endsection