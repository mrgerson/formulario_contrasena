<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <div id="app">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">TC</span>
                            </div>
                            <span class="text-xl font-bold text-gray-800">{{ config('app.name', 'Laravel') }}</span>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex items-center space-x-4">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}"
                                   class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                    Iniciar Sesión
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Registrarse
                                </a>
                            @endif
                        @else
                            <!-- User Dropdown -->
                            <div class="relative">
                                <button type="button"
                                        class="flex items-center gap-2 text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition-colors"
                                        onclick="toggleDropdown()">
                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-xs">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                        </span>
                                    </div>
                                    {{ Auth::user()->name }}
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div id="user-dropdown"
                                     class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50">
                                    <a href="{{ route('password-proposal.index') }}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                        Panel Administrativo
                                    </a>
                                    <a href="{{ route('password-proposal.create') }}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                        Nueva Propuesta
                                    </a>
                                    <hr class="my-1">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </div>

                            <!-- Logout Form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-8">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript for dropdown -->
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('user-dropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('user-dropdown');
            const button = event.target.closest('button');

            if (!button || !button.onclick || button.onclick.toString().indexOf('toggleDropdown') === -1) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
