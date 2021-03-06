@extends('templates.template')
<title>Cliente</title>
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
  width:350px;
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
  min-width: 240px;
}


.scroll thead {
  background-color: red;
  color: #fdfdfd;
}
.scroll thead tr {
  display: block;
  position: relative;
}
.scroll tbody {
  display: block;
  overflow: auto;
  width: 1400px;
  height: 400px;
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
          <span style="background-color: #002859;" class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
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
        <a href="{{route ("admin.user")}}" style="background-color: #002859;" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
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
        Assistencia do Murilo
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
          <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="{{ route("admin.pesquisa")}}">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span class="ml-4">Clientes</span>
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
              <span class="ml-4">P??ginas</span>
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
      <div class="container flex items-center justify-between h-full px-6 mx-auto text-blue-600 dark:text-purple-300">
        <!-- Mobile hamburger -->
        <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          </svg>
        </button>
        <!-- Search input -->
        <div class="flex justify-center flex-1 text-blue-400 lg:mr-32">
          <div class="relative w-full max-w-xl mr-6 focus-within:text-blue-400">
            <div class="absolute inset-y-0 flex items-center pl-2">
              <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div class="flex">
              <input id="search-content2" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Procurar clientes" aria-label="Search" />
              <button style="background-color: #002859;" class="search-button" id="button-search2">BUSCAR</button>
            </div>
          </div>
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



          <!--Modal CADASTRO-->
          <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
          <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

          <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
              <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
              <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
              <main style="height: 700px;" class=" pb-16 overflow-y-auto" >
                <a style="background-color: #002859;" class="flex items-center w-full mb-3 text-sm font-semibold mt-1 text-purple-100 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">


                  <svg xmlns="http://www.w3.org/2000/svg" class="ml-5 icon icon-tabler icon-tabler-user-plus" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 11h6m-3 -3v6" />
                  </svg>
                  <h2 class="pl-5 my-6 text-2xl font-semibold text-gray-100 dark:text-gray-200">
                    Cadastro de cliente
                  </h2>


                </a>
                <div class="container px-6 mx-auto grid" >

                  <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form action="{{route ("admin.storeCliente")}}" method="post">
                      @csrf
                      <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nome</span>
                        <input type="text" name="nome" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Raphael de Moura" />
                      </label>
                      <label class="flex flex-row items-center mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Anivers??rio</span>
                        <input class="ml-5 border border-gray-300 p-3 rounded-lg" type="date" placeholder="data" name="data_aniversario">
                      </label>
                      <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                          E-mail
                        </span>
                        <input type="text" name="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="raphaelmourateixeira@gmail.com" />
                      </label>
                      <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                          Telefone
                        </span>
                        <input type="text" name="telefone" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="(31)975695622" />
                      </label>
                      <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                          Endere??o
                        </span>
                        <input type="text" name="endereco" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Rua 1, bairro 2, numero 0, mg" />
                      </label>
                      <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                          CPF
                        </span>
                        <input type="text" name="cpf" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="130.850.826-12" />
                      </label>
                      <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                          Aparelho
                        </span>
                        <input type="text" name="aparelho" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Iphone 11" />
                      </label>
                      <div>

                      </div>

                  </div>

                </div>
              </main>

              <!--Footer-->
              <div class="flex justify-between pt-2">
                <button type="submit" class="px-10 py-4 font-medium leading-5 bg-green-500 text-white transition-colors duration-150  border border-transparent rounded-lg active:bg-green-600 hover:bg-green-600 focus:outline-none focus:shadow-outline-green-600">
                  Cadastrar
                </button>


                </form>
                <button class="modal-close px-4  p-3 rounded-lg bg-red-600 text-white hover:bg-red-700">Fechar</button>
              </div>
            </div>
          </div>
        </div>

    <main class="h-full overflow-y-auto">


      <!-- New Table -->
      <div class="w-full overflow-hidden rounded-lg shadow-xs pt-10 pr-10 pl-10">
        <div class="w-full overflow-x-auto">
          <table class="scroll">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Clientes</th>
                <th class="px-4 py-3">Telefone</th>
                <th class="px-4 py-3">Endereco</th>
                <th class="px-4 py-3">Aparelho</th>
                <th class="px-4 py-3">Anivers??rio</th>
                <th class="px-4 py-3">A????es</th>
              </tr>
            </thead>
            
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($data["clientes"] as $cliente)
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                  <a href="/admin/linhadotempo?id={{$cliente->id}}">
                    <div class="hover:bg-gray-100 hover:p-10 rounded-md">
                    
                        <p class="font-semibold">{{$cliente->nome}}</p>
                  
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{$cliente->cpf}}
                      </p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{$cliente->email}}
                      </p>
                    </div>
                  </a>
                  </div>
                </td>
                <td class="">
                  {{$cliente->telefone}}
                </td>
                <td class="">
                  <span class="px-2 py-1 font-normal leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100" style="font-size: 10px;">
                    {{$cliente->endereco}}
                  </span>
                </td>
                <td class="">
                  {{$cliente->aparelho}}
                </td>
                <td class="">
                  {{$cliente->data_aniversario}}
                </td>
                <td class="">

                  <a href="alteracao/cliente?id={{$cliente->id}}" type="button" value="{{$cliente->id}}" class="border  bg-yellow-300 text-black rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                    E
                  </a>


                  <a href="deletaCliente?id={{$cliente->id}}">
                    <button type="button" class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                      D
                    </button>
                  </a>
                  <a href="agendamento?id={{$cliente->id}}" style="padding: 0px; margin:0; margin-left: 8px;">
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
    
      </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a class="modal-open " href="https://wa.me/55(aqui seu numero com ddd | tudo junto)?text=Adorei%20seu%20artigo" style="position:fixed;width:100px;height:100px;bottom:40px;right:40px;background-color: #002859;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
          z-index:1000;" target="_blank">
          <i style="margin-top:30px; font-size: 50px;" class="fa fa-plus"></i>
        </a>
    </main>
  


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../../js/filterBusca.js"></script>

        <script>
          $("#close-modal-bottom").click(() => {
            $('#modal-bottom').hide(400);
          });

          $("#called-client").click(() => {
            $('#modal-bottom').hide(400);
          });
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