<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use App\Models\Extension;
use Illuminate\Support\Str;

class ExtensionController extends Controller
{
    public function index(Request $request)
    {
        $query = Extension::query();
    
        if ($request->has('search') && $request->search) {
            $search = $request->search;
    
            $query->where('name', 'like', '%' . $search .'%');
        }
    
        $extensions = $query->orderby('id','desc')->paginate(20);

        $menus = Menu::all();
    
        return view('backend.extension.index', compact('extensions', 'menus'));
    }
    


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'menu_fk' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $obj = Extension::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->input('name'),
                'menu_fk' => $request->input('menu_fk'),
                'active' => $request->active ? 1 : 0,
            ]
        );

        return redirect(route('backend.extension.index', $request->query()));
    }

    public function edit(Request $request) {
        $extension = Extension::find($request->id);
    
        return response()->json([
            'extension' => $extension
        ]);
    }
    
    public function delete(Request $request)
    {
        $id = $request->input('id');
    
        $extension = Extension::find($id);
        if (!$extension) {
            return redirect()->route('backend.extension.index')
                ->with('error', 'Extension không tồn tại!');
        }
    
        $extension->isdelete = 1;

        $extension->save();
    
        return redirect()->route('backend.extension.index', $request->query());
    }    

}
