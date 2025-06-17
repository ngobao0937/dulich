<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $productId = $request->id;

        $product = \App\Models\Product::find($productId);

        $today = now()->toDateString();

        if (!$product || 
            $product->active != 1 || 
            $product->isdelete == 1 || 
            ($product->start_date && $product->start_date > $today) || 
            ($product->end_date && $product->end_date < $today)
        ) {
            abort(403, 'Khách sạn này không tồn tại.');
        }

        return $next($request);
    }
}
