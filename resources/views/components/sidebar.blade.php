@php
    $route = request()->route()->getName();
@endphp

<aside class="w-64 bg-gray-900 text-white flex flex-col">

    <div class="p-5 text-xl font-bold border-b border-gray-800">
        Payroll App
    </div>

    <nav class="flex-1 p-4 space-y-2">

        <a href="{{ route('dashboard') }}"
            class="block px-4 py-2 rounded {{ $route === 'dashboard' ? 'bg-gray-800' : 'hover:bg-gray-800' }}">
            Dashboard
        </a>

        <a href="{{ route('employee.index') }}"
            class="block px-4 py-2 rounded {{ str_starts_with($route, 'employee') ? 'bg-gray-800' : 'hover:bg-gray-800' }}">
            Karyawan
        </a>

        <a href="{{ route('payroll.index') }}"
            class="block px-4 py-2 rounded {{ str_starts_with($route, 'payroll') ? 'bg-gray-800' : 'hover:bg-gray-800' }}">
            Payroll
        </a>

    </nav>

    <div class="p-4 border-t border-gray-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left px-4 py-2 hover:bg-red-600 rounded">
                Logout
            </button>
        </form>
    </div>

</aside>
