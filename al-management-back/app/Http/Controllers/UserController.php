<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAll(){
        return User::all();
    }
    public function store(Request $request){
        $request['password'] = '123456';
        User::create($request->toArray());
    }

    public function getById($id)
    {
        $user = User::find($id);
        if(isset($user)){
            return response()->json([
                'data'=>$user,
                'message'=>'Usuario encontrado.'
            ]);
        }else{
            return response()->json([
               'message'=>'Usuario no encontrado.'
            ],404);
        }
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->toArray());
        return $user;
    }
    public function delete($id){
        User::destroy($id);
    }
    public function login(Request $request){
        $user = User::where('email', $request['email'])->first();
        if(!$user || !Hash::check($request['password'], $user->password)){
            return response()->json([
               'message'=>'Usuario o contraseña incorrectos.'
            ],401);
        }   

        return response()->json([
           'token'=> $user->createToken('al-token')->plainTextToken,
           'roles'=> $user->roles->pluck('name')
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
           'message'=>'Sesion cerrada.'
        ],200);
    }
}
