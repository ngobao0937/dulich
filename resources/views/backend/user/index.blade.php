@extends('backend.layouts.app')
@section('content')
<section class="content-header" >
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px; ">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#userModal">
                        Thêm mới
                    </a>
                    
                    <form method="GET" action="{{ route('backend.user.index') }}" class="form-inline" id="search-form">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                @if(request('search'))
                                <a type="button" class="btn btn-default" href="{{ route('backend.user.index') }}"><i class="fas fa-times"></i></a>
                                @endif 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th style="width: 90px;">Hình ảnh</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Đăng nhập</th>
                            <th>Điện thoại</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th class="text-center" style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;?>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                <div style="background: #ededed  url('{{$user->image ? '/uploads/'.$user->image->ten : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->super_user == 1)
                                <td><span class="badge badge-success">{{ $user->role->name }}</span></td>
                            @else
                                @if ($user->role_fk == 0)
                                    <td><span class="badge badge-danger">Không có</span></td>
                                @else
                                    <td><span class="badge badge-info">{{ $user->role->name }}</span></td>
                                @endif
                            @endif
                        
                            <td class="text-right">
                                @if ($user->super_user != 1)
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#roleModal" onclick="alertRole({{ $user->id }})">
                                        <i class="fa fa-user-cog"></i>
                                    </button>
                                @endif
                                
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#userModal" onclick="alertUser({{ $user->id }})">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $user->id }})">
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
            <div class="d-flex justify-content-center mt-3">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.user.modal')

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

    $('#userModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#user_name').val('');
        $('#password').val('');
        $('#password_confirmation').val('');
        $('#name').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#birthday').val('');
        $('#sex').val('1');
        $('#picture').val('');
        $('#password').prop('required', true);
        $('#imagePreview').attr('src', defaultImage);
    });
    function alertUser(userId){
        $.ajax({
            type: 'GET',
            url: 'user/edit' + '?id=' + userId,
            success: function(data){
                $('#id').val(data.user.id);
                $('#user_name').val(data.user.user_name);
                $('#password').prop('required', false);
                $('#name').val(data.user.name);
                $('#email').val(data.user.email);
                $('#phone').val(data.user.phone);
                $('#birthday').val(data.user.birthday);
                $('#sex').val(data.user.sex);
                if(data.user.image){
                    // $('#imagePreview').attr('src', 'https://s3-hcm-r1.longvan.net/kaholding/' + data.user.image.ten);
                    // originalImage = 'https://s3-hcm-r1.longvan.net/kaholding/' + data.user.image.ten;

                    $('#imagePreview').attr('src', '/uploads/' + data.user.image.ten);
                    originalImage = '/uploads/' + data.user.image.ten;

                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    $('#roleModal').on('hidden.bs.modal', function() {
        $('#user_id').val('');
        $('#role_fk').val('');
    });
    function alertRole(userId){
        $.ajax({
            type: 'GET',
            url: 'user/edit' + '?id=' + userId,
            success: function(data){
                $('#user_id').val(data.user.id);
                $('#role_fk').val(data.user.role_fk);
            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
@endsection