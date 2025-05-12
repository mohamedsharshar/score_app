<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <title>تقرير الجدارة الائتمانية</title>
    <style>
        @font-face {
            font-family: 'arabic';
            src: url("{{ base_path('fonts/Amiri-Regular.ttf') }}") format('truetype');
        }

        body {
            font-family: 'arabic', sans-serif;
            direction: rtl;
            text-align: right;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2>تقرير الجدارة الائتمانية</h2>
    <table>
        <thead>
            <tr>
                <th>التاريخ</th>
                <th>النتيجة</th>
                <th>نسبة الدفعات</th>
                <th>معدل الاستخدام</th>
                <th>عمر الحسابات</th>
                <th>تنوع الائتمان</th>
                <th>الاستعلامات الجديدة</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $r)
                <tr>
                    <td>{{ $r->created_at->format('Y-m-d') }}</td>
                    <td>{{ $r->score }}</td>
                    <td>{{ $r->on_time_payments }}%</td>
                    <td>{{ $r->utilization_rate }}%</td>
                    <td>{{ $r->account_age }}</td>
                    <td>{{ $r->credit_mix }}%</td>
                    <td>{{ $r->new_inquiries }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
