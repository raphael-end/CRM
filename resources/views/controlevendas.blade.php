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
                    <div>
                 

               
                        
                        <input type="text" hidden name="tipo" id="select-state" value="venda">
                       
     <!-- 111111111111111111 -->
                      <div class="flex flex-row justify-start">
                        <label class="flex flex-row items-center mt-5  text-sm">
                          <span class="text-gray-700 text-xl pr-5 dark:text-gray-400">
                            Nome cliente:
                          </span>
                          <select name="id_cliente" id="select_cliente_1" class="chosen ml-5 w-62 border border-gray-300 p-3 rounded-lg">
                            <option disabled selected value="">Nome Cliente</option>
                            @foreach($data['cliente'] as $datas)
                            <option value="{{$datas->id}}">{{$datas->nome}}</option>
                            @endforeach
                          </select>
                        </label>
                        <label class="flex flex-row items-center mt-4 ml-5 text-sm">
                          <span class="text-gray-700 text-xl dark:text-gray-400">Data da venda:</span>
                          <input id="data_venda_1" class=" border ml-5 border-gray-300 p-3 rounded-lg" type="date" placeholder="data" name="date">
                        </label>

                      </div>

                      <div class="flex flex-row justify-between mt-5">
                        <label class="flex flex-row items-center text-sm">

                          <span class="text-gray-700 text-xl pr-5 dark:text-gray-400 ">
                            Produtos:
                          </span>

                          <select id="produtos_1" name="produtos" class="chosen ml-5 pl-20 pr-20 border border-gray-300 p-3 rounded-lg">
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

                            <input id="quant_1" placeholder="5.." type="text" name="quantidade" class=" border ml-5 border-gray-300 p-3 w-20 rounded-lg">
                          </label>
                        </div>
                        <button id="criar_venda" style="background-color: #002859; " class="px-10 mt-5 py-4 w-2/5 font-medium leading-5 text-white transition-colors duration-150   border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                          Adicionar
                        </button>
                      </div>
                    </div>
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

                          <tbody id="body_products_1" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">



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
                    <div>
                      

                      <input type="text" hidden name="tipo" id="select-state" value="serviço">
          <!-- 22222222222222222222222 -->
                      <div class="flex flex-row justify-between">
                        <label class="flex flex-col items-center mt-5  text-sm">
                          <span class="text-gray-700 text-xl pr-5 dark:text-gray-400">
                            Nome cliente:
                          </span>
                          <select name="id_cliente" id="select_cliente_2" class="chosen ml-5  border border-gray-300 p-3 rounded-lg">
                            <option disabled selected value="">Nome Cliente</option>
                            @foreach($data['cliente'] as $datas)
                            <option value="{{$datas->id}}">{{$datas->nome}}</option>
                            @endforeach
                          </select>
                        </label>
                        <label class="flex flex-col items-center mt-4 text-sm">
                          <span class="text-gray-700 text-xl dark:text-gray-400">Data da venda:</span>
                          <input id="data_venda_2" class=" border ml-5 border-gray-300 p-3 rounded-lg" type="date" placeholder="data" name="date">
                        </label>
                        <label class="flex flex-col  mt-4 text-sm">
                          <span class="text-gray-700 text-xl ml-5 dark:text-gray-400">Descrição:</span>
                          <input id="descricao" style="width: 800px;" class=" border ml-5  border-gray-300 p-3 rounded-lg" type="text" placeholder="data" name="descricao">
                        </label>

                      </div>

                      <div class="flex flex-row mt-5 ">
                        <label class="flex flex-col items-center text-sm">

                          <span class="text-gray-700 text-xl dark:text-gray-400">
                            Peças:
                          </span>

                          <!-- <select >
                            <option disabled selected value="">Produto</option>
                            @foreach($data["produtos"] as $produto)
                            <option value="{{$produto->id}}">{{$produto->nome}}</option>
                            @endforeach
                          </select> -->
                          <input type="text" placeholder="Tela de Iphone..." id="pecas" name="pecas" class="ml-5 pl-20 pr-20 border border-gray-300 p-3 rounded-lg">
                        </label>
                        <div class="flex flex-col items-center">
                          <label class="text-sm ">

                            <span class="text-gray-700 text-xl ml-4 dark:text-gray-400">
                              Valor total
                            </span>

                            <input id="valor_total" placeholder="20.00"  type="text" name="valor" class=" border ml-5 border-gray-300 p-3 w-20 rounded-lg">
                          </label>
                        </div>
                        <div class="flex flex-col items-center">
                          <label class="text-sm ">

                            <span class="text-gray-700 text-xl ml-4 dark:text-gray-400">
                              Custo
                            </span>

                            <input id="custo" placeholder="15.00" type="text" name="custo" class=" border ml-5 border-gray-300 p-3 w-20 rounded-lg">
                          </label>
                        </div>
                        <div class="flex flex-col items-center">
                          <label class="text-sm ">

                            <span class="text-gray-700 text-xl ml-4 dark:text-gray-400">
                              Fornecedor
                            </span>

                            <input id="fornecedor" placeholder="JB peças" type="text" name="fornecedor" class=" border ml-5 border-gray-300 p-3 w-52 rounded-lg">
                          </label>
                        </div>
                        <button id="criar_venda_2" style="background-color: #002859; " class="px-10 mt-5 py-4 w-2/5 font-medium leading-5 text-white transition-colors duration-150   border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                          Adicionar
                        </button>
                      </div>
                    </div>
                    <div id="" class="container mt-10 px-6 mx-auto grid">

                      <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                          <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                              <th class="px-4 py-3">Produto</th>
                              <th class="px-4 py-3">Preço</th>
                              <th class="px-4 py-3">Custo</th>
                              <th class="px-4 py-3">Lucro</th>
                              <th class="px-4 py-3">Açôes</th>
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

     


      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      </script>
      <!-- <script src="../../js/filterRefreshProduct.js"></script>-->
      <script src="../../js/filterRefreshServico.js"></script> 
      <script src="../../js/filterRefreshProduct.js"></script>
      <!-- CSS -->
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">

      <!-- JS -->
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
      <script src="../../js/storeAny.js"></script>

      <script>
        $('.chosen').chosen({
            width: '200px',
            allow_single_deselect: true
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