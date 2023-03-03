<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\State;
use Illuminate\Http\Request;
use App\Imports\ContactImport;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    function show()
    {
        $contact = Contact::all();



        return view('contacts.index', ['contacts'=> $contact]);
    }

    function create()
    {

        $country = Country::all();
        $state = State::all();
        return view('contacts.create')->with('country',$country)->with('state',$state);
    }



    public function edit($id)
{
    $contact = Contact::find($id);
    $allContacts = Contact::all();
    return view('contacts.edit', compact('contact', 'allContacts'));
}

public function update(Request $request, $id)
{
    $contact = Contact::find($id);

    $copyFromUserId = $request->input('copyFromUser');
    if ($copyFromUserId) {
        $copyFromUser = Contact::find($copyFromUserId);
        $contact->address = $copyFromUser->address;
        $contact->mobile = $copyFromUser->mobile;
    } else {
        $contact->update($request->all());
    }

    $contact->save();

    return redirect()->route('contacts.index');
}


    function import(Request $request)
    {
       Excel::import(new ContactImport, $request->file('file'));
       return 'import success';
    }

    function importfile()
    {
       return view('contacts.import');
    }

    public function getStates($country_id){
        $states = State::where('country_id', $country_id)->get();
        return response()->json(['states' => $states]);
    }

    public function store(Request $request)
    {
        // validate the input
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'country_id' => 'required',
            'state_id' => 'required'
        ]);

        //create a new contact in the database
        Contact::create($request->all());

        //Redirect user to homepage
        return redirect()->route('contacts.index');
    }


}
