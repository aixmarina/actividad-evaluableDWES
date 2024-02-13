<x-app-layout>
    <x-header :title="__('layout.Usuarios')"/>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table.header title="user">
                {{ __('layout.detalle_usuario') }}
                <x-slot name="create">{{ __('layout.crear_nuevo_usuario') }}</x-slot>
            </x-table.header>
            <x-table.read :data="$user" title="user" :columns="[
                'id' => 'id',
                __('layout.Nombre') => 'name',
                __('layout.Email') => 'email',
                __('layout.Tipo') => 'type->name',
                ]"
            />
        </div>
    </div>
</x-app-layout>
