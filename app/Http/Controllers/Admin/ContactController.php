<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ar');
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect(route('admin.contacts'))->with('success', 'تم حذف التواصل بنجاح');
    }
}
