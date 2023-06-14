<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butuh Surat</title>
    <link rel="stylesheet" href="{{ asset('css/cetak.css') }}">
</head>
<body>
    <section>
        <header>
            <h1 class="mb-1">RUKUN TETANGGA {{$member->rt}} RUKUN WARGA {{$noRw}}</h1>
            <h1 class="mb-1">KELURAHAN LOWOKWARU KECAMATAN LOWOKWARU</h1>
            <h1>KOTA MALANG</h1>
        </header>
        <main>
            <article class="pembuka">
                <p>Malang, .......</p>
                <p>Kepada:</p>
                <p>Yth. Sdr.</p>
                <p>Lurah Lowokwaru</p>
                <p>Kecamatan Lowokwaru</p>
                <p>di</p>
                <p>MALANG</p>
            </article>
            <article class="isi">
                <section>
                    <h1>SURAT PENGANTAR</h1>
                    <p class="nomor-surat">Nomor: ..... / {{$member->rt}}-{{$noRw}} / {{$rmwMonth}} {{$year}}</p>
                    <p class="indent">Yang bertanda tangan di bawah ini Ketua RT {{$member->rt}} RW {{$noRw}} Kelurahan Lowokwaru Kecamatan Lowokwaru Kota Malang. Dengan ini menerangkan bahwa:</p>
                    <table class="data-warga">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{$member->nama}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            @if($member->jenisKelamin == 'Laki-Laki')
                            <td><span>Laki-Laki</span></td>
                            @elseif($member->jenisKelamin == 'Perempuan')
                            <td><span>Perempuan</span></td>
                            @endif
                            
                        </tr>
                        <tr>
                            <td>Tempat/Tgl.Lahir</td>
                            <td>:</td>
                            <td>{{$ttl}}</td>
                        </tr><tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{$member->agama}}</td>
                        </tr><tr>
                            <td>Status</td>
                            <td>:</td>
                            @if($member->status == 'Belum Kawin')
                            <td><span>Belum Kawin</span></td>
                            @elseif($member->status == 'Kawin')
                            <td><span>Kawin</span></td>
                            @elseif($member->status == 'Cerai Hidup')
                            <td><span>Cerai Hidup</span></td>
                            @elseif($member->status == 'Cerai Mati')
                            <td><span>Cerai Mati</span></td>
                            @endif
                        </tr><tr>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                            <td>{{$member->negara}}</td>
                        </tr><tr>
                            <td>Pendidikan</td>
                            <td>:</td>
                            <td>{{$member->pendidikan}}</td>
                        </tr><tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{$member->pekerjaan}}</td>
                        </tr><tr>
                            <td>Nomor NIK</td>
                            <td>:</td>
                            <td>{{$member->nik}}</td>
                        </tr><tr>
                            <td>Nomor Kartu Keluarga</td>
                            <td>:</td>
                            <td>{{$member->noKk}}</td>
                        </tr><tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{$member->alamat}}</td>
                        </tr><tr>
                            <td>Keperluan</td>
                            <td>:</td>
                            <td>{{$confirm->keperluan}}</td>
                        </tr>
                    </table>
                    <p class="indent">Demikian untuk menjadikan periksa dan dipergunakan sebagaimana mestinya.</p>
                    <table class="data-surat">
                        <tr>
                            <td>Nomor</td>
                            <td>:</td>
                            <td>.....</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>.....</td>
                        </tr>
                    </table>
                </section>
                <section class="mengetahui">
                    <table>
                        <tr>
                            <td class="w-25">Mengetahui,</td>
                            <td class="w-30"></td>
                            <td class="w-25"></td>
                        </tr>
                        <tr>
                            <td class="w-25">KETUA RW {{$noRw}}</td>
                            <td class="w-30"></td>
                            <td class="w-25">KETUA RT {{$member->rt}} RW {{$noRw}}</td>
                        </tr>
                        <tr>
                            <td class="w-25">KELURAHAN LOWOKWARU</td>
                            <td class="w-30"></td>
                            <td class="w-25">KELURAHAN LOWOKWARU</td>
                        </tr>
                        <tr>
                            <td class="nama w-25">{{$namaRw->name}}</td>
                            <td class="w-30"></td>
                            <td class="nama w-25">{{$namaRt->name}}</td>
                        </tr>
                        <tr>
                            <td class="tanda-tangan w-25"></td>
                            <td class="w-30"></td>
                            <td class="tanda-tangan w-25"></td>
                        </tr>
                    </table>
                </section>
            </article>
        </main>
    </section>
</body>
</html>