<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('vistaLogin');
    }

    public function login(Request $request)
    {
        // Intentamos autenticar con los datos recibidos
        $credenciales = [
            'login' => $request->login,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciales)) {
            // Por seguridad, regeneramos la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirección según el rol del usuario
            if ($user->tipo == 'administrador') {
                return redirect('/Admin');
            } elseif ($user->tipo == 'recepcionista') {
                return redirect('/Recepcion');
            } elseif ($user->tipo == 'veterinario') {
                return redirect('/Consulta');
            }
        }

        // Si falla, volvemos atrás con un mensaje de error y manteniendo el login introducido
        return back()->withErrors(['error' => 'Credenciales incorrectas o usuario inexistente'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidamos la sesión y el token CSRF por seguridad
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
