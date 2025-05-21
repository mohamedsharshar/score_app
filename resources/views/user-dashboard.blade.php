@section('title', 'User Dashboard')
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="/images/payment-request-api-svgrepo-com.svg" alt="Logo" class="h-10 w-10 mr-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="py-12 animate-fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h3 class="text-lg font-bold mb-6">Welcome to your dashboard!</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <a href="{{ route('credit.form') }}" class="block p-6 bg-indigo-50 border border-indigo-200 rounded-xl text-center hover:bg-indigo-100 transition">
                        <span class="text-2xl">📊</span>
                        <div class="mt-2 font-semibold">Calculate iScore</div>
                    </a>
                    <a href="{{ route('history') }}" class="block p-6 bg-green-50 border border-green-200 rounded-xl text-center hover:bg-green-100 transition">
                        <span class="text-2xl">📁</span>
                        <div class="mt-2 font-semibold">Score History</div>
                    </a>
                    <a href="{{ route('export') }}" class="block p-6 bg-yellow-50 border border-yellow-200 rounded-xl text-center hover:bg-yellow-100 transition">
                        <span class="text-2xl">⬇️</span>
                        <div class="mt-2 font-semibold">Export Report</div>
                    </a>
                    <a href="{{ route('tips') }}" class="block p-6 bg-blue-50 border border-blue-200 rounded-xl text-center hover:bg-blue-100 transition">
                        <span class="text-2xl">💡</span>
                        <div class="mt-2 font-semibold">Credit Tips</div>
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
