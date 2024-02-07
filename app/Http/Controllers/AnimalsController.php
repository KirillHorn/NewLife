<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Breeds;
use App\Models\animalss;

class AnimalsController extends Controller
{
    public function AnimalsAdd_view() {
        $breeds = Breeds::all();
        return view('AnimalsAdd', ['breeds' => $breeds]);
    }

    public function AnimalsAdd_validate(Request $request) {
        $request->validate([
            "description" => "required",
            "region" => "required",
            "date_location" => "required",
            "breed" => "required",
            "check" => "required",
        ], [
            "description.required" => "Поле обязательно для заполнения",
            "region.required" => "Поле обязательно для заполнения",
            "date_location.required" => "Поле обязательно для заполнения",
            "breed.required" => "Поле обязательно для заполнения",
            "check.required" => "Поставьте галочку напротив обработки персональных данных!",
        ]);

        $animalsInfo= $request->all();
        $author = Auth::user()->id;
        $animalsAdd=animalss::create([
            'name_animals' => $animalsInfo['name_animals'],
            'description' => $animalsInfo['description'],
            'region' => $animalsInfo['region'],
            'date_location' => $animalsInfo['date_location'],
            'breed_id' => $animalsInfo['breed'],
            'status' => 2,
            'users' => $author, 
        ]);

        if ($userAdd) {
            return redirect("/")->with('yes', 'Регистрация прошла удачно, авторизируйтесь!');
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка! Проверьте логин или пароль!');
        }
    }
}
