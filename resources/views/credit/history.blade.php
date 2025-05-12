<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-bold text-gray-800 leading-tight text-right">📁 سجل نتائج الجدارة</h2>
  </x-slot>

  <div class="w-full px-4 mt-8" dir="rtl">
    <div class="w-full bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
      <div class="overflow-x-auto">
        <table class="w-full table-auto text-sm text-right">
          <thead class="bg-gray-50 text-gray-700 font-semibold border-b">
            <tr>
              <th class="p-3">📅 التاريخ</th>
              <th class="p-3">📈 النتيجة</th>
              <th class="p-3">💵 الدفعات</th>
              <th class="p-3">💳 نسبة الديون</th>
              <th class="p-3">⏳ عمر الحساب</th>
              <th class="p-3">📊 تنوع الائتمان</th>
              <th class="p-3">🔍 الاستعلامات</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @forelse($reports as $r)
              <tr class="hover:bg-gray-50 transition">
                <td class="p-3">{{ $r->created_at->format('Y-m-d') }}</td>
                <td class="p-3 font-bold text-indigo-600">{{ $r->score }}</td>
                <td class="p-3">{{ $r->on_time_payments }}%</td>
                <td class="p-3">{{ $r->utilization_rate }}%</td>
                <td class="p-3">{{ $r->account_age }} شهر</td>
                <td class="p-3">{{ $r->credit_mix }}%</td>
                <td class="p-3">{{ $r->new_inquiries }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="p-4 text-center text-gray-500">لا توجد سجلات حتى الآن.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>
