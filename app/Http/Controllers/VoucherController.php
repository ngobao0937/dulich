<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use Carbon\Carbon;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $query = Voucher::query();

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

        $vouchers = $query->where('isdelete', 0)->orderby('id', 'asc')->paginate(20);


        return view('backend.voucher.index', compact('vouchers'));
    }
	public function create(Request $request) {
        $products = Product::where('isdelete', 0)->get();
		return view('backend.voucher.model', ['products' => $products]);
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$voucher = Voucher::find($id);
        $products = Product::where('isdelete', 0)->get();
		return view('backend.voucher.model', [
			'voucher' => $voucher,
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
            'stt' => $request->input('stt'),
            'content' => $request->input('content'),
            'price' => $request->input('price'),
            'chiet_khau' => $request->input('chiet_khau'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
			'active' => $request->active ? 1 : 0,
			'product_fk' => $request->product_fk
		];

		$obj = Voucher::updateOrCreate(
			['id' => $id],
			$data
		);

		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'voucher');
		}
        
		return redirect(route('backend.voucher.index', $request->query()));
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$voucher = Voucher::find($id);
		$voucher->isdelete = 1;
        $voucher->save();
       return redirect(route('backend.voucher.index', $request->query()));
    }
}
