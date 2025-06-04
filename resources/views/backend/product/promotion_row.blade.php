<tr data-id="{{ $item->id }}">
    <td>#</td>
    <td>
        <div style="background: #ededed  url('{{ $item->image ? asset('uploads/' . $item->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
    </td>
    <td class="text-wrap">{{ $item->name }}</td>
    <td class="text-center">{{ $item->position }}</td>
    <td class="text-center">{{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}</td>
    <td class="text-center">{{ $item->end_in }} ngày</td>
    <td class="text-center">
        @if ($item->active != 1)
            <span class="badge badge-warning">Tạm dừng</span>
        @else
            <span class="badge badge-success">Hoạt động</span>
        @endif
    </td>
    <td class="text-center">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#uuDaiThuongModal" onclick="alertUuDaiThuong({{ $item->id }})">
            <i class="fa fa-edit"></i>
        </button>
        <button type="button" class="btn btn-danger btn-sm" onclick="alertDeleteUuDai({{ $item->id }})">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
