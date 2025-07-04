@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header d-flex justify-content-between align-items-center flex-nowrap">

                    <a class="btn btn-success btn-sm mr-2 flex-shrink-0" data-toggle="modal" data-target="#receiptModal">
                        Thêm mới
                    </a>

                    <form method="GET" action="{{ route('backend.receipt.index') }}" class="form-inline d-flex flex-nowrap align-items-center w-100 justify-content-end" id="search-form">
{{-- 
                        <div class="input-group input-group-sm mr-2" style="width: fit-content;">
                            <select name="active" id="isactive" class="form-control" style="width: fit-content;">
                                <option value="all" {{ request('active') == 'all' ? 'selected' : '' }}>Tất cả</option>
                                <option value="1" {{ request('active') == '1' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ request('active') == '0' ? 'selected' : '' }}>Tạm dừng</option>
                            </select>
                        </div> --}}

                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search"
                                value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                    <a type="button" class="btn btn-default" href="{{ route('backend.receipt.index') }}">
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
                            <th>Khách sạn</th>
                            <th style="width: 150px;">Số tiền</th>
                            <th style="width: 150px;">Ngày thu</th>
                            <th style="width: 150px;">Ngày hết hạn</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($receipts->currentPage() - 1) * $receipts->perPage() + 1; ?>
                        @forelse($receipts as $receipt)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                {{ $receipt->product->name }}
                            </td>
                            <td>
                                {{ number_format($receipt->so_tien, 0, ',', '.') }} ₫
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($receipt->ngay_thu)->format('d/m/Y') }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($receipt->ngay_het_han)->format('d/m/Y') }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#receiptModal" onclick="alertReceipt({{ $receipt->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $receipt->id }})">
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
                {{ $receipts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@include('backend.receipt.modal')
@endsection
@section('styles')
<style>
  #so_tien {
    text-align: left !important;
  }
</style>
@endsection
@section('scripts')
<script src="{{ asset('assets/backend/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script>
    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
        $('#deleteId').val(id);
    }

    $('#receiptModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#so_tien').val('');
        $('#ngay_thu').val('');
        $('#ngay_het_han').val('');
        $('#ghi_chu').val('');
        $('#product_fk').val(null).trigger('change');
    });
    function alertReceipt(receiptId){
        $.ajax({
            type: 'GET',
            url: 'receipt/edit' + '?id=' + receiptId,
            success: function(data){
                $('#id').val(data.receipt.id);
                $('#so_tien').val(data.receipt.so_tien ?? '');
                $('#ngay_thu').val(data.receipt.ngay_thu ?? '');
                $('#ngay_het_han').val(data.receipt.ngay_het_han ?? '');
                $('#ghi_chu').val(data.receipt.ghi_chu ?? '');
                if (data.receipt.product_fk) {
                    const newOption = new Option(data.receipt.product.name, data.receipt.product_fk, true, true);
                    $('#product_fk').append(newOption).trigger('change');
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }
    $(document).ready(function () {
        $('#so_tien').inputmask();
        $('#product_fk').select2({
            placeholder: "-- Chọn khách sạn --",
            allowClear: false,
            ajax: {
                url: '{{ route("backend.product.get.products") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.results,
                        pagination: {
                            more: data.pagination.more
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 0
        });
    });
</script>
@endsection