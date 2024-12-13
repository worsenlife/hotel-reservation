<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD reservasi</title>
</head>
<body>
    <h1>CRUD reservasi</h1>
    <style>
/* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
}

h1, h3 {
    text-align: center;
    color: #2c3e50;
}

h1 {
    margin-top: 20px;
    font-size: 2rem; /* Dikurangi sedikit dari sebelumnya */
}

h3 {
    font-size: 1.3rem; /* Dikurangi sedikit dari sebelumnya */
    margin-bottom: 15px; /* Mengurangi margin bawah */
}

a {
    color: #3498db;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Form Styling */
form {
    max-width: 450px; /* Dikurangi sedikit dari sebelumnya */
    margin: 0 auto 20px;
    background-color: white;
    padding: 15px; /* Mengurangi padding agar lebih kecil */
    border-radius: 6px; /* Sedikit lebih kecil border-radius */
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1); /* Mengurangi shadow */
}

form label {
    display: block;
    font-size: 0.9rem; /* Mengurangi ukuran font */
    margin-bottom: 6px; /* Mengurangi margin bawah */
}

form input {
    width: 100%;
    padding: 8px; /* Mengurangi padding */
    margin-bottom: 12px; /* Mengurangi margin bawah */
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 0.9rem; /* Mengurangi ukuran font */
}

form button {
    width: 100%;
    padding: 8px; /* Mengurangi padding */
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem; /* Mengurangi ukuran font */
    cursor: pointer;
}

form button:hover {
    background-color: #2980b9;
}

/* Table Styling */
table {
    width: 100%;
    margin-top: 20px; /* Mengurangi margin atas */
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1); /* Mengurangi shadow */
}

th, td {
    padding: 8px; /* Mengurangi padding */
    text-align: center;
    border: 1px solid #ddd;
    font-size: 0.9rem; /* Mengurangi ukuran font */
}

th {
    background-color: #3498db;
    color: white;
    font-weight: bold;
}

td a {
    margin-right: 8px; /* Mengurangi margin kanan */
    color: #27ae60;
    font-weight: bold;
}

td a:hover {
    text-decoration: underline;
}

/* Responsiveness */
@media (max-width: 768px) {
    h1 {
        font-size: 1.8rem; /* Ukuran h1 lebih kecil di perangkat kecil */
    }

    h3 {
        font-size: 1.2rem; /* Ukuran h3 lebih kecil */
    }

    form {
        padding: 12px; /* Mengurangi padding pada form */
    }

    table {
        font-size: 0.85rem; /* Mengurangi ukuran font tabel pada perangkat kecil */
    }

    table th, table td {
        padding: 6px; /* Mengurangi padding tabel pada perangkat kecil */
    }
}

    </style>
    <h3>{{ isset($edit_data) ? 'Edit Data' : 'Tambah Data' }}</h3>
    <form action="{{ isset($edit_data) ? route('Reservasi.update', $edit_data->id) : route('Reservasi.store') }}" method="POST">
        @csrf
        <label>lokasi:</label>
        <input type="text" name="daerah" value="{{ $edit_data->lokasi ?? '' }}" required>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="{{ $edit_data->tanggal ?? '' }}" required>
        <label>Nama Hotel:</label>
        <input type="text" name="nama_hotel" value="{{ $edit_data->nama_hotel ?? '' }}" required>
        <button type="submit">{{ isset($edit_data) ? 'Update' : 'Simpan' }}</button>
    </form>

    <button onclick="window.location.href='{{ route('Reservasi.cetakPdf') }}'" target="_blank"style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-align: center; text-decoration: none; border-radius: 5px; font-size: 16px;">Cetak PDF</button>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>lokasi</th>
                <th>Tanggal</th>
                <th>Nama Hotel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->daerah }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->nama_hotel }}</td>
                    <td>
                        <a href="{{ route('Reservasi.edit', ['id' => $row->id]) }}">Edit</a>
                        <a href="{{ route('Reservasi.destroy', ['id' => $row->id]) }}" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>