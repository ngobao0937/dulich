<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login() {
        if(Auth::check()){
            if(Auth::user()->role->id == 2){
                return redirect()->route('backend.product.my.product');
            }else{
                return redirect(route('backend.dashboard.index'));
            }
        }
        return view('backend.login');
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('user_name', $request->input('user_name'))->first();

        if (!$user) {
            return back()->withErrors(['message' => 'Tài khoản không tồn tại.'])->withInput();
        }

        if (Hash::check($request->input('password'), $user->password)) {
            $remember = $request->has('remember') ? true : false;
            Auth::login($user, $remember);
            if(Auth::user()->role->id == 2){
                return redirect()->route('backend.product.my.product');
            }else{
                return redirect(route('backend.dashboard.index'));
            }
            
        } else {
            return back()->withErrors(['message' => 'Sai mật khẩu.'])->withInput();
        }
    }

    public function logout(){
    	Auth::logout();
    	return redirect(route('backend.login'));
    }
}

