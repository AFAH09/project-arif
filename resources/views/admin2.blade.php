<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Butuh Surat</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="flex-container">
        <nav class="navbar">
            <ul>
                <li class="logo-surat-admin">
                    <a href="{{ url('/admin') }}" class="logo">
                        <img src="{{asset('img/logo.svg')}}" alt="Logo Butuh Surat">
                        <div class='text'>
                            <h1>Butuh Surat</h1>
                            <p>Surat Menyurat Kelurahan Lowokwaru</p>
                        </div>
                    </a>
                </li>
                <li ><a href="{{ url('/admin/register') }}"><i class='bx bxs-group' ></i> Daftarkan Aparat</a></li>
                <hr style="border-color:black;">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn-logout"><i class='bx bx-log-out'></i>Keluar</button>
                    </form>
                </li>
                <hr style="border-color:black;">
            </ul>
        </nav>
        <main>
            <h2>Daftar Aparat RT/RW Kelurahan Lowokwaru</h2>
            <div class="jumlah-rt-rw">
                <h4>Jumlah RW: 5</h4>
                <table>

                    <tr>
                        <th>RW</th>
                        <th>Jumlah RT</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>100</td>
                    </tr>
                </table>
            </div>
            <h3>Aparat Yang Terdaftar</h3>
            <table>
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>RT</th>
                    <th>RW</th>
                </tr>
                @foreach($aparats as $key => $aparat)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$aparat->jabatan}}</td>
                    <td>{{$aparat->rt}}</td>
                    <td>{{$aparat->rw}}</td>
                </tr>
                @endforeach
            </table>
        </main>
    </div>
</body>
</html>