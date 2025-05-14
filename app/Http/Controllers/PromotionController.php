<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Menu;
use App\Models\ProductMenu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\Promotion;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function edit(Request $request) {
		$id = $request->input('id');
		$promotion = Promotion::with('image')->find($id);
		return response()->json([
			'promotion' => $promotion
		]);
    }
	public function store(Request $request) {
		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

		 if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'errors' => $validator->errors()
			], 422);
		}

		$obj = Promotion::updateOrCreate(
			['id' => $request->id],
			[
				'name' => $request->name,
				'active' => $request->active ? 1 : 0,
				'position' => $request->position,
				'link' => $request->link,
				'type' => $request->type,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_in' => $request->end_in,
                'email' => $request->email,
                'product_fk' => $request->product_fk,
				'price' => $request->price,
                'tagline' => $request->tagline,
				'link360' => $request->link360,
			]
		);


		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'promotion', 'picture', 70);
			$obj->load('image');
		}

		if($request->type != 1){
			$html = view('backend.product.promotion_phong_row', ['item' => $obj])->render();
		}else{
			$html = view('backend.product.promotion_row', ['item' => $obj])->render();
		}
		

		return response()->json([
			'success' => true,
			'html' => $html
		]);
 
    }

	public function delete(Request $request)
	{
		$id = $request->input('id');
		$promotion = Promotion::find($id);
		if ($promotion) {
			$promotion->isdelete = 1;
			$promotion->save();
			return response()->json(['success' => true]);
		}

		return response()->json(['success' => false, 'message' => 'Không tìm thấy bản ghi'], 404);
	}


	// public function delete(Request $request) {
	// 	$id = $request->input('id');
	// 	$promotion = Promotion::find($id);
	// 	$promotion->isdelete = 1;
    //     $promotion->save();
    //     return redirect()->delete();
    // }
}
