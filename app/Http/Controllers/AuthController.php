<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Level;
class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:11|exists:users,phone_number',
            'password' => 'required|string|min:6',
        ], [
            'phone_number.required' => __('mess.phone_number_required'),
            'phone_number.max' => __('mess.phone_number_max'),
            'password.required' => __('mess.password_required'),
            'password.min' => __('mess.password_min'),
            'phone_number.exists' => __('mess.phone_number_not_found'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
            ], 400);
        }

        if (Auth::attempt($request->only('phone_number', 'password'))) {

            if(auth()->user()->status == false){
                Auth::logout();
                return response()->json([
                    'message' => __('mess.account_not_active'),
                ], 400);
            }

            return response()->json([
                'message' => __('mess.login_success'),
            ], 200);
        } else {
            return response()->json([
                'message' => __('mess.phone_number_or_password_incorrect'),
            ], 400);
        }

        return response()->json([
            'message' => __('mess.login_error'),
        ], 400);
    }

    public function showFormRegister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:11|unique:users,phone_number',
            'password' => 'required|string|min:6',
            'password2' => 'required|string|min:6',
            'invite_code' => 'required|string|max:6|exists:users,invite_code',
        ], [
            'invite_code.exists' => __('mess.invite_code_not_found'),
            'invite_code.max' => __('mess.invite_code_max'),
            'invite_code.required' => __('mess.invite_code_required'),
            'full_name.required' => __('mess.full_name_required'),
            'phone_number.required' => __('mess.phone_number_required'),
            'phone_number.max' => __('mess.phone_number_max'),
            'phone_number.unique' => __('mess.phone_number_unique'),
            'password.required' => __('mess.password_required'),
            'password2.required' => __('mess.password2_required'),
            'password.min' => __('mess.password_min'),
            'password2.min' => __('mess.password2_min'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $referrer = User::where('invite_code', $request->invite_code)->first();
        if (!$referrer) {
            return response()->json([
                'message' => __('mess.invite_code_not_found'),
            ], 400);
        }

        do {
            $invite_code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (User::where('invite_code', $invite_code)->exists());

        $level = Level::where('id', 1)->first();

        User::create([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'invite_code' => $invite_code,
            'referrer_id' => $referrer->id,
            'status' => true,
            'password2' => $request->password2,
            'level_id' => $level->id,
        ]);

        return response()->json([
            'message' => __('mess.sign_up_success'),
        ], 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
