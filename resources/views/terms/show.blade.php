@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
@endphp

<x-app-layout>
    <x-header :title="__('layout.Términos')"/>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-8 gap-4">
                <div class="col-span-8">
                    <div class="bg-gray-200 p-4 flex gap-4 justify-between items-center rounded-xl">
                        <h1 class="text-xl font-bold">{{ $term->name }}</h1>
                        <p>{{ $term->type->name }}</p>
                        <p>{{ $term->created_at }}</p>
                        <x-secondary-link
                            href="/terms/{{ $term->id }}/edit"> {{ __('layout.editar_término') }}</x-secondary-link>
                    </div>
                </div>

                <div class="col-span-3">
                    <div class="bg-gray-200 p-4 rounded-xl flex flex-col justify-center">
                        <h2 class="text-lg font-bold">{{ __('layout.ideas') }}</h2>
                        <ul class="mt-2">
                            @php
                                $descriptions = $term->descriptions()->where('user_id', Auth::id())->get();
                            @endphp
                            @foreach($descriptions as $description)
                                @foreach($description->ideas as $idea)
                                    <li class="flex justify-between items-center mb-4 gap-4 flex-col border border-gray-300 rounded-2xl p-4">
                                        <span>{{ $idea->name }}</span>
                                        <div class="flex gap-4">
                                            <x-secondary-link href="/ideas/{{ $idea->id }}/edit" >{{ __('layout.Editar') }}</x-secondary-link>
                                            <form method="POST" action="/ideas/{{ $idea->id }}" >
                                                @csrf
                                                @method('DELETE')

                                                <x-danger-button> {{ __('layout.Eliminar') }} </x-danger-button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                        <!-- Botón Nueva Idea -->
                        <div class="flex justify-center">
                            <x-primary-link href="/ideas/create">{{ __('layout.nueva_idea') }}</x-primary-link>
                        </div>
                    </div>
                </div>

                <!-- Descripciones -->
                <div class="col-span-5">
                    <div class="bg-gray-200 p-4 rounded-xl">
                        <h2 class="text-lg font-bold">{{ __('layout.Descripciones') }}</h2>
                        <!-- Listado de Descripciones -->
                        <ul class="mt-2">
                            <!-- Iterar sobre las descripciones -->
                            @foreach($descriptions as $description)
                                <li class="flex flex-col justify-items-start items-center mb-2">
                                    <p class="text-lg font-bold pb-2">{{ $description->name }}</p>
                                    {!! $description->notes !!}

                                    @php
                                        // Consulta para obtener la suma de las valoraciones de esta descripción
                                        $totalRating = DB::table('user_description')
                                            ->where('description_id', $description->id)
                                            ->sum('rating');

                                        // Consulta para contar cuántas valoraciones se han realizado para esta descripción
                                        $ratingCount = DB::table('user_description')
                                            ->where('description_id', $description->id)
                                            ->count();

                                        // Calcular la media de las valoraciones
                                        $averageRating = ($ratingCount > 0) ? $totalRating / $ratingCount : 0;
                                    @endphp

                                    <p class="mt-2 p-2 bg-gray-100 border border-gray-300 rounded text-base text-gray-700"> {{ __('layout.Media') }}: {{ number_format($averageRating, 2) }}</p>

                                    <div class="mt-4">
                                        <x-primary-button onclick="toggleForm('{{ $description->id }}')">{{ __('layout.Valorar') }}</x-primary-button>
                                    </div>

                                    <form action="{{ route('valorar') }}" method="POST" class="mt-2 valoracion-form flex" id="form-{{ $description->id }}" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="description_id" value="{{ $description->id }}">
                                        <select name="rating" required class="mt-1 w-50 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <x-secondary-button>{{ __('layout.enviar_valoración') }}</x-secondary-button>
                                    </form>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Footer -->
                <div class="col-span-8">
                    <div class="bg-gray-200 p-4 rounded-xl">
                        <h2 class="text-lg font-bold">{{ __('layout.Sintesis') }}</h2>
                        <!-- Aquí puedes mostrar las síntesis de cada descripción -->
                        <ul class="mt-2">
                            <!-- Iterar sobre las descripciones -->
                            @foreach($descriptions as $description)
                                <li class="flex flex-col justify-items-start items-center mb-2">
                                    {!! $description->synthesis !!}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<script>
    function toggleForm(descriptionId) {
        var form = document.getElementById('form-' + descriptionId);
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>
