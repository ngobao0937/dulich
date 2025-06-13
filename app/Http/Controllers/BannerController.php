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

		if($request->active != 'all' && ($request->active == '0' || $request->active == '1') && $request->has('active')){
            $query->where('active', $request->active);
        }

        $banners = $query
				->whereIn('type', ['main', 'event', 'promotion', 'blog'])
				->orderByRaw("FIELD(type, 'main', 'event', 'promotion', 'blog')")
				->orderBy('isMobile', 'asc')
				->orderBy('position', 'asc')
				->paginate(20);

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
            'name' => $request->has('type') ? 'required' : '',
			'position' => $request->has('type') ? 'required' : ''
        ]);

		if (in_array($request->type, ['product', 'product_images'])) {
			$maxLimits = [
				'product' => 5,
				'product_images' => 10,
			];

			$labels = [
				'product' => 'banner',
				'product_images' => 'ảnh',
			];

			$count = Banner::where('product_fk', $request->product_fk)
						->where('type', $request->type)
						->count();

			if ($count >= $maxLimits[$request->type] && !$request->id) {
				return response()->json([
					'success' => false,
					'errors' => [
						'limit' => ["Chỉ được tạo tối đa {$maxLimits[$request->type]} {$labels[$request->type]}."]
					]
				], 422);
			}

			if ($validator->fails()) {
				return response()->json([
					'success' => false,
					'errors' => $validator->errors()
				], 422);
			}
		} else {
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
		}


		if($request->has('type')){
			$data = [
				'name' => $request->name,
				'description' => $request->description,
				'active' => $request->active ? 1 : 0,
				'position' => $request->position,
				'link' => $request->link,
				'product_fk' => $request->product_fk,
				'isMobile' => $request->isMobile,
				'show_text' => $request->show_text ? 1 : 0,
				'type' => $request->type
			];
		}else{
			$data = [];
		}

		$obj = Banner::updateOrCreate(
			['id' => $request->id],
			$data
		);


		if ($request->hasFile('picture')) {
			SaveImage($request, $obj->id, 'banner', 'picture', 100, 1200, true);
		}

		if(!$request->has('type')){
			return redirect(route('backend.banner.index', $request->query()));
		}

		if (!in_array($request->type, ['main', 'promotion', 'event', 'blog', 'other'])) {
			$html = view('backend.product.banner_row', ['banner' => $obj])->render();

			return response()->json([
				'success' => true,
				'html' => $html
			]);
		}

		return redirect(route('backend.banner.index', $request->query()));
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$banner = Banner::find($id);
		if($banner->type != 'other'){
			$banner->delete();
			$banner->image()->delete();
		}else{
			return redirect()->back();
		}
		
		if($request->type != 'main' && $request->type != 'promotion' && $request->type != 'event' && $request->type != 'blog'){
			return response()->json(['success' => true]);
		}else{
			return redirect(route('backend.banner.index', $request->query()));
		}
        
    }
}
