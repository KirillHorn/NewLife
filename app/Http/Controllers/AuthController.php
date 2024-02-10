<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            if (Auth::user()->role == 2) {
                return redirect('/admin/index')->with('success', 'вы зашли в админ панель!');
            } else {
                return redirect('/')->with('success', 'вы зарегались!');
            }
        } else {
            return redirect()->back()->with('error', 'Произошла ошибка! Проверьте Почту или пароль!');
        }
    }
}
