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

        $banners = $query->orderby('position', 'asc')->paginate(20);

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

		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$obj = Banner::updateOrCreate(
			['id' => $request->id],
			[
				'name' => $request->name,
				'active' => $request->active ? 1 : 0,
				'position' => $request->position,
				'link' => $request->link,
				// 'type' => $request->type
			]
		);


		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'banner', 'picture', 100);
		}

		return redirect(route('backend.banner.index', $request->query()));
 
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$banner = Banner::find($id);
		$banner->delete();
		$banner->image()->delete();
        return redirect(route('backend.banner.index', $request->query()));
    }
}
