<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concurso: La Contraseña Más Fuerte</title>

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
        <div class="container mx-auto px-4 py-8">
            <main class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-8">
                    <!-- Logo -->
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-lg mb-4">
                        <span class="text-white font-bold text-2xl">TC</span>
                    </div>
                    <!-- Title -->
                    <h1 class="text-4xl font-bold text-gray-800 mb-3 flex items-center justify-center gap-3">
                        Concurso: La Contraseña Más Fuerte
                        <span class="text-3xl">🏆</span>
                    </h1>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                        Motivar y reforzar la cultura de seguridad de la información. Envía una propuesta creativa de contraseña (no tu contraseña real).
                    </p>
                </div>

                <!-- Form Container -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 lg:p-12">

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="mb-8 p-6 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-800 rounded-xl shadow-sm">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold">¡Propuesta enviada exitosamente!</h3>
                                    <p class="text-sm">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="mb-8 p-6 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 text-red-800 rounded-xl shadow-sm">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold mb-2">Por favor corrige los siguientes errores:</h3>
                                    <ul class="list-disc list-inside space-y-1 text-sm">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password-proposal.store') }}" class="space-y-8">
                        @csrf

                        <!-- Información del participante -->
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">
                                    Información del participante
                                </h2>
                            </div>

                            <!-- Nombre completo y Área en una fila -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nombre completo -->
                                <div class="space-y-2">
                                    <label for="nombre_completo" class="block text-sm font-semibold text-gray-700">
                                        Nombre completo <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="nombre_completo"
                                        name="nombre_completo"
                                        value="{{ old('nombre_completo') }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200"
                                        placeholder="Ingresa tu nombre completo"
                                        required
                                    >
                                </div>

                                <!-- Área o dependencia -->
                                <div class="space-y-2">
                                    <label for="area_dependencia" class="block text-sm font-semibold text-gray-700">
                                        Área o dependencia <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        id="area_dependencia"
                                        name="area_dependencia"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200"
                                        required
                                    >
                                        <option value="">-- Selecciona --</option>
                                        <option value="Talento Humano" {{ old('area_dependencia') == 'Talento Humano' ? 'selected' : '' }}>Talento Humano</option>
                                        <option value="Tecnología / Sistemas" {{ old('area_dependencia') == 'Tecnología / Sistemas' ? 'selected' : '' }}>Tecnología / Sistemas</option>
                                        <option value="Comercial" {{ old('area_dependencia') == 'Comercial' ? 'selected' : '' }}>Comercial</option>
                                        <option value="Administración" {{ old('area_dependencia') == 'Administración' ? 'selected' : '' }}>Administración</option>
                                        <option value="Operaciones" {{ old('area_dependencia') == 'Operaciones' ? 'selected' : '' }}>Operaciones</option>
                                        <option value="Otro" {{ old('area_dependencia') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Correo corporativo -->
                            <div class="space-y-2">
                                <label for="correo_corporativo" class="block text-sm font-semibold text-gray-700">
                                    Correo corporativo <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="email"
                                    id="correo_corporativo"
                                    name="correo_corporativo"
                                    value="{{ old('correo_corporativo') }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200"
                                    placeholder="tucorreo@miempresa.com"
                                    required
                                >
                                <p class="text-sm text-gray-500 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Se permitirá una sola respuesta por correo autorizado.
                                </p>
                            </div>
                        </div>

                        <!-- Tu propuesta de contraseña -->
                        <div class="space-y-6">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-800">
                                    Tu propuesta de contraseña
                                </h2>
                            </div>

                            <!-- Reglas -->
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 p-6 rounded-xl">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="font-bold text-blue-900 text-lg">Reglas del concurso:</h3>
                                </div>
                                <ul class="text-blue-800 space-y-2">
                                    <li class="flex items-center gap-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        Longitud mínima 12 caracteres
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        Incluir mayúsculas, minúsculas, números y símbolos
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        No usar datos personales evidentes
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                        Debe ser memorable (frases, sustituciones, acrónimos)
                                    </li>
                                </ul>
                            </div>

                            <!-- Propuesta de contraseña -->
                            <div class="space-y-2">
                                <label for="propuesta_password" class="block text-sm font-semibold text-gray-700">
                                    Escribe tu propuesta de contraseña (ejemplo creativo) <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="propuesta_password"
                                    name="propuesta_password"
                                    value="{{ old('propuesta_password') }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 font-mono text-lg"
                                    placeholder="Ej: MiG4t0F4v0r1t0#2024"
                                    required
                                >
                            </div>

                            <!-- Explicación técnica -->
                            <div class="space-y-2">
                                <label for="explicacion_tecnica" class="block text-sm font-semibold text-gray-700">
                                    Explica brevemente la lógica o técnica usada <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    id="explicacion_tecnica"
                                    name="explicacion_tecnica"
                                    rows="4"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 resize-vertical"
                                    placeholder="Ej: Usé la primera letra de cada palabra de mi frase favorita, reemplacé algunas letras por números similares y agregué símbolos al final..."
                                    required
                                >{{ old('explicacion_tecnica') }}</textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-8">
                            <button
                                type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-blue-200 focus:ring-offset-2"
                            >
                                <div class="flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    <span class="text-lg">Enviar propuesta</span>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
