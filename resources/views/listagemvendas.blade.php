@extends('templates.templateVendas')
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
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
@section('conteudo')

<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
  <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
    <!-- Mobile hamburger -->
    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
      </svg>
    </button>
    <!-- Search input -->
    <div class="flex justify-center flex-1 lg:mr-32">

    </div>
    <ul class="flex items-center flex-shrink-0 space-x-6">
      <!-- Theme toggler -->
      <li class="flex">
        <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
          <template x-if="!dark">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
            </svg>
          </template>
          <template x-if="dark">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
            </svg>
          </template>
        </button>
      </li>
      <!-- Notifications menu
              <li class="relative">
                <button
                  class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleNotificationsMenu"
                  @keydown.escape="closeNotificationsMenu"
                  aria-label="Notifications"
                  aria-haspopup="true"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                    ></path>
                  </svg>
                  Notification badge
                  <span
                    aria-hidden="true"
                    class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"
                  ></span>
                </button>
                <template x-if="isNotificationsMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeNotificationsMenu"
                    @keydown.escape="closeNotificationsMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Messages</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          13
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Sales</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          2
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Alerts</span>
                      </a>
                    </li>
                  </ul>
                </template>
              </li> -->
      <!-- Profile menu -->
      <li class="relative">

        <form action="{{route("sair")}}">
      <li class="flex">

        <a style="color: #002859;" class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{route("sair")}}">
          <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
          </svg>

          <button type="submit" style="color: #002859;">Sair</button>

        </a>
      </li>
      </form>
    </ul>
    </template>
    </li>
    </ul>
  </div>
</header>
<main class="h-full pb-16 overflow-y-auto">

    <div class="flex flex-row content-start">
      <div class="container mt-10 px-6 mx-auto grid  top-0 content-start">
      <h1 class="text-center text-5xl mb-5">VENDAS</h1>
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">
                
                <svg class="" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4" />
                  <circle cx="9" cy="9" r="2" />
                </svg>
                      
                </th>
                <th class="px-4 py-3">Data da venda</th>
                <th class="px-4 py-3">Cliente</th>
                <th class="px-4 py-3">Quantidade</th>
                <th class="px-4 py-3">Preço</th>
                <th class="px-4 py-3">Custo</th>
                <th class="px-4 py-3">Ações</th>
              </tr>
            </thead>
            @foreach ($data['venda'] as $vendas)
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->

                    <div>
                      <p class="font-semibold">{{$vendas->tipo}}</p>

                    </div>
                  </div>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->

                    <div>
                      <p class="font-semibold">{{date('d/m/Y',  strtotime($vendas->data_venda))}}</p>

                    </div>
                  </div>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->

                    <div>
                      <p class="font-semibold">{{$vendas->nome_cliente}}</p>

                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$vendas->quantidade}}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{$vendas->preco}}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{$vendas->custo}}
                  </span>
                </td>
                <td class="px-4 py-3 text-sm">

            

                  <a href="deletaVenda?id={{$vendas->id}}">
                    <button type="button" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                      D
                    </button>
                  </a>
                </td>
              </tr>


            </tbody>
            @endforeach
          </table>
        </div>
        
      </div>
      <div class="container mt-10 px-6 mx-auto grid top-0 content-start">
        <h1 class="text-center text-5xl mb-5">SERVIÇOS</h1>
        <div class="w-full content-start top-0 ">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">
                
                <svg class="" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4" />
                  <circle cx="9" cy="9" r="2" />
                </svg>
                      
                </th>
                <th class="px-4 py-3">Data da venda</th>
                <th class="px-4 py-3">Descrição</th>
                <th class="px-4 py-3">Cliente</th>
                <th class="px-4 py-3">Preço</th>
                <th class="px-4 py-3">Custo</th>
                <th class="px-4 py-3">Ações</th>
              </tr>
            </thead>
            @foreach ($data['servico'] as $servicos)
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->

                    <div>
                      <p class="font-semibold">{{$servicos->tipo}}</p>

                    </div>
                  </div>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->

                    <div>
                      <p class="font-semibold">{{date('d/m/Y',  strtotime($servicos->data_venda))}}</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->

                    <div>
                      <p class="tooltip">{{ mb_strimwidth($servicos->descricao, 0, 15, "...")}}
                        <span class="tooltiptext">{{$servicos->descricao}}</span> 
                      </p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$servicos->nome_cliente}}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{$servicos->valor}}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{$servicos->custo}}
                  </span>
                </td>
                <td class="px-4 py-3 text-sm">
                  <a href="deletaServico?id={{$servicos->id}}">
                    <button type="button" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                      D
                    </button>
                  </a>
                </td>
              </tr>


            </tbody>
            @endforeach
          </table>
        </div>
        
      </div>
      <!-- aaa -->
      </div>
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a  href="{{route("admin.controlevendas")}}" style="position:fixed;width:100px;height:100px;bottom:40px;right:40px;background-color: #002859;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
          z-index:1000;" >
        <i style="margin-top:30px; font-size: 50px;" class="fa fa-plus"></i>
        </a>

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>







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
      aElements[i].classList.remove("text-white");
      aElements[i].classList.remove("bg-purple-600");
      aElements[i].classList.add("text-purple-600");
      aElements[i].classList.add("bg-white");
      tabContents[i].classList.add("hidden");
      tabContents[i].classList.remove("block");
    }
    element.classList.remove("text-purple-600");
    element.classList.remove("bg-white");
    element.classList.add("text-white");
    element.classList.add("bg-purple-600");
    document.getElementById(tabID).classList.remove("hidden");
    document.getElementById(tabID).classList.add("block");
  }
</script>
@endsection