@extends('templates.template')

@section('conteudo')

<style>
  body,
  html {
    padding: 0;
    margin: 0;
    overflow-x: hidden;
    background: rgb(255, 255, 255);
  }


  * {
    text-decoration: none;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    border: none;
    outline: none;
  }

  .scroll {
  width:10px;
  table-layout: fixed;
  border-collapse: collapse;
}
.scroll th {
  text-decoration: underline;
}
.scroll th,
.scroll td {
  padding: 5px;
  text-align: left;
  min-width: 120px;
}


.scroll thead {

}
.scroll thead tr {
  display: block;
  position: relative;
}
.scroll tbody {
  display: block;
  overflow: auto;
  width: 700px;
  height: 200px;
  overflow-y: scroll;
    overflow-x: hidden;
}

.scroll2 {
  width:10px;
  table-layout: fixed;
  border-collapse: collapse;
}
.scroll2 th {
  text-decoration: underline;
}
.scroll2 th,
.scroll2 td {
  padding: 5px;
  text-align: left;
  min-width: 140px;
}


.scroll2 thead {

}
.scroll2 thead tr {
  display: block;
  position: relative;
}
.scroll2 tbody {
  display: block;
  overflow: auto;
  width: 700px;
  height: 200px;
  overflow-y: scroll;
    overflow-x: hidden;
}

  .card {
    position: fixed;
    bottom: 20px;
    right: 20px;
    height: 180px;
    width: 300px;
    background: white;
    border-radius: 6px;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    animation: to-right 1s;
  }

  .header-card {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .header-card svg {
    stroke: rgb(37, 37, 37);
    width: 30px;
    height: 30px;
    padding: 1px;
    stroke-width: 2;
    border-radius: 5px;
    transition: .3s;
    cursor: pointer;
  }

  .header-card svg:hover {
    background: rgb(204, 204, 204);
  }

  .header-card h2 {
    font-size: 13pt;
    color: rgb(37, 37, 37);
  }

  .card p {
    color: rgb(37, 37, 37);
    font-size: 10pt;
    margin-top: 10px;
  }

  .card p span {
    color: rgb(37, 37, 37);
    font-weight: bold;
  }

  .card button {
    padding: 10px;
    width: 120px;
    cursor: pointer;
    margin-top: 10px;
    font-weight: bold;
    color: white;
    font-size: 8pt;
    background: #7E3AF2;
    border-radius: 5px;
    transition: .3s;
  }

  .card button:hover {
    transform: scale(1.02);
  }

  .search-button {
    font-size: 9pt;
    margin-left: 20px;
    padding: 10px;
    background: #7E3AF2;
    font-weight: bold;
    color: white;
    border-radius: 8px;
  }

  /* acordeon */
  /* Tab content - closed */
  .tab-content {
    max-height: 0;
    -webkit-transition: max-height .35s;
    -o-transition: max-height .35s;
    transition: max-height .35s;
  }

  /* :checked - resize to full height */
  .tab input:checked~.tab-content {
    max-height: 100vh;
  }

  /* Label formatting when open */
  .tab input:checked+label {
    /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
    font-size: 1.25rem;
    /*.text-xl*/
    padding: 1.25rem;
    /*.p-5*/
    border-left-width: 2px;
    /*.border-l-2*/
    border-color: #6574cd;
    /*.border-indigo*/
    background-color: #f8fafc;
    /*.bg-gray-100 */
    color: #6574cd;
    /*.text-indigo*/
  }

  /* Icon */
  .tab label::after {
    float: right;
    right: 0;
    top: 0;
    display: block;
    width: 1.5em;
    height: 1.5em;
    line-height: 1.5;
    font-size: 1.25rem;
    text-align: center;
    -webkit-transition: all .35s;
    -o-transition: all .35s;
    transition: all .35s;
  }

  /* Icon formatting - closed */
  .tab input[type=checkbox]+label::after {
    content: "+";
    font-weight: bold;
    /*.font-bold*/
    border-width: 1px;
    /*.border*/
    border-radius: 9999px;
    /*.rounded-full */
    border-color: #b8c2cc;
    /*.border-grey*/
  }

  .tab input[type=radio]+label::after {
    content: "\25BE";
    font-weight: bold;
    /*.font-bold*/
    border-width: 1px;
    /*.border*/
    border-radius: 9999px;
    /*.rounded-full */
    border-color: #b8c2cc;
    /*.border-grey*/
  }

  /* Icon formatting - open */
  .tab input[type=checkbox]:checked+label::after {
    transform: rotate(315deg);
    background-color: #6574cd;
    /*.bg-indigo*/
    color: #f8fafc;
    /*.text-grey-lightest*/
  }

  .tab input[type=radio]:checked+label::after {
    transform: rotateX(180deg);
    background-color: #6574cd;
    /*.bg-indigo*/
    color: #f8fafc;
    /*.text-grey-lightest*/
  }

  @keyframes to-right {
    0% {
      margin-right: -500px;
    }

    100% {
      margin-right: 20px;
    }
  }


  @media only screen and (max-width: 600px) {
    .card {
      bottom: 10px;
      right: 10px;
      width: 280px;
    }
  }

  .modal {
    transition: opacity 0.25s ease;
  }

  body.modal-active {
    overflow-x: hidden;
    overflow-y: visible !important;
  }
</style>

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
  <!-- Desktop sidebar -->
  <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
      <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
        Lord cell
      </a>
      <ul class="mt-6">
        <li class="relative px-6 py-3">
          <span style="background-color: #002859;" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
          <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="{{ route("admin.index")}}">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="ml-4">Dashboard</span>
          </a>
        </li>
      </ul>
      <ul>
        <li class="relative px-6 py-3">
          <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ route("admin.pesquisa")}}">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span class="ml-4">Cliente</span>
          </a>
        </li>
        <li class="relative px-6 py-3">
          <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{route("admin.estoque")}}">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <span class="ml-4">Estoque</span>
          </a>
        </li>
        <!-- <li class="relative px-6 py-3">
            <a
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              href="charts.html"
            >
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                ></path>
                <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
              </svg>
              <span class="ml-4">#</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            <a
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              href="buttons.html"
            >
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                ></path>
              </svg>
              <span class="ml-4">#</span>
            </a>
          </li>
          <li class="relative px-6 py-3">
            <a
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              href="modals.html"
            >
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                ></path>
              </svg>
              <span class="ml-4">#</span>
            </a>
          </li> -->
        <li class="relative px-6 py-3">
          <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{route ("admin.novaVenda")}}">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
            <span class="ml-4">Vendas</span>
          </a>

      </ul>
      <div class="px-6 my-6">
        <a style="background-color: #002859;" href="{{route ("admin.user")}}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Cadastro de novos usuarios
          <span class="ml-2" aria-hidden="true">></span>
        </a>
      </div>
    </div>
  </aside>
  <!-- Mobile sidebar -->
  <!-- Backdrop -->
  <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
  <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
      <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
        Lord Cell
      </a>
      <ul class="mt-6">
        <li class="relative px-6 py-3">
          <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
          <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="{{ route("admin.index")}}">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="ml-4">Dashboard</span>
          </a>
        </li>
      </ul>
      <ul>
        <li class="relative px-6 py-3">
          <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ route("admin.tarefas")}}">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span class="ml-4">Tarefas</span>
          </a>
        </li>
        <li class="relative px-6 py-3">
          <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ route("admin.estoque")}}">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            <span class="ml-4">Estoque</span>
          </a>
        </li>
        <!-- <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="charts.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                  ></path>
                  <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                </svg>
                <span class="ml-4">#</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="buttons.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                  ></path>
                </svg>
                <span class="ml-4">#</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="modals.html"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                  ></path>
                </svg>
                <span class="ml-4">#</span>
              </a>
            </li> -->
        <li class="relative px-6 py-3">
          <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.html">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
            <span class="ml-4">Vendas</span>
          </a>
        </li>
        <li class="relative px-6 py-3">
          <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="togglePagesMenu" aria-haspopup="true">
            <span class="inline-flex items-center">
              <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
              </svg>
              <span class="ml-4">Páginas</span>
            </span>
            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </button>
          <template x-if="isPagesMenuOpen">
            <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900" aria-label="submenu">
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="pages/login.html">Login</a>
              </li>
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="pages/create-account.html">
                  Criar conta admin
                </a>
              </li>
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="pages/forgot-password.html">
                  Link para o website
                </a>
              </li>
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="pages/404.html">404</a>
              </li>
              <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                <a class="w-full" href="pages/blank.html">#</a>
              </li>
            </ul>
          </template>
        </li>
      </ul>
      <div class="px-6 my-6">
        <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Admin
          <span class="ml-2" aria-hidden="true">></span>
        </button>
      </div>
    </div>
  </aside>
  <div class="flex flex-col flex-1 w-full">
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
          <div class="relative w-full max-w-xl mr-6 text-blue-500 focus-within:text-blue-500">
            <div class="absolute inset-y-0 flex items-center pl-2">
              <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div class="flex">
              <input id="search-content" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Procurar clientes" aria-label="Search" />
              <button class="search-button" style="background-color: #002859;" id="button-search">BUSCAR</button>
            </div>
          </div>
        </div>
        <ul class="flex items-center flex-shrink-0 space-x-6">
          <!-- Theme toggler
              <li class="flex">
                <button
                  class="rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleTheme"
                  aria-label="Toggle color mode"
                >
                  <template x-if="!dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                  </template>
                  <template x-if="dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </template>
                </button>
              </li>
         -->
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
    <main class="h-full overflow-y-auto">
      <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Dashboard
        </h2>
        <!-- CTA -->
        <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" style="background-color: #002859;" href="{{route("admin.novaVenda")}}">
          <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <span>Balanço Geral</span>
          </div>
          <span>VER &RightArrow;</span>
        </a>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 mb-10">
          <!-- Card -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total de clientes do mês
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{$card['novosClientesMes']}}
              </p>
            </div>
          </div>
          @if(session()->get('usuario')['tipo'] == "admin")
          <!-- Card -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div>

            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Balanço geral do mês
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                R$ {{$valor_total['geral']}}
              </p>
            </div>

          </div>

          <!-- Card -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Custo do mês
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $valor_total['custo']}}
              </p>
            </div>
          </div>


          <!-- Card -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Lucro do mês
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ $valor_total['lucro'] }}
              </p>
            </div>
          </div>

        </div>
        @endif

        <div class="w-full">
          <form action="  {{route ("admin.index")}}  " class="mx-auto mb-10 object-cover object-center rounded-lg ">
            @csrf
            <div class="flex flex-row  rounded-lg p-5 shadow-lg" style="background-color: #002859;">
              <div class="bg-blue-100 rounded-full">
                <span class="pl-5 color-white">Data de inicio:</span>
                <input type="date" name="sday" class="bg-white rounded-lg shadow-sm p-3">
              </div>
              <div class="bg-blue-100 ml-5 pl-5 rounded-full">
                Data final:
                <input type="date" name="fday" class="bg-white rounded-lg shadow-sm p-3">
              </div>
              <button type="submit" class="ml-5 text-black px-5 rounded-lg bg-blue-100 hover:bg-blue-400">FILTRAR</button>
            </div>
          </form>
        </div>


        <div class="flex flex-row w-full mb-5">
          <div class=" md:w-3/5 mx-auto ">

            <div class="shadow-md">
              <div class="tab w-full overflow-hidden border-t">
                <input class="absolute opacity-0 " id="tab-multi-one" type="radio" name="tabs2">
                <label class="block p-5 leading-normal cursor-pointer text-gray-50 bg-blue-600 rounded-md" for="tab-multi-one">ANIVERSARIANTES DO MÊS</label>
                <div class="tab-content overflow-hidden border-l-2  border-indigo-500 leading-normal">
                  <div class="w-full overflow-x-auto">
                    <table class="scroll2">
                      <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                          <th class="px-4 py-3">Clientes</th>
                          <th class="px-4 py-3">Telefone</th>
                          <th class="px-4 py-3">Endereco</th>
                          <th class="px-4 py-3">Aparelho</th>
                          <th class="px-4 py-3">Ações</th>
                        </tr>
                      </thead>
                   
                      <tbody>
                      @foreach ($niver as $cliente)
                        <tr class="text-gray-700 dark:text-gray-400">
                          <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                              <!-- Avatar with inset shadow -->

                              <div>
                                <a >
                                  <p class="font-semibold">{{$cliente->nome}}</p>
                                </a>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                  {{$cliente->cpf}}
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                  {{$cliente->email}}
                                </p>
                              </div>
                            </div>
                          </td>
                          <td class="">
                            {{$cliente->telefone}}
                          </td>
                          <td class="">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                              {{$cliente->endereco}}
                            </span>
                          </td>
                          <td class="">
                            {{$cliente->aparelho}}
                          </td>
                          <td class="">
                            <a href="admin/agendamento?id={{$cliente->id}}" style="padding: 0px; margin:0; margin-left: 8px;">
                              <button type="button" style="padding: 11px; margin:0;" class="border  bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="15" height="15" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                  <path d="M15 7a2 2 0 0 1 2 2" />
                                  <path d="M15 3a6 6 0 0 1 6 6" />
                                </svg>
                              </button>
                            </a>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                
                    </table>
                  </div>
                  <!-- <h1>{{ $data["clientes"]->links() }}</h1> -->
                </div>
              </div>
            </div>
          </div>
          <div class=" md:w-3/5 mx-auto pl-2">
            <div class="shadow-md">
              <div class="tab w-full overflow-hidden border-t">
                <input class="absolute opacity-0" id="tab-single-one" type="radio" name="tabs2">
                <label class="block p-5 leading-normal cursor-pointer text-gray-50 uppercase  bg-yellow-400 rounded-md" for="tab-single-one">Estoque mínimo</label>
                <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                <div class="w-full overflow-x-auto">
                    <table class="scroll">
                      <thead class="">
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                          <th class="px-4 py-3">Nome</th>
                          <th class="px-4 py-3">Preço</th>
                          <th class="px-4 py-3">Custo</th>
                          <th class="px-4 py-3">Posição</th>
                          <th class="px-4 py-3">Quantidade</th>
                        </tr>
                      </thead>
                      
                      <tbody >
                      @foreach ($min as $prod)
                        <tr class="text-gray-700 dark:text-gray-400">
                          <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                              <!-- Avatar with inset shadow -->

                              <div>
                                <a>
                                  <p class="font-semibold">{{$prod->nome}}</p>
                                </a> 
                              </div>
                            </div>
                          </td>
                          <td class="">
                          {{$prod->preco}}
                            
                          </td>
                          <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                      
                              {{$prod->custo}}
                            </span>
                          </td>
                          <td class="">
                            {{$prod->posEstoque}}
                          </td>
                          <td class="px-4 py-3 text-sm">
                          {{$prod->quantidade}}
                          </td>
                          <td class="">

                            <a href="admin/alteracao/produto?id={{$prod->id}}" type="button" value="" class="border  bg-yellow-300 text-black rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                              E
                            </a>


                        
                            </td>
                        </tr>

                        @endforeach
                      </tbody>
                      

                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="grid grid-cols-3 gap-3 pb-10">
          <div class="">
            <div class="flex flex-row">
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-1/2 shadow-lg">
                <div  class="p-3 mr-4  bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Bruto
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$query['atvValor']}}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-1/2 shadow-lg ml-3">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Custo
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$query['atvCusto']}}
                  </p>
                </div>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 shadow-lg mt-5">
              <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Lucro
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  {{$query['lucro']}}
                </p>
              </div>
            </div>
            <div class="flex flex-row mt-5">
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-full shadow-lg">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Telefones concertados
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$query['atvt']}}
                  </p>
                </div>
              </div>
              
            </div>
          </div>
          <div class="">
            <!-- Charts -->


            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

              <canvas id="pie"></canvas>
              <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                  <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                  <span>Bruto</span>
                </div>
                <div class="flex items-center">
                  <span class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full"></span>
                  <span>Custo</span>
                </div>
                <div class="flex items-center">
                  <span class="inline-block w-3 h-3 mr-1 bg-green-600 rounded-full"></span>
                  <span>Lucro</span>
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <div class="flex flex-col">
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 shadow-lg">
                  <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total de clientes
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$query['clientecount']}}
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 shadow-lg mt-3">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                  </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Agendamentos
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$query['agendamentoscount']}}
                  </p>
                </div>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 shadow-lg mt-5">
              <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
              </div>
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                  Novos contatos
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  {{ $query['clientecount'] }}
                </p>
              </div>
            </div>
           
          </div>
        </div>



        <div class="flex flex-row mb-5">
          <!-- Cards 2 -->

          <!-- Card -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-1/2 shadow-lg">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total de clientes do dia
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{$card['novosClientesDia']}}
              </p>
            </div>
          </div>

          <!-- Card -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 w-1/2 shadow-lg ml-3">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Agendamentos do dia
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{$card['novosAgendamentosDia'] }}
              </p>
            </div>
          </div>
        </div>
      </div>


      <h1 class="pl-10 pb-5 text-xs font-bold tracking-wide text-left text-gray-900 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" style="">Agendamentos do dia</h1>

      <!-- New Table -->
      <div class="w-full overflow-hidden rounded-lg shadow-xs  pr-10 pl-10 pb-20">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Nome do cliente</th>
                <th class="px-4 py-3">Telefone do cliente</th>
                <th class="px-4 py-3">Data do agendamento</th>
                <th class="px-4 py-3">Status do agendamento</th>
              </tr>
            </thead>
            @foreach ($card['novosAgendamentosDiaPaginete'] as $agendamento)
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->

                    <div>

                      <p class="font-semibold">{{$agendamento->nome_cliente}}</p>


                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$agendamento->telefone_cliente}}
                </td>
                <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{$agendamento->data_agendamento}}
                  </span>
                </td>
                <td class="px-4 py-3 text-xs">
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                    {{$agendamento->status_agendamento}}
                  </span>
                </td>
              </tr>


            </tbody>
            @endforeach

          </table>
        </div>
        <h1>{{ $card['novosAgendamentosDiaPaginete']->links() }}</h1>


        @if($status != "")
        <!-- MODAL LIGAR  -->
        <div class="card" id="modal-bottom">
          <div class="header-card">
            <h2>{{$status[0]->nome_cliente}}</h2>
            <svg id="close-modal-bottom" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="56" height="56" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
          </div>
          <p>{{$status[0]->nome_cliente}} está esperando sua ligação.</p>
          <p>Número: <span>{{$status[0]->telefone_cliente}}</span></p>
          <!-- <p>O prazo é: <span>{{$status[0]->data_agendamento}}</span></p> -->
          <a href="/admin/deletePendencia?id={{$status[0]->idagendamento}}" target="_blank">
            <button style="background-color: #002859;" type="submit" id="called-client">Já Liguei</button>
          </a>
        </div>
        @endif

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../../js/filterBusca.js"></script>

        <script>
        let bruto = parseInt('{{$query["atvValor"]}}');
        let custo = parseInt('{{$query["atvCusto"]}}') ;
        let liquido = parseInt(bruto - custo);
        </script>
        <script>
          $("#close-modal-bottom").click(() => {
            $('#modal-bottom').hide(400);
          });

          $("#called-client").click(() => {
            $('#modal-bottom').hide(400);
          });
        </script>

        <script>
          /* Optional Javascript to close the radio button version by clicking it again */
          var myRadios = document.getElementsByName('tabs2');
          var setCheck;
          var x = 0;
          for (x = 0; x < myRadios.length; x++) {
            myRadios[x].onclick = function() {
              if (setCheck != this) {
                setCheck = this;
              } else {
                this.checked = false;
                setCheck = null;
              }
            };
          }
        </script>


        <script>
          var openmodal = document.querySelectorAll('.modal-open')
          for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function(event) {
              event.preventDefault()
              toggleModal()
            })
          }

          const overlay = document.querySelector('.modal-overlay')
          overlay.addEventListener('click', toggleModal)

          var closemodal = document.querySelectorAll('.modal-close')
          for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
          }

          document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
              isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
              isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
              toggleModal()
            }
          };


          function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
          }
        </script>
        @include('sweetalert::alert')
        @endsection