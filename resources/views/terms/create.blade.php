<x-app-layout>
    <x-header :title="__('layout.Términos')"/>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table.header title="term">
                {{ __('layout.añadir_término') }}
                <x-slot name="create">{{ __('layout.crear_nuevo_término') }}</x-slot>
            </x-table.header>
            <div class="ml-6 flex justify-center mt-5">
                <form method="POST" action="/terms/">
                @csrf

                <x-form.term />
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
