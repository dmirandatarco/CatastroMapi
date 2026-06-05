<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class LoginController extends Controller
{   
    public function showLoginForm(){
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('usuario', 'password');
        $user = User::where('usuario', $request->usuario)->first();

        if ($user && $user->session_id) {
            \Session::getHandler()->destroy($user->session_id);
            $user->session_id = null;
            $user->save();
        }
        if (Auth::attempt($credentials)) {
            if (Auth::user()->estado == 1) {
                $user->session_id = session()->getId();
                $user->save();

                return redirect()->intended('dashboard');
            } else {
                Auth::logout();
                return back()->withErrors(['usuario' => 'El usuario no está activo.']);
            }
        }

        return back()->withErrors(['usuario' => trans('auth.failed')])
            ->withInput($request->only('usuario'));
    }

    public function logout(Request $request){
        $user = Auth::user();
        if ($user) {
            $user->session_id = null; // Limpia el ID de la sesión
            $user->save();
        }

        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
