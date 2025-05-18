<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	public function index(Request $request){
		$query = Comment::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('content', 'like', '%' . $search . '%');
            });
        }

		$product = null;

		if($request->has('product_fk')){
			$query->where('product_fk', $request->product_fk);
			$product = Product::where('id', $request->product_fk)->first();
		}

		$comments = $query->orderby('id','desc')->paginate(20);
		return view('backend.comment.index', [
			'comments' => $comments,
			'product' => $product
		]);
	}
    public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'content' => 'required|string|max:255',
		]);

		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
	
		$comment = Comment::updateOrCreate(
			['id' => $request->id],
			[
				'content' => $request->content,
				'product_fk' => $request->product_fk,
				'rating' => $request->rating,
				'name' => $request->name,
				'active' => $request->active ? 1 : 0
			]
		);

		return redirect()->back();
	}

	public function duyet(Request $request){
		$comment = Comment::find($request->id);
		$comment->active = 1;
		$comment->save();
		return redirect()->route();
	}

	public function edit(Request $request) {
		$id = $request->input('id');
		$comment = Comment::with('product')->where('id', $id)->first();
		return response()->json([
			'comment' => $comment
		]);
    }
	

	public function delete(Request $request) {
		$comment = Comment::find($request->id);

		$comment->delete();

		return redirect()->route('backend.comment.index', $request->query());
    }

	public function get_products(Request $request)
    {
        $search = $request->input('search', ''); 
        $page = $request->input('page', 1); 
        $limit = $request->input('limit', 30);
    
        // Tính offset dựa trên trang hiện tại
        $offset = ($page - 1) * $limit;
    
        // Query lấy sản phẩm
        $query = Product::select('id', 'name')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            });
    
        $total = $query->count();
    
        $products = $query->offset($offset)
                          ->limit($limit)
						  ->where('isdelete', 0)
                          ->get();
    
        return response()->json([
            'results' => $products,
            'total' => $total,
        ]);
    }
}
