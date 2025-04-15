<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $image = compressImage($file);
            $fileName = Str::uuid() . '_' . time() . '.jpg';
            $filePath = public_path('uploads/' . $fileName);
            $image->save($filePath);

            $url = asset('uploads/' . $fileName);
            return response()->json([
                'uploaded' => 1,
                'fileName' => $fileName,
                'url' => $url
            ]);
        }
        return response()->json(['uploaded' => 0, 'error' => ['message' => 'File upload failed']]);
    }
}
