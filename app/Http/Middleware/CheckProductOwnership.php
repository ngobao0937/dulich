<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CheckProductOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user->isSuperUser()) {
            return $next($request);
        }

        $productId = $request->route('id') ?? $request->input('id');

        if($user->role->id == 2 && $user->product->id == $productId){
            return $next($request);
        }

        if (!$productId) {
            abort(403, 'Bạn không có quyền truy cập khách sạn này.');
        }

        $isOwner = $user->products()->where('products.id', $productId)->exists();

        if (!$isOwner) {
            abort(403, 'Bạn không có quyền truy cập khách sạn này.');
        }

        return $next($request);
    }
}

