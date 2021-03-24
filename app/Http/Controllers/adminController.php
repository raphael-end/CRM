<?php

namespace App\Http\Controllers;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isEmpty;

class adminController extends Controller
{
    public $nome_cliente;


    public function index(Request $request){

        //listando clientes
        $clientes = DB::table('cliente')->paginate(5);
        $data["clientes"] = $clientes;        
        $clientQuant = DB::table('cliente')->count();

        //somando o balanço geral
        $vendas = DB::table('tarefas')->select('valorRep')->get();
        $valor_total = $vendas->sum('valorRep');

        //novos clientes
        $novosClientes['novos'] = DB::table('cliente')->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->count();
        $novosClientes['novoslist'] = DB::table('cliente')->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->get();

        //novos clientes
        $novosClientes['novasTarefas'] = DB::table('tarefas')->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->count();
        $novosClientes['novasTarefasList'] = DB::table('tarefas')->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->get();

        //select users a ligar 2
        $ligar = "agendado";
        $now = date('d/m/Y');
        
        $status = DB::table('agendamento')->inRandomOrder()->select('idagendamento', 'idcliente', 'telefone_cliente', 'data_agendamento', 'status_agendamento', 'nome_cliente')->where('data_agendamento',$now)->where('status_agendamento',$ligar)->limit(1)->get();

        if(!isset($status[0])){
            $status = "";
       }

        // //select users a ligar
        // $ligar = "ligar";
        
        // //$status = DB::table('tarefas')->inRandomOrder()->select('id_cliente')->where('status',$ligar)->limit(1)->get();

        // $status = DB::table('tarefas')->inRandomOrder()->select('id_cliente','prazo')->where('status',$ligar)->limit(1)->get();

        
        
        // if(!isset($status[0])){
        //      $clientePendencia = "";
        // }else{
        //      $clientePendencia = DB::table('cliente')->select('id', 'nome', 'telefone')->where('id', $status[0]->id_cliente)->get(); 
        //      $prazo = (string)$status[0]->prazo;
             
        // }
        

        return view('dashboard',['data'=>$data, 'clientQuant'=>$clientQuant, 'valor_total'=>$valor_total, 'novosClientes'=>$novosClientes, 'status'=>$status]);
    }

    public function deletePendencia(){

        $id = $_GET['id'];


        DB::table('agendamento')->where('idagendamento',$id)->update(['status_agendamento'=>"concluido"]);
     


        return view('deletePendencia');
    }




