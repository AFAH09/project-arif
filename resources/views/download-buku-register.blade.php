<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butuh Surat</title>
    <link rel="stylesheet" href="{{ asset('css/download-buku-register.css') }}">
</head>
<body>
    <h2>Buku Register</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Tgl.</th>
            <th>Kode Surat</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Tempat/Tgl. Lahir</th>
            <th>Alamat</th>
            <th>Keterangan</th>
        </tr>
        @foreach($reports as $key => $report)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$report->tanggal}}</td>
            <td>{{$report->kode_surat}}</td>
            <td>{{$report->nama}}</td>
            <td>{{$report->status}}</td>
            <td>{{$report->tempatLahir}}, {{$tanggalLahir[$key]}}</td>
            <td>{{$report->alamat}}</td>
            <td>{{$report->keterangan}}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</main>
</body>
</html>