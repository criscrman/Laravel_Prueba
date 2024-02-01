<div>
    <button  wire:click="$set('open',true)" type="button" class="btn btn-red-rounded">
        Crear Nuevo
    </button>


    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear Nuevo Registro
        </x-slot>

        <x-slot name="content">
            <div class="p-4 md:p-5 space-y-4 ">
                <div class="form"> 
                    <form  class="form-1  md:grid grid-cols-2 gap-4"
                    action="{{ route('Inventario.store') }}" method="post">
                    @csrf

                    <div>
                            <label for="Nombre" class="">Nombre Completo</label>
                            <input type="text" wire:model="Nombre" name="Nombre" value="{{ old('Nombre') }}" class="input-crear"
                                placeholder="Cristian Peréz..." required>

                            @error('Nombre')
                                <span>{{ $message }}</span>
                            @enderror
                    </div>

                    <div>

                        <label for="Serial">
                            Titulo
                        </label><input type="text" wire:model="Serial" name="Serial" class="input-crear" value="{{ old('Serial') }}"
                            placeholder="Prueba Tipo A..." x-validate.wholenumber
                            data-error-msg="positive whole number required">

                        @error('Serial')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>
                    <div>

                        <label for="Ubicacion">
                            Ubicacion
                        </label><input type="text" wire:model="Ubicacion" name="Ubicacion" class="input-crear"
                            value="{{ old('Ubicacion') }}" placeholder="Prueba Tipo A...">

                        @error('Ubicacion')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>
                    <div>

                        <label for="Estado">
                            Estado
                        </label><input type="text" wire:model="Estado" name="Estado" class="input-crear" value="{{ old('Estado') }}"
                            placeholder="Prueba Tipo A...">

                        @error('Estado')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>

                    <div>
                        <label for="Precio">
                            Precio
                        </label><input type="text" wire:model="Precio" name="Precio" class="input-crear"
                            value="{{ old('Precio') }}" placeholder="Prueba Tipo A...">

                        @error('Precio')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>



                    <div>
                        <label for="Ultimo_Mantenimiento">Último Mantenimiento</label><input wire:model="Ultimo_Mantenimiento" type="date"
                            id="start" name="Ultimo_Mantenimiento" value="2018-07-22" min="2018-01-01"
                            max="2018-12-31" />
                    </div>
                    <div>
                        <label for="Recomentacion">
                            Recomentacion
                        </label><input type="text" name="Recomentacion" wire:model="Recomentacion"  class="input-crear"
                            value="{{ old('Recomentacion') }}" placeholder="Prueba Tipo A...">

                        @error('Recomentacion')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>





                    <div>
                        <label for="Descripcion">Descripción</label>
                        <textarea name="Descripcion" wire:model="Descripcion" class="input-crear" cols="30" rows="3">{{ old('Descripcion') }}</textarea>

                        @error('Descripcion')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>



                    </form>
                </div>

            </div>

               

        </x-slot>

        <x-slot name="footer">
            <button wire:click="save"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>

            <button wire:click="$set('open',false)"  type="button"
            class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                   

        </x-slot>

    </x-dialog-modal>
</div>
