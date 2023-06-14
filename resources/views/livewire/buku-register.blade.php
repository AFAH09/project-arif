<div>
                    <button class="btn-download" wire:click="download">Download PDF</button>
                    <section class="table-wrapper">
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
                                <th></th>
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
                                <td>
                                    <button wire:click="showConfirmDelete({{$report->id}})"><i class='bx bxs-trash-alt'></i></button>
                                </td>
                            </tr>
                            @if($confirmDelete == $report->id)
                            <section class="confirm-wrapper">
                                <div class="confirm confirm-delete">
                                    <p>Apakah Anda yakin akan menghapus data ini?</p>
                                    <div class="action">
                                        <button wire:click="showConfirmDelete(0)">Batal</button>
                                        <button class='yes' wire:click="deleteData({{$report->id}})">Hapus</button>
                                    </div>
                                    <p class="warning">Hati-hati ketika akan menghapus data!</p>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </section>
</div>
