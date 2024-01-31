@props(['name', 'title'])



<div role="dialog" aria-modal="true" x-data = "{show : false}" x-show = "show" x-on:open-modal.window = "show = true"
    x-on:close-modal.window = "show = false" x-on:keydown.escape.window = "show = false" tabindex="0"
    class="fixed z-50 inset-0">

    {{-- BackGround --}}
    <div x-on:click="show = false" class="fixed inset-0 bg-gray-300 opacity-75 "></div>

    {{-- Model --}}
    <div class="flex justify-center items-center overflow-y-auto p-4  w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-11/12 md:w-7/12 rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                @if (isset($title))
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">

                        {{ $title }}
                    </h3>
                @endif
                <button x-on:click="show = false" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 ">

                <div class="form ">

                    <!-- @submit.prevent="true, console.log('DATO ENVIADO')" -->
                    <form @submit.prevent="true, console.log('DATO ENVIADO')" x-data x-validate
                        @submit="$validate.submit" class="form-1  md:grid grid-cols-2 gap-4"
                        action="{{ route('Inventario.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="Nombre" class="">Nombre Completo</label>
                            <input type="text" name="Nombre" value="{{ old('Nombre') }}" class="input-crear"
                                placeholder="Cristian Peréz..." required>

                            @error('Nombre')
                                <span>{{ $message }}</span>
                            @enderror

                        </div>

                        <div>

                            <label for="Serial">
                                Titulo
                            </label><input type="text" name="Serial" class="input-crear" value="{{ old('Serial') }}"
                                placeholder="Prueba Tipo A..." x-validate.wholenumber
                                data-error-msg="positive whole number required">

                            @error('Serial')
                                <span>{{ $message }}</span>
                            @enderror

                        </div>
                        <div>

                            <label for="Ubicacion">
                                Ubicacion
                            </label><input type="text" name="Ubicacion" class="input-crear"
                                value="{{ old('Ubicacion') }}" placeholder="Prueba Tipo A...">

                            @error('Ubicacion')
                                <span>{{ $message }}</span>
                            @enderror

                        </div>
                        <div>

                            <label for="Estado">
                                Estado
                            </label><input type="text" name="Estado" class="input-crear" value="{{ old('Estado') }}"
                                placeholder="Prueba Tipo A...">

                            @error('Estado')
                                <span>{{ $message }}</span>
                            @enderror

                        </div>

                        <div>
                            <label for="Precio">
                                Precio
                            </label><input type="text" name="Precio" class="input-crear"
                                value="{{ old('Precio') }}" placeholder="Prueba Tipo A...">

                            @error('Precio')
                                <span>{{ $message }}</span>
                            @enderror

                        </div>



                        <div>
                            <label for="Ultimo_Mantenimiento">Último Mantenimiento</label><input type="date"
                                id="start" name="Ultimo_Mantenimiento" value="2018-07-22" min="2018-01-01"
                                max="2018-12-31" />
                        </div>
                        <div>
                            <label for="Recomentacion">
                                Recomentacion
                            </label><input type="text" name="Recomentacion" class="input-crear"
                                value="{{ old('Recomentacion') }}" placeholder="Prueba Tipo A...">

                            @error('Recomentacion')
                                <span>{{ $message }}</span>
                            @enderror

                        </div>





                        <div>
                            <label for="Descripcion">Descripción</label>
                            <textarea name="Descripcion" class="input-crear" cols="30" rows="3">{{ old('Descripcion') }}</textarea>

                            @error('Descripcion')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Modal footer -->
                        <div wire:ignore.self
                            class="flex items-center col-start-1 col-end-3 p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                            <button x-on:click="show = true" data-modal-hide="default-modal" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>

                            <button x-on:click="$dispatch('close-modal')" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                        </div>


                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

<button name="crear" type="button" x-data x-on:click="$dispatch('open-modal')"
    class="bg-green-800 text-yellow-50 p-1 rounded">
    Crear Nuevo
</button>


<div x-data="{ open: false }">
    <button x-ref="modal1_button" @click="open = true"
        class="w-full bg-indigo-600 px-4 py-2 border border-transparent rounded-md flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:inline-flex">
        Hola
    </button>


    <div class="absolute top-0 left-0 w-full h-screen bg-black opacity-60" aria-hidden="true" x-show="open"></div>
    <div @click.stop="" x-show="open"
        class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-white w-3/5 h-3/5 z-10">
        <div class="p-6 border-b">
            <h2 id="modal1_label">Header</h2>
        </div>
        <div class="p-6">
            Content
        </div>
    </div>
</div>
</div>
