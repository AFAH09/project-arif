<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Menyurat</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/data-kelurahan.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    @livewireStyles
</head>
<body>
    <header class='header'>
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('img/logo-malang.png') }}" alt="Logo Malang">
            <div class='text'>
                <h1>Surat Menyurat</h1>
                <p>Kelurahan Lowokwaru</p>
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="{{ url('/admin/list-cetak') }}">Antrian Cetak</a></li>
                <li><a href="{{ url('/admin/data-warga') }}">Data Warga</a></li>
                <li><a href="{{ url('/admin/data-kelurahan') }}">Data Kelurahan</a></li>
                <li><a href="{{ url('/admin/buku-register') }}">Buku Register</a></li>
            </ul>
            <ul>
                <li><a href="" class="user">Admin<img src="{{ asset('img/chevron-down.svg') }}"></a></li>
            </ul>
            <form method="POST" action="{{ route('logout') }}" class="drop-down-content">
                @csrf
                <div class="options">
                    <button class="btn-logout">Keluar</button>
                </div>
            </form>
        </nav>
    </header>
    <main>
        <livewire:input-data-kelurahan/>
    </main>
    <script src="{{ asset('js/user-option.js') }}"></script>
    @livewireScripts
</body>
</html>