<div>
        <section class="card">
            <h2>Data RT</h2>
            <div class="rak">
                @foreach($r_t_s as $rt)
                <article class="item">
                    @if($updateFormRt != $rt->id)
                    <div class="data-container">
                        <h3>RT {{$rt->nomorRt}}</h3>
                        <img class="tanda-tangan" src="{{asset('public')}}/{{$rt->tandaTangan}}" alt="Tanda Tangan">
                        <p>{{$rt->nik}}</p>
                        <p>{{$rt->nama}}</p>
                        <div class="rak-buttons">
                            <button wire:click="showUpdateFormRt({{$rt->id}})" class="edit-button">Edit</button>
                            <button wire:click="showConfirmDeleteRt({{$rt->id}})" class="delete-button">Hapus Data</button>
                        </div>
                    </div>
                    @endif
                    @if($updateFormRt == $rt->id)
                    <form class="add-form">
                        <input type="number" wire:model="noRt" name="noRt" placeholder="masukkan no RT" required>
                        <div class="input-tanda-tangan">
                            <label>Tanda Tangan</label>
                            <input type="file" wire:model="tandaTanganRt" name="tandaTanganRt" required>
                        </div>
                        <input type="number" wire:model="nikRt" name="nikRt" placeholder="masukkan NIK RT" required>
                        <input type="text" wire:model="namaRt" name="namaRt" placeholder="masukkan nama RT" required>
                        <input type="submit" wire:click="updateDataRt({{$rt->id}})" onclick="event.preventDefault()" value="Simpan">
                    </form>
                    <button class="cancel-button cancel-add-button" wire:click="batalUpdateRt">Batal</button>
                    @endif
                </article>
                @if($tombolDeleteRt == $rt->id)
                <div class="confirm-delete">
                    <p>Apakah Anda yakin dengan data yang ingin anda hapus?</p>
                    <div>
                        <button wire:click="showConfirmDeleteRt(0)">Batal</button>
                        <button class='yes' wire:click="deleteDataRt({{$rt->id}})">Hapus</button>
                    </div>
                </div>
                @endif
                @endforeach
                
                <article class="item">
                    <div class="form-container">
                        @if($tombolTambahRt == 0)
                        <div class="btn-plus-wrapper" wire:click="showRtForm(1)">
                            <img class="btn-plus" src="{{asset('img/plus-circle.svg')}}">
                        </div>
                        @endif
                        @if($tombolTambahRt == 1)
                        <form class="add-form">
                            <input type="number" wire:model="noRt" name="noRt" placeholder="masukkan no RT" required>
                            <div class="input-tanda-tangan">
                                <label>Tanda Tangan</label>
                                <input type="file" wire:model="tandaTanganRt" name="tandaTanganRt" required>
                            </div>
                            <input type="number" wire:model="nikRt" name="nikRt" placeholder="masukkan NIK RT" required>
                            <input type="text" wire:model="namaRt" name="namaRt" placeholder="masukkan nama RT" required>
                            <input type="submit" wire:click="createDataRt" onclick="event.preventDefault()" value="Tambah">
                        </form>
                        <button class="cancel-button cancel-add-button" wire:click="showRtForm(0)">Batal</button>
                        @endif
                    </div>
                </article>
            </div>    
        </section>
        <!-- RW -->
        <section class="card">
            <h2>Data RW</h2>
            <div class="rak">
            @foreach($r_w_s as $rw)
                <article class="item">
                    @if($updateFormRw != $rw->id)
                    <div class="data-container">
                        <h3>RW {{$rw->nomorRw}}</h3>
                        <img class="tanda-tangan" src="{{asset('public')}}/{{$rw->tandaTangan}}" alt="Tanda Tangan">
                        <p>{{$rw->nik}}</p>
                        <p>{{$rw->nama}}</p>
                        <div class="rak-buttons">
                            <button wire:click="showUpdateFormRw({{$rw->id}})" class="edit-button">Edit</button>
                            <button wire:click="showConfirmDeleteRw({{$rw->id}})" class="delete-button">Hapus Data</button>
                        </div>
                    </div>
                    @endif
                    @if($updateFormRw == $rw->id)
                    <form class="add-form">
                        <input type="number" wire:model="noRw" name="noRw" placeholder="masukkan no RW" required>
                        <div class="input-tanda-tangan">
                            <label>Tanda Tangan</label>
                            <input type="file" wire:model="tandaTanganRw" name="tandaTanganRw" required>
                        </div>
                        <input type="number" wire:model="nikRw" name="nikRw" placeholder="masukkan NIK RW" required>
                        <input type="text" wire:model="namaRw" name="namaRw" placeholder="masukkan nama RW" required>
                        <input type="submit" wire:click="updateDataRw({{$rw->id}})" onclick="event.preventDefault()" value="Simpan">
                    </form>
                    <button class="cancel-button cancel-add-button" wire:click="batalUpdateRw">Batal</button>
                    @endif
                </article>
                @if($tombolDeleteRw == $rw->id)
                <div class="confirm-delete">
                    <p>Apakah Anda yakin dengan data yang ingin anda hapus?</p>
                    <div>
                        <button wire:click="showConfirmDeleteRw(0)">Batal</button>
                        <button class='yes' wire:click="deleteDataRw({{$rw->id}})">Hapus</button>
                    </div>
                </div>
                @endif
                @endforeach

                <article class="item">
                    <div class="form-container">
                        @if($tombolTambahRw == 0)
                        <div class="btn-plus-wrapper" wire:click="showRwForm(1)">
                            <img class="btn-plus" src="{{asset('img/plus-circle.svg')}}">
                        </div>
                        @endif
                        @if($tombolTambahRw == 1)
                        <form class="add-form">
                            <input type="number" wire:model="noRw" name="noRw" placeholder="masukkan no RW" required>
                            <div class="input-tanda-tangan">
                                <label>Tanda Tangan</label>
                                <input type="file" wire:model="tandaTanganRw" name="tandaTanganRw" required>
                            </div>
                            <input type="number" wire:model="nikRw" name="nikRw" placeholder="masukkan NIK RW" required>
                            <input type="text" wire:model="namaRw" name="namaRw" placeholder="masukkan nama RW" required>
                            <input type="submit" wire:click="createDataRw" onclick="event.preventDefault()" value="Tambah">
                        </form>
                        <button class="cancel-button cancel-add-button" wire:click="showRwForm(0)">Batal</button>
                        @endif
                    </div>
                </article>
            </div>    
        </section>
</div>
