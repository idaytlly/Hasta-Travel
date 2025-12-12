<?php [cite: 65]

namespace App\Http\Controllers\Auth; [cite: 66]

use App\Http\Controllers\Controller; [cite: 67]
use Illuminate\Http\Request; [cite: 68]
use Illuminate\Support\Facades\Auth; [cite: 69]

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user-login'); [cite: 74]
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email', [cite: 79]
            'password' => 'required|min:6', [cite: 80]
        ]);

        $credentials = [
            'email' => $request->email, [cite: 84]
            'password' => $request->password, [cite: 85]
            'user_type' => 'user' [cite: 86] // Enforce user type check
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); [cite: 88]
            return redirect()->intended('/user/dashboard'); [cite: 89]
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.', [cite: 93]
        ])->withInput($request->only('email')); [cite: 94]
    }

    public function logout(Request $request)
    {
        Auth::logout(); [cite: 97]
        $request->session()->invalidate(); [cite: 98]
        $request->session()->regenerateToken(); [cite: 99]

        return redirect('/login/user'); [cite: 101]
    }
}