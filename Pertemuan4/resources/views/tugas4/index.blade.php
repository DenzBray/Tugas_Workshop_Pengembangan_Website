<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 4</title>
</head>
<body>
    <h1>Halaman Tugas 4!</h1>
</body>
<h1>Data Tugas 4</h1>
<table border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tugas4 as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->stok }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</html>

