<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index() {
        $pages = Page::all();

        return view('backend.page.index', ['pages' => $pages]);
    }

    public function edit(Request $request) {
        $page = Page::find($request->id);

        return response()->json([
            'page' => $page, 
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $page = Page::updateOrCreate(
            ['id' => $request->input('id')],
            [
                'name' => $request->name,
                'content' => $request->content,
                'slug' => Str::slug($request->name)
            ]
        );

        return redirect(route('backend.page.index'));
    }

    public function delete(Request $request){
        $page = Page::where('id', $request->id)->delete();
        return redirect(route('backend.page.index'));
    }

    public function detail(Request $request){
        $page = Page::find($request->id);
        $banners = Banner::where('type', 'main')->orderby('position', 'asc')->where('active', 1)->get();
        return view('frontend.page.detail', [
            'page' => $page,
            'banners' => $banners
        ]);
    }
}
