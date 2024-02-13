<x-app-layout>
    <x-header :title="__('layout.Tipos')"/>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table.header title="type">
                {{ __('layout.editar_tipo') }}
                <x-slot name="create">{{ __('layout.crear_nuevo_tipo') }}</x-slot>
            </x-table.header>
            <div class="ml-6 flex justify-center mt-5">
                <form method="POST" action="/types/{{ $type->id }}">
                    @csrf
                    @method('PATCH')

                    <x-form.type :type="$type" edit="true"/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

