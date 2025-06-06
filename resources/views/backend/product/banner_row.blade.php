<tr data-id="{{ $banner->id }}">
    <td>#</td>
    <td>
        <div style="background: #ededed  url('{{$banner->image ? asset('uploads/' . $banner->image->ten) : asset('images/default.jpg') }}') no-repeat center center ; background-size: contain; width: 100%;height: 30px;"></div>
    </td>
    
    <td class="text-wrap">
        <b>{{ $banner->name }}</b> <br>
        {{ $banner->description }}
    </td>
    {{-- <td>{{ $banner->link ? $banner->link : '#' }}</td> --}}
    <td>{{ $banner->position }}</td>
    <td class="text-center">
        @if ($banner->active != 1)
        <span class="badge badge-warning">Tạm dừng</span>
        @else
        <span class="badge badge-success">Hoạt động</span>
        @endif
    </td>
    <td class="text-center">
        @if ($banner->type == 'product')
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bannerModal" onclick="alertBanner({{ $banner->id }})">
                <i class="fa fa-edit"></i>
            </button>
            <button type="button" class="btn btn-danger btn-sm" onclick="alertDeleteBanner({{ $banner->id }})">
                <i class="fa fa-trash"></i>
            </button>
        @else
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#imagesModal" onclick="alertImages({{ $banner->id }})">
                <i class="fa fa-edit"></i>
            </button>
            <button type="button" class="btn btn-danger btn-sm" onclick="alertDeleteImages({{ $banner->id }})">
                <i class="fa fa-trash"></i>
            </button>
        @endif
        
    </td>
</tr>