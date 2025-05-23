<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::where('menu_fk', 0); // Chỉ lấy menu cha
    
        if ($request->has('search') && $request->search) {
            $search = $request->search;
    
            $query->where('name', 'like', '%' . $search .'%');
        }
    
        $menus = $query->orderby('id','desc')->paginate(20);
    
        return view('backend.menu.index', compact('menus'));
    }
    


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $obj = Menu::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->input('name'),
                'slug' =>Str::slug($request->input('name')),
                'active' => $request->active ? 1 : 0,
                // 'public' => $request->public ? 1 : 0,
            ]
        );

        if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'menu');
		}

        return redirect(route('backend.menu.index', $request->query()));
    }

    public function edit(Request $request) {
        $menu = Menu::with('image')->find($request->id);
    
        return response()->json([
            'menu' => $menu
        ]);
    }
    
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $disable = [10000, 10001, 10002];
    
        if (in_array($id, $disable)) {
            return redirect()->back()->withErrors('Không thể xóa menu này!')->withInput();
        }
    
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('backend.menu.index')
                ->with('error', 'Menu không tồn tại!');
        }
    
        $menu->delete();
    
        return redirect()->route('backend.menu.index', $request->query());
    }    

}
