<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $blogs = $query->orderby('id', 'desc')->paginate(20);

        return view('backend.blog.index', compact('blogs'));
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$blog = Blog::with('image')->find($id);
		return response()->json([
			'blog' => $blog
		]);
    }
	public function store(Request $request) {
		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

		Blog::where('position', $request->position)
			->where('id', '!=', $request->id)
			->update(['position' => null]);

		$obj = Blog::updateOrCreate(
			['id' => $request->id],
			[
				'name' => $request->name,
				'content' => $request->content,
				'description' => $request->description,
				'active' => $request->active ? 1 : 0,
				'slug' => Str::slug($request->input('name')),
			]
		);

		if($request->hasfile('picture')){
			SaveImage($request, $obj->id, 'blog_hinh_dai_dien', 'picture', 80);
		}

		return redirect(route('backend.blog.index', $request->query()));
 
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$blog = Blog::find($id);
		$blog->delete();
       return redirect(route('backend.blog.index', $request->query()));
    }


	public function detail(Request $request)
	{
		$blog = Blog::findOrFail($request->id);

		$viewedBlogs = session()->get('viewed_blogs', []);

		if (!in_array($blog->id, $viewedBlogs)) {
			$blog->increment('view');

			session()->push('viewed_blogs', $blog->id);
		}

		$blogs = Blog::orderBy('view', 'desc')->where('id', '<>', $request->id)
			->take(4)
			->get();

		$banners = Banner::where('type', 'blog')
            ->orderBy('position', 'asc')
            ->where('active', 1)
            ->get();

		return view('frontend.blog.detail', compact('blog', 'blogs', 'banners'));
	}
}
