<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 leading-tight " style="text-align: right;">
            📊 حساب الجدارة الائتمانية
        </h2>
    </x-slot>
<div class="container" style="max-width:600px; margin: auto;">
 <div class="mt-8 p-8 bg-white rounded-3xl shadow-xl border border-gray-100 max-w-0.5xl mx-auto">
        <h3 class="text-lg font-semibold text-gray-700 mb-6 text-center mt-3">
            الرجاء إدخال المعلومات التالية بدقة
        </h3>

        <form method="POST" action="{{ route('credit.calculate') }}" class="space-y-6" style="padding: 20px;">
            @csrf

            @foreach ([['name' => 'on_time_payments', 'label' => '🕒 نسبة الدفعات في موعدها (%)'], ['name' => 'utilization_rate', 'label' => '📈 نسبة استخدام الائتمان (%)'], ['name' => 'account_age', 'label' => '📅 عمر الحساب (شهور)'], ['name' => 'credit_mix', 'label' => '📊 تنوع الائتمان (%)'], ['name' => 'new_inquiries', 'label' => '🔍 عدد الاستعلامات الجديدة']] as $field)
                <div>
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        {{ $field['label'] }}
                    </label>
                    <input type="number" name="{{ $field['name'] }}" min="0" max="100" step="any"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" />
                </div>
            @endforeach

            <button type="submit"
                class="w-full py-3 rounded-xl bg-indigo-600 text-white font-semibold text-lg hover:bg-indigo-700 transition">
                🔍 احتساب الجدارة
            </button>
        </form>
    </div>
</div>

</x-app-layout>
