<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;


class FrontPropertyListController extends Controller
{
    public function index() {
        $properties = Property::latest()->limit(9)->get();
        return view('property', compact('properties'));
    }
}
