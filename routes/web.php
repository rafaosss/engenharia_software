<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas web para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider dentro de um grupo que
| contém o middleware "web". Agora vamos criar algo incrível!
|
*/

// Rota raiz redirecionando conforme a autenticação 
Route::get('/', function () {
    if (Auth::check()) {
        // Usuário autenticado, redireciona para a lista de produtos
        return redirect()->route('products.index');
    } else {
        // Usuário não autenticado, redireciona para a tela de login
        return redirect()->route('login');
    }
});

// Rotas de autenticação
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas pelo middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Rotas de produtos
    Route::resource('products', ProductController::class);

    // Rotas de categorias
    Route::resource('categories', CategoryController::class);
});
