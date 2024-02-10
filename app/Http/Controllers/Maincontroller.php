<?php

namespace App\Http\Controllers;

use App\Models\animalss;
use Illuminate\Http\Request;

class Maincontroller extends Controller
{
    public function index() {
        $animals=animalss::with('foto_model')->orderBy('created_at', 'desc')->take(3)->get();
     
        return view ('index', ['animal' => $animals]);
    }
}
