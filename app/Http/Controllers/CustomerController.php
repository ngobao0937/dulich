<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\Promotion;

class CustomerController extends Controller
{
     public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
					->orWhere('email', 'like', '%' . $search . '%')
					->orWhere('phone', 'like', '%' . $search . '%')
					->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        $customers = $query->orderby('id', 'desc')->paginate(20);

        return view('backend.customer.index', compact('customers'));
    }

	public function edit(Request $request) {
		$id = $request->input('id');
		$customer = Customer::with('image')->find($id);
		return response()->json([
			'customer' => $customer
		]);
    }
	public function store(Request $request) {
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$obj = Customer::updateOrCreate(
			['id' => $request->id],
			[
				'name' => $request->name,
				'email' => $request->email,
				'phone' => $request->phone,
				'content' => $request->content,
				'promotion_fk' => $request->promotion_fk ? $request->promotion_fk : 0
			]
		);

		$data = $request->only(['name', 'email', 'phone', 'content']);

		if($request->has('promotion_fk') && $request->promotion_fk != 0) {
			$promotion = Promotion::with('product')->find($request->promotion_fk);

			Mail::send('frontend.email.customer-register', ['data' => $data, 'promotion' => $promotion, 'created_at' => $obj->created_at], function ($message) use ($promotion) {
				$message->to('ngobao0937@gmail.com')
						->subject('Khách hàng đăng ký ưu đãi: ' . $promotion->name);
			});
		} else {
			Mail::send('frontend.email.customer-register-general', [
				'data' => $data,
				'created_at' => $obj->created_at
			], function ($message) {
				$message->to('ngobao0937@gmail.com')
						->subject('Khách hàng đăng ký nhận ưu đãi');
			});
		}

		return redirect()->back()->with('success', 'Xin chúc mừng! Bạn đã đăng ký thành công 🎉');

	}


	public function delete(Request $request) {
		$id = $request->input('id');
		$customer = Customer::find($id);
		$customer->delete();
		return redirect(route('backend.customer.index', $request->query()));
        
    }
}
