<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
      $category = $request->category;
      $address = $request->address;


      $properties = Property::when($category, function ($query, $category) {
                          return $query->where('category_id', $category);
                        })
                        ->when($address, function ($query, $address) {
                          return $query->where('address', 'like', "%{$address}%");
                        })
                        ->get();

      return view('property', compact('properties'));
    }
}
