<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index (Request $request){
        $query = Contact::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('company', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('fax', 'like', '%' . $search . '%');
            });
        }

        $active = $request->has('active') ? $request->active : '0';


        if($active != 'all'){
            $query->where('active', $active);
        }

        $contacts = $query->orderby('id', 'desc')->paginate(20);

        return view('backend.contact.index', compact('contacts', 'active'));
    }

    public function edit(Request $request) {
		$id = $request->input('id');
		$contact = Contact::find($id);
		return response()->json([
			'contact' => $contact
		]);
    }

    public function store(Request $request) {
		$id = $request->input('id');
		$contact = Contact::find($id);
        $contact->active = 1;
		$contact->save();

		return redirect(route('backend.contact.index', $request->query()));
 
    }

	public function delete(Request $request) {
		$id = $request->input('id');
		$contact = Contact::find($id);
		$contact->delete();
       return redirect(route('backend.contact.index', $request->query()));
    }
}
