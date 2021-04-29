@extends('templates.templateProduto')
@section('conteudo')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">

    <!-- CTA -->
    <a style="background-color: #002859;" class="flex items-center p-4 mb-8 text-sm font-semibold mt-10 text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">


      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
      </svg>
      <h2 class="my-6 text-2xl font-semibold text-gray-100 dark:text-gray-200">
        Adicione aqui um novo produto
      </h2>


    </a>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      @foreach ($data["produtos"] as $produto)
      <form action="{{route ("admin.alteraProduto")}}" method="post">
        @csrf
        <input hidden type="text" name="id" value="{{$id}}">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Nome do produto</span>
          <input value="{{$produto->nome}}" type="text" name="nome" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: Tela" />
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Quantidade
          </span>
          <input value="{{$produto->quantidade}}" type="text" name="quantidade" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: 100" />
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Preço
          </span>
          <input value="{{$produto->preco}}" type="text" name="preco" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: 100,00" />
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Custo
          </span>
          <input value="{{$produto->custo}}" type="text" name="custo" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: 100,00" />
        </label>
  
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Posição no estoque
          </span>
          <input value="{{$produto->posEstoque}}" type="text" name="posEstoque" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: 100,00" />
        </label>
        <label class="block mt-4 text-sm mb-5">
          <span class="text-gray-700 dark:text-gray-400">
            Estoque Minimo
          </span>
          <input value="{{$produto->estoqueMinimo}}" type="text" name="estoqueMinimo" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: 100,00" />
        </label>

        <div>
          <button style="background-color: #002859;"  type="submit" class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Cadastrar
          </button>
        </div>
      </form>
      @endforeach
    </div>

  </div>
</main>
@endsection