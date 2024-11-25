<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processar login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'senha');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('products');
        }
    
        return redirect()->back()->withErrors(['email' => 'Credenciais inválidas.']);
    }
    

    // Mostrar formulário de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Processar registro
    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:users',
            'senha' => 'required|confirmed|min:6',
        ]);

        // Criação do usuário
        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'role_id' => 1, // Defina o role_id apropriado
        ]);

        // Login automático após registro
        Auth::login($user);

        return redirect()->route('products.index');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
