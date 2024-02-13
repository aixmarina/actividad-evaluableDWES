@props(['data', 'columns', 'title'])

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($columns as $title => $expression)
            <tr>
                <th scope="row" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $title }}</th>
                <td class="px-6 py-4 whitespace-nowrap">
                    @php
                        try {
                            $value = eval('return $data->' . $expression . ';');
                            echo $value ?? "N/A";
                        } catch (\Throwable $e) {
                            echo "N/A";
                        }
                    @endphp
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
