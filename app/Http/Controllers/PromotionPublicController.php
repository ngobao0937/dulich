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
use App\Models\Promotion;
use App\Models\PromotionPublic;
use Carbon\Carbon;

class PromotionPublicController extends Controller
{
    public function index(Request $request)
    {
        $query = PromotionPublic::query()
            ->whereIn('menu_fk', [10000, 10001, 10002])
            ->with(['promotion.product']);

        if ($request->menu && $request->menu !== 'all') {
            $query->where('menu_fk', $request->menu);
        }

        if ($request->search) {
            $query->whereHas('promotion', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhereHas('product', function ($q2) use ($request) {
                    $q2->where('name', 'like', '%' . $request->search . '%');
                });
            });
        }

        $promotions_public = $query->orderByRaw("FIELD(menu_fk, 10000, 10001, 10002)")
            ->orderBy('position', 'asc')
            ->paginate(20)
            ->appends($request->all());

        $promotions = Promotion::where('isdelete', 0)
            ->where('position', 1)
            ->get();

        $menus = Menu::all();

        return view('backend.promotion.index', compact('promotions_public', 'promotions', 'menus'));
    }


    public function edit(Request $request)
    {
        $promotion = PromotionPublic::with(['promotion', 'menu', 'promotion.product'])->find($request->id);
        return response()->json([
            'promotion_public' => $promotion
        ]);
    }

    public function searchPromotions(Request $request)
    {
        $query = $request->get('q');
        $page = $request->get('page', 1);
        $limit = 30;
        $offset = ($page - 1) * $limit;

        $baseQuery = Promotion::with('product')
                ->where('isdelete', 0)
                ->whereHas('product', function ($query) {
                    $query->where('isdelete', 0);
                });


        if (!empty($query)) {
            $baseQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhereHas('product', function ($q2) use ($query) {
                    $q2->where('name', 'like', '%' . $query . '%');
                });
            });
        }

        $total = $baseQuery->count();
        $promotions = $baseQuery->skip($offset)->take($limit)->get();

        return response()->json([
            'data' => $promotions->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'product_name' => $item->product->name ?? ''
                ];
            }),
            'hasMore' => ($offset + $limit) < $total
        ]);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'promotion_fk' => 'required',
            'menu_fk' => 'required',
            'position' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        PromotionPublic::where('menu_fk', $request->menu_fk)
                        ->where('position', $request->position)
                        ->update(['position' => 0]);

        PromotionPublic::updateOrCreate(
            ['id' => $request->id],
            [
                'promotion_fk' => $request->promotion_fk, 
                'menu_fk' => $request->menu_fk,
                'position' => $request->position
            ]
        );

        return redirect()->route('backend.promotion_public.index', $request->query());
    }

    public function delete(Request $request)
    {
        $promotion = PromotionPublic::find($request->id);
        $promotion->delete();
        return redirect()->route('backend.promotion_public.index', $request->query());
    }
}
