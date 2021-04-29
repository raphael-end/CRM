<?php

namespace App\Http\Controllers;

use DateTime;
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

    

        //novos clientes
        $novosClientes['novos'] = DB::table('cliente')->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->count();
        $novosClientes['novoslist'] = DB::table('cliente')->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->get();

        //novos clientes
        $novosClientes['novasTarefas'] = DB::table('tarefas')->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->count();
        $novosClientes['novasTarefasList'] = DB::table('tarefas')->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)')->get();

        //select users a ligar 2
        
        date_default_timezone_set('America/Sao_Paulo');
        $ligar = "agendado";
        $now = date('d/m/Y');

        $status = DB::table('agendamento')->inRandomOrder()->select('idagendamento', 'idcliente', 'telefone_cliente', 'data_agendamento', 'status_agendamento', 'nome_cliente')->where('data_agendamento',$now)->where('status_agendamento',$ligar)->limit(1)->get();

        if(!isset($status[0])){
            $status = "";
       }

       $now2 = date('Y-m');
       $now3 = date('Y-m-d');

       //clientesdomes/dia
       $card['novosClientesMes'] = DB::table('cliente')->where('created_at', 'like', $now2 .'%')->count();
       $card['novosClientesDia'] = DB::table('cliente')->where('created_at', 'like', $now3 .'%')->count();

       //BALANÇOSMÊS - venda

       //VALOR
       $card['balanco'] = DB::table('venda')->select('preco')->where('created_at', 'like', $now2 .'%')->get();
       $card['balanco2'] = DB::table('servico')->select('valor')->where('created_at', 'like', $now2 .'%')->get();
       //BALANÇOSMÊS GERAL
       $valor_total['geral'] = $card['balanco']->sum('preco') + $card['balanco2']->sum('valor');

       //CUSTO
       $card['balanco'] = DB::table('venda')->select('custo')->where('created_at', 'like', $now2 .'%')->get();
       $card['balanco2'] = DB::table('servico')->select('custo')->where('created_at', 'like', $now2 .'%')->get();
       //BALANÇOSMÊS GERAL
       $valor_total['custo'] = $card['balanco']->sum('custo') + $card['balanco2']->sum('custo');


       $valor_total['lucro'] = $valor_total['geral'] - $valor_total['custo'] ;

       //agendamentos
       $card['novosAgendamentosDia'] = DB::table('agendamento')->where('data_agendamento', 'like', $now .'%')->where('status_agendamento','agendado')->count();
       $card['novosAgendamentosDiaPaginete'] = DB::table('agendamento')->where('data_agendamento', 'like', $now .'%')->paginate(5);

       $data['sdate'] = $request->sday;
       $data['fdate'] = $request->fday;

       //CONSULTA NA ATIVIDADE
       if(isset($data['sdate']) && isset($data['fdate']) ){
            //BRUTO
            $query['query'] = DB::table('venda')->select('preco')->whereBetween('created_at', [$data['sdate'], $data['fdate']])->get();
            $query['query2'] = DB::table('servico')->select('valor')->whereBetween('created_at', [$data['sdate'], $data['fdate']])->get();
            $query['atvValor'] = $query['query']->sum('preco') + $query['query2']->sum('valor');

            //CUSTO
            $query['query'] = DB::table('venda')->select('custo')->whereBetween('created_at', [$data['sdate'], $data['fdate']])->get();
            $query['query2'] = DB::table('servico')->select('custo')->whereBetween('created_at', [$data['sdate'], $data['fdate']])->get();
            $query['atvCusto'] = $query['query']->sum('custo') + $query['query2']->sum('custo');
            
            //LUCRO
            $query['lucro'] = $query['atvValor'] - $query['atvCusto'];

            $venda = DB::table('venda')->select('id')->whereBetween('created_at', [$data['sdate'], $data['fdate']])->count();
            $servico = DB::table('servico')->select('id')->whereBetween('created_at', [$data['sdate'], $data['fdate']])->count();
            $query['atvt'] = $venda + $servico;
            $query['clientecount'] = DB::table('cliente')->select('id')->whereBetween('created_at', [$data['sdate'], $data['fdate']])->count();
            $query['agendamentoscount'] = DB::table('agendamento')->select('idagendamento')->whereBetween('created_at', [$data['sdate'], $data['fdate']])->count();
            

       }else{
            $query['atvValor'] = 0;
            $query['atvCusto'] = 0;
            $query['lucro'] = 0;
            $query['atvt'] = 0;
            $query['clientecount'] = 0;
            $query['agendamentoscount'] = 0;
       }

       //aniversario
       $now8 = date('d-m-Y');
  
       $niver = DB::table('cliente')->where('data_aniversario', $now8)->get();


       $min = DB::select("SELECT * FROM produto WHERE produto.quantidade < produto.estoqueMinimo");
       
        return view('dashboard',['data'=>$data,'card'=>$card, 'clientQuant'=>$clientQuant, 'valor_total'=>$valor_total, 'novosClientes'=>$novosClientes, 'status'=>$status, 'query'=>$query, 'niver'=>$niver, 'min'=>$min ]);
    }
    
    public function filtro(Request $request){

        $data['sdate'] = $request->sday;
        $data['fdate'] = $request->fday;


        //CONSULTA NA ATIVIDADE
        $query['query'] = DB::table('tarefas')->select('custoRep')->where('created_at', $data['sdate'])->get();
        $query['atvCusto'] = $query['query']->sum('custoRep');


        return redirect()->route("admin.index",['query'=>$query]);
    }

    

    public function deletePendencia(){

        $id = $_GET['id'];


        DB::table('agendamento')->where('idagendamento',$id)->update(['status_agendamento'=>"concluido"]);
     


        return view('deletePendencia');
    }

    public function controlevendas(){
        
        
        $data['produtos'] = DB::table('produto')->get();
        $data['cliente'] = DB::table('cliente')->get();

        

        return view('controlevendas',['data'=>$data]);
    }
    public function storeVenda(Request $request){
        $data['tipo'] = $request->tipo;
        $data['id_cliente'] = $request->id_cliente;
        $data['data_venda'] = $request->data_venda;
        $data['id_produto'] = $request->id_produto;
        $data['quantidade'] = $request->quantidade;

        $id = $data['id_cliente'];
        $idproduto = $data['id_produto'];
        //data nome
        $data['nome_cliente'] = DB::table('cliente')->select('nome')->where('id', $id)->get();
  
        $data['nome_cliente'] = $data['nome_cliente'][0]->nome;
        //data produto
        $data['preco'] = DB::table('produto')->select('preco')->where('id',$data['id_produto'])->get();

        $data['preco'] = $data['preco'][0]->preco * $data['quantidade'];

        $data['custo'] = DB::table('produto')->select('custo')->where('id',$data['id_produto'])->get();
        $data['custo'] = $data['custo'][0]->custo * $data['quantidade'];

        //controlando o estoque

        $quant = DB::table('produto')->select('quantidade')->where('id',$data['id_produto'])->get();

        
        $alg = ($quant[0]->quantidade) - $data['quantidade'];
                
        DB::table('produto')->where('id',$data['id_produto'])->update(['quantidade'=>$alg]);
        
        $idInsert = DB::table('venda')->insertGetId($data);

        $selectNewVendas = DB::table('venda')->select((DB::raw("(SELECT nome FROM produto WHERE id = venda.id_produto) as nome_produto")),'id','id_produto','quantidade','preco','custo')->where('id_cliente', $id)->orderBy('id', 'DESC')->limit(3)->get();

        return $selectNewVendas;
    }

    public function deletaVenda(){

        $id = $_GET['id'];

        DB::table('venda')->where('id',$id)->delete();
        Alert::success('Sucesso', 'Venda deletado com sucesso');
        return redirect()->back();

    }

    public function storeServico(Request $request){
        $data['tipo'] = $request->tipo;
        $data['id_cliente'] = $request->id_cliente;
        $data['data_venda'] = $request->date;
        $data['descricao'] = $request->descricao;
        $data['id_produto'] = $request->pecas;
        $data['valor'] = $request->valor;
        $data['custo'] = $request->custo;
        $data['fornecedor'] = $request->fornecedor;


        $id = $data['id_cliente'];
   
        //data nome
        $data['nome_cliente'] = DB::table('cliente')->select('nome')->where('id', $id)->get();
  
        $data['nome_cliente'] = $data['nome_cliente'][0]->nome;
        //data produto
      
        // $data['valor'] = DB::table('produto')->select('preco')->where('id',$data['id_produto'])->get();
        // dd($data['valor']);
        // $data['valor'] = $data['valor'][0]->preco * $data['quantidade'];

        // $data['custo'] = DB::table('produto')->select('custo')->where('id',$data['id_produto'])->get();
        // $data['custo'] = $data['custo'][0]->custo * $data['quantidade'];

        //controlando o estoque

        // $quant = DB::table('produto')->select('quantidade')->where('id',$data['id_produto'])->get();

        // $alg = ($quant[0]->quantidade) - 1;
                
        // DB::table('produto')->where('id',$data['id_produto'])->update(['quantidade'=>$alg]);
        
        $getId = DB::table('servico')->insertGetId($data);

        $selectNewServico = DB::table('servico')->select((DB::raw("(SELECT nome FROM produto WHERE id = servico.id_produto) as nome_produto")),'id_produto','id','valor','custo')->where('id_cliente', $id)->orderBy('id', 'DESC')->limit(3)->get();

        $countArray = count($selectNewServico);
        for($i = 0; $i < $countArray; $i++){
            $selectNewServico[$i]->lucro = $selectNewServico[$i]->valor - $selectNewServico[$i]->custo;
        }
        



        return $selectNewServico;
        
    }
    public function deletaServico(){

        $id = $_GET['id'];

        DB::table('servico')->where('id',$id)->delete();
        Alert::success('Sucesso', 'Servico deletado com sucesso');
        return redirect()->back();
    }

    public function refreshProduto(Request $request){

        $id =  $request->id;
        
        $select = DB::table('venda')->select((DB::raw("(SELECT nome FROM produto WHERE id = venda.id_produto) as nome_produto")),'id','id_produto','quantidade','preco','custo')->where('id_cliente', $id)->orderBy('id', 'DESC')->limit(3)->get();

        return $select;
    }

    public function refreshServico(Request $request){

        $id =  $request->id;
        
        $select = DB::table('servico')->select((DB::raw("(SELECT nome FROM produto WHERE id = servico.id_produto) as nome_produto")),'id_produto','id','valor','custo')->where('id_cliente', $id)->orderBy('id', 'DESC')->limit(3)->get();

        $countArray = count($select);
        for($i = 0; $i < $countArray; $i++){
            $select[$i]->lucro = $select[$i]->valor - $select[$i]->custo;
        }
        

        return $select;
    }

    public function novaVenda(){
        $data['venda'] = DB::table('venda')->orderBy('id', 'DESC')->get();
            $produto = DB::table('produto')->get();
            $data["produtos"] = $produto;   
        $data['servico'] = DB::table('servico')->orderBy('id', 'DESC')->get();
      
        return view('listagemvendas', ['data'=>$data]);
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
    public function nota(Request $request){
        $data['data'] = $request->data;
        $data['nota'] = $request->nota;
        $data['data']= date('d-m-Y',  strtotime($data['data']));

        DB::table('notas')->insert($data);

        return redirect()->back();
    }

    public function deleteNota(){
        $id = $_GET['id'];

        DB::table('notas')->where('id',$id)->delete();
        Alert::success('Sucesso', 'Nota deletada com sucesso');
        return redirect()->back();
    }

    public function linhadotempo(){
        $id = $_GET['id'];
        
        $clientes = DB::table('tarefas')->get()->where('id_cliente',$id);
        $clientes2 = DB::table('cliente')->get()->where('id',$id);
        $clientes3 = DB::table('produto')->get();
       // $clientes4 = DB::table('venda')->where('id_cliente',$id)->orderBy('id', 'DESC')->get()  ;
        $clientes4 = DB::table('venda')->select('id_produto', 'id', 'preco', 'custo' , 'quantidade', 'created_at', (DB::raw("(SELECT nome FROM produto WHERE id = venda.id_produto) as nome_produto")))->where('id_cliente',$id)->orderBy('id', 'DESC')->get()  ;
        $clientes5 = DB::table('agendamento')->where('idcliente',$id)->orderBy('idagendamento', 'DESC')->get() ;
        $clientes6 = DB::table('servico')->where('id_cliente',$id)->orderBy('id', 'DESC')->get() ;
        $clientes7 = DB::table('notas')->get();
        $clientes8 = DB::table('produto')->get()->where('id', $clientes4);

        $card['balanco'] = DB::table('servico')->select('valor')->where('id_cliente',$id)->get();
        $card['balanco2'] = DB::table('venda')->select('preco')->where('id_cliente',$id)->get();
        $valor_total['geral'] = $card['balanco']->sum('valor') + $card['balanco2']->sum('preco');
        $card['balancolimpo'] = DB::table('servico')->select('custo')->where('id_cliente',$id)->get();
        $card['balancolimpo2'] = DB::table('venda')->select('custo')->where('id_cliente',$id)->get();
        $card['balancolimpo'] =  ( $card['balancolimpo']->sum('custo') + $card['balancolimpo2']->sum('custo') ) ;
        $valor_total['limpo'] = $valor_total['geral'] - $card['balancolimpo'] ;
       

        $name = DB::table('cliente')->get()->where('id',$id);
        
        foreach ($name as $names) {
           $user['nome'] =  $names->nome;
           $user['email'] = $names->email;
           $user['tel'] = $names->telefone;
           $user['endereco'] = $names->endereco;
           $user['cpf'] = $names->cpf;
           $user['aparelho'] = $names->aparelho;
           $user['niver'] = $names->data_aniversario;
        }

        

        $data["tarefas"] = $clientes;
        $data["cliente"] = $clientes2;
        $data["produtos"] = $clientes3;
        $data["venda"] = $clientes4;
        $data["agendamento"] = $clientes5;
        $data["servico"] = $clientes6;
        $data["nota"] = $clientes7;
        $data["nome_produto"] =$clientes8;
        $data["ultimoc"] = DB::table('agendamento')->select('data_agendamento')->orderBy('idagendamento', 'DESC')->limit(1)->get();

        return view('linha',['data'=>$data, 'id'=>$id, 'user'=>$user, 'valor_total'=>$valor_total]);
    }

    public function storeTarefas(Request $request){
        
        $data['id_cliente'] = $request->get('id_cliente');
        dd($data['id_cliente']);
        $data['nomeAtv'] = $request->get('nomeAtv');
        $data['valorRep'] = $request->get('valorRep');
        $data['custoRep'] = $request->get('custoRep');
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
        
        $clientes = DB::table('agendamento')->get()->where('idcliente',$id);
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

        $data["agendamento"] = $clientes;
        $data["cliente"] = $clientes2;
        $data["produtos"] = $clientes3;
        return view('agendamentos',['data'=>$data, 'id'=>$id, 'user'=>$user]);

    }
    public function agendamento2(){

        $id = $_GET['id'];
        
        $query  = DB::table('venda')->select('nome_cliente', 'id_cliente' , 'id_produto')->where('id',$id)->get();

        $produto = $query[0]->id_produto;
        $produto = DB::table('produto')->select('nome')->where('id', $produto)->get();
        
        $nomecliente = $query[0]->nome_cliente;

        $idcliente = $query[0]->id_cliente;


        $telefonecliente = $query[0]->id_cliente;
        $telefone = DB::table('cliente')->select('telefone')->where('id', $telefonecliente)->get();
        $telefonecliente = $telefone[0]->telefone;

        $clientes = DB::table('agendamento')->get()->where('idcliente',$id);
        $clientes2 = DB::table('produto')->get()->where('id',$id);
        $clientes3 = DB::table('produto')->get();

        $name = DB::table('produto')->get()->where('id',$id);
        
     

        $data["telefone"] = $telefonecliente;
        $data["cliente"] = $nomecliente;
        $data["produto"] = $produto[0]->nome;

        return view('agendamentos2',['data'=>$data, 'id'=>$id, 'idcliente'=>$idcliente]);

    }

    public function agendamento3(){

        $id = $_GET['id'];
        
        $query  = DB::table('servico')->select('nome_cliente', 'id_cliente' , 'id_produto')->where('id',$id)->get();

        $produto = $query[0]->id_produto;
        $produto = DB::table('produto')->select('nome')->where('id', $produto)->get();
        
        $nomecliente = $query[0]->nome_cliente;

        $idcliente = $query[0]->id_cliente;


        $telefonecliente = $query[0]->id_cliente;
        $telefone = DB::table('cliente')->select('telefone')->where('id', $telefonecliente)->get();
        $telefonecliente = $telefone[0]->telefone;

        $clientes = DB::table('agendamento')->get()->where('idcliente',$id);
        $clientes2 = DB::table('produto')->get()->where('id',$id);
        $clientes3 = DB::table('produto')->get();

        $name = DB::table('produto')->get()->where('id',$id);
        
     

        $data["telefone"] = $telefonecliente;
        $data["cliente"] = $nomecliente;
        $data["produto"] = $query[0]->id_produto;

        return view('agendamentos3',['data'=>$data, 'id'=>$id, 'idcliente'=>$idcliente]);

    }

    public function storeAgendamento(Request $request){
        
        $data['idcliente'] = $request->get('id_cliente');    
        $data['nome_cliente'] = $request->get('nomec');
        $data['telefone_cliente'] = $request->get('telefone_cliente');
        $data['data_agendamento'] = $request->get('date'); 
        $data['data_agendamento'] = date('d/m/Y',  strtotime($data['data_agendamento'])); 
        $data['status_agendamento'] = "agendado";
        $data['descricao'] = $request->get('descricao');

        DB::table('agendamento')->insert($data);
        
        Alert::success('Sucesso', 'Agendado com sucesso');
        return redirect()->back();
        
    }
    public function storeAgendamento2(Request $request){
        
        $data['idcliente'] = $request->get('id_cliente');    
        $data['nome_cliente'] = $request->get('nomec');
        $data['telefone_cliente'] = $request->get('telefone_cliente');
        $data['data_agendamento'] = $request->get('date'); 
        $data['data_agendamento'] = date('d/m/Y',  strtotime($data['data_agendamento'])); 
        $data['status_agendamento'] = "agendado";
        $data['descricao'] = $request->get('descricao');
        $data['produto'] = $request->get('produto');

        DB::table('agendamento')->insert($data);
        
        Alert::success('Sucesso', 'Agendado com sucesso');
        return redirect()->back();
        
    }
    public function storeAgendamento3(Request $request){
        
        $data['idcliente'] = $request->get('id_cliente');    
        $data['nome_cliente'] = $request->get('nomec');
        $data['telefone_cliente'] = $request->get('telefone_cliente');
        $data['data_agendamento'] = $request->get('date'); 
        $data['data_agendamento'] = date('d/m/Y',  strtotime($data['data_agendamento'])); 
        $data['status_agendamento'] = "agendado";
        $data['descricao'] = $request->get('descricao');
        $data['produto'] = $request->get('produto');

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
        $data['date'] = $request->get('data_aniversario');

        DB::table('cliente')->where('id',$id)->update(['nome'=>$data['nome'], 'email'=>$data['email'], 'telefone'=>$data['telefone'], 
                                                       'endereco'=>$data['endereco'], 'cpf'=>$data['cpf'], 'aparelho'=>$data['aparelho'],'data_aniversario'=>$data['date']]);

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
        $data['data_aniversario'] = $request->get('data_aniversario'); 
        $data['data_aniversario']  = date('d-m-Y',  strtotime($data['data_aniversario'] ));
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
        $data['custo'] = $request->get('custo');
        $data['estoqueMinimo'] = $request->get('estoqueMinimo');
        $data['posEstoque'] = $request->get('posEstoque');
        

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
        $data['custo'] = $request->get('custo');
        $data['estoqueMinimo'] = $request->get('estoqueMinimo');
        $data['posEstoque'] = $request->get('posEstoque');

        DB::table('produto')->where('id',$id)->update(['nome'=>$data['nome'], 'quantidade'=>$data['quantidade'], 'preco'=>$data['preco'], 
        'custo'=>$data['custo'] , 'estoqueMinimo'=>$data['estoqueMinimo'], 'posEstoque'=>$data['posEstoque']]);
        
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

        return redirect()->route("login");
    }

}
