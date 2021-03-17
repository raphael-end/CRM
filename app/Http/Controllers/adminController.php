<?php

namespace App\Http\Controllers;

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

        //select users a ligar
        $ligar = "ligar";
        
        $status = DB::table('tarefas')->inRandomOrder()->select('id_cliente')->where('status',$ligar)->limit(1)->get();
        
        if(!isset($status[0])){
             $clientePendencia = "";
        }else{
             $clientePendencia = DB::table('cliente')->select('id', 'nome', 'telefone')->where('id', $status[0]->id_cliente)->get(); 
        }
        

        return view('dashboard',['data'=>$data, 'clientQuant'=>$clientQuant, 'valor_total'=>$valor_total, 'novosClientes'=>$novosClientes, 'clientePendencia'=>$clientePendencia]);
    }

    public function deletePendencia(){

        $id = $_GET['id'];


        DB::table('tarefas')->where('id_cliente',$id)->update(['status'=>"ligado"]);
        



        return view('deletePendencia');
    }

   
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



        return view('vendas', ['data'=>$data, 'clientQuant'=>$clientQuant, 'valors_total'=>$valors_total, 'valor_total'=>$valor_total, 'valor_custo'=>$valor_custo, 'valors_custo'=>$valors_custo, 'liq'=>$liq, 'mes'=>$mes, 'clientsQuant'=>$clientsQuant]);

    }

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
        


    
    public function cadastroDeCliente(Request $request){
        $id = $_GET['id'];
        $clientes2 = DB::table('cliente')->get()->where('id',$id);
        return view('newCliente');
    }
    public function storeCliente(Request $request){

     

        $data['nome'] = $request->get('nome');
        $data['email'] = $request->get('email');
        $data['telefone'] = $request->get('telefone');
        $data['endereco'] = $request->get('endereco');
        $data['cpf'] = $request->get('cpf');
        $data['aparelho'] = $request->get('aparelho');


        DB::table('cliente')->insert($data);
        Alert::success('Sucesso', 'Usuario cadastrado com sucesso');
        return redirect()->back();
    }

    public function estoque(Request $request){
        $produto = DB::table('produto')->get();
        $data["produtos"] = $produto;

        return view('estoque',["data"=>$data]);
    }


    public function storeProduto(Request $request){
        $data['nome'] = $request->get('nome');
        $data['quantidade'] = $request->get('quantidade');
        $data['preco'] = $request->get('preco');

        DB::table('produto')->insert($data);
        Alert::success('Sucesso', 'Produto cadastrado com sucesso');
        return redirect()->back();
    }
    public function produto(){

        return view('newProduto');
    }
    public function user(){

        return view('newuser');
    }
    public function storeUser(Request $request){
        $data['nome'] = $request->get('nome');
        $data['login'] = $request->get('login');
        $data['senha'] = $request->get('senha');
        $data['tipo'] = $request->get('tipo');


        DB::table('usuario')->insert($data);

        return redirect()->back();
    }

    public function logar(Request $request){

        
        // dd($request->input());
        $login = $request->login;
        $senha = $request->senha;       
        
        if(empty($login) || empty($senha)){
            return redirect()->route("admin.index");
        }

        $query = DB::table('usuario')->select('login','senha')->where('login',$login)->where('senha',$senha)->get();

        $row = $query->count();

        if($row == 1){
            session()->put("isAdmin",true);
            return redirect()->route("admin.index");
        }else{
            alert()->error('Erro!','Usuario ou senha incorretos!');
            return redirect()->back();
        }

        // $loginHash =  DB::table('usuarios')->select('login')->where('login',$login);
        // $senhasHash = DB::table('usuarios')->select('senha')->where('senha',$senha);
        // dd($loginHash);
        // // criando a hash
        // // $senha = 'admin';
        // // $senha =  Hash::make($senha);
        
        // // dd($senha);
        
        // // LOGAR COM HASH
        // if($login == $loginHash && Hash::check($senha, $senhasHash)){

        //     session()->put("isAdmin",true);
        //     return redirect()->route("admin.index");
            

        // }else{

        //     alert()->error('Erro!','Erro ao logar!');
        //     return redirect()->back(); 

        // }
    }
    public function sair(){

        session()->forget('isAdmin');

        return redirect()->route("home");
    }

}
