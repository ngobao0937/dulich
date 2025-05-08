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
use App\Models\Banner;
use App\Models\Extension;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        if($request->active != 'all' && ($request->active == '0' || $request->active == '1') && $request->has('active')){
            $query->where('active', $request->active);
        }

        $events = $query->where('isdelete', 0)->orderby('id', 'desc')->paginate(20);

        return view('backend.event.index', compact('events'));
    }
	public function create(Request $request) {
		return view('backend.event.model');
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$event = Event::with(['image'])->find($id);
		return view('backend.event.model', [
			'event' => $event,
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
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
			'active' => $request->active ? 1 : 0,
		];

		$obj = Event::updateOrCreate(
			['id' => $id],
			$data
		);

		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'event_hinh_dai_dien');
		}

        if ($request->filled('uploaded_pictures')) {
            $pictures = json_decode($request->input('uploaded_pictures'), true);
            foreach ($pictures as $fileName) {
                Image::updateOrCreate(
                    ['id' => null],
                    [
                        'ten' => $fileName,
                        'id_fk' => $obj->id,
                        'type' => 'event_hinh_khac'
                    ]
                );
            }
        }
        
		return redirect(route('backend.event.index', $request->query()));
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$product = Event::find($id);
		$event->isdelete = 1;
        $event->save();
       return redirect(route('backend.event.index', $request->query()));
    }
}
