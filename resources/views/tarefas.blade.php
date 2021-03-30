@extends('templates.templateCliente')

@section('conteudo')
@include('sweetalert::alert')
<main class="h-full pb-16 overflow-y-auto">



  <div class="container px-6 mx-auto flex">

    <div class="w-1/2">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">

      </h2>
      <!-- CTA -->
      <a class="w-2/3 flex flex-col p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">

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
    <div class="w-1/2 pl-10 pt-10">
      <!-- General elements -->
      <div class="flex items-center ">
        <div class="bg-gray-300 rounded-full p-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-versions" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="10" y="5" width="10" height="14" rx="2" />
            <line x1="7" y1="7" x2="7" y2="17" />
            <line x1="4" y1="8" x2="4" y2="16" />
          </svg>
        </div>
        <p class="ml-4 text-xl text-gray-600 font-semibold dark:text-gray-400">Adicionar uma atividade</p>
      </div>
      <div class="ml-10 mt-1 flex flex-col">
        <div class="text-gray-600">|</div>
        <div class="text-gray-600">|</div>

      </div>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{route ("admin.storeTarefas")}}" method="post" enctype="multipart/form-data">
          @csrf
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nome da atividade</span>
            <input type="text" name="nomeAtv" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Troca de tela" />
          </label>

          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nome cliente</span>
            <input type="text" disabled value=" {{$user['nome']}}" name="nome_cliente" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Troca de tela" />
          </label>

          <input type="text" hidden value="{{$id}}" name="id_cliente">

          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Valor do reparo
            </span>
            <input name="valorRep" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: R$ 220.00" />
          </label>
          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Custo do reparo
            </span>
            <input name="custoRep" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Ex: R$ 120.00" />
          </label>

          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Objetos usados
            </span>

            <select id="produtos" name="produtos" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
              @foreach($data["produtos"] as $produto)
              <option value="{{$produto->nome}}">{{$produto->nome}}</option>
              @endforeach
            </select>

          </label>

          <label class="flex text-sm flex-col">
              <span class="text-gray-700 dark:text-gray-400">Data do agendamento</span>
              <input style="width: 260px; margin-bottom: 15px;" type="date" placeholder="data" name="date">
          </label>
          
          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nota do reparo</span>
            <textarea type="text" name="nota" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Nota ..."></textarea>
          </label>
          <div class="flex items-center justify-center bg-grey-lighter">
            <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-700
 hover:text-white">
              <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
              </svg>
              <span class="mt-2 text-base leading-normal">Selecione o documento de confirmação</span>
              <input type="file" name="arquivo" class="hidden" />
            </label>
          </div>
          <div>
            <button type="submit" class="px-10 mt-5 py-4 w-full font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Cadastrar
            </button>
          </div>
      </div>
      </form>

      @foreach($data["tarefas"] as $tarefa)
      <div class="flex items-center ">
        <div class="bg-gray-300 rounded-full p-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <rect x="4" y="5" width="16" height="16" rx="2" />
            <line x1="16" y1="3" x2="16" y2="7" />
            <line x1="8" y1="3" x2="8" y2="7" />
            <line x1="4" y1="11" x2="20" y2="11" />
            <rect x="8" y="15" width="2" height="2" />
          </svg>
        </div>
        <p class="ml-10 text-xl text-gray-600 font-semibold dark:text-gray-400">Atividade: {{$tarefa->nomeAtv}}</p>
      </div>
      <div class="ml-10 mt-1 flex flex-col">
        <div class="text-gray-600" style="font-size: 10px;">|</div>
        <div class="text-gray-600" style="font-size: 10px;">|</div>
        <div class="text-gray-600" style="font-size: 10px;">|</div>
      </div>
      <div class=" px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <div class="flex flex-col">

          <div class="flex pt-5 items-center p-3 shadow ">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-2" width="29" height="29" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
              <path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5" />
            </svg>
            <input class="ml-4 w-full p-2 rounded-md" disabled value="Valor do reparo: {{$tarefa->valorRep}}" type="text">

          </div>
          <div class="flex mt-5 items-center p-3 shadow ">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-receipt-2" width="29" height="29" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2" />
              <path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5" />
            </svg>
            <input class="ml-4 w-full p-2 rounded-md" disabled value="custo: {{$tarefa->custoRep}}" type="text">

          </div>
          <div class="flex mt-5 items-center p-3 shadow ">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notes" width="29" height="29" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <rect x="5" y="3" width="14" height="18" rx="2" />
              <line x1="9" y1="7" x2="15" y2="7" />
              <line x1="9" y1="11" x2="15" y2="11" />
              <line x1="9" y1="15" x2="13" y2="15" />
            </svg>
            <textarea class="ml-4 w-full h-full p-2 rounded-md" disabled type="text">Nota: {{$tarefa->nota}}</textarea>

          </div>
          <div class="flex mt-5 items-center p-3 shadow ">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-history" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <polyline points="12 8 12 12 14 14" />
              <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
            </svg>
            <input class="ml-4 w-full p-2 rounded-md" disabled value="Prazo de entrega: {{$tarefa->prazo}}" type="text">

          </div>
          <div class="flex mt-5 items-center p-3 shadow ">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="29" height="29" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
              <line x1="12" y1="12" x2="20" y2="7.5" />
              <line x1="12" y1="12" x2="12" y2="21" />
              <line x1="12" y1="12" x2="4" y2="7.5" />
              <line x1="16" y1="5.25" x2="8" y2="9.75" />
            </svg>
            <input class="ml-4 w-full p-2 rounded-md" disabled value="Objeto usado: {{$tarefa->produtoUsado}}" type="text">

          </div>
          <a class="mt-10 bg-purple-600 text-center text-white pt-3 py-3 pl-5 pr-5 rounded-md" href="/storage/files/{{$tarefa->documento}}">Vizualizar doumentação</a>

        </div>


      </div>

      @endforeach
</main>
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