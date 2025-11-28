<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Department')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body >
    <!-- Navigation Bar (responsive, professional) -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Left: Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('employees.index') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white font-bold">AP</div>
                        <div class="hidden sm:block">
                            <span class="text-lg font-semibold text-gray-800">App Pegawai</span>
                            <div class="text-xs text-gray-500">Manajemen SDM</div>
                        </div>
                    </a>
                </div>

                <!-- Center: Navigation links (desktop) -->
                <nav class="hidden md:flex space-x-6">
                    <a href="{{ route('employees.index') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('employees.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Employees</a>
                    <a href="{{ route('departments.index') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('departments.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Departments</a>
                    <a href="{{ route('attendances.index') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('attendances.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Attendance</a>
                    <a href="{{ route('salaries.index') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('salaries.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Salaries</a>

                </nav>


                    <!-- User placeholder -->
                    <div class="relative">
                        <button id="userMenuBtn" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-700">U</div>
                            <div class="hidden sm:block text-sm text-gray-700">Admin</div>
                        </button>
                        <!-- dropdown (optional) -->
                        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button id="mobileMenuBtn" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-white hover:bg-green-600 focus:outline-none">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile navigation -->
        <div id="mobileMenu" class="md:hidden hidden px-4 pt-2 pb-3 space-y-1 bg-white">
            <a href="{{ route('employees.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('employees.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Employees</a>
            <a href="{{ route('departments.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('departments.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Departments</a>
            <a href="{{ route('attendances.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('attendances.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Attendance</a>
            <a href="{{ route('salaries.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('salaries.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Salaries</a>
            <a href="{{ route('settings.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('settings.*') ? 'text-green-600' : 'text-gray-700 hover:text-green-600' }}">Settings</a>
        </div>
    </header>

    <!-- Session flash messages -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded">{{ session('error') }}</div>
        @endif
    </div>


    <main>
        @yield('content')
    </main>
    <footer class="bg-gray-900 text-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About -->
                <div>
                    <a href="{{ route('employees.index') }}" class="inline-flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white font-bold">AP</div>
                        <div>
                            <div class="text-lg font-semibold">App Pegawai</div>
                            <div class="text-sm text-gray-400">Sistem manajemen SDM untuk perusahaan kecil dan menengah.</div>
                        </div>
                    </a>
                    <p class="text-sm text-gray-400 mt-4">Buat, kelola, dan pantau data karyawan, absensi, serta penggajian dengan cepat dan aman.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Quick links</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="{{ route('employees.index') }}" class="hover:text-white">Employees</a></li>
                        <li><a href="{{ route('departments.index') }}" class="hover:text-white">Departments</a></li>
                        <li><a href="{{ route('attendances.index') }}" class="hover:text-white">Attendance</a></li>
                        <li><a href="{{ route('salaries.index') }}" class="hover:text-white">Salaries</a></li>
                        <li><a href="{{ route('settings.index') }}" class="hover:text-white">Settings</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Contact</h3>
                    <div class="mt-4 text-sm text-gray-400 space-y-2">
                        <div>Email: <a href="mailto:info@apppegawai.local" class="hover:text-white">info@apppegawai.local</a></div>
                        <div>Phone: <a href="tel:+628000000000" class="hover:text-white">+62 800 0000 000</a></div>
                        <div>Address: Jl. Contoh No.1, Kota, Indonesia</div>
                    </div>

                    <div class="mt-6 flex space-x-3">
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 hover:bg-green-600" aria-label="Twitter">T</a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 hover:bg-green-600" aria-label="Facebook">F</a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-800 hover:bg-green-600" aria-label="LinkedIn">in</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-6 text-sm text-gray-400 flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-3 md:mb-0">&copy; {{ date('Y') }} App Pegawai. All rights reserved.</div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="hover:text-white">Privacy</a>
                    <a href="#" class="hover:text-white">Terms</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // Mobile menu and user menu toggle
        document.addEventListener('DOMContentLoaded', function () {
            var btn = document.getElementById('mobileMenuBtn');
            var menu = document.getElementById('mobileMenu');
            var userBtn = document.getElementById('userMenuBtn');
            var userMenu = document.getElementById('userMenu');

            if (btn && menu) {
                btn.addEventListener('click', function () {
                    menu.classList.toggle('hidden');
                });
            }

            if (userBtn && userMenu) {
                userBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    userMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', function () {
                    if (userMenu && !userMenu.classList.contains('hidden')) {
                        userMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>

</html>
