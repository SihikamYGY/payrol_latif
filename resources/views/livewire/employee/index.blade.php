@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Overview Dashboard
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-500 text-sm">Total Karyawan</h3>
            <p class="text-3xl font-bold mt-2">24 Orang</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-500 text-sm">Gaji Cair</h3>
            <p class="text-3xl font-bold mt-2">Rp 125jt</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-gray-500 text-sm">Pending</h3>
            <p class="text-3xl font-bold text-yellow-600 mt-2">3</p>
        </div>

    </div>
@endsection
