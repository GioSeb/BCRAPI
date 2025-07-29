@extends('layouts.app')
@section('title', 'Historial')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Section 1: Current User's History (Visible to all) -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Mi Historial
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Registros de las consultas de CUIT que has realizado.
                    </p>
                </header>
                <x-collapsible-history
                    title="Mis Consultas"
                    :count="$ownHistoryCount"
                    :histories="$ownHistory"
                    noRecordsMessage="Aún no has realizado ninguna consulta."
                />
            </div>


            <!-- Section 2: Admin's View of Created Users (Visible only to Admins) -->
            @if(auth()->user()->isAdmin() && isset($createdUsers))
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Historial de Usuarios Creados
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Consultas realizadas por los usuarios que has registrado.
                    </p>
                </header>
                <div class="space-y-4">
                    @forelse($createdUsers as $createdUser)
                        <x-collapsible-history
                            :title="$createdUser->name"
                            :count="$createdUser->history_count"
                            :histories="$createdUser->history"
                            noRecordsMessage="Este usuario no ha realizado consultas."
                        />
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">Aún no has creado ningún usuario.</p>
                    @endforelse
                </div>
            </div>
            @endif


            <!-- Section 3: Master's View of Admins and their Users (Visible only to Masters) -->
            @if(auth()->user()->isMaster() && isset($admins))
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                 <header class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Supervisión de Administradores
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Actividad de todos los administradores y sus usuarios creados.
                    </p>
                </header>
                <div class="space-y-6">
                    @forelse($admins as $admin)
                        <div class="p-6 border-2 dark:border-gray-700 rounded-xl">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $admin->name }}</h3>

                            <!-- Admin's own history -->
                            <div class="mb-6">
                                <x-collapsible-history
                                    title="Consultas Propias del Administrador"
                                    :count="$admin->history_count"
                                    :histories="$admin->history"
                                    noRecordsMessage="Este administrador no ha realizado consultas."
                                />
                            </div>

                            <!-- Users created by this admin -->
                            <h4 class="text-md font-semibold text-gray-800 dark:text-gray-200">Usuarios Creados por {{ $admin->name }}:</h4>
                            <div class="mt-4 space-y-4 pl-4 border-l-4 dark:border-gray-600">
                                @forelse($admin->createdUsers as $createdUser)
                                    <x-collapsible-history
                                        :title="$createdUser->name"
                                        :count="$createdUser->history_count"
                                        :histories="$createdUser->history"
                                        noRecordsMessage="Este usuario no ha realizado consultas."
                                    />
                                @empty
                                    <p class="text-sm text-gray-500 dark:text-gray-400 ml-4">Este administrador no ha creado usuarios.</p>
                                @endforelse
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">No hay administradores en el sistema.</p>
                    @endforelse
                </div>
            </div>
            @endif

        </div>
    </div>
@endsection
