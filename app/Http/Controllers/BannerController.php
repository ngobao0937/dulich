<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $query = Banner::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $banners = $query->where('type', 'main')->orderby('position', 'asc')->paginate(20);

        return view('backend.banner.index', compact('banners'));
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$banner = Banner::with('image')->find($id);
		return response()->json([
			'banner' => $banner
		]);
    }
	public function store(Request $request) {
		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
			'position' => 'required'
        ]);

		if($request->type == 'product'){
			if ($validator->fails()) {
				return response()->json([
					'success' => false,
					'errors' => $validator->errors()
				], 422);
			}
		}else{
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
		}

		$obj = Banner::updateOrCreate(
			['id' => $request->id],
			[
				'name' => $request->name,
				'description' => $request->description,
				'active' => $request->active ? 1 : 0,
				'position' => $request->position,
				'link' => $request->link,
				'product_fk' => $request->product_fk,
				'type' => $request->type
			]
		);


		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'banner', 'picture', 100);
		}

		if($request->type != 'main'){
			$html = view('backend.product.banner_row', ['banner' => $obj])->render();

			return response()->json([
				'success' => true,
				'html' => $html
			]);
		}else{
			return redirect(route('backend.banner.index', $request->query()));
		}

		
 
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$banner = Banner::find($id);
		$banner->delete();
		$banner->image()->delete();
		if($request->type != 'main'){
			return response()->json(['success' => true]);
		}else{
			return redirect(route('backend.banner.index', $request->query()));
		}
        
    }
}
