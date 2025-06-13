@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header">
                    <form method="GET" action="{{ route('backend.comment.index') }}" class="form-inline" id="search-form" style="display: flex; justify-content: end; flex-wrap: nowrap; gap: 10px;">
                        <div id="div-select2" class="input-group input-group-sm" style="width: 300px;">
                            <select name="product_fk" id="product_fk" class="form-control select2">
                            </select>
                        </div>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search') || request('product_fk'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.comment.index') }}"><i class="fas fa-times"></i></a>
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
                            <th style="width: 200px;">Thông tin</th>
                            <th>Nội dung</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse($comments as $comment)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <b>Họ tên:</b> {{ $comment->name }} <br>
                                <b>Đánh giá:</b> {{ $comment->rating }} sao<br>
                                <b>Khách sạn:</b> {{ $comment->product ? $comment->product->name : '' }}
                            </td>
                            <td>{{ $comment->content }}</td>
                            <td class="text-center">
                                @if ($comment->active != 1)
                                <span class="badge badge-warning">Chưa duyệt</span>
                                @else
                                <span class="badge badge-success">Đã duyệt</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#commentModal" onclick="alertComment({{ $comment->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $comment->id }})">
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
                {{ $comments->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@include('backend.comment.modal')
@endsection
@section('styles')
<style>
    .select2{
        width: 100% !important;
    }
    .select2-container .select2-selection--single{
        height: 30px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 0 !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        margin-top: -9px !important;
    }
    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da
    }
    @media screen and (max-width: 767.20px) {
        #div-select2{
            width: auto !important;
        }
    }
</style>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        const $select = $('#product_fk');

        $select.select2({
            placeholder: "Tìm khách sạn...",
            ajax: {
                url: "{{ route('backend.comment.get_products') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term || '',
                        page: params.page || 1,
                        limit: 30
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.results.map(product => ({
                            id: product.id,
                            text: product.name
                        })),
                        pagination: {
                            more: (params.page * 30) < data.total
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 0,
            templateResult: function (data) {
                if (!data.id) return data.text;
                return $('<span>' + data.text + '</span>');
            }
        });

        var product = @json($product);
        if(product != null){
            var productText = product.name;
            $('#product_fk').empty();
            let productOption = new Option(productText, product.id, true, true);
            $('#product_fk').append(productOption).trigger('change');
        }
    });

    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
        $('#deleteId').val(id);
    }

    $('#commentModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        $('#rating').val('');
        $('#product_fk_modal').val('');
        $('#content').val('');
        $('#active').prop('checked', false);
    });
    function alertComment(commentId){
        $.ajax({
            type: 'GET',
            url: 'comment/edit' + '?id=' + commentId,
            success: function(data){
                $('#id').val(data.comment.id);
                $('#name').val(data.comment.name ?? '');
                $('#rating').val(data.comment.rating ?? '');
                $('#product_fk_modal').val(data.comment.product_fk ?? '');
                $('#content').val(data.comment.content ?? '');
                if(data.comment.active == 1){
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