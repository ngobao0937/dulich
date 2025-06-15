@extends('backend.layouts.app')
@section('content')
<?php
    $id = $event->id ?? null;
    $name = $event->name ?? null;
    $link = $event->link ?? null;
    $address = $event->address ?? null;
    $description = $event->description ?? null;
    $content = $event->content ?? null;
    $position = $event->position ?? null;
    $active = $event->active ?? '';
    $date_start = $event->date_start ?? null;
    $date_end = $event->date_end ?? null;
    $time_start = $event->time_start ?? null;
    $time_end = $event->time_end ?? null;
    $image = isset($event->image) ? $event->image->ten : null;
    $images = $event->images ?? null;

    $formattedDateRange = null;
    if ($date_start && $date_end) {
        $formattedDateRange = \Carbon\Carbon::parse($date_start)->format('d-m-Y') 
            . ' đến ' . \Carbon\Carbon::parse($date_end)->format('d-m-Y');
    }
?>
<section class="content-header">
    <div class="container-fluid">
        <form action="{{ route('backend.event.store', request()->query()) }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row fixed-save">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success rounded-circle btn-lg" title="Lưu" data-toggle="tooltip" data-placement="top" title="Lưu"><i class="fas fa-save"></i></button>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên sự kiện <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $name }}" maxlength="250" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="name">Thứ tự <span class="text-danger">*</span></label>
                                <input type="number" name="position" id="position" min="1" step="1" class="form-control" value="{{ $position }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Link sự kiện <span class="text-danger">*</span></label>
                                <input type="url" name="link" id="link" class="form-control" value="{{ $link }}" required>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $address }}" maxlength="250">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ngày hoạt động</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="dateRange" value="{{ $formattedDateRange }}" autocomplete="off" class="form-control float-right" id="dateRange" placeholder="Chọn khoảng ngày">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Giờ hoạt động</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group date" id="timepicker_start" data-target-input="nearest">
                                            <div class="input-group-prepend" data-target="#timepicker_start" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                            <input type="text" name="time_start" value="{{ $time_start }}" autocomplete="off" class="form-control float-right datetimepicker-input" data-target="#timepicker_start" placeholder="Giờ bắt đầu"> 
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group date" id="timepicker_end" data-target-input="nearest">
                                            <div class="input-group-prepend" data-target="#timepicker_end" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                            <input type="text" name="time_end" value="{{ $time_end }}" autocomplete="off" class="form-control float-right datetimepicker-input" data-target="#timepicker_end" placeholder="Giờ kết thúc"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Mô tả</label>
                        <textarea name="description" id="description" class="form-control" rows="2" style="resize: vertical;">{{ $description }}</textarea>
                    </div>

                    <div class="d-flex flex-wrap">
                        <div class="mr-3">
                            <div class="form-group" style="margin-bottom: -5px;">
                                <label style="margin-bottom: 0;">Hình đại diện</label>
                            </div>
            
                            <div class="image-upload-container mb-2">
                                <img id="imagePreview" src="{{ $image ? asset('uploads/' . $image) : asset('images/upload.png') }}" class="preview-image" />
                                <div class="upload-icon" id="uploadIcon">
                                    <i class="fa fa-camera"></i>
                                </div>
                                <div class="remove-icon" id="removeIcon" style="display: none;">
                                    <i class="fa fa-times"></i>
                                </div>
                                <input type="file" id="picture" name="picture" accept="image/*" hidden />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="icheck-success d-inline">
                            <input type="checkbox" name="active" id="active" {{ $active == 1 ? 'checked' : '' }}/>
                            <label for="active">Hoạt động</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<style>
    .fixed-save {
        position: fixed;
        bottom: 25px;
        right: 20px;
        z-index: 1000;
    }
</style>
@endsection
@section('scripts')
<script src="{{ asset('assets/backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    $('#dateRange').daterangepicker({
        locale: {
            format: 'DD-MM-YYYY',
            separator: ' đến ',
            applyLabel: 'Áp dụng',
            cancelLabel: 'Hủy',
            fromLabel: 'Từ',
            toLabel: 'Đến',
            customRangeLabel: 'Tùy chọn',
            daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
            monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                        'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            firstDay: 1
        },
        autoUpdateInput: false
    });

    $('#dateRange').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' đến ' + picker.endDate.format('DD-MM-YYYY'));
    });

    $('#dateRange').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $('#timepicker_start').datetimepicker({
      format: 'LT'
    })

    $('#timepicker_end').datetimepicker({
      format: 'LT'
    })

    $(document).ready(function() {
        $('#form').on('submit', function(e) {
            const dateRange = $('#dateRange').val().trim();
            const timeStart = $('input[name="time_start"]').val().trim();
            const timeEnd = $('input[name="time_end"]').val().trim();

            // Nếu có dữ liệu thì mới kiểm tra format
            if (dateRange && !dateRange.includes('đến')) {
                toastr.error('Vui lòng chọn khoảng ngày hợp lệ.');
                console.log('Vui lòng chọn khoảng ngày hợp lệ.');
                e.preventDefault();
                return false;
            }

            if (timeStart && !/^\d{1,2}:\d{2}(?:\s?(AM|PM))?$/i.test(timeStart)) {
                toastr.error('Vui lòng chọn giờ bắt đầu hợp lệ.');
                e.preventDefault();
                return false;
            }

            if (timeEnd && !/^\d{1,2}:\d{2}(?:\s?(AM|PM))?$/i.test(timeEnd)) {
                toastr.error('Vui lòng chọn giờ kết thúc hợp lệ.');
                e.preventDefault();
                return false;
            }
        });
    });

</script>
@endsection
