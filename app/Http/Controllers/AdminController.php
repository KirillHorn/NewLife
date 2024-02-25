<?php

namespace App\Http\Controllers;

use App\Models\animalss;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_index(Request $request) {
        $sortOrder = $request->get('sort_order');
        if ($sortOrder == 0 ) {
        $post = animalss::all();
        }
        else {
            $post = animalss::all()->where('status',$sortOrder);  
        }
        return view('admin', ['post' => $post]);

      
        
    }

    public function changeStatus( $id,  $status ) {
         $statuss = $status;
        if ($statuss == 2 || $statuss == 3 ||  $statuss == 4 ) {
            $post=animalss::findOrFail($id);
            $post->status = $statuss;
            $post->save();
            return redirect()->back()->with('success','Вы поменяли статус!');
        }
    }
}
