<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


class PasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function passwordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'title' => 'Reset Password',
            'active' => 'login'
        ]);
    }

    public function passwordVerify(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function processChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8',
            'repeat_password' => 'required|min:8|same:new_password',
        ]);
    
        
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back();
            // return dd('gagal');
        }

        if ($request->new_password != $request->repeat_password) {
            return back();
            // return dd('gagal');
        }

        auth()->user()->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect('profile')->with('success', 'Your password has been changed successfully');
    }
}
