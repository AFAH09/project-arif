<div wire:poll.visible.750ms>
                    @if(session()->has('message') && $flashMessage == 1)
                    <article id="flashMessage" class="pop-up">
                        <i wire:click="removeFlashMessage" class='bx bx-x'></i>
                        <h5>{{session('message')}}</h5>
                    </article>
                    @endif
                    <button wire:click="refreshComponent" class="btn-refresh"><i class="bi bi-arrow-repeat"></i> Perbarui</button>
                    <section class="table-wrapper">
                        <table>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Keperluan</th>
                                <th>Keterangan</th>
                                <th></th>
                            </tr>
                            @foreach($confirms as $key => $confirm)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$confirm->nama}}</td>
                                <td>{{$confirm->keperluan}}</td>
                                <td>{{$confirm->keterangan}}</td>
                                <td>
                                    <button wire:click="showConfirmDelete({{$confirm->id}})"><i class='bx bxs-trash-alt'></i></button>
                                    <button wire:click="showConfirmData({{$confirm->id}})"><i class='bx bxs-check-circle' ></i></button>
                                </td>
                            </tr>
                            @if($confirmDelete == $confirm->id)
                            <section class="confirm-wrapper">
                                <div class="confirm confirm-delete">
                                    <p>Apakah Anda yakin akan menghapus data konfirmasi?</p>
                                    <div class="action">
                                        <button wire:click="showConfirmDelete(0)">Batal</button>
                                        <button class='yes' wire:click="deleteConfirm({{$confirm->id}})">Hapus</button>
                                    </div>
                                    <p class="warning">Hati-hati ketika akan menghapus data!</p>
                                </div>
                            </section>
                            @endif   
                            @if($confirmButton == $confirm->id)
                            <section class="confirm-wrapper">
                                <div class="confirm confirm-acc">
                                    <p>Masukkan data berikut pada surat</p>
                                    <div class="data-wrapper">
                                        <div class="list">
                                            <label for="noRegister">Nomor Register</label>
                                            <input wire:model="noRegister" type="text" disabled>
                                        </div>
                                        <div class="list">
                                            <label for="tanggal">Tanggal</label>
                                            <input wire:model="tanggal" type="text" disabled>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <button wire:click="hideConfirmData()">Batal</button>
                                        <button class='yes' wire:click="confirm({{$confirm->id}})">Konfirmasi</button>
                                    </div>
                                </div>
                            </section>
                            @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>   
                        </table>
                    </section>
                    
                    <script>
                        document.addEventListener("DOMContentLoaded", () => { 
                            window.livewire.on('removeFlashMessage',()=>{
                                setTimeout(() => { 
                                    document.querySelector('#flashMessage').remove();
                                }, 5000);
                            });
                        });

                        document.querySelectorAll('.bxs-check-circle').forEach(element => {
                            element.addEventListener('mouseover', (event) => {
                                event.target.classList.add('bx-tada');
                            });
                        });

                        document.querySelectorAll('.bxs-trash-alt').forEach(element => {
                            element.addEventListener('mouseover', (event) => {
                                event.target.classList.add('bx-tada');
                            });
                        });
                    </script>
</div>
