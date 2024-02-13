<x-app-layout>
    <x-header :title="__('layout.Usuarios')"/>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table.header title="user">
                {{ __('layout.editar_usuario') }}
                <x-slot name="create">{{ __('layout.crear_nuevo_usuario') }}</x-slot>
            </x-table.header>

            <div class="ml-6 flex justify-center mt-5">
                <form method="POST" action="/users/{{ $user->id }}">
                    @csrf
                    @method('PATCH')
                    <x-form.user :user="$user" edit="true"/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
