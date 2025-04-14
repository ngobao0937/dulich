<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $query = Website::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $websites = $query->orderby('id', 'desc')->paginate(20);

        return view('backend.website.index', compact('websites'));
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$website = Website::find($id);
		return response()->json([
			'website' => $website
		]);
    }
	public function store(Request $request) {
		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		$obj = Website::updateOrCreate(
			['id' => $request->id],
			[
				'name' => $request->name,
				'active' => $request->active ? 1 : 0,
				'link' => $request->link,
			]
		);

		return redirect(route('backend.website.index', $request->query()));
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$website = Website::find($id);
		$website->delete();
       return redirect(route('backend.website.index', $request->query()));
    }
}
