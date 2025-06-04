@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header" style="display: flex; justify-content: start; flex-wrap: nowrap; gap: 10px;">
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#roleModal">
                        Thêm mới
                    </a>

                    <a class="btn btn-primary btn-sm" href="javascript:void(0)" id="savePermissions">
                        Lưu phân quyền
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="table_" class="table table-bordered text-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" style="width: 220px;">Quyền \ Vai trò</th>
                            @foreach ($roles as $role)
                                <th class="text-center">{{ $role->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td style="width: 220px;">{{ $permission->name }}</td>
                                @foreach ($roles as $role)
                                    <td class="text-center">
                                        <div class="icheck-primary d-inline">
                                            <input type="checkbox" 
                                                id="role-{{ $role->id }}-permission-{{ $permission->id }}"  
                                                {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}  
                                                data-role-id="{{ $role->id }}" 
                                                data-permission-id="{{ $permission->id }}"
                                                {{ $role->id == 1 ? 'disabled' : '' }}>
                                            <label for="role-{{ $role->id }}-permission-{{ $permission->id }}"></label>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        <tr>
                            <td style="width: 220px;"><strong>Hành động</strong></td>
                            @foreach ($roles as $role)
                                <td class="text-center">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#roleModal" onclick="alertRole({{ $role->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $role->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.role.delete', request()->query()) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận xóa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn có muốn xóa vai trò này?</p>
                    <input type="text" id="deleteId" name="id" hidden>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger delete">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="roleModal" class="modal fade" role="dialog" aria-labelledby="roleModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('backend.role.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <div class="form-group">
                        <label>Tên vai trò <span class="text-danger">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Tên vai trò ..." required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu thông tin</button>
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

    $('#roleModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
    });

    function alertRole(roleId) {
        $.ajax({
            type: 'GET',
            url: 'role/edit' + '?id=' + roleId,
            success: function (data) {
                $('#id').val(data.role.id);
                $('#name').val(data.role.name ?? '');
            },
            error: function (error) {
                console.log("Lỗi AJAX:", error);
            }
        });
    }

    document.getElementById('savePermissions').addEventListener('click', function (e) {
        e.preventDefault();

        const permissionsData = [];

        document.querySelectorAll('input[type="checkbox"][data-role-id]').forEach(function (checkbox) {
            permissionsData.push({
                role_id: checkbox.dataset.roleId,
                permission_id: checkbox.dataset.permissionId,
                checked: checkbox.checked
            });
        });

        fetch('/admin/role/update-permissions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ data: permissionsData })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                toastr.success('Cập nhật phân quyền thành công!');
            } else {
                toastr.error('Lỗi: ' + data.message);
            }
        })
        .catch(error => {
            toastr.error('Lỗi kết nối đến máy chủ');
            console.error(error);
        });
    });

</script>

@endsection