<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validtor;
use App\Sparent;

class SparentController extends Controller
{
      public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:sparents',
            'password' => 'required|string|confirmed'
        ]);
        $Sparent = new Sparent([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $Sparent->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }





    	 public function login(Request $request)
		    {
		        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
      		  ]);
       		 $credentials = request(['email', 'password']);
       		 if(!Auth::attempt($credentials))
        	    return response()->json([
                'message' => 'Unauthorized'
            ], 401);
     		   $Sparent = $request->Sparent();
       		 $tokenResult = $user->createToken('Personal Access Token');
	        $token = $tokenResult->token;
	        if ($request->remember_me)
	            $token->expires_at = Carbon::now()->addWeeks(1);
	        $token->save();
	        return response()->json([
	            'access_token' => $tokenResult->accessToken,
	            'token_type' => 'Bearer',
	            'expires_at' => Carbon::parse(
	                $tokenResult->token->expires_at
	            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->sparent()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


    public function user(Request $request)
    {
        return response()->json($request->sparent());
    }

}
