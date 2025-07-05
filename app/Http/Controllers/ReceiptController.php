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
use App\Models\Period;
use App\Models\Product;
use App\Models\ReceiptLog;
use Carbon\Carbon;

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

        $periods = Period::where('isdelete', 0)->get();

        return view('backend.receipt.index', compact('receipts', 'periods'));
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$receipt = Receipt::with(['product', 'user'])->find($id);
		return response()->json([
			'receipt' => $receipt
		]);
    }

	public function store(Request $request)
    {
        $rules = [
            'product_fk' => 'required|array|min:1',
            'ngay_thu' => 'required|date',
        ];

        if (!$request->filled('id')) {
            $rules['period_fk'] = 'required|exists:periods,id';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ngay_thu = Carbon::parse($request->ngay_thu);

        if ($request->filled('id')) {
            $receipt = Receipt::find($request->id);

            // Nếu chọn lại period_fk mới khi chỉnh sửa
            if ($request->filled('period_fk')) {
                $period = Period::find($request->period_fk);
                $ngay_het_han = $ngay_thu->copy()->addDays($period->het_han_sau);

                $data = [
                    'product_fk'   => $request->product_fk[0],
                    'user_fk'      => Auth::id(),
                    'ngay_thu'     => $ngay_thu,
                    'ngay_het_han' => $ngay_het_han,
                    'ghi_chu'      => $request->ghi_chu,
                    'period_fk'    => $period->id,
                    'name_period'  => $period->name,
                    'het_han_sau'  => $period->het_han_sau,
                    'so_tien'      => $period->price,
                ];

                Product::where('id', $request->product_fk[0])->update([
                    'start_date' => $ngay_thu,
                    'end_date'   => $ngay_het_han,
                ]);
            } else {
                // Không chọn period mới, dùng lại dữ liệu cũ
                $ngay_het_han = $ngay_thu->copy()->addDays($receipt->het_han_sau);

                $data = [
                    'product_fk'   => $request->product_fk[0],
                    'user_fk'      => Auth::id(),
                    'ngay_thu'     => $ngay_thu,
                    'ngay_het_han' => $ngay_het_han,
                    'ghi_chu'      => $request->ghi_chu,
                    'so_tien'      => $receipt->so_tien,
                    'period_fk'    => $receipt->period_fk,
                    'name_period'  => $receipt->name_period,
                    'het_han_sau'  => $receipt->het_han_sau,
                ];

                Product::where('id', $request->product_fk[0])->update([
                    'start_date' => $ngay_thu,
                    'end_date'   => $ngay_het_han,
                ]);
            }

            Receipt::updateOrCreate(
                ['id' => $request->id],
                $data
            );

            ReceiptLog::create([
                'receipt_fk' => $request->id,
                'user_fk'    => Auth::id(),
                'hanh_dong'  => "Chỉnh sửa phiếu thu cho khách sạn ID {$data['product_fk']}, gói: {$data['name_period']}, số tiền: {$data['so_tien']}₫, ngày thu: {$data['ngay_thu']->format('d/m/Y')}, hạn đến: {$data['ngay_het_han']->format('d/m/Y')}, ghi chú: " . ($data['ghi_chu'] ?? ''),
            ]);
        } else {
            // THÊM MỚI
            $period = Period::find($request->period_fk);
            $ngay_het_han = Carbon::parse($request->ngay_thu)->copy()->addDays($period->het_han_sau);

            $invalidProducts = [];

            // Kiểm tra trước tất cả các product
            foreach ($request->product_fk as $productId) {
                $lastReceipt = Receipt::where('product_fk', $productId)
                                    ->where('isdelete', 0)
                                    ->orderByDesc('id')
                                    ->first();

                if ($lastReceipt && Carbon::parse($lastReceipt->ngay_het_han)->gte(now())) {
                    $product = Product::find($productId);
                    $productName = $product->name ?? "ID $productId";
                    $invalidProducts[] = "Khách sạn \"$productName\" vẫn còn hạn đến " . Carbon::parse($lastReceipt->ngay_het_han)->format('d/m/Y');
                }
            }

            // Nếu có bất kỳ sản phẩm nào không hợp lệ thì báo lỗi
            if (!empty($invalidProducts)) {
                return redirect()->back()
                    ->withErrors(['product_fk' => implode('. ', $invalidProducts)])
                    ->withInput();
            }

            // Nếu tất cả đều hợp lệ => Tiến hành tạo phiếu thu
            foreach ($request->product_fk as $productId) {
                $receipt = Receipt::create([
                    'product_fk'   => $productId,
                    'user_fk'      => Auth::id(),
                    'ngay_thu'     => Carbon::parse($request->ngay_thu),
                    'ngay_het_han' => $ngay_het_han,
                    'ghi_chu'      => $request->ghi_chu,
                    'name_period'  => $period->name,
                    'so_tien'      => $period->price,
                    'period_fk'    => $period->id,
                    'het_han_sau'  => $period->het_han_sau,
                ]);

                Product::where('id', $productId)->update([
                    'start_date' => Carbon::parse($request->ngay_thu),
                    'end_date'   => $ngay_het_han,
                ]);

                ReceiptLog::create([
                    'receipt_fk' => $receipt->id,
                    'user_fk'    => Auth::id(),
                    'hanh_dong'  => "Tạo phiếu thu cho khách sạn ID {$productId}, gói: {$period->name}, số tiền: {$period->price}₫, ngày thu: {$ngay_thu->format('d/m/Y')}, hạn đến: {$ngay_het_han->format('d/m/Y')}, ghi chú: {$request->ghi_chu}",
                ]);

            }
        }

        return redirect(route('backend.receipt.index', $request->query()));
    }




	public function delete(Request $request)
    {
        $id = $request->input('id');
        $receipt = Receipt::find($id);

        if (!$receipt) {
            return redirect()->back()->withErrors(['message' => 'Phiếu thu không tồn tại']);
        }

        $productId = $receipt->product_fk;

        $receipt->isdelete = 1;
        $receipt->save();

        $latestReceipt = Receipt::where('product_fk', $productId)
            ->where('isdelete', 0)
            ->orderByDesc('id')
            ->first();

        if (!$latestReceipt || $latestReceipt->id < $receipt->id) {
            Product::where('id', $productId)->update([
                'start_date' => null,
                'end_date' => null,
            ]);
        }

        ReceiptLog::create([
            'receipt_fk' => $receipt->id,
            'user_fk'    => Auth::id(),
            'hanh_dong'  => 'delete',
        ]);

        return redirect(route('backend.receipt.index', $request->query()));
    }

}
