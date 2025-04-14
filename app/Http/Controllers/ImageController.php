<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImageController extends Controller
{
    // public function uploadImage(Request $request)
    // {
    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         // Lưu trực tiếp vào thư mục gốc của bucket
    //         $path = Storage::disk('s3')->putFile('/', $file, 'public');
    //         $fileName = basename($path); // Lấy tên file
    //         $url = Storage::disk('s3')->url($path); // URL để preview nếu cần

    //         return response()->json([
    //             'file_name' => $fileName,
    //             'url' => $url,
    //         ]);
    //     }

    //     return response()->json(['error' => 'No file uploaded'], 400);
    // }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
    
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    
            $path = $file->move(public_path('uploads'), $fileName);
    
            return response()->json([
                'file_name' => $fileName,
                'url' => asset('uploads/' . $fileName),
            ]);
        }
    
        return response()->json(['error' => 'No file uploaded'], 400);
    }
    
    public function updateOrder(Request $request)
    {
        $order = $request->input('order');
    
        foreach ($order as $index => $id) {
            Image::where('id', $id)->update(['position' => $index]);
        }
    
        return response()->json(['message' => 'Cập nhật thứ tự thành công!']);
    }
}
