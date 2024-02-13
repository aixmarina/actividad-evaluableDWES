<x-app-layout>
    <x-header :title="__('layout.Términos')"/>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table.header title="term">
                {{ __('layout.listado_términos') }}
                <x-slot name="create">{{ __('layout.crear_nuevo_término') }}</x-slot>
            </x-table.header>
            <x-table.basic :data="$terms" title="term" :columns="[
                'id' => 'id',
               __('layout.Nombre') => 'name',
               __('layout.Tipo') => 'type->name',
               __('layout.idioma') => 'language->name'
                ]"
            />
        </div>
    </div>
</x-app-layout>
