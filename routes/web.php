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

Route::prefix("admin")->middleware("role:admin,funcionario")->name('admin.')->group(function(){
    
    /* -------------------------------------- admin -------------------------------------- */

    Route::get('/', [App\Http\Controllers\adminController::class, 'index'])->name("index");

    /* -------------------------------------- pesquisa -------------------------------------- */

    Route::get('/pesquisaproduto', [App\Http\Controllers\adminController::class, 'pesquisaProduto'])->name("pesquisaProduto");
    Route::get('/pesquisa', [App\Http\Controllers\adminController::class, 'pesquisa'])->name("pesquisa");
    
    /* --------------------------------------  tarefas -------------------------------------- */
    Route::get('/cliente', [App\Http\Controllers\adminController::class, 'tarefas'])->name("tarefas");
    Route::post('/cadastro/tarefas/sucess', [App\Http\Controllers\adminController::class, 'storeTarefas'])->name("storeTarefas");
    Route::get('/dowload', [App\Http\Controllers\adminController::class, 'dowload'])->name("dowload");

    /* -------------------------------------- clientes cadastro -------------------------------------- */
    //cadastra
    Route::post('/cadastro/cliente/sucess', [App\Http\Controllers\adminController::class, 'storeCliente'])->name("storeCliente");
    //altera
    Route::get('/alteracao/cliente', [App\Http\Controllers\adminController::class, 'alteraClienteView'])->name("alteraClienteView");
    Route::post('/alteracao/cliente/sucess', [App\Http\Controllers\adminController::class, 'alteraCliente'])->name("alteraCliente");
    //exclui
    Route::get('/deletaCliente', [App\Http\Controllers\adminController::class, 'deletaCliente'])->name("deletaCliente");

    /* -------------------------------------- Estoque -------------------------------------- */
    Route::get('/estoque', [App\Http\Controllers\adminController::class, 'estoque'])->name("estoque");
    Route::post('/cadastro/produto/sucess', [App\Http\Controllers\adminController::class, 'storeProduto'])->name("storeProduto");
    Route::get('/produto', [App\Http\Controllers\adminController::class, 'produto'])->name("produto");
    //altera
    Route::get('/alteracao/produto', [App\Http\Controllers\adminController::class, 'alteraProdutoView'])->name("alteraProdutoView");
    Route::post('/alteracao/produto/sucess', [App\Http\Controllers\adminController::class, 'alteraProduto'])->name("alteraProduto");
    //exclui
    Route::get('/deletaProduto', [App\Http\Controllers\adminController::class, 'deletaProduto'])->name("deletaProduto");

    
  
    /* -------------------------------------- warnings -------------------------------------- */
    Route::post('/agendamento/sucess', [App\Http\Controllers\adminController::class, 'storeAgendamento'])->name("storeAgendamento");
    Route::get('/agendamento', [App\Http\Controllers\adminController::class, 'agendamento'])->name("agendamento");

    /* -------------------------------------- warnings -------------------------------------- */

    Route::get('/deletePendencia', [App\Http\Controllers\adminController::class, 'deletePendencia'])->name("deletePendencia");
 
});

Route::prefix("admin")->middleware("role:admin")->name('admin.')->group(function(){
      /* -------------------------------------- user -------------------------------------- */
      Route::get('/novoUsuario', [App\Http\Controllers\adminController::class, 'user'])->name("user");
      Route::post('/cadastro/user/sucess', [App\Http\Controllers\adminController::class, 'storeUser'])->name("newUser");
  

    /* -------------------------------------- Estoque -------------------------------------- */
    Route::get('/vendas', [App\Http\Controllers\adminController::class, 'vendas'])->name("vendas");

});

Route::get('/sair', [App\Http\Controllers\AdminController::class, 'sair'])->name("sair");
Route::post('/logar', [App\Http\Controllers\AdminController::class, 'logar'])->name("logar");