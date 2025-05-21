<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Credit Report</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            direction: ltr;
            text-align: left;
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
    <h2>Credit Report</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Score</th>
                <th>On Time Payments</th>
                <th>Utilization Rate</th>
                <th>Account Age</th>
                <th>Credit Mix</th>
                <th>New Inquiries</th>
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
