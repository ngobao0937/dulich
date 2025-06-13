@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header d-flex justify-content-between align-items-center flex-nowrap">

                    <a class="btn btn-success btn-sm mr-2 flex-shrink-0" data-toggle="modal" data-target="#promotionModal">
                        Thêm mới
                    </a>

                    <form method="GET" action="{{ route('backend.promotion_public.index') }}" class="form-inline d-flex flex-nowrap align-items-center w-100 justify-content-end" id="search-form">

                        <div class="input-group input-group-sm mr-2" style="width: fit-content;">
                            <select name="menu" class="form-control" style="width: fit-content;">
                                <option value="all" {{ request('menu') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ request('menu') == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search"
                                value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                    <a type="button" class="btn btn-default" href="{{ route('backend.promotion_public.index') }}">
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
                            <th style="width: 90px;">Hình ảnh</th>
                            <th>Tên ưu đãi</th>
                            <th>Khách sạn</th>
                            <th>Mục ưu đãi</th>
                            <th style="width: 100px;">Thứ tự</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($promotions_public->currentPage() - 1) * $promotions_public->perPage() + 1; ?>
                        @forelse($promotions_public as $promotion_public)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <div style="background: #ededed  url('{{$promotion_public->promotion->image ? asset('uploads/' . $promotion_public->promotion->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                            </td>
                            <td class="text-wrap">{{ $promotion_public->promotion->name }}</td>
                            <td class="text-wrap">{{ $promotion_public->promotion->product->name }}</td>
                            <td class="text-wrap">{{ $promotion_public->menu->name ?? ''}}</td>
                            <td class="text-center">
                                {{ $promotion_public->position }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#promotionModal" onclick="alertPromotion({{ $promotion_public->id }})">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $promotion_public->id }})">
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
                {{ $promotions_public->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.promotion.modal')
@endsection
@section('styles')

@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#promotion_fk').select2({
            placeholder: '-- Chọn ưu đãi --',
            allowClear: true,
            ajax: { 
                url: '{{ route("backend.promotion_public.searchPromotions") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term || '', 
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.name + ' - ' + item.product_name
                            };
                        }),
                        pagination: {
                            more: data.hasMore
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 0
        });
    });



    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
        $('#deleteId').val(id);
    }
    $('#promotionModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#promotion_fk').val('');
        $('#menu_fk').val('');
        $('#position').val('');
    });
    function alertPromotion(promotion_publicId){
        $.ajax({
            type: 'GET',
            url: 'promotion_public/edit' + '?id=' + promotion_publicId,
            success: function(data){
                $('#id').val(data.promotion_public.id);
                // $('#promotion_fk').val(data.promotion_public.promotion_fk ?? '');
                $('#promotion_fk').append(new Option(data.promotion_public.promotion.name + ' - ' + data.promotion_public.promotion.product.name, data.promotion_public.promotion_fk, true, true)).trigger('change');
                $('#menu_fk').val(data.promotion_public.menu_fk ?? '');
                $('#position').val(data.promotion_public.position ?? '');
            },
            error: function(error){
                console.log(error);
            }
        })
    }

</script>
@endsection