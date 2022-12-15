<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'max:10'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;  

        $reponse = [
            'user' => $user,
            'token' => $token,
        ];

        return response($reponse, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'massage' => 'Credenciales Incorectas'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;  

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);  // Retornamos respuesta
    }

  /*  public function logout()
    {
        auth()->user()->tokens()->delete();  // Elimina token

        return [
            'message' => 'Logged Out'
        ];
    }
*/
    
}


