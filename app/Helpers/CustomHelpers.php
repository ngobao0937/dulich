<?php

use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;  
use Aws\S3\Exception\S3Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ImageIntervention;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Image;
use Carbon\Carbon;

function compressImage($file, $quality = 60, $resizeWidth = 1200) {
    $image = ImageIntervention::make($file);

    // Nếu resizeWidth không phải null, thực hiện resize ảnh
    if ($resizeWidth !== null) {
        // Resize theo chiều rộng và giữ tỷ lệ chiều cao
        return $image->resize($resizeWidth, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();  // Đảm bảo không thay đổi kích thước nếu ảnh nhỏ hơn
        })
        ->encode('jpg', $quality);
    }

    // Nếu không resize, chỉ giảm chất lượng ảnh
    return $image->encode('jpg', $quality);
}

// function SaveImage(Request $request, $id, $type, $inputType = 'picture'){
//     $file = $request->file($inputType);

//     $image = compressImage($file);

//     $file_name = Str::uuid() . '_' . time() . '.jpg';

//     Image::updateOrCreate(
//         [
//             'id_fk' => $id,
//             'type' => $type
//         ],
//         [
//             'ten' => $file_name
//         ]
//     );

//     $path = public_path('uploads/' . $file_name);
//     $image->save($path); 
// }

function SaveImage(Request $request, $id, $type, $inputType = 'picture', $quality = 60, $resizeWidth = 1200) {
    $file = $request->file($inputType);

    if (!$file) {
        return; // Không làm gì nếu không có file
    }

    $mimeType = $file->getMimeType();

    // Nếu là hình ảnh
    if (str_starts_with($mimeType, 'image/')) {
        $image = compressImage($file, $quality, $resizeWidth);

        $file_name = Str::uuid() . '_' . time() . '.jpg';

        Image::updateOrCreate(
            [
                'id_fk' => $id,
                'type' => $type
            ],
            [
                'ten' => $file_name
            ]
        );

        $path = public_path('uploads/' . $file_name);
        $image->save($path);

    } 
    // Nếu là video
    elseif (str_starts_with($mimeType, 'video/')) {
        $extension = $file->getClientOriginalExtension(); // lấy đuôi file gốc (mp4, mov, etc.)
        $file_name = Str::uuid() . '_' . time() . '.' . $extension;

        Image::updateOrCreate(
            [
                'id_fk' => $id,
                'type' => $type
            ],
            [
                'ten' => $file_name
            ]
        );

        $path = public_path('uploads/' . $file_name);
        $file->move(public_path('uploads/'), $file_name); 
    }
}

function auto_version($path) {
    $fullPath = public_path($path);
    if (file_exists($fullPath)) {
        return asset($path) . '?v=' . filemtime($fullPath);
    }
    return asset($path);
}