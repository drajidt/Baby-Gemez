<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #333;
            margin: 40px;
        }
        h2 {
            text-align: center;
            color: #1f2937;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        th, td {
            border: 1px solid #d1d5db;
            padding: 12px;
            text-align: center;
        }
        thead {
            background-color: #2563eb;
            color: white;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
            font-weight: bold;
            font-size: 16px;
            color: #1f2937;
        }
    </style>
</head>
<body>
    <h2>Laporan Harian - {{ $tanggal }}</h2>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <th>Keuntungan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $tanggal }}</td>
                <td>Rp {{ number_format($pemasukan, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($keuntungan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        Total Keuntungan: Rp {{ number_format($keuntungan, 0, ',', '.') }}<br>
        <span style="font-style: italic; color: #6b7280;">Baby Gemez</span>
    </div>
</body>
</html>
