<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request) {
      $address = $request->address;
      $category = $request->category;
      $bedrooms = $request->bedrooms;
      //dd($category);

      // if($request->address != '' || $request->category != '' || $request->bedrooms != ''){
      //   $properties = Property::when($category, function ($query, $category) {
      //     return $query->where('category_id', $category);
      //   })
      //   ->when($address, function ($query, $address) {
      //     return $query->where('address', 'like', "%{$address}%");
      //   })->when($bedrooms, function ($query, $bedrooms) {
      //     return $query->where('bedrooms', $bedrooms);
      //   })
      //   ->get();
      // }

      $properties = Property::query();

      if($address != ''){
        // $properties = Property::where('address', 'LIKE', '%'.$address.'%')->get();
        $properties->where('address', 'LIKE', '%'.$address.'%');
      }

      if($category != ''){
        $properties->where('category_id', $category);
      }

      // if($request->address != '' && $request->category != ''){
      //   $properties = Property::where('address', 'LIKE', '%'.$address.'%')->where('category_id', $category)->get();
      // }

      // if($request->category != '' && $request->bedrooms != ''){
      //   $properties = Property::where('category_id', $category)->where('bedrooms', $bedrooms)->get();
      // }

      if($bedrooms != ''){
        $properties->where('bedrooms', $bedrooms);
      }

      // if($request->address != '' && $request->bedrooms != ''){
      //   $properties = Property::where('address', 'LIKE', '%'.$address.'%')->where('bedrooms', $bedrooms)->get();
      // }

      // if($request->address != '' && $request->category != '' && $request->bedrooms != ''){
      //   $properties = Property::where('address', 'LIKE', '%'.$address.'%')->where('category_id', $category)->where('bedrooms', $bedrooms)->get();
      // }


      //$properties->get()
      

      // $properties = DB::table('properties')
      //         ->where('address', 'like', "%{$address}%")
      //         ->orWhere(function ($query) use($bedrooms) {
      //           $query->where('category_id', $category)
      //                 ->where('bedrooms', $bedrooms);
      //         })->get();

      // return view('property', compact('properties'));
      //dd($properties->toSql());
       return view('property', ['properties' => $properties->get()]);
    }
}
