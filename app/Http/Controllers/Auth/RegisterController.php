<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
   /*
   |--------------------------------------------------------------------------
   | Register Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles the registration of new users as well as their
   | validation and creation. By default this controller uses a trait to
   | provide this functionality without requiring any additional code.
   |
   */

   use RegistersUsers;

   /**
    * Where to redirect users after registration.
    *
    * @var string
    */
   protected $redirectTo = '/home';

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('guest');
   }

   /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
   protected function validator(array $data)
   {
       return Validator::make($data, [
           'name' => ['required', 'string', 'max:255'],
           'userName' => ['required', 'string', 'min:6', 'unique:users'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'avatar' => ['required', 'mimes:jpeg,png,jpg,gif'],
           'password' => ['required', 'string', 'min:6', 'max:14', 'confirmed'],
           // 'country' => ['required'],
           'age' => ['required'],
       ],
     [
       'name.required' => 'Debe ingresar un nombre',
       'name.string' => 'El nombre no debe contener números',
       'name.max' => 'El nombre no puede contener más de 255 caracteres',

       'userName.required' => 'Debe ingresar un nombre de usuario',
       'userName.string' => 'El nombre de usuario no puede contener números',
       'userName.min' => 'El usuario debe contener al menos 6 caracteres',
       'userName.unique' => 'Ya existe un usuario registrado con este nombre',

       'email.required' => 'Debe ingresar un email',
       'email.string' => 'El email no puede ser un número',
       'email.email' => 'Debe ingresar un email válido',
       'email.max' => 'El correo debe contener menos de 255 caracteres',
       'email.unique' => 'Ya existe un usuario registrado con ese correo electrónico',

       'avatar.required' => 'Debe ingresar una imagen',
       'avatar.mimes' => 'El formato de la imagen no es válido. Debe ser jpeg, png, jpg o gif',

       'password.required' => 'Debe ingresar una contraseña',
       'password.string' => 'La contraseña debe contener letras',
       'password.min' => 'La contraseña debe tener al menos 6 caracteres',
       'password.max' => 'La contraseña no puede contener más de 14 caracteres',
       'password.confirmed' => 'Las contraseñas no coinciden',

       'age.required' => 'Debe ingresar una fecha de nacimiento',
     ]);
     if ($request->file('avatar')) {
       $path = $request->file('avatar')->storeAs('avatars', $request->user()->email);
     }
   }



   /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\User
    */
   protected function create(array $data)
   {
       return User::create([
           'name' => $data['name'],
           'userName' => $data['userName'],
           'email' => $data['email'],
           'avatar' => $path??null,
           'password' => Hash::make($data['password']),
           // 'country' => $data['country'],
           'age' => $data['age'],
       ]);
   }
}
