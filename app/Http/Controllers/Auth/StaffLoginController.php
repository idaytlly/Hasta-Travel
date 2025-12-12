<?php [cite: 108]

namespace App\Http\Controllers\Auth; [cite: 109]

use App\Http\Controllers\Controller; [cite: 110]
use Illuminate\Http\Request; [cite: 111]
use Illuminate\Support\Facades\Auth; [cite: 112]

class StaffLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.staff-login'); [cite: 117]
    }

    public function login(Request $request)
    {
        $request->validate([
            'staff_id' => 'required', [cite: 122]
            'password' => 'required|min:6', [cite: 123]
        ]);

        $credentials = [
            // Assuming staff_id input field maps to the 'email' column
            'email' => $request->staff_id, [cite: 128]
            'password' => $request->password, [cite: 129]
            'user_type' => 'staff' [cite: 130] // Enforce staff type check
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); [cite: 133]
            return redirect()->intended('/staff/dashboard'); [cite: 134]
        }

        return back()->withErrors([
            'staff_id' => 'The provided credentials do not match our records.', [cite: 136]
        ])->withInput($request->only('staff_id')); [cite: 137]
    }

    public function logout(Request $request)
    {
        Auth::logout(); [cite: 140]
        $request->session()->invalidate(); [cite: 141]
        $request->session()->regenerateToken(); [cite: 142]

        return redirect('/login/staff'); [cite: 143]
    }
}