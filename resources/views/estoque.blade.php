@extends('templates.templateEstoque')

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
  .modal {
    transition: opacity 0.25s ease;
  }

  body.modal-active {
    overflow-x: hidden;
    overflow-y: visible !important;
  }
</style>
<main class="h-full pb-16 overflow-y-auto">

  <div class="container px-6 mx-auto grid">

    <!-- CTA -->
    <a class="flex items-center p-4 mb-8 text-sm font-semibold mt-10 text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">


      <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
      </svg>
      <h2 class="my-6 text-2xl font-semibold text-gray-100 dark:text-gray-200">
        Controle de estoque
      </h2>


    </a>


    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <span class="flex items-center col-span-3">
        <a type="submit" class="modal-open px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Adicionar novo produto
        </a>
        
      </span>
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Produto</th>
              <th class="px-4 py-3">Quantidade</th>
              <th class="px-4 py-3">Preço</th>
              <th class="px-4 py-3">Ações</th>
            </tr>
          </thead>
          @foreach ($data["produtos"] as $produto)
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->

                  <div>
                    <p class="font-semibold">{{$produto->nome}}</p>

                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                {{$produto->quantidade}}
              </td>
              <td class="px-4 py-3 text-xs">
                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                  {{$produto->preco}}
                </span>
              </td>
              <td class="px-4 py-3 text-sm">

                <a href="alteracao/produto?id={{$produto->id}}" type="button" value="" class="border  bg-yellow-300 text-black rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                  E
                </a>


                <a href="deletaProduto?id={{$produto->id}}">
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
          <div class="modal-content py-4 text-left px-6 rounded-br-2xl ">
            <main class="h-full pb-16 overflow-y-auto">
              <div class="container px-6 mx-auto grid rounded-br-2xl ">

                <!-- CTA -->
                <a class="flex items-center p-4 mb-8 text-sm font-semibold mt-10 text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">


                  <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                  </svg>
                  <h2 class="my-6 text-2xl font-semibold text-gray-100 dark:text-gray-200">
                    Adicione aqui um novo produto
                  </h2>


                </a>

                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                  <form action="{{route ("admin.storeProduto")}}" method="post">
                    @csrf
                    <label class="block text-sm">
                      <span class="text-gray-700 dark:text-gray-400">Nome do produto</span>
                      <input type="text" name="nome" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: Tela" />
                    </label>

                    <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">
                        Quantidade
                      </span>
                      <input type="text" name="quantidade" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: 100" />
                    </label>
                    <label class="block mt-4 text-sm">
                      <span class="text-gray-700 dark:text-gray-400">
                        Preço
                      </span>
                      <input type="text" name="preco" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: 100,00" />
                    </label>



                </div>

              </div>
            </main>

            <!--Footer-->
            <div class="flex justify-between pt-2">
              <button type="submit" class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Cadastrar
              </button>
              <button class="modal-close px-4 bg-purple-600 p-3 rounded-lg text-white hover:bg-indigo-400">Fechar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
</main>
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