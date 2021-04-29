
@extends('templates.templateCliente')
<style>

.tooltip {
  position: relative;
  display: inline-block;

}

.tooltip .tooltiptext {
  visibility: hidden;
  background: rgba(136, 248, 183, 0.616);
  width: 200px;
  color: black;
  text-align: center;
  border-radius: 6px;
  padding: 10px 10px;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;

  /* Position the tooltip */
  position: absolute;
  margin-top: -20px;
  z-index: 999999;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  z-index: 999999;
}

</style>
@section('conteudo')
@include('sweetalert::alert')
<main class="h-full pb-16 overflow-y-auto">



  <div class="container px-6 mx-auto flex">

    <div class="w-1/3">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

      </h2>
      <!-- CTA -->
      <a style="background-color: #002859;"  class="w-2/3 flex flex-col p-4 mb-8 text-sm font-semibold text-purple-100 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">

        <div class="flex flex-row items-center ">
          <div class="p-3 bg-gray-50 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <circle cx="12" cy="7" r="4" />
              <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg>
          </div>
          <span class="ml-3" style="font-size: 20px;">{{$user['nome']}}</span>
        </div>
        <br>

        <div class="flex mt-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="3" y="5" width="18" height="14" rx="2" />
            <polyline points="3 7 12 13 21 7" />
          </svg>
          <span class="ml-3">E-mail: {{$user['email']}}</span>
        </div>
        <br>

        <div class="flex mt-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
          </svg>
          <span class="ml-3">Telefone: {{$user['tel']}}</span>
        </div>
        <br>

        <div class="flex mt-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-gift" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <rect x="3" y="8" width="18" height="4" rx="1" />
            <line x1="12" y1="8" x2="12" y2="21" />
            <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
            <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
          </svg>
          <span class="ml-3">Aniversário: {{$user['niver']}}</span>
        </div>
        <br>


        <div class="flex mt-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <polyline points="5 12 3 12 12 3 21 12 19 12" />
            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
            <rect x="10" y="12" width="4" height="4" />
          </svg>
          <span class="ml-3">Endereço: {{$user['endereco']}}</span>
        </div>
        <br>

        <div class="flex mt-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-id" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="3" y="4" width="18" height="16" rx="3" />
            <circle cx="9" cy="10" r="2" />
            <line x1="15" y1="8" x2="17" y2="8" />
            <line x1="15" y1="12" x2="17" y2="12" />
            <line x1="7" y1="16" x2="17" y2="16" />
          </svg>
          <span class="ml-3">CPF: {{$user['cpf']}}</span>
        </div>
        <br>

        <div class="flex mt-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="7" y="4" width="10" height="16" rx="1" />
            <line x1="11" y1="5" x2="13" y2="5" />
            <line x1="12" y1="17" x2="12" y2="17.01" />
          </svg>
          <span class="ml-3">Modelo do aparelho: {{$user['aparelho']}}</span>
        </div>
      </a>
    </div>
    <div class="w-1/3 pt-10" style="margin-left: -100px;">
      <!-- General elements -->
      <div class="flex items-center ">
        <div class="bg-gray-300 rounded-full p-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-versions" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke=" #002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="10" y="5" width="10" height="14" rx="2" />
            <line x1="7" y1="7" x2="7" y2="17" />
            <line x1="4" y1="8" x2="4" y2="16" />
          </svg>
        </div>
        <p class="ml-4 text-xl text-gray-600 font-semibold dark:text-gray-400">Adicionar uma nota</p>
      </div>
      <div class="ml-10 mt-1 flex flex-col">
        <div class="text-gray-600">|</div>
        <div class="text-gray-600">|</div>

      </div>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{route ("admin.nota")}}" method="post" enctype="multipart/form-data">
          @csrf
          <label class="flex flex-row items-center mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Data da nota:</span>
                <input class="ml-5 border border-gray-300 p-3 rounded-lg" type="date" placeholder="data" name="data">
          </label>
          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nota do reparo</span>
            <textarea type="text" name="nota" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Nota ..."></textarea>
          </label>
      
          <div>
            <button type="submit" style="background-color: #002859;"  class="px-10 mt-5 py-4 w-full font-medium leading-5 text-white transition-colors duration-150  border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Cadastrar
            </button>
          </div>
      </div>
      </form>
      <div class="flex items-center ">
        <div class="bg-gray-300 rounded-full p-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-dotted" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="7.5" y1="4.21" x2="7.5" y2="4.22" />
            <line x1="4.21" y1="7.5" x2="4.21" y2="7.51" />
            <line x1="3" y1="12" x2="3" y2="12.01" />
            <line x1="4.21" y1="16.5" x2="4.21" y2="16.51" />
            <line x1="7.5" y1="19.79" x2="7.5" y2="19.8" />
            <line x1="12" y1="21" x2="12" y2="21.01" />
            <line x1="16.5" y1="19.79" x2="16.5" y2="19.8" />
            <line x1="19.79" y1="16.5" x2="19.79" y2="16.51" />
            <line x1="21" y1="12" x2="21" y2="12.01" />
            <line x1="19.79" y1="7.5" x2="19.79" y2="7.51" />
            <line x1="16.5" y1="4.21" x2="16.5" y2="4.22" />
            <line x1="12" y1="3" x2="12" y2="3.01" />
          </svg>
        </div>
        <p class="ml-4 text-xl text-gray-600 font-semibold dark:text-gray-400">Linha do tempo</p>
      </div>
      <div class="ml-8 mt-1 flex flex-col">
        <div class="text-gray-600">|</div>
        <div class="text-gray-600">|</div>
      </div>
      <div class="flex flex-wrap" id="tabs-id">
  <div class="w-full">
    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blueGray-600 bg-blueGray-600" onclick="changeAtiveTab(event,'tab-profile')">
          <i class="fas fa-space-shuttle text-base mr-1"></i>  Produtos
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blueGray-600 bg-white" onclick="changeAtiveTab(event,'tab-settings')">
          <i class="fas fa-cog text-base mr-1"></i>  Serviços
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blueGray-600 bg-white" onclick="changeAtiveTab(event,'tab-options')">
          <i class="fas fa-briefcase text-base mr-1"></i>  Agendamentos
        </a>
      </li>
      <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blueGray-600 bg-white" onclick="changeAtiveTab(event,'tab-notas')">
          <i class="fas fa-briefcase text-base mr-1"></i>  Notas
        </a>
      </li>
    </ul>
   
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
      <div class="px-4 py-5 flex-auto">
        <div class="tab-content tab-space">
          <div class="block" id="tab-profile">
          @foreach ($data["venda"] as $vendas)
            <div class="flex flex-row justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile-vibration" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <rect x="4" y="4" width="10" height="16" rx="1" />
                  <line x1="8" y1="5" x2="10" y2="5" />
                  <line x1="9" y1="17" x2="9" y2="17.01" />
                  <path d="M20 6l-2 3l2 3l-2 3l2 3" />
                </svg>
                <span>Produto</span>
                <span>Data da compra: {{$vendas->created_at}}</span>
            </div>
            <div class="w-full overflow-x-auto mt-5 pb-5">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Descrição</th>
                <th class="px-4 py-3">Preço</th>
                <th class="px-4 py-3">Custo</th>
                <th class="px-4 py-3">Unidades</th>
            
              </tr>
            </thead>
           
            <tbody class="bg-white divide-y border-gray-400 dark:divide-gray-700 dark:bg-gray-800">
              <tr class="text-gray-700  bg-gray-200 dark:text-gray-400 ">
                <td class="px-4 py-3 text-sm">
                  {{$vendas->nome_produto}}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$vendas->preco}}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$vendas->custo}}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{$vendas->quantidade}}
                  </span>
                </td>
                
              </tr>


            </tbody>
           
          </table>
          
        </div>
        <div class="-ml-6 mt-1 flex flex-col justify-center pt-5 pb-5" style="background-color: #F9FAFB; width: 600px;">
            <div class="text-gray-600 ml-5 ">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <!-- <div class="text-gray-600 -ml-2" >
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bubble" width="28" height="28" viewBox="0 0 24 24" stroke-width="1" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="6" cy="16" r="3" />
                <circle cx="16" cy="19" r="2" />
                <circle cx="14.5" cy="7.5" r="4.5" />
              </svg>
            </div> -->

        </div>
        
        @endforeach
      </div>
     
          <div class="hidden" id="tab-settings">
              @foreach ($data["servico"] as $servicos)
                <div class="flex flex-row justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile-vibration" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <rect x="4" y="4" width="10" height="16" rx="1" />
                      <line x1="8" y1="5" x2="10" y2="5" />
                      <line x1="9" y1="17" x2="9" y2="17.01" />
                      <path d="M20 6l-2 3l2 3l-2 3l2 3" />
                    </svg>
                    <span>Seriços</span>
                    <span>Data do serviço: {{$servicos->data_venda}}</span>
                </div>
                <div class="w-full mt-5 pb-5">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Descrição</th>
                    <th class="px-4 py-3">Cliente</th>
                    <th class="px-4 py-3">Valor</th>
                    <th class="px-4 py-3">Custo</th>
                    <th class="px-4 py-3">Fornecedor</th>
                  </tr>
                </thead>
              
                <tbody class="bg-white divide-y border-gray-400 dark:divide-gray-700 dark:bg-gray-800">
                  <tr class="text-gray-700  bg-gray-200 dark:text-gray-400 ">
                    <td class="px-4 py-3 text-sm">
                     
                      <p class="tooltip">{{ mb_strimwidth($servicos->descricao, 0, 15, "...")}}
                        <span class="tooltiptext">{{$servicos->descricao}}</span> 
                      </p>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      {{$servicos->nome_cliente}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                      {{$servicos->valor}}
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        {{$servicos->custo}}
                      </span>
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        {{$servicos->fornecedor}}
                      </span>
                    </td>
                    
                  </tr>


                </tbody>
              
              </table>
              
            </div>
            <div class="-ml-6 mt-1 flex flex-col justify-center pt-5 pb-5" style="background-color: #F9FAFB; width: 600px;">
                <div class="text-gray-600 ml-5 ">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                  </svg>
                </div>
                <div class="text-gray-600 ml-5">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                  </svg>
                </div>
                <div class="text-gray-600 ml-5">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                  </svg>
                </div>
                <div class="text-gray-600 ml-5">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                  </svg>
                </div>
                <!-- <div class="text-gray-600 -ml-2" >
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bubble" width="28" height="28" viewBox="0 0 24 24" stroke-width="1" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="6" cy="16" r="3" />
                    <circle cx="16" cy="19" r="2" />
                    <circle cx="14.5" cy="7.5" r="4.5" />
                  </svg>
                </div> -->

            </div>
            
            @endforeach
          </div>
          
          <div class="hidden" id="tab-options">
          @foreach ($data["agendamento"] as $agendamentos)
              <div class="flex flex-row justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile-vibration" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <rect x="4" y="4" width="10" height="16" rx="1" />
                      <line x1="8" y1="5" x2="10" y2="5" />
                      <line x1="9" y1="17" x2="9" y2="17.01" />
                      <path d="M20 6l-2 3l2 3l-2 3l2 3" />
                    </svg>
                    <span>Agendamentos</span>
                    <span class="p-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        {{$agendamentos->status_agendamento}}
                    </span>
                    <div class="flex flex-col">
                      <span>Data do agendamento: </span>
                      <span>{{$agendamentos->data_agendamento}}</span>
                    </div>
                </div>
                <div class="w-full  mt-5">
              <table class="w-full whitespace-no-wrap ">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Descrição</th>
                    <th class="px-4 py-3">Atividade</th>
                    <th class="px-4 py-3">Criada em</th>
                
                  </tr>
                </thead>
              
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                      {{$agendamentos->produto}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                    <p class="tooltip">{{ mb_strimwidth($agendamentos->descricao, 0, 15, "...")}}
                        <span class="tooltiptext">{{$agendamentos->descricao}}</span> 
                      </p>
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        
                         {{date('d/m/Y',  strtotime($agendamentos->created_at))}}
                      </span>
                    </td>
                    
                  </tr>


                </tbody>
              
              </table>
            </div>
            <div class="-ml-6 mt-1 flex flex-col justify-center pt-5 pb-5" style="background-color: #F9FAFB; width: 600px;">
            <div class="text-gray-600 ml-5 ">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <!-- <div class="text-gray-600 -ml-2" >
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bubble" width="28" height="28" viewBox="0 0 24 24" stroke-width="1" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="6" cy="16" r="3" />
                <circle cx="16" cy="19" r="2" />
                <circle cx="14.5" cy="7.5" r="4.5" />
              </svg>
            </div> -->

        </div>
            @endforeach
          </div>




          <div class="hidden" id="tab-notas">
          @foreach ($data["nota"] as $notas)
              <div class="flex flex-row justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile-vibration" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <rect x="4" y="4" width="10" height="16" rx="1" />
                      <line x1="8" y1="5" x2="10" y2="5" />
                      <line x1="9" y1="17" x2="9" y2="17.01" />
                      <path d="M20 6l-2 3l2 3l-2 3l2 3" />
                    </svg>
                    
                    <span>Notas</span>
                    <a href="deleteNota?id={{$notas->id}}" class="p-2 bg-red-600 text-cool-gray-50 rounded-full ">E</a>
                    
                </div>
               

      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      
          

          <label class="flex flex-row items-center mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Data:</span>
                        <input class="ml-5 border border-gray-300 p-3 rounded-lg" type="text" disabled value="{{$notas->data}}" placeholder="data" name="data_aniversario">
          </label>
          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nota do reparos:</span>
            <input type="text" name="nota" value="{{$notas->nota}}" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" ></input>
          </label>
          
          <div>

          
         
          </div>
      </div>




            <div class="-ml-6 mt-1 flex flex-col justify-center pt-5 pb-5" style="background-color: #F9FAFB; width: 600px;">
            <div class="text-gray-600 ml-5 ">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <div class="text-gray-600 ml-5">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
              </svg>
            </div>
            <!-- <div class="text-gray-600 -ml-2" >
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bubble" width="28" height="28" viewBox="0 0 24 24" stroke-width="1" stroke="#002859" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="6" cy="16" r="3" />
                <circle cx="16" cy="19" r="2" />
                <circle cx="14.5" cy="7.5" r="4.5" />
              </svg>
            </div> -->

        </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>


      

    </div>
    
    <div class="w-1/3 pl-10">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

      </h2>
      <!-- CTA -->
      <a style="background-color: #002859;"  class="w-2/3 flex flex-col p-4 mb-8 text-sm font-semibold text-purple-100 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">

        <div class="flex flex-row items-center ">
          <div class="p-3 bg-gray-50 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
              <path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" />
            </svg>
          </div>
          <div class="flex flex-col">
            <span class="ml-3" style="font-size: 20px;">Último contato:</span>
            <span class="ml-3" style="font-size: 18px;">{{$data["ultimoc"][0]->data_agendamento}}</span>
          </div>
        </div>
      </a>
      <a style="background-color: #002859;"  class="w-2/3 flex flex-col p-4 mb-8 text-sm font-semibold text-purple-100 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">

        <div class="flex flex-row items-center ">
          <div class="p-3 bg-gray-50 rounded-xl">
           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <circle cx="12" cy="12" r="9" />
              <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
              <path d="M12 6v2m0 8v2" />
            </svg>
          </div>
          <div class="flex flex-col">
            <span class="ml-3" style="font-size: 20px;">Gastos do cliente:</span>
            <span class="ml-3" style="font-size: 18px;">R$ {{$valor_total['geral']}}</span>
          </div>
        </div>
      </a>
        <a style="background-color: #002859;"  class="w-2/3 flex flex-col p-4 mb-8 text-sm font-semibold text-purple-100 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">

        <div class="flex flex-row items-center ">
          <div class="p-3 bg-gray-50 rounded-xl">
           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <circle cx="12" cy="12" r="9" />
              <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
              <path d="M12 6v2m0 8v2" />
            </svg>
          </div>
          <div class="flex flex-col">
            <span class="ml-3" style="font-size: 20px;">Gastos do cliente limpo:</span>
            <span class="ml-3" style="font-size: 18px;">R$ {{$valor_total['limpo']}}</span>
          </div>
        </div>
      </a>
    </div>
  </div>
</main>
<script type="text/javascript">
  function changeAtiveTab(event,tabID){
    let element = event.target;
    while(element.nodeName !== "A"){
      element = element.parentNode;
    }
    ulElement = element.parentNode.parentNode;
    aElements = ulElement.querySelectorAll("li > a");
    tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
    for(let i = 0 ; i < aElements.length; i++){
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
<script>
  const MONTH_NAMES = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
  const DAYS = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];

  function app() {
    return {
      showDatepicker: false,
      datepickerValue: '',

      month: '',
      year: '',
      no_of_days: [],
      blankdays: [],
      days: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],

      initDate() {
        let today = new Date();
        this.month = today.getMonth();
        this.year = today.getFullYear();
        this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
      },

      isToday(date) {
        const today = new Date();
        const d = new Date(this.year, this.month, date);

        return today.toDateString() === d.toDateString() ? true : false;
      },

      getDateValue(date) {
        let selectedDate = new Date(this.year, this.month, date);
        this.datepickerValue = selectedDate.toDateString();

        this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + selectedDate.getMonth()).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);

        console.log(this.$refs.date.value);

        this.showDatepicker = false;
      },

      getNoOfDays() {
        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

        // find where to start calendar day of week
        let dayOfWeek = new Date(this.year, this.month).getDay();
        let blankdaysArray = [];
        for (var i = 1; i <= dayOfWeek; i++) {
          blankdaysArray.push(i);
        }

        let daysArray = [];
        for (var i = 1; i <= daysInMonth; i++) {
          daysArray.push(i);
        }

        this.blankdays = blankdaysArray;
        this.no_of_days = daysArray;
      }
    }
  }
</script>
@endsection