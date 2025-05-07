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

Route::get('/', [ProductController::class, 'index']);//pagina inicial

//Cadastrar
Route::get('/produtos/cadastrar', [ProductController::class, 'create']);//pagina
Route::post('/produtos', [ProductController::class, 'store']);//acao

//Exluir
Route::get('/produtos/excluir', [ProductController::class, 'deletePage']);//pagina
Route::delete('/produtos', [ProductController::class, 'destroy']);//acao

//Editar
Route::get('/produtos/editar', [ProductController::class, 'edit']);//pagina
Route::put('/produtos', [ProductController::class, 'update']);//acao

//Listar
Route::get('/produtos/listar', [ProductController::class, 'showList']);//pagina
Route::delete('/produtos/listar', [ProductController::class, 'destroyFromList']);//acao deletar pelo botao da lista

//Restaurar
Route::get('/produtos/restaurar', [ProductController::class, 'restorePage']);//pagina
Route::post('/produtos/restaurar', [ProductController::class, 'restore']);//acao

//Mostrar produto especifico
Route::get('/produtos/produto/{id?}', [ProductController::class, 'show']);

