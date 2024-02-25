<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Breeds;
use App\Models\animalss;
use App\Models\fotoanimals;
use App\Models\Comment;

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
        $animalsComment=Comment::where('animals_id',$id)->get();
        return view('animalsPost', ["animal" => $animalInfo, 'comment' => $animalsComment]);
    }

    public function comment_Add(Request $request, $id) {
        $comment=$request->all();
        $photo=$request->file('foto');
        $name = $photo->hashName();
         $patch = $photo->store('public/img');
         $author = Auth::user()->id;

         $commentAdd=Comment::create([
            'text_comment' => $comment['text_comment'],
            'img' => $name,
            'animals_id' => $id,
            'users_id' => $author,
        ]);

        if($commentAdd ) {
            return redirect()->back()->with('success', 'Добавление прошло успешно!');
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка!');
        }

    }
    public function Poisk() {
        $animals_status=animalss::with('foto_model')->paginate(10);
        $breeds=breeds::all();
        return view('Poisk', compact('animals_status'), ['breeds' => $breeds]);
    }

    public function Poisk_post(Request $request) {
        $poisk=$request->all();
        $animals_status=animalss::with('foto_model')->where('breed_id',$poisk['breeds'])->where('region',$poisk['region'])->take(6)->get();
        if ($animals_status) {
            $breeds=breeds::all();
            return view('Poisk', compact('animals_status'), ['breeds' => $breeds]);
        }
    }
}
