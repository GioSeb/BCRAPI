@props(['histories'])

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    CUIT Consultado
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha de Consulta
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $record)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $record->cuit }}
                </th>
                <td class="px-6 py-4">
                    {{-- Format the date for better readability --}}
                    {{ $record->created_at->format('d/m/Y H:i:s') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
