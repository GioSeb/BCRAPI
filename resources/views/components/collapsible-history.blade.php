@props(['title', 'count', 'histories', 'noRecordsMessage' => 'No hay registros para mostrar.'])

{{-- This component uses Alpine.js (x-data) for the toggle functionality --}}
<div x-data="{ open: false }" class="border dark:border-gray-700 rounded-lg">
    <div @click="open = !open" class="flex justify-between items-center p-4 cursor-pointer">
        <div>
            <h3 class="font-semibold text-gray-800 dark:text-gray-200">{{ $title }}</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $count }} {{ Str::plural('consulta', $count) }} realizada(s).</p>
        </div>
        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md dark:bg-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">
            <span x-show="!open">Ver Detalles</span>
            <span x-show="open">Ocultar Detalles</span>
        </button>
    </div>

    {{-- The collapsible content --}}
    <div x-show="open" x-transition class="p-4 border-t dark:border-gray-600">
        @if ($count > 0)
            {{-- We reuse the history-table component you already have --}}
            <x-history-table :histories="$histories" />

            {{-- Check if the histories object supports pagination --}}
            @if(method_exists($histories, 'links'))
                <div class="mt-4">
                    {{ $histories->links() }}
                </div>
            @endif
        @else
            <p class="text-gray-500 dark:text-gray-400">{{ $noRecordsMessage }}</p>
        @endif
    </div>
</div>
