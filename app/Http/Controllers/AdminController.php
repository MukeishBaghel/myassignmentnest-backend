<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  function addPage() {
    return view('super-admin.add-page');
  }

  function addCountry(){
    return view('super-admin.add-country');
  }

  function addCountryPost(Request $request){
    $request->validate([
      'country_name' => 'required|string',
    ]);

    Country::create(['name' => $request->country_name]);

    return back()->with('success', 'Done!');
    dd($request->all());
  }
}
