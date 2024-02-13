<x-app-layout>
    <x-header :title="__('layout.ideas')"/>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table.header title="idea">
                {{ __('layout.editar_idea') }}
                <x-slot name="create">{{ __('layout.crear_nueva_idea') }}</x-slot>
            </x-table.header>
            <div class="ml-6 flex justify-center mt-5">
                <form method="POST" action="/ideas/{{ $idea->id }}">
                    @csrf
                    @method('PATCH')

                    <x-form.idea :idea="$idea" edit="true"/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

