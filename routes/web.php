<?php
use App\Http\Controllers\adminController\tarefas;
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
Route::get('/login', function(){
    return view('login');
})->name("login");

Route::get('/', function(){
    return view('landingpage');
})->name("lp");

Route::prefix("admin")->middleware("check.is.admin")->name('admin.')->group(function(){
    
    /* -------------------------------------- admin -------------------------------------- */
    Route::get('/', [App\Http\Controllers\adminController::class, 'index'])->name("index");

    /* --------------------------------------  tarefas -------------------------------------- */
    Route::get('/cliente', [App\Http\Controllers\adminController::class, 'tarefas'])->name("tarefas");
    Route::post('/cadastro/tarefas/sucess', [App\Http\Controllers\adminController::class, 'storeTarefas'])->name("storeTarefas");

    /* -------------------------------------- clientes cadastro -------------------------------------- */
    Route::get('/alteracao/cliente', [App\Http\Controllers\adminController::class, 'cadastroDeCliente'])->name("alteraCliente");
    Route::post('/cadastro/cliente/sucess', [App\Http\Controllers\adminController::class, 'storeCliente'])->name("storeCliente");

    /* -------------------------------------- Estoque -------------------------------------- */
    Route::get('/estoque', [App\Http\Controllers\adminController::class, 'estoque'])->name("estoque");
    Route::post('/cadastro/produto/sucess', [App\Http\Controllers\adminController::class, 'storeProduto'])->name("storeProduto");
    Route::get('/produto', [App\Http\Controllers\adminController::class, 'produto'])->name("produto");

    /* -------------------------------------- Estoque -------------------------------------- */
    Route::get('/vendas', [App\Http\Controllers\adminController::class, 'vendas'])->name("vendas");

    /* -------------------------------------- user -------------------------------------- */
    Route::get('/novoUsuario', [App\Http\Controllers\adminController::class, 'user'])->name("user");
    Route::post('/cadastro/user/sucess', [App\Http\Controllers\adminController::class, 'storeUser'])->name("newUser");


    /* -------------------------------------- warnings -------------------------------------- */

    Route::get('/deletePendencia', [App\Http\Controllers\adminController::class, 'deletePendencia'])->name("deletePendencia");
 
});

Route::get('/sair', [App\Http\Controllers\AdminController::class, 'sair'])->name("sair");
Route::post('/logar', [App\Http\Controllers\AdminController::class, 'logar'])->name("logar");