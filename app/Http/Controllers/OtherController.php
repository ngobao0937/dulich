<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Other;

class OtherController extends Controller
{
    public function index(Request $request)
    {
        $others1 = Other::where('type', 1)->get();

		$others2 = Other::where('type', 2)->get();

		$others3 = Other::where('type', 3)->get();

        return view('backend.other.index', compact('others1', 'others2', 'others3'));
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$other = Other::with('image')->find($id);
		return response()->json([
			'other' => $other
		]);
    }
	public function store(Request $request) {
		$other = Other::find($request->id);
		$data = ['link' => $request->link];
		if($other->type == 1){
			$data['name'] = $request->name;
			$data['description'] = $request->description;
		}
		$obj = Other::updateOrCreate(
			['id' => $request->id],
			$data
		);

		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'other', 'picture', 100, 1200, true);
		}

		return redirect(route('backend.other.index', $request->query()));
 
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$other = Other::find($id);
		$other->delete();
       return redirect(route('backend.other.index', $request->query()));
    }
}
