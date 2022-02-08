<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;


class FrontPropertyListController extends Controller
{
    public function index(Request $request) {
        //dd($searchResults);
        $properties = Property::latest()->limit(9)->get();
        // random properties for carousel
        //$randomProperties= Property::inRandomOrder()->limit(3)->get();
        $randomPropertyIds = [];

        // foreach($randomProperties as $property){
        //     array_push($randomPropertyIds, $property->id);
        // }

        // $randomItemProperties = Property::where('id', '!=', $randomPropertyIds)->limit(3)->get();

        //dd($randomProperties);
        return view('property', compact('properties'));
    }

    public function show($id) {
      $property = Property::find($id);

      $propertyFromSameCategories = Property::inRandomOrder()
            ->where('category_id', $property->category_id)
            ->where('id', '!=', $property->id)
            ->limit(3)
            ->get();

      return view('show', compact('property', 'propertyFromSameCategories'));
    }

    public function filterByPrice(Request $request) {
      return 'filter';
    }
}
