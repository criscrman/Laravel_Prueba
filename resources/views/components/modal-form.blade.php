@props(['title'])

<button type="button" x-data x-on:click="$dispatch('open-modal')" class="bg-green-800 text-yellow-50 p-1 rounded">
        Crear Nuevo
      </button>

      <div
        x-data = "{show : false}"
        x-show = "show"
        x-on:open-modal.window = "show = true"
        x-on:close-modal.window = "show = false"
        x-on:keydown.escape.window = "show = false"
        class="fixed z-50 inset-0"
      >
          {{-- BackGround --}}
          <div x-on:click="show = false" class="fixed inset-0 bg-gray-300 opacity-75 "></div>

          {{-- Model --}}
          <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  @if (isset($title))
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        
                      {{$title}}
                    </h3>
                    @endif
                    <button x-on:click="show = false"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
             
                    <div class="form">
                
                    
                    <form class="form-1" action="" method="post">
                      @csrf
                      <div>
                        <label for="name" class="">Nombre Completo</label>
                        <input type="text" name="name" value="{{old('name')}}" class="input-crear" placeholder="Cristian Peréz..." required>
                        
                        @error('name')
                        <span>{{$message}}</span>
                        @enderror
                  
                      </div>
                        
                      <div>
                  
                      <label for="titulo">
                        Titulo
                      </label><input type="text" name="titulo" class="input-crear" value="{{old('titulo')}}" placeholder="Prueba Tipo A...">
                        
                        @error('titulo')
                        <span>{{$message}}</span>
                        @enderror
                  
                      </div>
                  
                    
                   
                      
                        <div>
                        <label for="description">Descripción</label><textarea name="description"  class="input-crear" cols="15" rows="5">{{old('description')}}</textarea>
                          
                        @error('description')
                        <span>{{$message}}</span>
                        @enderror
                        </div>  
                        <!-- Modal footer -->
                          <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
                            <button x-on:click="show = false" data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                        </div>
                        </div>
                  
                    </form>
                  
                  
                  
                  </div>
                  
                  </div>
                </div>
              
                
           
        </div>
        

   
      
     
