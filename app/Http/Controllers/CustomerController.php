<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
     public function index(Request $request)
    {
        $query = Customer::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
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
			]
		);

		return redirect()->back();
	}


	public function delete(Request $request) {
		$id = $request->input('id');
		$customer = Customer::find($id);
		$customer->delete();
		return redirect(route('backend.customer.index', $request->query()));
        
    }
}
