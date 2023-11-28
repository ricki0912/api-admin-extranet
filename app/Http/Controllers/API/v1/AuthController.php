<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\BUserAuth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function  signIn(Request $request){

        $credentials = $request->validate([
            'uid' => 'required',
            'rid' => 'required',
            'password' => 'required',
        ]);
    
        $token = User::authenticate($credentials['uid'],$credentials['rid'] , $credentials['password']);
        if ($token) {
            return response()->json(['state'=>true , 'msg'=>"Inicio sesion correctamente", 'data'=>['token' => $token]], 200);
        }
        return response()->json(['state'=>false , 'msg'=>"Unauthorized", 'data'=>[]], 401);

    }

    
    public function signOut(Request $request){
        $token = $request->header('Authorization');
        if ($token) {
            $userAuth = BUserAuth::where('token', $token)->first();

            if ($userAuth) {
                $userAuth->delete();
                return response()->json(['state'=>true , 'msg'=>"Cierre sesion correctamente"], 200);
            }
        }
        return response()->json(['state'=>false , 'msg'=>"Unauthorized", 'data'=>[]], 401);
    }
    
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
