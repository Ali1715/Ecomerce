<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Persona;
use App\Http\Requests\StoreClienteRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use \stdClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([

            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
            'ci' => ['required', 'unique:personas,ci', 'min:7'],
            'email' => ['required', 'unique:users,email'],
            'sexo' => ['required'],
            'celular' => ['required', 'unique:personas,celular'],
            'domicilio' => ['required'],
            'estadocli' => [''],
            'tipoc' => ['required'],
            'tipoe' => ['required'],
            //'iduser' => [''],
           
        
            
        ]);

        
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);



        $persona=Persona::create([
            'name' => $request->name,
            'ci' => $request->ci,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'celular' => $request->celular,
            'domicilio' => $request->domicilio,
            'estadocli' => $request->estadocli,
            'tipoc' => $request->tipoc,
            'tipoe' => $request->tipoe,
            'iduser' => $user->id,
        ]);
        
       




        $token = $user->createToken('auth_token')->plainTextToken;  

        $reponse = [
            'user' => $user,
            'cliente' => $persona,
            'token' => $token,
        ];

        return response($reponse, 201);
    }
/**********Login ****** */
    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email','password')))
        {
            return response()->json(['mensaje'=>'No Autorizado'],401);
        }
  
        $user = User::where('email', $request['email'])->first();
        $token = $user->createToken('auth_token')->plainTextToken;  

        return response()->json(
        ['mensaje'=>'Hi'.$user->name,
        'accessToken'=>$token,
        'user'=>$user,
        ],201);  // Retornamos respuesta
    }
/********************************************************* */
    public function logout(User $user)
    {
        auth()-> $user()->tokens()->delete();  // Elimina token

        return [
            'message' => 'Logged Out'.$user->name,
        ];
    }

    
}


