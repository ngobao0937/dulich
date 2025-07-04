<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Period;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PeriodController extends Controller
{
    public function index() {
        $periods = Period::where('isdelete', 0)->orderby('id', 'desc')->paginate(20);

        return view('backend.period.index', ['periods' => $periods]);
    }

    public function edit(Request $request) {
        $period = Period::find($request->id);

        return response()->json([
            'period' => $period, 
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $price_raw = $request->price;
        $price_clean = (int) str_replace(['.', '₫', ',',' '], '', $price_raw);

        $period = Period::updateOrCreate(
            ['id' => $request->input('id')],
            [
                'name' => $request->name,
                'price' => $price_clean,
                'user_fk' => Auth::id(),
                'het_han_sau' => $request->het_han_sau,
            ]
        );

        return redirect(route('backend.period.index'));
    }

    public function delete(Request $request){
        $period = Period::find($request->id);
        $period->isdelete = 1;
        $period->save();
        return redirect(route('backend.period.index'));
    }

}
