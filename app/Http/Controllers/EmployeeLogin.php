<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLogin extends Controller
{

    public function login(Request $request)
    {

        $credentail = $request->only('email', 'password');
        if (!Auth::guard('api')->attempt($credentail,false)) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        try {
            $employee = Employee::where('email', $request['email'])->firstOrFail();
            // Perform actions with the user
        } catch (ModelNotFoundException $e) {
            // Handle the case where no user is found
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $now = Carbon::now();
        $now->addDay(30);
        $token = $employee->createToken('auth_token',['*'],$now)->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    public function logout()
    {
        $user = Auth::authenticate();
        $user->currentAccessToken()->delete();
        return response()->json([
            'message' => 'logout successfully',200
        ]);
    }

}
