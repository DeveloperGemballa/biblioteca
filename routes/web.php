<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\EmprestimosController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('contatos/buscar',[ContatosController::class,'buscar']);
Route::resource('/contatos',ContatosController::class);

Route::get('livros/buscar',[LivrosController::class,'buscar']);
Route::resource('/livros',LivrosController::class,);

Route::get('emprestimos/buscar',[LivrosController::class,'buscar']);
Route::put('emprestimos/{emprestimo}/devolver',[EmprestimosController::class,'devolver'])->name('emprestimos.devolver');
Route::resource('/emprestimos',EmprestimosController::class,);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
