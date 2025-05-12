<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-bold text-gray-800 leading-tight text-right">📊 نتيجتك الائتمانية</h2>
  </x-slot>

  <div class="max-w-md mx-auto my-10 p-8 bg-white rounded-3xl shadow-2xl text-center border border-gray-100">
    <div class="text-7xl font-extrabold text-indigo-600 animate-pulse">{{ $report->score }}</div>
    <p class="mt-3 text-gray-700 text-lg">درجتك تقع ضمن النطاق من <strong>300</strong> إلى <strong>850</strong>.</p>

    <div class="mt-8 grid grid-cols-2 gap-4 text-sm">
      @php
        $levels = [
          ['min' => 800, 'max' => 850, 'label' => 'ممتازة', 'color' => 'bg-green-100 text-green-700'],
          ['min' => 740, 'max' => 799, 'label' => 'جيدة جدًا', 'color' => 'bg-lime-100 text-lime-700'],
          ['min' => 670, 'max' => 739, 'label' => 'جيدة', 'color' => 'bg-yellow-100 text-yellow-700'],
          ['min' => 580, 'max' => 669, 'label' => 'مقبولة', 'color' => 'bg-orange-100 text-orange-700'],
          ['min' => 0, 'max' => 579, 'label' => 'ضعيفة', 'color' => 'bg-red-100 text-red-700'],
        ];
      @endphp

      @foreach ($levels as $level)
        <div class="p-4 rounded-xl {{ $level['color'] }} {{ $report->score >= $level['min'] && $report->score <= $level['max'] ? 'ring-2 ring-indigo-500' : '' }}">
          <h3 class="font-semibold">{{ $level['min'] }}–{{ $level['max'] }}</h3>
          <p>{{ $level['label'] }}</p>
        </div>
      @endforeach
    </div>

    <a href="{{ route('credit.form') }}"
       class="mt-8 inline-block text-indigo-600 font-medium hover:underline transition">🔁 حساب مرة أخرى</a>
  </div>
</x-app-layout>