    // VENDAS AREA
    public function vendas(){

         //listando clientes
         $clientes = DB::table('cliente')->get();
         $data["clientes"] = $clientes;        
         $clientQuant = DB::table('cliente')->count();
 
         //somando o balanço geral
         $vendas = DB::table('tarefas')->select('valorRep' , 'custoRep')->get();
         $valor_total = $vendas->sum('valorRep');
         $valor_custo = $vendas->sum('custoRep');
         $liq = $valor_total - $valor_custo;


         //janeiro
         $mes['janeiro'] = DB::table('tarefas')->select('valorRep' , 'custoRep')->whereMonth('created_at', '1')->get();
         $valors_total['janeiro'] = $mes['janeiro']->sum('valorRep');
         $valors_custo['janeiro'] = $mes['janeiro']->sum('custoRep');

         $clientsQuant['janeiro'] = DB::table('cliente')->whereMonth('created_at', '1')->count();


         //fevereiro
         $mes['fevereiro'] = DB::table('tarefas')->select('valorRep' , 'custoRep')->whereMonth('created_at', '2')->get();
         $valors_total['fevereiro'] = $mes['fevereiro']->sum('valorRep');
         $valors_custo['fevereiro'] = $mes['fevereiro']->sum('custoRep');

         $clientsQuant['fevereiro'] = DB::table('cliente')->whereMonth('created_at', '2')->count();

         //marco
         $mes['marco'] = DB::table('tarefas')->select('valorRep' , 'custoRep')->whereMonth('created_at', '3')->get();
         $valors_total['marco'] = $mes['marco']->sum('valorRep');
         $valors_custo['marco'] = $mes['marco']->sum('custoRep');

         $clientsQuant['marco'] = DB::table('cliente')->whereMonth('created_at', '3')->count();
         //abril
         $mes['abril'] = DB::table('tarefas')->select('valorRep' , 'custoRep')->whereMonth('created_at', '4')->get();
         $valors_total['abril'] = $mes['abril']->sum('valorRep');
         $valors_custo['abril'] = $mes['abril']->sum('custoRep');

         $clientsQuant['abril'] = DB::table('cliente')->whereMonth('created_at', '4')->count();
         //maio
         $mes['maio'] = DB::table('tarefas')->select('valorRep' , 'custoRep')->whereMonth('created_at', '5')->get();
         $valors_total['maio'] = $mes['maio']->sum('valorRep');
         $valors_custo['maio'] = $mes['maio']->sum('custoRep');

         $clientsQuant['maio'] = DB::table('cliente')->whereMonth('created_at', '5')->count();
         //junho
         $mes['junho'] = DB::table('tarefas')->select('valorRep' , 'custoRep')->whereMonth('created_at', '6')->get();
         $valors_total['junho'] = $mes['junho']->sum('valorRep');
         $valors_custo['junho'] = $mes['junho']->sum('custoRep');

         $clientsQuant['junho'] = DB::table('cliente')->whereMonth('created_at', '6')->count();
         //julho
         $mes['julho'] = DB::table('tarefas')->select('valorRep' , 'custoRep')->whereMonth('created_at', '7')->get();
         $valors_total['julho'] = $mes['julho']->sum('valorRep');
         $valors_custo['julho'] = $mes['julho']->sum('custoRep');

         $clientsQuant['julho'] = DB::table('cliente')->whereMonth('created_at', '7')->count();



        return view('vendas', ['data'=>$data, 'clientQuant'=>$clientQuant, 'valors_total'=>$valors_total, 'valor_total'=>$valor_total, 'valor_custo'=>$valor_custo, 'valors_custo'=>$valors_custo, 'liq'=>$liq, 'mes'=>$mes, 'clientsQuant'=>$clientsQuant]);

    }






    // TAREFAS AREA
    public function tarefas(){

        $id = $_GET['id'];
        
        $clientes = DB::table('tarefas')->get()->where('id_cliente',$id);
        $clientes2 = DB::table('cliente')->get()->where('id',$id);
        $clientes3 = DB::table('produto')->get();

        $name = DB::table('cliente')->get()->where('id',$id);
        
        foreach ($name as $names) {
           $user['nome'] =  $names->nome;
           $user['email'] = $names->email;
           $user['tel'] = $names->telefone;
           $user['endereco'] = $names->endereco;
           $user['cpf'] = $names->cpf;
           $user['aparelho'] = $names->aparelho;
        }

        

        $data["tarefas"] = $clientes;
        $data["cliente"] = $clientes2;
        $data["produtos"] = $clientes3;

        return view('tarefas',['data'=>$data, 'id'=>$id, 'user'=>$user]);
    }
    public function storeTarefas(Request $request){

        $data['id_cliente'] = $request->get('id_cliente');
        $data['nomeAtv'] = $request->get('nomeAtv');
        $data['valorRep'] = $request->get('valorRep');
        $data['custoRep'] = $request->get('custoRep');
        $data['nota'] = $request->get('nota');
        $status = 'ligar';
        $data['status'] = $status;
        $data['prazo'] = $request->get('date');
        $data['produtoUsado'] = $request->get('produtos');

        if($request->file('arquivo')->isValid()) {

            (string)$nameArquivo =  $request->id_cliente . '.' . $request->arquivo->getClientOriginalName();

            $query = DB::table('tarefas')->select('documento')->where('documento',(string)$nameArquivo);
            $row = $query->count();

            if( $row == 1){
                alert()->error('Erro!','Já existe um documento com este nome!');
                return redirect()->back();
            }
            else{
                $request->file('arquivo')->storeAs('files', $nameArquivo);
                $data['documento'] = (string)$nameArquivo;

                $data2 = $request->get('produtos');

                $custo = DB::table('produto')->select('quantidade')->where('nome',$data2)->get();
        
                $alg = ($custo[0]->quantidade) - 1;
                
                DB::table('produto')->where('nome',$data2)->update(['quantidade'=>$alg]);
                DB::table('tarefas')->insert($data);
                Alert::success('Sucesso', 'Tareda cadastrada com sucesso');
                return redirect()->back(); 
    }
            }
            
        }
        
