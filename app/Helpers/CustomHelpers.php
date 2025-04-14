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

function compressImage($file) {
    return ImageIntervention::make($file)
        ->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })
        ->encode('jpg', 60); 
}


function SaveImage(Request $request, $id, $type, $inputType = 'picture'){
    $file = $request->file($inputType);

    $image = compressImage($file);

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