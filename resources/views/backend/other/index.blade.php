@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Hình ảnh trang chủ</h5>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="table_" class="table table-hover text-nowrap">
                    <thead class="thead-light">
                        <tr class="table-bg">
                            <th style="width: 60px;">#</th>
                            <th style="width: 90px;">Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($others3 as $index => $other)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div style="background: #ededed  url('{{$other->image ? asset('uploads/' . $other->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                            </td>
                            <td>
                                {{ $other->name }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#otherModal3" onclick="alertOther3({{ $other->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Hỗ trợ du lịch</h5>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="table_" class="table table-hover text-nowrap">
                    <thead class="thead-light">
                        <tr class="table-bg">
                            <th style="width: 60px;">#</th>
                            <th style="width: 90px;">Hình ảnh</th>
                            <th>Văn bản</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($others1 as $index => $other)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div style="background: #ededed  url('{{$other->image ? asset('uploads/' . $other->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
                            </td>
                            <td class="text-wrap">
                                <b>{{ $other->name }}</b><br>
                                {{ $other->description }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#otherModal1" onclick="alertOther({{ $other->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Link</h5>
            </div>
            <div class="card-body table-responsive p-0">
                <table id="table_" class="table table-hover text-nowrap">
                    <thead class="thead-light">
                        <tr class="table-bg">
                            <th style="width: 60px;">#</th>
                            <th>Tiêu đề</th>
                            <th style="width: 100px;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($others2 as $index => $other)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                {{ $other->name }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#otherModal2" onclick="alertOther2({{ $other->id }})">
                                <i class="fa fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
@include('backend.other.modal')
@endsection
@section('styles')

@endsection
@section('scripts')
<script>
    $('#otherModal1').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        $('#descripton').val('');
        $('#link').val('');
        $('#picture').val('');
        $('#imagePreview').attr('src', defaultImage);
    });
    function alertOther(otherId){
        $.ajax({
            type: 'GET',
            url: 'other/edit' + '?id=' + otherId,
            success: function(data){
                $('#id').val(data.other.id);
                $('#name').val(data.other.name ?? '');
                $('#description').val(data.other.description ?? '');
                $('#link').val(data.other.link ?? '');

                if(data.other.image){
                    $('#imagePreview').attr('src', '/uploads/' + data.other.image.ten);
                    originalImage = '/uploads/' + data.other.image.ten;
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }

    $('#otherModal2').on('hidden.bs.modal', function() {
        $('#id_2').val('');
        $('#name_2').val('');
        $('#link_2').val('');
    });
    function alertOther2(otherId){
        $.ajax({
            type: 'GET',
            url: 'other/edit' + '?id=' + otherId,
            success: function(data){
                $('#id_2').val(data.other.id);
                $('#name_2').val(data.other.name ?? '');
                $('#link_2').val(data.other.link ?? '');
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    var Image3 = "";

    $('#uploadIcon_3').on('click', function() {
        $('#picture_3').click();
    });

    $('#imagePreview_3').on('click', function() {
        $('#picture_3').click();
    });

    $('#picture_3').on('change', function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview_3').attr('src', e.target.result);
                $('#removeIcon_3').show();
            };
            reader.readAsDataURL(file);
        }
    });

    $('#removeIcon_3').on('click', function() {
        $('#picture_3').val('');
        if (Image3) {
            $('#imagePreview_3').attr('src', Image3);
        } else {
            $('#imagePreview_3').attr('src', defaultImage);
        }
        $('#removeIcon_3').hide(); 
    });


    $('#otherModal3').on('hidden.bs.modal', function() {
        $('#id_3').val('');
        $('#name_3').val('');
        $('#picture_3').val('');
        $('#imagePreview_3').attr('src', defaultImage);
        $('#removeIcon_3').hide();
    });
    function alertOther3(otherId){
        $.ajax({
            type: 'GET',
            url: 'other/edit' + '?id=' + otherId,
            success: function(data){
                $('#id_3').val(data.other.id);
                $('#name_3').val(data.other.name ?? '');

                if(data.other.image){
                    $('#imagePreview_3').attr('src', '/uploads/' + data.other.image.ten);
                    Image3 = '/uploads/' + data.other.image.ten;
                }

            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
@endsection