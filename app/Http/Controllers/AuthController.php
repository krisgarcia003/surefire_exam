<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class AuthController extends Controller
{
    public function login(Request $request){

		Log::info('data-login', $request->all());

		$request->validate([
			'email'=>'required',
			'password'=>'required'
        ]);

		if(Auth::attempt($request->all())) {
			$user = Auth::user();
			$success['token'] =  $user->createToken('MyApp')->accessToken;
			$success['user'] = $user;
			return response()->json(['auth' => $success], 200);
		}
		else{
			return response()->json(['error'=>'Unauthorised'], 401);
		}
    }
    
    public function register(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required'
		]);
		if ($validator->fails()) {
			return response()->json(['error'=>$validator->errors()], 401);            
		}
		$input = $request->all();
		$input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        
		$success['token'] =  $user->createToken('MyApp')->accessToken;
		$success['user'] =  $user;
		return response()->json(['auth'=> $success], 200);
	}

}
