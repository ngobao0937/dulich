@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
                    <a class="btn btn-success btn-sm" href="{{ route('backend.room.create') }}">
                        Thêm mới
                    </a>
                    <form method="GET" action="{{ route('backend.room.index') }}" class="form-inline" id="search-form">
                        <div class="input-group input-group-sm mr-2">
                            <select name="active" id="active" class="form-control">
                                <option value="all" {{ request('active') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                <option value="1" {{ request('active') == '1' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ request('active') == '0' ? 'selected' : '' }}>Tạm dừng</option>
                            </select>
                        </div>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.room.index') }}"><i class="fas fa-times"></i></a>
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
                            <th>Tên phòng</th>
                            <th>Thuộc khách sạn</th>
                            <th style="width: 150px;">Giá</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($rooms->currentPage() - 1) * $rooms->perPage() + 1; ?>
                        @forelse($rooms as $room)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <div style="background: #ededed  url('{{$room->image ? asset('uploads/' . $room->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                                {{-- <div style="background: #ededed  url('{{$room->image ? 'https://s3-hcm-r1.longvan.net/kaholding/'.$room->image->ten : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div> --}}
                            </td>
                            <td class="text-wrap">{{ $room->name }}</td>
                            <td class="text-wrap">
                                {{ $room->product->name }}
                            </td>
                            <td>{{ $room->price }}</td>
                            <td class="text-center">
                                @if ($room->active != 1)
                                <span class="badge badge-warning">Tạm dừng</span>
                                @else
                                <span class="badge badge-success">Hoạt động</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('backend.room.edit', ['id' => $room->id]) }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $room->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">Không có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="justify-content-center d-flex mt-3">
                {{ $rooms->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.room.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa phòng này?</p>
                    <input type="text" id="deleteId" name="id" hidden />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger delete">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
</script>
@endsection