<?php

namespace App\Http\Controllers;

use App\Models\animalss;
use App\Models\Comment;
use App\Models\Subscription;
use Illuminate\Http\Request;


class Maincontroller extends Controller
{
    public function index() {
        $animals=animalss::with('foto_model')->where("status" , 2)->orderBy('created_at', 'desc')->take(3)->get();

        $animals_status=animalss::with('foto_model')->where("status", 3)->take(6)->get();

        $comment=Comment::with('user_id')->take(3)->get();
 
        return view ('index', ['animal' => $animals, 'animals_status' => $animals_status, 'comment' => $comment]);
    }

    public function Subscription(Request $request) {
        $email=$request->all();
        $Subscription=Subscription::create([
            'email' => $email['email'],
        ]);
        if ($Subscription) {
            return redirect()->back()->with('success','Вы подписаны');
        } else {
            return redirect()->back()->with('error','Вы подписаны');
        }
    }
}
