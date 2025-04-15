@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
                    <span></span>
                    <form method="GET" action="{{ route('backend.contact.index') }}" class="form-inline" id="search-form">
                        <div class="input-group input-group-sm mr-2">
                            <select name="active" id="active" class="form-control">
                                <option value="0" {{ $active == '0' ? 'selected' : '' }}>Chưa đọc</option>
                                <option value="1" {{ $active == '1' ? 'selected' : '' }}>Đã đọc</option>
                                <option value="all" {{ $active == 'all' ? 'selected' : '' }}>Tất cả</option>
                            </select>
                        </div>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.contact.index') }}"><i class="fas fa-times"></i></a>
                                @endif 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="table_" class="table table-hover">
                    <thead class="thead-light text-nowrap">
                        <tr class="table-bg">
                            <th style="width: 60px;">#</th>
                            <th>Tiêu đề</th>
                            <th>Họ tên</th>
                            {{-- <th>Công ty</th> --}}
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            {{-- <th>Fax</th> --}}
                            <th>Email</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="text-wrap">
                        @php
                            $i = 1;
                        @endphp
                        @forelse($contacts as $contact)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <b>{{ $contact->title }}</b>
                            </td>
                            <td>{{ $contact->name }}</td>
                            {{-- <td>{{ $contact->company }}</td> --}}
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->phone }}</td>
                            {{-- <td>{{ $contact->fax }}</td> --}}
                            <td>{{ $contact->email }}</td>
                            <td class="text-center">
                                @if ($contact->active != 1)
                                <span class="badge badge-warning">Chưa đọc</span>
                                @else
                                <span class="badge badge-success">Đã đọc</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#contactDetailModal" onclick="alertContact({{ $contact->id }})">
                                <i class="fa fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $contact->id }})">
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
                {{ $contacts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@include('backend.contact.modal')
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

    $('#form-read').hide();

    $('#contactDetailModal').on('hidden.bs.modal', function() {
        $('#contact-name').text('');
        $('#contact-company').text('');
        $('#contact-address').text('');
        $('#contact-phone').text('');
        $('#contact-fax').text('');
        $('#contact-email').text('');
        $('#contact-title').text('');
        $('#contact-content').text('');
        $('#form-read').hide();
    });
    function alertContact(contactId){
        $.ajax({
            type: 'GET',
            url: 'contact/edit' + '?id=' + contactId,
            success: function(data){
                if(data.contact.active == 0){
                    $('#id').val(data.contact.id);
                    $('#form-read').show();
                }
                $('#contact-name').text(data.contact.name);
                $('#contact-company').text(data.contact.company);
                $('#contact-address').text(data.contact.address);
                $('#contact-phone').text(data.contact.phone);
                $('#contact-fax').text(data.contact.fax);
                $('#contact-email').text(data.contact.email);
                $('#contact-title').text(data.contact.title);
                $('#contact-content').text(data.contact.content);

            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
@endsection