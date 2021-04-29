@extends('templates.templateVendas')
@section('conteudo')

<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">

    <!-- CTA -->
    <a style="background-color: #002859;" class="flex items-center w-3/6 p-4 mb-8 text-sm font-semibold mt-10 text-purple-100  rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">


      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
      </svg>
      <h2 class="my-6 text-2xl font-semibold text-gray-100 dark:text-gray-200">
       AGENDAMENTO 
      </h2>


    </a>

    <div class="px-4 py-3 mb-8 w-3/6 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <form action="{{route("admin.storeAgendamento3")}}" method="POST">
      @csrf
        <input type="text" hidden value="{{$idcliente}}" name="id_cliente">
        <input type="text" hidden value="{{$data['telefone']}}" name="telefone_cliente">
        <div class="flex flex-row justify-between">
          <label class="flex flex-row items-center mt-5  text-sm">
            <span class="text-gray-700 text-xl dark:text-gray-400">
              Produto
            </span>
            <input type="text" name="produto" class="ml-5 border border-gray-300 p-3 rounded-lg" value="{{$data["produto"]}}">
          </label>
          <label class="flex flex-row items-center mt-5  text-sm">
            <span class="text-gray-700 text-xl dark:text-gray-400">
              Nome cliente
            </span>
            <input type="text" name="nomec" class="ml-5 border border-gray-300 p-3 rounded-lg" value="{{$data["cliente"]}}">
          </label>

        </div>
        <label class="flex flex-row items-center mt-5  text-sm">
            <span class="text-gray-700 text-xl dark:text-gray-400">
              Data do agendamento
            </span>
            <input style="width: 260px;" class="ml-5 border border-gray-300 p-3 rounded-lg" type="date" placeholder="data" name="date">
          </label>

          <label class="flex flex-row items-center -mt-10  text-sm">
            <span class="text-gray-700 text-xl dark:text-gray-400">
              Descrição
            </span>
            <textarea type="text" name="descricao" class="mt-20 block w-full border border-gray-300 p-3 rounded-lg" rows="5" placeholder="Nota ..."></textarea>
         
          </label>
          <div>
            <button type="submit" style="background-color: #002859;" class="px-10 py-4 mt-5 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Agendar
            </button>
          </div>
      </form>
       
    </div>

  </div>

 

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../../js/filterRefreshProduct.js"></script>

  <script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  </script>
</main>

@endsection