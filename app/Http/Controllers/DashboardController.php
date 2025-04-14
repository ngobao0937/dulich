<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
    	if (!Auth::check()){
            return redirect(route('backend.login'));
        }
        return view('backend.dashboard.index');

    }
}
