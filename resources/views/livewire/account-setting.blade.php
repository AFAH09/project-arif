<div>

                    @if(session()->has('message') && $flashMessage == 1)
                    <article id="flashMessage" class="pop-up">
                        <i wire:click="removeFlashMessage" class='bx bx-x'></i>
                        <h5>{{session('message')}}</h5>
                    </article>
                    @endif
                    @if($editProfile == 0)
                    <section class="main-profile">
                        <button class="btn-edit" wire:click="showEditProfile({{$user->id}})"><i class="bi bi-pencil-square"></i> Edit</button>
                        <div class="list">
                            <p>Email</p>
                            <p>{{$user->email}}</p>
                        </div>
                        <div class="list">
                            <p>Nama</p>
                            <p>{{$user->name}}</p>
                        </div>
                        <div class="list">
                            <p>NIK</p>
                            <p>{{$user->nik}}</p>
                        </div>
                        <div class="list">
                            <p>Jabatan</p>
                            <p>{{$user->jabatan}}</p>
                        </div>
                        <div class="list">
                            <p>RT</p>
                            <p>{{$user->rt}}</p>
                        </div>
                        <div class="list">
                            <p>RW</p>
                            <p>{{$user->rw}}</p>
                        </div>
                        <div class="list">
                            <p>No. Telp (WA)</p>
                            <p>{{$user->noTelp}}</p>
                        </div>
                        <div class="list">
                            <p>Alamat</p>
                            <p>{{$user->alamat}}</p>
                        </div>
                    </section>
                    @elseif($editProfile == 1)
                    <section class="edit-profile">
                        <button wire:click="hideEditProfile"><i class='bx bxs-chevron-left'></i> Kembali</button>
                        <div class="list">
                            <label for="email">Email</label>
                            <input wire:model="email" type="email" id="email" disabled>
                        </div>
                        <div class="list">
                            <label for="name">Nama</label>
                            <input wire:model="name" type="text" id="name" name="name">
                        </div>
                        <div class="list">
                            <label for="nik">NIK</label>
                            <input wire:model="nik" type="text" id="nik" name="nik">
                        </div>
                        <div class="list">
                            <label for="jabatan">Jabatan</label>
                            <input wire:model="jabatan" type="text" id="jabatan" disabled>
                        </div>
                        <div class="list">
                            <label for="rt">RT</label>
                            <input wire:model="rt" type="text" id="rt" disabled>
                        </div>
                        <div class="list">
                            <label for="rw">RW</label>
                            <input wire:model="rw" type="text" id="rw" disabled>
                        </div>
                        <div class="list">
                            <label for="noTelp">No. Telp (WA)</label>
                            <input wire:model="noTelp" type="text" id="noTelp" name="noTelp"> 
                        </div>
                        <div class="list">
                            <label for="alamat">Alamat</label>
                            <textarea wire:model="alamat" name="alamat" id="alamat" cols="30" rows="3"></textarea>
                        </div>
                        <button class="btn-save" wire:click="updateData({{$user->id}})">Simpan</button>
                    </section>
                    @endif
                    <section class="edit-password">
                        <p class="warning">Pastikan mengganti password ketika telah terjadi serah terima akun!</p>
                        <h4>Ubah Password</h4>
                        <div class="list">
                            <label for="password">Password Baru</label>
                            <input wire:model="password" type="password" id="password">
                        </div>
                        <div class="list">
                            <label for="confirm-password">Konfirmasi Password Baru</label>
                            <input wire:model="confirmPassword" type="password" id="confirm-password">
                        </div>
                        <button class="btn-save" wire:click="updatePassword({{$user->id}})">Simpan</button>
                    </section>
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
