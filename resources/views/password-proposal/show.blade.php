<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Detalle de Propuesta</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-6">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-lg">TC</span>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Detalle de Propuesta</h1>
                            <p class="text-gray-600">Información completa de la propuesta</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('password-proposal.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Volver a la lista
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l-4-4m0 0l-4 4m4-4V3"></path>
                                </svg>
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Proposal Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                <span class="text-white font-bold text-lg">
                                    {{ strtoupper(substr($passwordProposal->nombre_completo, 0, 2)) }}
                                </span>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white">{{ $passwordProposal->nombre_completo }}</h2>
                                <p class="text-blue-100">{{ $passwordProposal->correo_corporativo }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-blue-100 text-sm">Enviado el</div>
                            <div class="text-white font-semibold">{{ $passwordProposal->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-6">
                    <!-- Area Badge -->
                    <div class="flex items-center gap-3">
                        <span class="text-sm font-medium text-gray-600">Área:</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $passwordProposal->area_dependencia }}
                        </span>
                    </div>

                    <!-- Password Proposal -->
                    <div class="space-y-3">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Propuesta de Contraseña
                        </h3>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <code class="text-lg font-mono text-gray-800 break-all">{{ $passwordProposal->propuesta_password }}</code>
                        </div>
                        <div class="flex items-center gap-4 text-sm text-gray-600">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ strlen($passwordProposal->propuesta_password) }} caracteres
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                {{ $passwordProposal->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    <!-- Technical Explanation -->
                    <div class="space-y-3">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            Explicación Técnica
                        </h3>
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <p class="text-gray-800 leading-relaxed">{{ $passwordProposal->explicacion_tecnica }}</p>
                        </div>
                    </div>

                    <!-- Security Analysis -->
                    <div class="space-y-3">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Análisis de Seguridad
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Length Check -->
                            <div class="bg-white border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    @if(strlen($passwordProposal->propuesta_password) >= 12)
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-green-600">Longitud</span>
                                    @else
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-red-600">Longitud</span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-600">{{ strlen($passwordProposal->propuesta_password) }}/12 caracteres mínimos</p>
                            </div>

                            <!-- Complexity Check -->
                            <div class="bg-white border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    @php
                                        $hasUpper = preg_match('/[A-Z]/', $passwordProposal->propuesta_password);
                                        $hasLower = preg_match('/[a-z]/', $passwordProposal->propuesta_password);
                                        $hasNumber = preg_match('/[0-9]/', $passwordProposal->propuesta_password);
                                        $hasSymbol = preg_match('/[^A-Za-z0-9]/', $passwordProposal->propuesta_password);
                                        $isComplex = $hasUpper && $hasLower && $hasNumber && $hasSymbol;
                                    @endphp
                                    @if($isComplex)
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-green-600">Complejidad</span>
                                    @else
                                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-yellow-600">Complejidad</span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-600">
                                    @if($hasUpper) ✓ Mayúsculas @else ✗ Mayúsculas @endif
                                    @if($hasLower) ✓ Minúsculas @else ✗ Minúsculas @endif
                                    @if($hasNumber) ✓ Números @else ✗ Números @endif
                                    @if($hasSymbol) ✓ Símbolos @else ✗ Símbolos @endif
                                </p>
                            </div>

                            <!-- Uniqueness Check -->
                            <div class="bg-white border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-blue-600">Unicidad</span>
                                </div>
                                <p class="text-xs text-gray-600">Propuesta única en el sistema</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
