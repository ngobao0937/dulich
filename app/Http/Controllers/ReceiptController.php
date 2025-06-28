<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\Banner;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReceiptController extends Controller
{
    public function index(Request $request)
    {
        $query = Receipt::with('product')
                        ->where('isdelete', 0);

        if ($request->has('search') && $request->search) {
            $search = $request->search;

            $query->whereHas('product', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $receipts = $query->orderBy('id', 'desc')->paginate(20);

        return view('backend.receipt.index', compact('receipts'));
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$receipt = Receipt::with(['product', 'user'])->find($id);
		return response()->json([
			'receipt' => $receipt
		]);
    }

	public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'product_fk' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $so_tien_raw = $request->so_tien;
        $so_tien_clean = (int) str_replace(['.', '₫', ',',' '], '', $so_tien_raw);

        $obj = Receipt::updateOrCreate(
            ['id' => $request->id],
            [
                'product_fk' => $request->product_fk,
                'user_fk' => Auth::id(),
                'so_tien' => $so_tien_clean,
                'ngay_thu' => $request->ngay_thu,
                'ngay_het_han' => $request->ngay_het_han,
                'ghi_chu' => $request->ghi_chu
            ]
        );

        return redirect(route('backend.receipt.index', $request->query()));
    }


	public function delete(Request $request) {
		$id = $request->input('id');
		$receipt = Receipt::find($id);
		$receipt->isdelete = 1;
        $receipt->save();
       return redirect(route('backend.receipt.index', $request->query()));
    }
}
