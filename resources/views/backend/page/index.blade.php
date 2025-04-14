@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table id="table_" class="table table-hover text-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Tiêu đề</th>
                            <th class="text-right" style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @forelse($pages as $page)
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td style="text-align: left; padding-left: 20px;">{{ $page->name }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pageModal" onclick="alertPage({{ $page->id }})">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="4">Không có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div id="pageModal" class="modal fade" role="dialog" aria-labelledby="pageModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('backend.page.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <div class="form-group">
                        <label>Tiêu đề <span style="color: red">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Tiêu đề ..." required>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea id="content" name="content"></textarea>  
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
</script>
<script>
    CKEDITOR.replace('content', options);

    $('#pageModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        CKEDITOR.instances['content'].setData('');
    });
    function alertPage(pageId){
        $.ajax({
            type: 'GET',
            url: '/admin/page/edit' + '?id=' + pageId,
            success: function(data){
                $('#id').val(data.page.id);
                $('#name').val(data.page.name ?? '');
                CKEDITOR.instances['content'].setData(data.page.content ?? '');  
            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>

@endsection