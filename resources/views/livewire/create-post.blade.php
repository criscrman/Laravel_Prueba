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
                            <input type="text" wire:model.blur="Nombre" name="Nombre" value="{{ old('Nombre') }}" class="input-crear"
                                placeholder="Cristian Peréz..." required>
                                <x-input-error for="Nombre"/>
                          
                    </div>

                    <div>

                        <label for="Serial">
                            Titulo
                        </label><input type="text" wire:model.blur="Serial" name="Serial" class="input-crear" value="{{ old('Serial') }}"
                            placeholder="Prueba Tipo A..." x-validate.wholenumber
                            data-error-msg="positive whole number required">
                            <x-input-error for="Serial"/>
                        
                    </div>
                    <div>

                        <label for="Ubicacion">
                            Ubicacion
                        </label><input type="text" wire:model.blur="Ubicacion" name="Ubicacion" class="input-crear"
                            value="{{ old('Ubicacion') }}" placeholder="Prueba Tipo A...">
                            <x-input-error for="Ubicacion"/>
                    </div>
                    
                    <div>

                        <label for="Estado">
                            Estado
                        </label><input type="text" wire:model.blur="Estado" name="Estado" class="input-crear" value="{{ old('Estado') }}"
                            placeholder="Prueba Tipo A...">
                        <x-input-error for="Estado"/>
                       {{-- @error('Estado')
                            <span>{{ $message }}</span>
                        @enderror
                        --}}
                    </div>

                    <div>
                        <label for="Precio">
                            Precio
                        </label><input type="text" wire:model.blur="Precio" name="Precio" class="input-crear"
                            value="{{ old('Precio') }}" placeholder="Prueba Tipo A...">
                            <x-input-error for="Precio"/>
                    </div>

                    <div>
                        <label for="Ultimo_Mantenimiento">Último Mantenimiento</label><input wire:model.blur="Ultimo_Mantenimiento" type="date"
                            id="start" name="Ultimo_Mantenimiento" value="2018-07-22" min="2018-01-01"
                            max="2018-12-31" />

                            <x-input-error for="Ultimo_Mantenimiento"/>
                    </div>

                    <div>
                        <label for="Recomentacion">
                            Recomendación
                        </label><input type="text" name="Recomentacion" wire:model.change="Recomentacion"  class="input-crear"
                            value="{{ old('Recomentacion') }}" placeholder="Se recomienda que...">
                            <x-input-error for="Recomentacion"/>
                        

                    </div>





                    <div>
                        <label for="Descripcion">Descripción</label>
                        <textarea name="Descripcion" wire:model.live="Descripcion" class="input-crear" cols="30" rows="3">{{ old('Descripcion') }}</textarea>
                        <x-input-error for="Descripcion"/>
                      
                    </div>



                    </form>
                </div>

            </div>

               

        </x-slot>

        <x-slot name="footer">
            <button wire:click="save"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    wire:loading.remove wire:target="save"
                    >Enviar</button>
                    <span class="px-1" wire:loading wire:target="save">Cargando...</span>
                    
            <button wire:click="$set('open',false)" 
            wire:loading.remove wire:target="save" 
            type="button"
            class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
            

        </x-slot>

    </x-dialog-modal>
</div>
