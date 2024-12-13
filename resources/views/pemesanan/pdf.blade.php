<!DOCTYPE html>
<html>
<head>
    <title>Categories Report</title>
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
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Reservasi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>lokasi</th>
                <th>Tanggal</th>
                <th>Nama Hotel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->daerah }}</td>
                    <td>{{ $category->tanggal }}</td>
                    <td>{{ $category->nama_hotel }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>