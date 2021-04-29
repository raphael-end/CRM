@extends('templates.templateVendas')
@section('conteudo')

<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">

    <!-- CTA -->
    <a style="background-color: #002859; " class="flex items-center w-full p-4 mb-8 text-sm font-semibold mt-10 text-purple-100  rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">


      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
      </svg>
      <h2 class="my-6 text-2xl font-semibold text-gray-100 dark:text-gray-200">
        CADASTRO DE VENDAS E SERVIÇOS
      </h2>


    </a>


    <div class="px-4 py-3 mb-8 w-full bg-white rounded-lg shadow-md dark:bg-gray-800">



      <div class="flex flex-wrap" id="tabs-id">
        <div class="w-full">
          <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
              <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blueGray-600 bg-blueGray-600" onclick="changeAtiveTab(event,'tab-profile')">
                <i class="fas fa-space-shuttle text-base mr-1"></i> Venda
              </a>
            </li>
            <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
              <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blueGray-600 bg-white" onclick="changeAtiveTab(event,'tab-settings')">
                <i class="fas fa-cog text-base mr-1"></i> Serviços
              </a>
            </li>

          </ul>

          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
            <div class="px-4 py-5 flex-auto">
              <div class="tab-content tab-space">
                <div class="block" id="tab-profile">
                  <div class="px-4 py-3 mb-8 w-full bg-white rounded-lg  dark:bg-gray-800">
                    <form action="{{route("admin.storeVenda")}}" method="POST">
                      @csrf

               
                        
                        <input type="text" hidden name="tipo" id="select-state" value="venda">
                       
     
                      <div class="flex flex-row justify-start">
                        <label class="flex flex-row items-center mt-5  text-sm">
                          <span class="text-gray-700 text-xl dark:text-gray-400">
                            Nome cliente:
                          </span>
                          <select name="id_cliente" id="select-cliente" class="ml-5 w-62 border border-gray-300 p-3 rounded-lg">
                            <option disabled selected value="">Nome Cliente</option>
                            @foreach($data['cliente'] as $datas)
                            <option value="{{$datas->id}}">{{$datas->nome}}</option>
                            @endforeach
                          </select>
                        </label>
                        <label class="flex flex-row items-center mt-4 ml-5 text-sm">
                          <span class="text-gray-700 text-xl dark:text-gray-400">Data da venda:</span>
                          <input class=" border ml-5 border-gray-300 p-3 rounded-lg" type="date" placeholder="data" name="date">
                        </label>

                      </div>

                      <div class="flex flex-row justify-between mt-5">
                        <label class="flex flex-row items-center text-sm">

                          <span class="text-gray-700 text-xl dark:text-gray-400">
                            Produtos:
                          </span>

                          <select id="produtos" name="produtos" class="ml-5 pl-20 pr-20 border border-gray-300 p-3 rounded-lg">
                            <option disabled selected value="">Produto</option>
                            @foreach($data["produtos"] as $produto)
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                            @endforeach
                          </select>
                        </label>
                        <div class="flex flex-col items-center">
                          <label class="text-sm ">

                            <span class="text-gray-700 text-xl ml-4 dark:text-gray-400">
                              quant.:
                            </span>

                            <input type="text" name="quantidade" class=" border ml-5 border-gray-300 p-3 w-20 rounded-lg">
                          </label>
                        </div>
                        <button type="submit" style="background-color: #002859; " class="px-10 mt-5 py-4 w-2/5 font-medium leading-5 text-white transition-colors duration-150   border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                          Adicionar
                        </button>
                      </div>
                    </form>
                    <div id="" class="container mt-10 px-6 mx-auto grid">

                      <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                          <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                              <th class="px-4 py-3">Produto</th>
                              <th class="px-4 py-3">Quantidade</th>
                              <th class="px-4 py-3">Preço</th>
                              <th class="px-4 py-3">Custo</th>
                              <th class="px-4 py-3">Ações</th>
                            </tr>
                          </thead>

                          <!-- model -->

                          <tbody id="body-products" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">



                          </tbody>



                        </table>
                      </div>
                    </div>

                   

                  </div>
                  <div class="flex justify-end pt-2 mt-5 ">
                <a href="{{route("admin.novaVenda")}}" type="submit" class="flex flex-row px-10 py-4 font-medium leading-5 bg-green-500 text-white transition-colors duration-150  border border-transparent rounded-lg active:bg-green-600 hover:bg-green-600 focus:outline-none focus:shadow-outline-green-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <line x1="5" y1="12" x2="11" y2="18" />
                    <line x1="5" y1="12" x2="11" y2="6" />
                  </svg>
                  voltar
                </a>


                </form>
                <a href="{{route("admin.index")}}"  class="modal-close px-4 ml-4 p-3 rounded-lg bg-red-600 text-white hover:bg-red-700">Cancelar</a>
              </div>
                </div>

                <div class="hidden" id="tab-settings">
                <div class="px-4 py-3 mb-8 w-full bg-white rounded-lg  dark:bg-gray-800">
                    <form action="{{route("admin.storeServico")}}" method="POST">
                      @csrf

                      <input type="text" hidden name="tipo" id="select-state" value="serviço">

                      <div class="flex flex-row justify-between">
                        <label class="flex flex-col items-center mt-5  text-sm">
                          <span class="text-gray-700 text-xl dark:text-gray-400">
                            Nome cliente:
                          </span>
                          <select name="id_cliente" id="select-cliente2" class="ml-5  border border-gray-300 p-3 rounded-lg">
                            <option disabled selected value="">Nome Cliente</option>
                            @foreach($data['cliente'] as $datas)
                            <option value="{{$datas->id}}">{{$datas->nome}}</option>
                            @endforeach
                          </select>
                        </label>
                        <label class="flex flex-col items-center mt-4 text-sm">
                          <span class="text-gray-700 text-xl dark:text-gray-400">Data da venda:</span>
                          <input class=" border ml-5 border-gray-300 p-3 rounded-lg" type="date" placeholder="data" name="date">
                        </label>
                        <label class="flex flex-col  mt-4 text-sm">
                          <span class="text-gray-700 text-xl ml-5 dark:text-gray-400">Descrição:</span>
                          <input style="width: 800px;" class=" border ml-5  border-gray-300 p-3 rounded-lg" type="text" placeholder="data" name="descricao">
                        </label>

                      </div>

                      <div class="flex flex-row mt-5 ">
                        <label class="flex flex-col items-center text-sm">

                          <span class="text-gray-700 text-xl dark:text-gray-400">
                            Peças:
                          </span>

                          <select id="produtos" name="pecas" class="ml-5 pl-20 pr-20 border border-gray-300 p-3 rounded-lg">
                            <option disabled selected value="">Produto</option>
                            @foreach($data["produtos"] as $produto)
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                            @endforeach
                          </select>
                        </label>
                        <div class="flex flex-col items-center">
                          <label class="text-sm ">

                            <span class="text-gray-700 text-xl ml-4 dark:text-gray-400">
                              Valor total
                            </span>

                            <input type="text" name="valor" class=" border ml-5 border-gray-300 p-3 w-20 rounded-lg">
                          </label>
                        </div>
                        <div class="flex flex-col items-center">
                          <label class="text-sm ">

                            <span class="text-gray-700 text-xl ml-4 dark:text-gray-400">
                              Custo
                            </span>

                            <input type="text" name="custo" class=" border ml-5 border-gray-300 p-3 w-20 rounded-lg">
                          </label>
                        </div>
                        <div class="flex flex-col items-center">
                          <label class="text-sm ">

                            <span class="text-gray-700 text-xl ml-4 dark:text-gray-400">
                              Fornecedor
                            </span>

                            <input type="text" name="fornecedor" class=" border ml-5 border-gray-300 p-3 w-52 rounded-lg">
                          </label>
                        </div>
                        <button type="submit" style="background-color: #002859; " class="px-10 mt-5 py-4 w-2/5 font-medium leading-5 text-white transition-colors duration-150   border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                          Adicionar
                        </button>
                      </div>
                    </form>
                    <div id="" class="container mt-10 px-6 mx-auto grid">

                      <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                          <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                              <th class="px-4 py-3">Produto</th>
                              <th class="px-4 py-3">Preço</th>
                              <th class="px-4 py-3">Custo</th>
                              <th class="px-4 py-3">Lucro</th>
                            </tr>
                          </thead>

                          <!-- model -->

                          <tbody id="body-products2" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">



                          </tbody>



                        </table>
                      </div>
                    </div>
                
                  </div>
    <!--Footer-->
    <div class="flex justify-end pt-2 mt-5 ">
                <a href="{{route("admin.novaVenda")}}" type="submit" class="flex flex-row px-10 py-4 font-medium leading-5 bg-green-500 text-white transition-colors duration-150  border border-transparent rounded-lg active:bg-green-600 hover:bg-green-600 focus:outline-none focus:shadow-outline-green-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <line x1="5" y1="12" x2="11" y2="18" />
                    <line x1="5" y1="12" x2="11" y2="6" />
                  </svg>
                  voltar
                </a>


                </form>
                <a href="{{route("admin.index")}}"  class="modal-close px-4 ml-4 p-3 rounded-lg bg-red-600 text-white hover:bg-red-700">Cancelar</a>
              </div>
                </div>

                
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- <div class="px-4 py-3 mb-8 w-3/6 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form action="{{route("admin.storeVenda")}}" method="POST">
      @csrf

        <label class="flex flex-row items-center mt-4 text-sm">
          <span class="text-gray-700 text-xl dark:text-gray-400">
            Tipo:
          </span>
          <select name="tipo" id="select-state" class="ml-5 border border-gray-300 p-3 rounded-lg">
          <option disabled selected value="">Tipo</option>
            <option value="venda">venda</option>
            <option value="reparo">reparo</option>

          </select>
        </label>

        <div class="flex flex-row justify-between">
          <label class="flex flex-row items-center mt-5  text-sm">
            <span class="text-gray-700 text-xl dark:text-gray-400">
              Nome cliente:
            </span>
            <select name="id_cliente" id="select-cliente" class="ml-5 w-62 border border-gray-300 p-3 rounded-lg">
            <option disabled selected value="">Nome Cliente</option>
              @foreach($data['cliente'] as $datas)
              <option value="{{$datas->id}}">{{$datas->nome}}</option>
              @endforeach
            </select>
          </label>
          <label class="flex flex-row items-center mt-4 text-sm">
            <span class="text-gray-700 text-xl dark:text-gray-400">Data da venda:</span>
            <input class=" border ml-5 border-gray-300 p-3 rounded-lg" type="date" placeholder="data" name="date">
          </label>

        </div>

        <div class="flex flex-row justify-between pt-5">
          <label class="flex flex-row items-center mt-4 text-sm">
          
            <span class="text-gray-700 text-xl dark:text-gray-400">
              Produtos:
            </span>

            <select id="produtos" name="produtos" class="ml-5 pl-20 pr-20 border border-gray-300 p-3 rounded-lg">
             <option disabled selected value="">Produto</option>
              @foreach($data["produtos"] as $produto)
              <option value="{{$produto->id}}">{{$produto->nome}}</option>
              @endforeach
            </select>
          </label>
          <div class="flex flex-col items-center">
            <label class="text-sm -mt-1">
            
              <span class="text-gray-700 text-xl ml-4 dark:text-gray-400">
                quant.:
              </span>

              <input type="text" name="quantidade" class=" border ml-5 border-gray-300 p-3 w-20 rounded-lg" >
            </label>
          </div>
          <button type="submit" style="background-color: #002859; " class="px-10 mt-5 py-4 w-2/5 font-medium leading-5 text-white transition-colors duration-150   border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Adicionar
          </button>
        </div>
      </form>
        <div id="" class="container mt-10 px-6 mx-auto grid">

          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3">Produto</th>
                  <th class="px-4 py-3">Quantidade</th>
                  <th class="px-4 py-3">Preço</th>
                  <th class="px-4 py-3">Custo</th>
                  <th class="px-4 py-3">Ações</th>
                </tr>
              </thead>
              
         

              <tbody id="body-products" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">



              </tbody>
              


            </table>
          </div>
        </div>
   
        <div>
          <button type="submit" style="background-color: #002859;" class="px-10 mt-5 py-4 w-full font-medium leading-5 text-white transition-colors duration-150   border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Cadastrar
          </button>
        </div>
    
    </div>

  </div> -->


      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="../../js/filterRefreshProduct.js"></script>
      <script src="../../js/filterRefreshServico.js"></script>

      <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      </script>
      <script type="text/javascript">
        function changeAtiveTab(event, tabID) {
          let element = event.target;
          while (element.nodeName !== "A") {
            element = element.parentNode;
          }
          ulElement = element.parentNode.parentNode;
          aElements = ulElement.querySelectorAll("li > a");
          tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
          for (let i = 0; i < aElements.length; i++) {
            aElements[i].classList.remove("text-black");
            aElements[i].classList.remove("bg-gray-600");
            aElements[i].classList.add("text-black");
            aElements[i].classList.add("bg-white");
            tabContents[i].classList.add("hidden");
            tabContents[i].classList.remove("block");
          }
          element.classList.remove("text-black");
          element.classList.remove("bg-white");
          element.classList.add("text-black");
          element.classList.add("text-black");
          document.getElementById(tabID).classList.remove("hidden");
          document.getElementById(tabID).classList.add("block");
        }
      </script>
