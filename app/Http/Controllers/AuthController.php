<?php

namespace App\Http\Controllers;

use App\Models\animalss;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function sign_up() {
        return view('registration');
    }
    public function sign_in() {
        return view('auth');
    }

    public function sign_up_validate(Request $request) {
        $request->validate([
            "name" => "required",
            "surname" => "required",
            "email" => "required|unique:users|email",
            "phone" => "required|unique:users",
            "password" => "required",
            "password_reset" => "required|same:password",
            "check" => "required",
        ], [
            "name.required" => "Поле обязательно для заполнения",
            "surname.required" => "Поле обязательно для заполнения",
            "email.required" => "Поле обязательно для заполнения",
            "password.required" => "Поле обязательно для заполнения",
            "password_reset.required" => "Поле обязательно для заполнения",
            "phone.required" => "Поле обязательно для заполнения",
            "phone.unique" => "Данный email уже занят",
            "email.unique" => "Данный Логин уже занят",
            "email.email" => "Неверный формат электронной почты",
            "password_reset.same" => "Пароли не совпадают",
            "check.required" => "Поставьте галочку напротив обработки персональных данных!",
        ]);
        $userInfo = $request->all();
        $userAdd = User::create([
            'name' => $userInfo['name'],
            'surname' => $userInfo['name'],
            'email' => $userInfo['email'],
            'phone' => $userInfo['phone'],
            'password' => Hash::make($userInfo['password']),
            'roles' => 1,
        ]);
        if ($userAdd) {
            return redirect("/auth")->with('success', 'Регистрация прошла удачно, авторизируйтесь!');
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка! Проверьте логин или пароль!');
        }
    }
    public function sign_in_validate(Request $request) {
        $request->validate([
            "email" => "required",
            "password" => "required",
        ], [
            "email.required" => "Поле обязательно для заполнения",
            "password.required" => "Поле обязательно для заполнения",
        ]);
        $authInfo = $request->all();

        if (Auth::attempt([
            "email" => $authInfo['email'],
            "password" => $authInfo['password'],
        ])) {
            if (Auth::user()->roles == 2) {
                return redirect('/admin')->with('success', 'вы зашли в админ панель!');
            } else {
                return redirect('/')->with('success', 'вы зашли!!');
            }
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка! Проверьте Почту или пароль!');
        }
    }

    public function sign_out()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function personalCub() {
        $userAnimal=animalss::all()->where('users', Auth::user()->id);
        return view('personalCub',['userAnimal' => $userAnimal]);
    }
    public function deleteAnimals(animalss $id) {
        try { $id->foto_model()->delete();
        $id->comment_id()->delete();
        $id->delete();
        return redirect()->back()->with('error', 'Вы удалили место!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при удалении места: ' . $e->getMessage());
        }
      
    }
    public function Phone(Request $request) {
        $phone = $request->input('phone');
        $user = Auth::user();
        $user->phone = $phone;
        $user->save();
       return redirect()->back()->with('success','Редактирование телефона успешно!');
    }
    public function Email(Request $request) {
        $email = $request->input('email');
        $user = Auth::user();
        $user->email = $email;
        $user->save();
       return redirect()->back()->with('success','Редактирование телефона успешно!');
    }
}
