<?php

namespace App\Http\Controllers;

use App\Models\animalss;
use Illuminate\Http\Request;

class Maincontroller extends Controller
{
    public function index() {
        $animals=animalss::with('foto_model')->where("status" , 2)->orderBy('created_at', 'desc')->take(3)->get();

        $animals_status=animalss::with('foto_model')->where("status", 3)->take(6)->get();

        return view ('index', ['animal' => $animals, 'animals_status' => $animals_status]);
    }
}
