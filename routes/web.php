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
    Route::get('/filtro', [App\Http\Controllers\adminController::class, 'filtro'])->name("filtro");

    /* -------------------------------------- pesquisa -------------------------------------- */

    Route::get('/pesquisaproduto', [App\Http\Controllers\adminController::class, 'pesquisaProduto'])->name("pesquisaProduto");
    Route::get('/pesquisa', [App\Http\Controllers\adminController::class, 'pesquisa'])->name("pesquisa");

    /* --------------------------------------  vendas -------------------------------------- */
    Route::get('/controlevendas', [App\Http\Controllers\adminController::class, 'controlevendas'])->name("controlevendas");
    
    //cadastro de venda
    Route::get('/novaVenda', [App\Http\Controllers\adminController::class, 'novaVenda'])->name("novaVenda");
    
    // Route::post('/cadastro/venda/sucess', [App\Http\Controllers\adminController::class, 'storeVenda'])->name("storeVenda");

    //delete venda
    Route::get('/deletaVenda', [App\Http\Controllers\adminController::class, 'deletaVenda'])->name("deletaVenda");
    
    //cadastro de serviço
    // Route::post('/cadastro/servico/sucess', [App\Http\Controllers\adminController::class, 'storeServico'])->name("storeServico");

    Route::get('/linhadotempo', [App\Http\Controllers\adminController::class, 'linhadotempo'])->name("linhadotempo");
    Route::post('/nota', [App\Http\Controllers\adminController::class, 'nota'])->name("nota");
    Route::get('/deleteNota', [App\Http\Controllers\adminController::class, 'deleteNota'])->name("deleteNota");


    Route::get('/deletaServico', [App\Http\Controllers\adminController::class, 'deletaServico'])->name("deletaServico");
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

    Route::post('/agendamento2/sucess', [App\Http\Controllers\adminController::class, 'storeAgendamento2'])->name("storeAgendamento2");
    Route::get('/agendamentos2', [App\Http\Controllers\adminController::class, 'agendamento2'])->name("agendamento2");

    Route::post('/agendamento3/sucess', [App\Http\Controllers\adminController::class, 'storeAgendamento3'])->name("storeAgendamento3");
    Route::get('/agendamentos3', [App\Http\Controllers\adminController::class, 'agendamento3'])->name("agendamento3");

    
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

Route::get('/sair', [App\Http\Controllers\adminController::class, 'sair'])->name("sair");
Route::post('/logar', [App\Http\Controllers\adminController::class, 'logar'])->name("logar");

Route::post('refreshProduto', '\App\Http\Controllers\adminController@refreshProduto');
Route::post('refreshServico', '\App\Http\Controllers\adminController@refreshServico');
Route::post('storeVenda', '\App\Http\Controllers\adminController@storeVenda');
Route::post('storeServico', '\App\Http\Controllers\adminController@storeServico');