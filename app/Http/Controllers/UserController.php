<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index(Request $request) {
        $query = User::query();

        // $query->where('id', '<>', Auth::user()->id);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('phone', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('user_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $users = $query->orderby('id', 'asc')->paginate(20);

        return view('backend.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|unique:users,user_name,' . $request->input('id') . '|min:3|max:50',
            'email' => 'required|email|unique:users,email,' . $request->input('id'),
            'name' => 'required|string|max:100',
            'phone' => 'required|digits_between:9,15',
            'birthday' => 'required|date',
            'sex' => 'required', 
            'password' => $request->has('password') ? 'nullable|min:6|confirmed' : 'nullable',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userData = [
            'user_name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'birthday' => $request->input('birthday'),
            'sex'=> $request->sex,
        ];

        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->input('password'));
        }


        $user = User::updateOrCreate(
            ['id' => $request->input('id')],
            $userData
        );

		if($request->hasfile('picture')){
			SaveImage($request, $user->id, 'user_hinh_dai_dien');
		}

        return redirect(route('backend.user.index', $request->query()));
    }

    public function edit(Request $request){
        $id = $request->input('id');
        $user = User::where('id', $id)->with('image')->first();
        return response()->json(['user'=>$user]);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        if($id == 1){
            return redirect()->back()
                ->withErrors(['Không được xóa tài khoản này.'])
                ->withInput();
        }
        $user = User::where('id', $id);
        if (!empty($user)) $user->delete();
        return redirect(route('backend.user.index', $request->query()));
    }
}
