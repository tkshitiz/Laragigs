<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    { 
        return view('listings.index',[
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(4)
          ]); 
    
    }

    public function show(Listing $listing)
    {
         echo "testing 2";
        return view('listings.show',[
            'listing' => $listing
          ]);
    }

    public function create()
    {   
        return view('listings.create');
    }

    public function store(Request $request)
    {
    // dd($request->file());
       $formFields=request()->validate([
        'title'=>'required',
        'company'=>['required',Rule::unique('listings','company')],  
        'location'=>'required',
        'website' =>'required',
        'email'=>['required','email'],
        'tags'=>'required',
        'description'=>'required'
       ]);  


       if(request()->hasFile('logo')){
        $formFields['logo']=request()->file('logo')->store('logos','public');
       }
        // storing data in database through model

        Listing::create($formFields);    

       return redirect('/')->with('message','listing created successfully');

   
    }
    // show Edit form
    public function edit(Listing $listing)
    {
    //    dd($listing);
        return view('listings.edit',[
            'listing' => $listing
          ]);
    }
    public function update(Request $request,Listing $listing)
    {
//    dd($request);
       $formFields=request()->validate([
        'title'=>'required',
        'company'=>['required'],  
        'location'=>'required',
        'website' =>'required',
        'email'=>['required','email'],
        'tags'=>'required',
        'description'=>'required'
       ]);  


       if(request()->hasFile('logo')){
        $formFields['logo']=request()->file('logo')->store('logos','public');
       }
        // storing data in database through model
        $listing->update($formFields);

       return back()->with('message','Listing Updated Successfully');

   
    }
    public function destroy(Listing $listing)
    {
        // dd($listing);
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted Successfully');
    }
}
