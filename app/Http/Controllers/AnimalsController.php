<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Breeds;
use App\Models\animalss;
use App\Models\fotoanimals;

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
            "date" => "required",
            "breed" => "required",
            "foto" => "required",
            "check" => "required",
        ], [
            "description.required" => "Поле обязательно для заполнения",
            "region.required" => "Поле обязательно для заполнения",
            "date_location.required" => "Поле обязательно для заполнения",
            "breed.required" => "Поле обязательно для заполнения",
            "foto.required" => "Поле обязательно для заполнения",
            "check.required" => "Поставьте галочку напротив обработки персональных данных!",
        ]);

        $animalsInfo= $request->all();
        $author = Auth::user()->id;
        $animalsAdd=animalss::create([
            'name_animals' => $animalsInfo['name_animals'],
            'description' => $animalsInfo['description'],
            'region' => $animalsInfo['region'],
            'date_location' => $animalsInfo['date'],
            'breed_id' => $animalsInfo['breed'],
            'status' => 2,
            'users' => $author,
        ]);
        $photo=$request->file('foto');
        if(isset($photo)){
            foreach ($photo as $photos){
                $name = $photos->hashName();
                $patch = $photos->store('public/img');
                fotoanimals::create([
                    'id_animal' => $animalsAdd->id,
                    'img' => $name,
                ]);
            }
        }
        if($animalsAdd && $photo) {
            return redirect()->back()->with('success', 'Добавление прошло успешно!');
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка!');
        }
    }

    public function animalsPost($id) {
        $animalInfo=animalss::find($id);
        return view('animalsPost', ["animal" => $animalInfo]);
    }
}