    //AGENDAMENTOS
    public function agendamento(){
        $id = $_GET['id'];
        
        $clientes = DB::table('tarefas')->get()->where('id_cliente',$id);
        $clientes2 = DB::table('cliente')->get()->where('id',$id);
        $clientes3 = DB::table('produto')->get();

        $name = DB::table('cliente')->get()->where('id',$id);
        
        foreach ($name as $names) {
           $user['nome'] =  $names->nome;
           $user['email'] = $names->email;
           $user['tel'] = $names->telefone;
           $user['endereco'] = $names->endereco;
           $user['cpf'] = $names->cpf;
           $user['aparelho'] = $names->aparelho;
        }

        

        $data["tarefas"] = $clientes;
        $data["cliente"] = $clientes2;
        $data["produtos"] = $clientes3;
        return view('agendamentos',['data'=>$data, 'id'=>$id, 'user'=>$user]);
    }
    public function storeAgendamento(Request $request){
        
        $data['idcliente'] = $request->get('id_cliente');    
        $data['nome_cliente'] = $request->get('nomec');
        $data['telefone_cliente'] = $request->get('telefone_cliente');
        $data['data_agendamento'] = $request->get('date'); 
        $data['data_agendamento'] = date('d/m/Y',  strtotime($data['data_agendamento'])); 
        $data['status_agendamento'] = "agendado";

        DB::table('agendamento')->insert($data);
        
        Alert::success('Sucesso', 'Agendado com sucesso');
        return redirect()->back();
        
    }


    // CLIENTES AREA
    public function alteraCliente(Request $request){

        $id = $request->get('id');

        $data['nome'] = $request->get('nome');
        $data['email'] = $request->get('email');
        $data['telefone'] = $request->get('telefone');
        $data['endereco'] = $request->get('endereco');
        $data['cpf'] = $request->get('cpf');
        $data['aparelho'] = $request->get('aparelho');

        DB::table('cliente')->where('id',$id)->update(['nome'=>$data['nome'], 'email'=>$data['email'], 'telefone'=>$data['telefone'], 
                                                       'endereco'=>$data['endereco'], 'cpf'=>$data['cpf'], 'aparelho'=>$data['aparelho']]);

        Alert::success('Sucesso', 'Alterado com sucesso');
        return redirect()->route('admin.index');
    }
    public function alteraClienteView(){

        $id = $_GET['id'];

        $clientes = DB::table('cliente')->get()->where('id',$id);

        $data['clientes'] = $clientes;
       

        return view('alteraCliente',['data'=>$data, 'id'=>$id]);
    }
    public function storeCliente(Request $request){

     

        $data['nome'] = $request->get('nome');
        $data['email'] = $request->get('email');
        $data['telefone'] = $request->get('telefone');
        $data['endereco'] = $request->get('endereco');
        $data['cpf'] = $request->get('cpf');
        $data['aparelho'] = $request->get('aparelho');


        DB::table('cliente')->insert($data);
        Alert::success('Sucesso', 'Usuario alterado com sucesso');
        return redirect()->back();
    }
    public function deletaCliente(){

        $id = $_GET['id'];

        DB::table('cliente')->where('id',$id)->delete();
        Alert::success('Sucesso', 'Usuario deletado com sucesso');
        return redirect()->back();

    }






    // PRODUTOS AREA
    public function estoque(Request $request){
        $produto = DB::table('produto')->get();
        $data["produtos"] = $produto;

        return view('estoque',["data"=>$data]);
    }

