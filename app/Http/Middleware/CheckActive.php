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

        if ($product && $product->active != 1) {
            abort(403, 'Khách sạn này không tồn tại.');
        }

        return $next($request);
    }
}
