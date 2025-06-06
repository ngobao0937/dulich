<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissionId)
    {
        $user = Auth::user();

        if ($user->isSuperuser()) {
            return $next($request);
        }

        $role = $user->role;

        if (!$role) {
            abort(403, 'Bạn không có quyền truy cập chức năng này.');
        }

        $permissionIds = $role->permissions->pluck('id')->toArray();

        if (!in_array((int)$permissionId, $permissionIds)) {
            abort(403, 'Bạn không có quyền truy cập chức năng này.');
        }

        return $next($request);
    }
}
