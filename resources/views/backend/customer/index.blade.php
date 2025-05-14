@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
                    <a>
                    </a>
                    <form method="GET" action="{{ route('backend.customer.index') }}" class="form-inline" id="search-form">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.customer.index') }}"><i class="fas fa-times"></i></a>
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
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th style="width: 150px;">Ngày đăng ký</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse($customers as $customer)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                {{ $customer->name }}
                            </td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#customerModal" onclick="alertCustomer({{ $customer->id }})">
                                <i class="fa fa-edit"></i>
                                </button> --}}
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $customer->id }})">
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
                {{ $customers->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@include('backend.customer.modal')
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

    // $('#customerModal').on('hidden.bs.modal', function() {
    //     $('#id').val('');
    //     $('#name').val('');
    //     $('#position').val('');
    //     $('#link').val('');
    //     $('#active').prop('checked', false);
    //     $('#picture').val('');
    //     $('#imagePreview').attr('src', defaultImage);
    // });
    // function alertCustomer(customerId){
    //     $.ajax({
    //         type: 'GET',
    //         url: 'customer/edit' + '?id=' + customerId,
    //         success: function(data){
    //             $('#id').val(data.customer.id);
    //             $('#name').val(data.customer.name ?? '');
    //             $('#position').val(data.customer.position ?? '');
    //             $('#link').val(data.customer.link ?? '');
    //             if(data.customer.active == 1){
    //                 $('#active').prop('checked', true);
    //             }

    //             if(data.customer.image){
    //                 // $('#imagePreview').attr('src', 'https://s3-hcm-r1.longvan.net/kaholding/' + data.customer.image.ten);
    //                 // originalImage = 'https://s3-hcm-r1.longvan.net/kaholding/' + data.customer.image.ten;
    //                 $('#imagePreview').attr('src', '/uploads/' + data.customer.image.ten);
    //                 originalImage = '/uploads/' + data.customer.image.ten;
    //             }

    //         },
    //         error: function(error){
    //             console.log(error);
    //         }
    //     })
    // }
</script>
@endsection