@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="div-header d-flex justify-content-between align-items-center flex-nowrap">

                    <a class="btn btn-success btn-sm mr-2 flex-shrink-0" data-toggle="modal" data-target="#blogModal">
                        Thêm mới
                    </a>

                    <form method="GET" action="{{ route('backend.blog.index') }}" class="form-inline d-flex flex-nowrap align-items-center w-100 justify-content-end" id="search-form">

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
                                    <a type="button" class="btn btn-default" href="{{ route('backend.blog.index') }}">
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
                            <th>Tiêu đề</th>
                            <th style="width: 100px;">Trạng thái</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = ($blogs->currentPage() - 1) * $blogs->perPage() + 1; ?>
                        @forelse($blogs as $blog)
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <div style="background: #ededed  url('{{$blog->image ? asset('uploads/' . $blog->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                            </td>
                            <td>
                                {{ $blog->name }}
                            </td>
                            <td class="text-center">
                                @if ($blog->active != 1)
                                <span class="badge badge-warning">Tạm dừng</span>
                                @else
                                <span class="badge badge-success">Hoạt động</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#blogModal" onclick="alertBlog({{ $blog->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $blog->id }})">
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
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

</section>
@include('backend.blog.modal')
@endsection
@section('styles')

@endsection
@section('scripts')
<script>
   CKEDITOR.replace('content', options);

    function clearSearch() {
        document.getElementById('search').value = '';
        window.location.href = "{{ route('backend.blog.index') }}";
    }
    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
        $('#deleteId').val(id);
    }

    $('#blogModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        $('#descripton').val('');
        
        $('#active').prop('checked', false);
        CKEDITOR.instances['content'].setData('') 
        $('#picture').val('');
        $('#imagePreview').attr('src', defaultImage);
    });
    function alertBlog(blogId){
        $.ajax({
            type: 'GET',
            url: 'blog/edit' + '?id=' + blogId,
            success: function(data){
                $('#id').val(data.blog.id);
                $('#name').val(data.blog.name ?? '');
                $('#description').val(data.blog.description ?? '');
                
                if(data.blog.active == 1){
                    $('#active').prop('checked', true);
                }

                if(data.blog.image){
                    
                    $('#imagePreview').attr('src', '/uploads/' + data.blog.image.ten);
                    originalImage = '/uploads/' + data.blog.image.ten;
                }
                CKEDITOR.instances['content'].setData(data.blog.content ?? '') 

            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
@endsection