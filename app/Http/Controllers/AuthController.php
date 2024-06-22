<?php

namespace App\Http\Controllers;

use App\Models\TheUser;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $user = TheUser::where('email', $email)->first();
        if ($user) {
            return response()->json([
                'message' => 'Email already exists',
                'IsNewUser' => 0,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Email is available',
                'IsNewUser' => 1,
            ], 200);
        }
    }
}
