@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header d-flex justify-content-between align-items-center flex-nowrap">
                    @if (Auth::user()->isSuperUser())
                        <a class="btn btn-success btn-sm mr-2 flex-shrink-0" href="{{ route('backend.product.create') }}">
                            Thêm mới
                        </a>
                    @else
                        <span></span>
                    @endif

                    <form method="GET" action="{{ route('backend.product.index') }}" class="form-inline d-flex flex-nowrap align-items-center w-100 justify-content-end" id="search-form">

                        <div class="input-group input-group-sm mr-2" style="width: fit-content;">
                            <select name="active" id="isactive" class="form-control" style="width: fit-content;">
                                <option value="all" {{ request('active') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                <option value="1" {{ request('active') == '1' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ request('active') == '0' ? 'selected' : '' }}>Tạm dừng</option>
                            </select>
                        </div>

                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search"
                                value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                    <a type="button" class="btn btn-default" href="{{ route('backend.product.index') }}">
                                        <i class="fas fa-times"></i>
                                    </a>
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
                            @if (Auth::user()->isSuperUser())<th style="width: 50px"></th>@endif
                            <th style="width: 90px;">Hình ảnh</th>
                            <th>Tên khách sạn</th>
                            <th style="width: 120px;">Từ ngày</th>
                            <th style="width: 120px;">Đến ngày</th>
                            <th style="width: 250px;">Danh mục</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($products->currentPage() - 1) * $products->perPage() + 1; ?>
                        @forelse($products as $product)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            @if (Auth::user()->isSuperUser())
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $product->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            @endif
                            <td>
                                <div style="background: #ededed  url('{{$product->image ? asset('uploads/' . $product->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                                {{-- <div style="background: #ededed  url('{{$product->image ? 'https://s3-hcm-r1.longvan.net/kaholding/'.$product->image->ten : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div> --}}
                            </td>
                            <td class="text-wrap">{{ $product->name }}</td>
                            <td>{{ $product->start_date ? \Carbon\Carbon::parse($product->start_date)->format('d-m-Y') : '' }}</td>
                            <td>{{ $product->end_date ? \Carbon\Carbon::parse($product->end_date)->format('d-m-Y') : '' }}</td>
                            <td>
                                @foreach ($product->menus as $key => $menu)
                                    {{ $menu->name }}{{ $key < $product->menus->count() - 1 ? ', ' : '' }}
                                @endforeach
                            </td>
                            <td class="text-center">
                                @if ($product->active != 1)
                                <span class="badge badge-warning">Tạm dừng</span>
                                @else
                                <span class="badge badge-success">Hoạt động</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('backend.product.edit', ['id' => $product->id] + request()->query()) }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                
                                
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
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@if (Auth::user()->isSuperUser())
<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.product.delete', request()->query()) }}" method="post">
                @csrf @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thật sự muốn xóa khách sạn này?</p>
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
@endif
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