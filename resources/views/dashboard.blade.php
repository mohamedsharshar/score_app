@section('title', 'Admin Dashboard')
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="/images/payment-request-api-svgrepo-com.svg" alt="Logo" class="h-10 w-10 mr-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
        </div>
    </x-slot>
    <div class="py-12 animate-fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h3 class="text-lg font-bold mb-6 text-gray-800 dark:text-gray-100">Admin Management Options</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('banks.index') }}" class="block p-6 bg-indigo-50 dark:bg-indigo-900 border border-indigo-200 dark:border-indigo-700 rounded-xl text-center hover:bg-indigo-100 dark:hover:bg-indigo-800 transition">
                        <span class="text-2xl">🏦</span>
                        <div class="mt-2 font-semibold text-gray-800 dark:text-gray-100">Manage Banks</div>
                    </a>
                    <a href="{{ route('users.index') }}" class="block p-6 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-xl text-center hover:bg-green-100 dark:hover:bg-green-800 transition">
                        <span class="text-2xl">👤</span>
                        <div class="mt-2 font-semibold text-gray-800 dark:text-gray-100">Manage Users</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('styles')
<style>
@keyframes fade-in {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
  animation: fade-in 1s cubic-bezier(.4,0,.2,1) both;
}
</style>
@endpush
