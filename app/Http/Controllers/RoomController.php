<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Product;
use App\Models\RoomExtension;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Banner;
use App\Models\Extension;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        if($request->active != 'all' && ($request->active == '0' || $request->active == '1') && $request->has('active')){
            $query->where('active', $request->active);
        }

        $rooms = $query->where('isdelete', 0)->orderby('id', 'desc')->paginate(20);

        return view('backend.room.index', compact('rooms'));
    }
	public function create(Request $request) {
        $products = Product::where('isdelete', 0)->get();
		return view('backend.room.model', ['products' => $products]);
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$room = Room::with(['image'])->find($id);
        $products = Product::where('isdelete', 0)->get();
		return view('backend.room.model', [
			'room' => $room,
            'products' => $products,
		]);
    }
	public function store(Request $request) {
		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$id = $request->input('id', null);  

		$data = [
			'name' => $request->input('name'),
			'slug' => Str::slug($request->input('name')),
            'price' => $request->input('price'),
            'content' => $request->input('content'),
			'active' => $request->active ? 1 : 0,
			'product_fk' => $request->product_fk,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description
		];

		$obj = Room::updateOrCreate(
			['id' => $id],
			$data
		);

        RoomExtension::where('room_fk', $obj->id)->delete();

        $extensions_fk = $request->input('extensions_fk', []); 

        foreach ($extensions_fk as $extensionId) {
            RoomExtension::create([
                'room_fk' => $obj->id,
                'extension_fk' => $extensionId
            ]);
        }

		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'room_hinh_dai_dien');
		}

        if($request->hasfile('picture360')){
			SaveImage($request, $obj->id, 'room_vr360', 'picture360', 100, null);
		}

        if ($request->filled('uploaded_pictures')) {
            $pictures = json_decode($request->input('uploaded_pictures'), true);
            foreach ($pictures as $fileName) {
                Image::updateOrCreate(
                    ['id' => null],
                    [
                        'ten' => $fileName,
                        'id_fk' => $obj->id,
                        'type' => 'room_hinh_khac'
                    ]
                );
            }
        }
        
		return redirect(route('backend.room.index', $request->query()));
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$room = Room::find($id);
		$room->isdelete = 1;
        $room->save();
       return redirect(route('backend.room.index', $request->query()));
    }

    public function deleteImg(Request $request)
    {
        $img = Image::find($request->input('id'));
        
        if (!empty($img)) {
            $img->isdelete = 1;
            $img->save();
            return response()->json(['success' => true, 'imageId' => $img->id]);
        }else{
            return response()->json(['success' => false, 'message' => 'Hình ảnh không tồn tại.'], 404);
        }
    }
}