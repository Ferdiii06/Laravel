<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Department')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body >
    <!-- Navigation Bar -->
    <div class="flex bg-white shadow-lg rounded-full px-6 py-3 space-x-10 items-center justify-center">
        <!-- Home Active -->
        <div class="flex items-center space-x-2 bg-green-200 text-black font-semibold px-4 py-2 rounded-full shadow-sm">
            <span>App Pegawai</span>
        </div>
        <!-- Other Menu -->
        <button class="text-gray-800 font-semibold hover:text-green-600 transition duration-200 {{ request()->routeIs('employees,*') ? 'text-green-600' : '' }} ">
            <a href="{{ route('employees.index') }}">Employees</a>
        </button>
        <button class="text-gray-800 font-semibold hover:text-green-600 transition duration-200 {{ request()->routeIs('departments,*') ? 'text-green-600' : '' }} ">
            <a href="{{ route('departments.index') }}">Departments</a>
        </button>
        <button class="text-gray-800 font-semibold hover:text-green-600 transition duration-200 {{ request()->routeIs('attendances,*') ? 'text-green-600' : '' }} ">
            <a href="{{ route('attendances.index') }}">Attendance</a>
        </button>
        <button class="text-gray-800 font-semibold hover:text-green-600 transition duration-200 {{ request()->routeIs('salaries,*') ? 'text-green-600' : '' }} ">
            <a href="{{ route('salaries.index') }}">Salaries</a>
        </button>
        <button class="text-gray-800 font-semibold hover:text-green-600 transition duration-200 {{ request()->routeIs('report,*') ? 'text-green-600' : '' }} ">
            <a href="{{ route('report.index') }}">Report</a>
        </button>
         <button class="text-gray-800 font-semibold hover:text-green-600 transition duration-200 {{ request()->routeIs('settings,*') ? 'text-green-600' : '' }} ">
            <a href="{{ route('settings.index') }}">Settings</a>
        </button>
    </div>


    <main>
        @yield('content')
    </main>
    <footer>
        <div class="bg-gray-800 text-white text-center py-4 mt-10">
            &copy; {{ date('Y') }} App Pegawai. All rights reserved.
        </div>
    </footer>
</body>

</html>
