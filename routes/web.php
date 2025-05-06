<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/produtos/cadastrar', [ProductController::class, 'cadastrar']);
Route::post('/produtos', [ProductController::class, 'store']);

Route::get('/produtos/excluir', [ProductController::class, 'excluir']);
Route::delete('/produtos', [ProductController::class, 'destroy']);

Route::get('/produtos/editar', [ProductController::class, 'editar']);
Route::put('/produtos', [ProductController::class, 'editarProduto']);

Route::get('/produtos/produto/{id?}', [ProductController::class, 'listarProduto']);

Route::get('/produtos/listar', [ProductController::class, 'listar']);

Route::get('/produtos/restaurar', [ProductController::class, 'restaurar']);
Route::post('/produtos/restaurar', [ProductController::class, 'restaurarProduto']);

