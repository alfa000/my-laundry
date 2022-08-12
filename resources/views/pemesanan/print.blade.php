<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Laundry | @yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,700;1,200;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,700;1,200;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/app.css') }}">

    @stack('styles')
</head>
<body>
    <div class="container p-5" style="min-height: calc(100vh - 106px)">
        <h2>Pemesanan</h2>

        <table class="table table-striped w-100 datatables">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Jenis Cuci</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Tgl Pemesanan</th>
                <th scope="col">Tgl Pengambilan</th>
                <th scope="col">Status Cuci</th>
                <th scope="col">Total Bayar</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($pemesanans as $pemesanan)
                <tr>
                    <td>{{ $pemesanan->no_pemesanan }}</td>
                    <td>{{ $pemesanan->pelanggan->nama }}</td>
                    <td>{{ $pemesanan->jenis_cuci->nama }}</td>
                    <td>{{ $pemesanan->jumlah }}</td>
                    <td>{{ $pemesanan->tgl_pesanan->format('d/m/Y') }}</td>
                    <td>{{ $pemesanan->tgl_pengambilan->format('d/m/Y') }}</td>
                    <td class="text-capitalize">
                        {{$pemesanan->status_cuci}}
                    </td>
                    <td>{{ $pemesanan->total_bayar }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
<script>
    window.print();
</script>
