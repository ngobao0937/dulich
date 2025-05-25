<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SponsorController extends Controller
{
    public function index(Request $request)
    {
        $query = Sponsor::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $sponsors = $query->orderBy('position', 'asc')->paginate(20);

        return view('backend.sponsor.index', compact('sponsors'));
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$sponsor = Sponsor::with('image')->find($id);
		return response()->json([
			'sponsor' => $sponsor
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

		$obj = Sponsor::updateOrCreate(
			['id' => $request->id],
			[
				'name' => $request->name,
				'active' => $request->active ? 1 : 0,
				'position' => $request->position,
			]
		);


		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'sponsor', 'picture', 100);
		}

		return redirect(route('backend.sponsor.index', $request->query()));
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$sponsor = Sponsor::find($id);
		$sponsor->delete();
		$sponsor->image()->delete();
		return redirect(route('backend.sponsor.index', $request->query()));
    }
}
