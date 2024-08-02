<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  function addPage() {
    $countries = Country::all();
    $page_data = Page::all();

    return view('super-admin.add-page')->with([
      'countries'=>$countries,
      'page_data'=>$page_data
    ]);
  }

  public function removeSpaces($string)
  {
    $cleanedString = str_replace(' ', '', $string);
    return strtolower($cleanedString);
  }

  function addPagePost(Request $request){

    $request->validate([
    'country_id' => 'required',
    'page_url' => 'required|string|max:255|unique:pages',
    'location' => 'required|string|max:255|unique:pages',
    'hero_title' => 'required|string|max:255',
    'hero_sub_title' => 'required|string|max:255',
    'section_1_title_1' => 'required|string|max:255',
    'section_1_content_1' => 'required|string',
    'section_1_title_2' => 'required|string|max:255',
    'section_1_content_2' => 'required|string',
    'conference_pricing_text' => 'required|string',
    'sponsor_section_text' => 'required|string',
    ]);



    Page::create([
      'country_id' => $request->country_id,
      'location' => $request->location,
      'page_url' => $this->removeSpaces($request->page_url),
      'hero_title' => $request->hero_title,
      'hero_sub_title' => $request->hero_sub_title,
      'section_1_title_1' => $request->section_1_title_1,
      'section_1_content_1' => $request->section_1_content_1,
      'section_1_title_2' => $request->section_1_title_2,
      'section_1_content_2' => $request->section_1_content_2,
      'conference_pricing_text' => $request->conference_pricing_text,
      'sponsor_section_text' => $request->sponsor_section_text,
    ]);

    return back()->with('success', 'Done!');
  
  }

  function editPage(Request $request, $id) {
    $countries = Country::all();
    $page_data = Page::where('id',$id)->first();
    return view('super-admin.edit-page')->with([
      'countries'=>$countries,
      'page_data'=>$page_data
    ]);
  }

  function editPagePost(Request $request, $id){

    $request->validate([
      'country_id' => 'required',
      'page_url' => 'required|string|max:255',
      'location' => 'required|string|max:255|',
      'hero_title' => 'required|string|max:255',
      'hero_sub_title' => 'required|string|max:255',
      'section_1_title_1' => 'required|string|max:255',
      'section_1_content_1' => 'required|string',
      'section_1_title_2' => 'required|string|max:255',
      'section_1_content_2' => 'required|string',
      'conference_pricing_text' => 'required|string',
      'sponsor_section_text' => 'required|string',
    ]);

    $page = Page::findOrFail($id);

    $page->country_id = $request->country_id;
    $page->location = $request->location;
    $page->page_url = $this->removeSpaces($request->page_url);
    $page->hero_title = $request->hero_title;
    $page->hero_sub_title = $request->hero_sub_title;
    $page->section_1_title_1 = $request->section_1_title_1;
    $page->section_1_content_1 = $request->section_1_content_1;
    $page->section_1_title_2 = $request->section_1_title_2;
    $page->section_1_content_2 = $request->section_1_content_2;
    $page->conference_pricing_text = $request->conference_pricing_text;
    $page->sponsor_section_text = $request->sponsor_section_text;

    $page->save();
    
    return redirect()->route('add-page')->with('success', 'Page updated successfully');
  }

  function deletePage(Request $request, $id){
    Page::where('id',$id)->delete();

    return back()->with('success','Post Deleted Successfully');
  }

  function addCountry(){
    $countries = Country::all();
    return view('super-admin.add-country')->with(['countries'=>$countries]);
  }

  function addCountryPost(Request $request){
    $request->validate([
      'country_name' => 'required|string',
    ]);

    Country::create(['name' => $request->country_name]);

    return back()->with('success', 'Done!');
    dd($request->all());
  }

  function editCountry(Request $request, $id) {
    $country = Country::where('id',$id)->first(); 

    return view('super-admin.edit-country ')->with([
      'country'=>$country
    ]);
  }

  function editCountryPost(Request $request, $id){

    $request->validate([
     'country_name' => 'required|string',
    ]);

    $country = Country::findOrFail($id);

    $country->name = $request->country_name;

    $country->save();

    return redirect()->route('add-country')->with('success', 'Country updated successfully');
  }

  function deleteCountry(Request $request, $id){
    Country::where('id',$id)->delete();

    return back()->with('success','Country Deleted Successfully');
  }

  // apis  
  function getPages(Request $request) {
    $countries = Country::with('pages')->get();

    return response()->json([
      'status' => true,
      'data' => $countries
    ]);
    dd($countries[0]->pages);
  }

  function getPagesBySlug(Request $request, $slug){
    $page_data = Page::where('page_url',$slug)->first();
    return response()->json([
      'status' => true,
      'data' => $page_data
    ]);
  }

}
