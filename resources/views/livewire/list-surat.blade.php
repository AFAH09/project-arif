<div>
            @if(session()->has('message') && $flashMessage == 1)
            <article id="flashMessage" class="pop-up" style="background-color: var(--color-red);">
                <i wire:click="removeFlashMessage" class='bx bx-x'></i>
                <h5>{{session('message')}}</h5>
            </article>
            @endif

            @if($suratPengantar == 0)
            <ul>
                <li><span class="item-name">Surat Pengantar</span><button wire:click="showFormSuratPengantar(1)">Buat Surat</button></li>
            </ul>
            @elseif($suratPengantar == 1)
            <form class='surat-pengantar' autocomplete='off'>
                <div>
                    <label for="nik">NIK <span class="red">*</span></label>
                    <input wire:model.lazy="nik" type="number" id="nik" name="nik" autocomplete="off" required>
                </div>
                <div>
                    <label for="nama">Nama <span class="red">*</span></label>
                    <input wire:model="nama" type="text" id='nama' name="nama" autocomplete="off" required>
                </div>
                <div>
                    <label for="jenis-kelamin">Jenis Kelamin <span class="red">*</span></label>
                    <select wire:model="jenisKelamin" name="jenis-kelamin" required>
                        <option hidden>Pilih Salah Satu</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="tempat-lahir">Tempat Lahir <span class="red">*</span></label>
                    <input wire:model="tempat" type="text" id="tempat-lahir" name="tempat-lahir" autocomplete="off" required>
                </div>
                <div>
                    <label for="tgl-lahir">Tgl. Lahir <span class="red">*</span></label>
                    <input wire:model="tanggal" type="date" id="tgl-lahir" name="tgl-lahir" autocomplete="off" required>
                </div>
                <div>
                    <label for="agama">Agama <span class="red">*</span></label>
                    <select wire:model="agama" id="agama" name="agama" required>
                        <option hidden>Pilih Salah Satu</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div>
                    <label for="status">Status <span class="red">*</span></label>
                    <select wire:model="status" id="status" name="status" required>
                        <option hidden>Pilih Salah Satu</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
                <div>
                    <label for="kewarganegaraan">Kewarganegaraan <span class="red">*</span></label>
                    <select wire:model="negara" id="kewarganegaraan" name="kewarganegaraan" required>
                        <option hidden>Pilih Salah Satu</option>
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                    </select>
                </div>
                <div>
                    <label for="pendidikan">Pendidikan <span class="red">*</span></label>
                    <input wire:model="pendidikan" type="text" id="pendidikan" name="pendidikan" autocomplete="off" required>
                </div>
                <div>
                    <label for="pekerjaan">Pekerjaan <span class="red">*</span></label>
                    <input wire:model="pekerjaan" type="text" id="pekerjaan" name="pekerjaan" autocomplete="off" required>
                </div>
                <div>
                    <label for="nomor-kk">Nomor KK <span class="red">*</span></label>
                    <input wire:model="noKk" type="number" id="nomor-kk" name="nomor-kk" autocomplete="off" required>
                </div>
                <div>
                    <label for="rt">RT <span class="red">*</span></label>
                    <select wire:model="rt" id="rt" name="rt" required>
                        <option hidden>Pilih Salah Satu</option>
                        @foreach($r_t_s as $rt)
                        <option value="{{$rt->rt}}">{{$rt->rt}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="rw">RW <span class="red">*</span></label>
                    <select wire:model="rw" id="rw" name="rw" required>
                        <option hidden>Pilih Salah Satu</option>
                        @foreach($r_w_s as $rw)
                        <option value="{{$rw->rw}}">{{$rw->rw}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="alamat">Alamat <span class="red">*</span></label>
                    <textarea wire:model="alamat" name="alamat" id="alamat" cols="30" rows="3" required></textarea>
                </div>
                <div>
                    <label for="keperluan">Keperluan <span class="red">*</span></label>
                    <select wire:model="keperluan" id="keperluan" name="keperluan" required>
                        <option hidden>Pilih Salah Satu</option>
                        <option value="Kartu Tanda Penduduk (E-KTP)">Kartu Tanda Penduduk (E-KTP)</option>
                        <option value="Kartu Keluarga (KK)">Kartu Keluarga (KK)</option>
                        <option value="Surat Kelahiran">Surat Kelahiran</option>
                        <option value="Surat Kematian">Surat Kematian</option>
                        <option value="Surat Boro Kerja">Surat Boro Kerja</option>
                        <option value="Surat Pindah">Surat Pindah</option>
                        <option value="Surat Nikah">Surat Nikah</option>
                        <option value="Surat Pindah Nikah">Surat Pindah Nikah</option>
                        <option value="Ijin Usaha/Keterangan Usaha">Ijin Usaha/Keterangan Usaha</option>
                        <option value="Keterangan Domisili">Keterangan Domisili</option>
                        <option value="SKCK (Surat Keterangan Catatan Kepolisian)">SKCK (Surat Keterangan Catatan Kepolisian)</option>
                        <option value="I M B (Ijin Mendirikan Bangunan)">I M B (Ijin Mendirikan Bangunan)</option>
                        <option value="SKTM (Surat Keterangan Tidak Mampu)">SKTM (Surat Keterangan Tidak Mampu)</option>
                        <option value="Lain-Lain">Lain-Lain</option>
                    </select>
                    <input wire:model="keterangan" type="text" id="keterangan" name="keterangan" autocomplete="off" placeholder="Isi apabila memilih Lain-Lain!">
                </div>
            </form>
            <div class="buttons">
                <button class='back' wire:click="showFormSuratPengantar(0)">Kembali</button>
                <button class='next' wire:click="showConfirmSuratPengantar(1)">Cetak Surat</button>
                @if($confirm == 1)
                <div class="confirm-wrapper">
                    <div class="confirm">
                        <i wire:click="showConfirmSuratPengantar(0)" class='bx bx-x'></i>
                        <i class='bx bxs-check-circle'></i>
                        <h4>Pilih cetak surat apabila data telah sesuai!</h4>
                        <div class="action">
                            <button class='yes' wire:click="cetakSuratPengantar"><i class='bx bxs-printer'></i>Cetak Surat</button>
                        </div>
                        <p>NB: Pastikan data telah sesuai!</p>
                    </div>
                </div>
                @endif
            </div>
            @endif 

            <script>
                document.addEventListener("DOMContentLoaded", () => { 
                    window.livewire.on('removeFlashMessage',()=>{
                        setTimeout(() => { 
                            document.querySelector('#flashMessage').remove();
                        }, 5000);
                    });
                });
            </script>
</div>
