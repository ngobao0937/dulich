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
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $contacts = $query->orderby('id', 'desc')->paginate(20);

        return view('backend.contact.index', compact('contacts'));
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
