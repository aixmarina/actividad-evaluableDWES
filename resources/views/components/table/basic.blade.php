@props(['data', 'columns', 'title'])

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
        <tr>
            @foreach ($columns as $columnName => $expression)
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{ __($columnName) }}
                </th>
            @endforeach
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('layout.Acciones') }}
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($data as $row)
            <tr>
                @foreach ($columns as $expression)
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            @php
                                try {
                                    $value = eval('return $row->' . $expression . ';');
                                    echo $value ?? "N/A";
                                } catch (\Throwable $e) {
                                    echo "N/A";
                                }
                            @endphp
                        </div>
                    </td>
                @endforeach

                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex gap-3">
                    <x-primary-link href="/{{ $title }}s/{{ $row->id }}">{{ __('layout.Ver') }}</x-primary-link>
                    <x-secondary-link href="/{{ $title }}s/{{ $row->id }}/edit">{{ __('layout.Editar') }}</x-secondary-link>

                    <form method="POST" action="/{{ $title }}s/{{ $row->id }}">
                        @csrf
                        @method('DELETE')

                        <x-danger-button> {{ __('layout.Eliminar') }} </x-danger-button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

