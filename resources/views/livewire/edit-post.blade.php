<div>
    <a href="" class="btn btn-green" wire:click="$set('opens',true)">
        <i class="fas fa-edit">Pepe</i>
    </a>
</div>
@livewire(EditPost::class, ['Inventario' => $Inventario], key($Inventario->id))

<x-dialog-editar wire:model="opens">
    <x-slot name="title"></x-slot>
    <x-slot name="content"></x-slot>
    <x-slot name="footer"></x-slot>
</x-dialog-editar>