</main>

@endsection
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
       $card['novosAgendamentosDia'] = DB::table('agendamento')->where('created_at', 'like', $now2 .'%')->count();
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

       $niver = DB::table('cliente')->where('data_aniversario', 'like', $now2 .'%')->paginate(5);
       $min = DB::table('produto')->where('quantidade', '<' , 10)->paginate(5);
       
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
        $data['data_venda'] = $request->date;
        $data['id_produto'] = $request->produtos;
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
        
        DB::table('venda')->insert($data);
        
        return redirect()->back();
        
    }

    //storeVENDADODAVI
      // public function storeVenda(Request $request){
    //     $data['tipo'] = $request->tipo;
    //     $data['id_cliente'] = $request->id_cliente;
    //     $data['data_venda'] = $request->data_venda;
    //     $data['id_produto'] = $request->id_produto;
    //     $data['quantidade'] = $request->quantidade;

    //     $id = $data['id_cliente'];
    //     $idproduto = $data['id_produto'];
    //     //data nome
    //     $data['nome_cliente'] = DB::table('cliente')->select('nome')->where('id', $id)->get();
  
    //     $data['nome_cliente'] = $data['nome_cliente'][0]->nome;
    //     //data produto
    //     $data['preco'] = DB::table('produto')->select('preco')->where('id',$data['id_produto'])->get();

    //     $data['preco'] = $data['preco'][0]->preco * $data['quantidade'];

    //     $data['custo'] = DB::table('produto')->select('custo')->where('id',$data['id_produto'])->get();
    //     $data['custo'] = $data['custo'][0]->custo * $data['quantidade'];

    //     //controlando o estoque

    //     $quant = DB::table('produto')->select('quantidade')->where('id',$data['id_produto'])->get();

        
    //     $alg = ($quant[0]->quantidade) - $data['quantidade'];
                
    //     DB::table('produto')->where('id',$data['id_produto'])->update(['quantidade'=>$alg]);
        
    //     $idInsert = DB::table('venda')->insertGetId($data);

    //     $selectLastInsert = DB::table('venda')->select((DB::raw("(SELECT nome FROM produto WHERE id = venda.id_produto) as nome_produto")),'id','id_produto','quantidade','preco','custo')->where('id', $idInsert)->get();

    //     return $selectLastInsert;
        
    // 

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
        $data['custo'] = $request->valor;
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

        $quant = DB::table('produto')->select('quantidade')->where('id',$data['id_produto'])->get();
       
        $alg = ($quant[0]->quantidade) - 1;
                
        DB::table('produto')->where('id',$data['id_produto'])->update(['quantidade'=>$alg]);
        
        DB::table('servico')->insert($data);
        
        return redirect()->back();
        
    }
    public function deletaServico(){

        $id = $_GET['id'];

        DB::table('servico')->where('id',$id)->delete();
        Alert::success('Sucesso', 'Servico deletado com sucesso');
        return redirect()->back();
    }

    public function refreshProduto(Request $request){

        $id =  $request->id;
        
        $select = DB::table('venda')->select((DB::raw("(SELECT nome FROM produto WHERE id = venda.id_produto) as nome_produto")),'id','id_produto','quantidade','preco','custo')->where('id_cliente', $id)->orderBy('id', 'DESC')->get();
        //$select = DB::table('venda')->select((DB::raw("(SELECT nome FROM produto WHERE id = venda.id_produto) as nome_produto")), (DB::raw("(SELECT quantidade FROM produto WHERE id = venda.id_produto) as quantidade")), (DB::raw("(SELECT preco FROM produto WHERE id = venda.id_produto) as preco")), (DB::raw("(SELECT custo FROM produto WHERE id = venda.id_produto) as custo")) )->where('id_cliente', $id)->limit(10)->get();

        return $select;
    }

    public function refreshServico(Request $request){

        $id =  $request->id;
        
        $select = DB::table('servico')->select((DB::raw("(SELECT nome FROM produto WHERE id = servico.id_produto) as nome_produto")),'id','valor','custo')->where('id_cliente', $id)->orderBy('id', 'DESC')->get();
        //$select = DB::table('venda')->select((DB::raw("(SELECT nome FROM produto WHERE id = venda.id_produto) as nome_produto")), (DB::raw("(SELECT quantidade FROM produto WHERE id = venda.id_produto) as quantidade")), (DB::raw("(SELECT preco FROM produto WHERE id = venda.id_produto) as preco")), (DB::raw("(SELECT custo FROM produto WHERE id = venda.id_produto) as custo")) )->where('id_cliente', $id)->limit(10)->get();

        return $select;
    }

    public function novaVenda(){
        $data['venda'] = DB::table('venda')->get();
            $produto = DB::table('produto')->get();
            $data["produtos"] = $produto;   
        $data['servico'] = DB::table('servico')->get();
      
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

        DB::table('notas')->insert($data);

        return redirect()->back();
    }
    public function linhadotempo(){
        $id = $_GET['id'];
        
        $clientes = DB::table('tarefas')->get()->where('id_cliente',$id);
        $clientes2 = DB::table('cliente')->get()->where('id',$id);
        $clientes3 = DB::table('produto')->get();
        $clientes4 = DB::table('venda')->get()->where('id_cliente',$id) ;
        $clientes5 = DB::table('agendamento')->get()->where('idcliente',$id) ;
        $clientes6 = DB::table('servico')->get()->where('id_cliente',$id) ;
        $clientes7 = DB::table('notas')->get();
        

        $card['balanco'] = DB::table('servico')->select('valor')->where('id_cliente',$id)->get();
        $valor_total['geral'] = $card['balanco']->sum('valor');
        $card['balancolimpo'] = DB::table('servico')->select('custo')->where('id_cliente',$id)->get();
        $card['balancolimpo'] = $card['balancolimpo'] ->sum('custo');
        $valor_total['limpo'] = $valor_total['geral'] - $card['balancolimpo'] ;
       

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
        $data["venda"] = $clientes4;
        $data["agendamento"] = $clientes5;
        $data["servico"] = $clientes6;
        $data["nota"] = $clientes7;
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
        $data["produto"] = $produto[0]->nome;

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
        $data['descricao'] = $request->get('produto') . '|' . $data['descricao'];

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
        $data['descricao'] = $request->get('produto') . '|' . $data['descricao'];

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
            $clientes = DB::table('cliente')->paginate(5);
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
