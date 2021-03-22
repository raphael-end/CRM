@extends('templates.templateCliente')

@section('conteudo')
@include('sweetalert::alert')
        <main class="h-full pb-16 overflow-y-auto">

       

          <div class="container px-6 mx-auto flex">

          <div class="w-1/2">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Informações do cliente  
            </h2>
            <!-- CTA -->
            <a
              class=" flex flex-col p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
            >
              
                <div class="flex">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>Nome: {{$user['nome']}}</span>
              </div>
              <br>
              <hr>
              <div class="flex mt-4">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>E-mail: {{$user['email']}}</span>
              </div>
              <br>
              <hr>
              <div class="flex mt-4">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>Telefone: {{$user['tel']}}</span>
              </div>
              <br>
              <hr>
              <div class="flex mt-4">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>Endereço: {{$user['endereco']}}</span>
              </div>
              <br>
              <hr>
              <div class="flex mt-4">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>CPF: {{$user['cpf']}}</span>
              </div>
              <br>
              <hr>
              <div class="flex mt-4">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>Modelo do aparelho: {{$user['aparelho']}}</span>
              </div>
            </a>
            </div>
            <div class="w-full pl-10 pt-10">
            <!-- General elements -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Adicionar uma atividade
            </h4>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="{{route ("admin.storeTarefas")}}" method="post"  enctype="multipart/form-data">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nome da atividade</span>
                <input
                  type="text" name="nomeAtv"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Troca de tela"
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nome cliente</span>
                <input
                  type="text" disabled value=" {{$user['nome']}}" name="nome_cliente"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Troca de tela"
                />
              </label>

              <input type="text" hidden value="{{$id}}" name="id_cliente">

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Valor do reparo
                </span>
                <input
                   name="valorRep" 
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Ex: R$ 220.00"
                />
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Custo do reparo
                </span>
                <input
                   name="custoRep"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Ex: R$ 120.00"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Objetos usados
                </span>
                
                    <select
                      id="produtos"  name="produtos"
                      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      
                    >
                    @foreach($data["produtos"] as $produto)
                      <option value="{{$produto->nome}}">{{$produto->nome}}</option>
                    @endforeach
                    </select>
                    
              </label>
             
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

  <style>
    [x-cloak] {
      display: none;
    }
  </style>

  <div class="antialiased sans-serif">
      <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
          <div class="container mx-auto-">
              <div class="w-64">

                  <label for="datepicker" class="text-gray-700 dark:text-gray-400">Prazo de entrega</label>
                  <div class="relative">
                      <input type="hidden" name="date" x-ref="date">
                      <input 
                          type="text"
                          readonly
                          x-model="datepickerValue"
                          @click="showDatepicker = !showDatepicker"
                          @keydown.escape="showDatepicker = false"
                          class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                          placeholder="Select date">

                          <div class="absolute top-0 right-0 px-3 py-2">
                              <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                              </svg>
                          </div>


                          <!-- <div x-text="no_of_days.length"></div>
                          <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                          <div x-text="new Date(year, month).getDay()"></div> -->

                          <div 
                              class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" 
                              style="width: 17rem" 
                              x-show.transition="showDatepicker"
                              @click.away="showDatepicker = false">

                              <div class="flex justify-between items-center mb-2">
                                  <div>
                                      <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                      <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                  </div>
                                  <div>
                                      <button 
                                          type="button"
                                          class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                          :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                          :disabled="month == 0 ? true : false"
                                          @click="month--; getNoOfDays()">
                                          <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                          </svg>  
                                      </button>
                                      <button 
                                          type="button"
                                          class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                                          :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                          :disabled="month == 11 ? true : false"
                                          @click="month++; getNoOfDays()">
                                          <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                          </svg>									  
                                      </button>
                                  </div>
                              </div>

                              <div class="flex flex-wrap mb-3 -mx-1">
                                  <template x-for="(day, index) in DAYS" :key="index">	
                                      <div style="width: 14.26%" class="px-1">
                                          <div
                                              x-text="day" 
                                              class="text-gray-800 font-medium text-center text-xs"></div>
                                      </div>
                                  </template>
                              </div>

                              <div class="flex flex-wrap -mx-1">
                                  <template x-for="blankday in blankdays">
                                      <div 
                                          style="width: 14.28%"
                                          class="text-center border p-1 border-transparent text-sm"	
                                      ></div>
                                  </template>	
                                  <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                      <div style="width: 14.28%" class="px-1 mb-1">
                                          <div
                                              @click="getDateValue(date)"
                                              x-text="date"
                                              class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                              :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                          ></div>
                                      </div>
                                  </template>
                              </div>
                         
                          </div>
                      </div>
                  </div>	 
              </div>

          </div>
      </div>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nota do reparo</span>
                <textarea
                  type="text" name="nota"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  rows="3"
                  placeholder="Nota ..."
                ></textarea>
              </label>
              <div class="flex items-center justify-center bg-grey-lighter">
                  <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-700
 hover:text-white">
                      <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                      </svg>
                      <span class="mt-2 text-base leading-normal">Selecione o documento de confirmação</span>
                      <input type="file" name="arquivo" class="hidden" />
                  </label>
              </div>
              <div>
                <button
                  type="submit"
                  class="px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                 Cadastrar
                </button>
              </div>
            </div>
            </form>

            @foreach($data["tarefas"] as $tarefa)
            <div class="mx-auto mb-10 object-cover pl-1/2 flex flex-col">
              <div class="text-purple-600 rounded-full h-10 w-10 mt-4  flex items-center justify-center bg-purple-600"><span class="py-10">ccc</span></div>
              <div class="text-purple-600 rounded-full h-10 w-10 mt-4 flex items-center justify-center bg-purple-600"><span class="py-10">ccc</span></div>
              <div class="text-purple-600 rounded-full h-10 w-10 mt-4  mb-4 flex items-center justify-center bg-purple-600"><span class="py-10">Ccc</span></div>
            </div>
            <div
            class=" px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
             >
              <div class="flex">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <div class="flex flex-col">
                  <span class="text-xl font-semibold dark:text-gray-400">Atividade: {{$tarefa->nomeAtv}}</span>
                  <div class="flex">
                    <span class="text-purple-600 font-semibold mr-4 dark:text-gray-400">Valor: {{$tarefa->valorRep}}</span>
                    <span class="text-purple-600 font-semibold dark:text-gray-400">custo: {{$tarefa->custoRep}}</span>
                  </div>
                  <hr class="w-24">
                  <span class="mt-4 text-gray-600 dark:text-gray-400">Nota: {{$tarefa->nota}}.</span>
                  <span class="mt-4 text-gray-600 dark:text-gray-400">Prazo de entrega: {{$tarefa->prazo}}.</span>
                  <span class="mt-4 text-gray-600 dark:text-gray-400">Objeto usado: {{$tarefa->produtoUsado}}.</span>
                  </label>
                  <a class="bg-purple-600 text-white pt-3 py-3 pl-5 pr-5 rounded-md" href="/storage/files/{{$tarefa->documento}}">Documento do cliente</a>
           
                  
                </div>
                
              </div>
             </div>
             
            @endforeach
        </main>
        <script>
          const MONTH_NAMES = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Juhoy', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
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

                      this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ selectedDate.getMonth()).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);

                      console.log(this.$refs.date.value);

                      this.showDatepicker = false;
                  },

                  getNoOfDays() {
                      let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                      // find where to start calendar day of week
                      let dayOfWeek = new Date(this.year, this.month).getDay();
                      let blankdaysArray = [];
                      for ( var i=1; i <= dayOfWeek; i++) {
                          blankdaysArray.push(i);
                      }

                      let daysArray = [];
                      for ( var i=1; i <= daysInMonth; i++) {
                          daysArray.push(i);
                      }

                      this.blankdays = blankdaysArray;
                      this.no_of_days = daysArray;
                  }
              }
          }
      </script> 
@endsection