    public function deletaProduto(){
        $id = $_GET['id'];

        DB::table('produto')->where('id',$id)->delete();
        Alert::success('Sucesso', 'Produto deletado com sucesso');
        return redirect()->back();

    }

    public function storeProduto(Request $request){
        $data['nome'] = $request->get('nome');
        $data['quantidade'] = $request->get('quantidade');
        $data['preco'] = $request->get('preco');

        DB::table('produto')->insert($data);
        Alert::success('Sucesso', 'Produto cadastrado com sucesso');
        return redirect()->back();
    }
    public function alteraProdutoView(){

        $id = $_GET['id'];

        $produtos = DB::table('produto')->get()->where('id',$id);

        $data['produtos'] = $produtos;
        

        return view('newProduto',['data'=>$data,'id'=>$id]);

    }
    public function alteraProduto(Request $request){

        $id = $request->get('id');
   
        $data['nome'] = $request->get('nome');
        $data['quantidade'] = $request->get('quantidade');
        $data['preco'] = $request->get('preco');


        DB::table('produto')->where('id',$id)->update(['nome'=>$data['nome'], 'quantidade'=>$data['quantidade'], 'preco'=>$data['preco']]);
        
        Alert::success('Sucesso', 'Produto alterado com sucesso');
        return redirect()->route('admin.estoque');
    }
    public function pesquisaProduto(){

        if(!(isset($_GET['pesquisa']))) {
            $produto = DB::table('produto')->get();
            $data["produtos"] = $produto;        
        }else{
            $pesquisa = str_replace('-', ' ', $_GET['pesquisa']);
            $produto = DB::table('produto')->where('nome', 'like', $pesquisa .'%')->get();
            $data["produtos"] = $produto;
        }

        return view('pesquisaProduto',["data"=>$data]);
    }

    public function user(){

        return view('newuser');
    }


    //PESQUISA
    public function pesquisa(){
        //listando clientes
        
        if(!(isset($_GET['pesquisa']))) {
            $clientes = DB::table('cliente')->get();
            $data["clientes"] = $clientes;        
        }else{
            $pesquisa = str_replace('-', ' ', $_GET['pesquisa']);
            $clientes = DB::table('cliente')->where('nome', 'like', $pesquisa .'%')->get();
            $data["clientes"] = $clientes;
        }

        return view('pesquisa',['data'=>$data]);
    }


    // USER AREA
    public function storeUser(Request $request){
        $data['nome'] = $request->get('nome');
        $data['login'] = $request->get('login');
        $data['senha'] = Hash::make($request->get('senha'));
        $data['tipo'] = $request->get('tipo');


        DB::table('usuario')->insert($data);

        return redirect()->back();
    }

    public function logar(Request $request){

        
        // dd($request->input());
        $login = $request->login;
        $senha = $request->senha;       

        $query = "SELECT idusuario, nome, login, senha, tipo FROM usuario WHERE login='$login'";
    
        $queryUser = DB::selectOne($query); 

        
        if(!$queryUser) {
            alert()->error('Erro!','Usuario incorreto!');
            return redirect()->back();
        }

        if(!(Hash::check($senha, $queryUser->senha))) {
            alert()->error('Erro!','Senha incorreta!');
            return redirect()->back();
        }

        session()->put('usuario', ['idusuario' => $queryUser->idusuario, 'login' => $queryUser->login, 'tipo' => $queryUser->tipo]);

        return redirect()->route("admin.index");



        // if(empty($login) || empty($senha)){
        //     return redirect()->route("admin.index");
        // }

        // $query = DB::table('usuario')->select('login','senha')->where('login',$login)->where('senha',$senha)->get();

        // $row = $query->count();

        // if($row == 1){
        //     session()->put("isAdmin",true);
        //     return redirect()->route("admin.index");
        // }else{
        //     alert()->error('Erro!','Usuario ou senha incorretos!');
        //     return redirect()->back();
        // }




    }
    public function sair(){

        session()->forget('isAdmin');

        return redirect()->route("home");
    }

}
