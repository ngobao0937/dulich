@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header d-flex justify-content-between align-items-center flex-nowrap">

                    <a class="btn btn-success btn-sm mr-2 flex-shrink-0" data-toggle="modal" data-target="#periodModal">
                        Thêm mới
                    </a>

                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="table_" class="table table-hover text-nowrap">
                    <thead class="thead-light">
                        <tr class="table-bg">
                            <th style="width: 60px;">#</th>
                            <th>Tên gói</th>
                            <th>Hết hạn sau</th>
                            <th>Giá</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($periods->currentPage() - 1) * $periods->perPage() + 1; ?>
                        @forelse($periods as $period)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                {{ $period->name }}
                            </td>
                            <td>
                                {{ $period->het_han_sau }} ngày
                            </td>
                            <td>{{ number_format($period->price, 0, ',', '.') }} ₫</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#periodModal" onclick="alertPeriod({{ $period->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $period->id }})">
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
                {{ $periods->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@include('backend.period.modal')
@endsection
@section('styles')
<style>
  #price {
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

    $('#periodModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        $('#price').val('');
        $('#het_han_sau').val('');
    });
    function alertPeriod(periodId){
        $.ajax({
            type: 'GET',
            url: 'period/edit' + '?id=' + periodId,
            success: function(data){
                $('#id').val(data.period.id);
                $('#name').val(data.period.name ?? '');
                $('#price').val(data.period.price ?? '');
                $('#het_han_sau').val(data.period.het_han_sau ?? '');
            },
            error: function(error){
                console.log(error);
            }
        })
    }
    $(document).ready(function () {
        $('#price').inputmask();
    });
</script>
@endsection