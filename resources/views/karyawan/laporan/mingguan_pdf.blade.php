<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Mingguan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Mingguan</h2>
    <p>Periode Minggu: {{ $minggu }}</p>
    <table>
        <thead>
            <tr>
                <th>Minggu</th>
                <th>Pemasukan</th>
                <th>Keuntungan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $minggu }}</td>
                <td>Rp {{ number_format($pemasukan, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($keuntungan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
