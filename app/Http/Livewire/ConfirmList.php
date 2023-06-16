<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use App\Models\Report;
use App\Models\User;
use App\Models\Confirm;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ConfirmList extends Component
{
    public $flashMessage = 0;
    public $confirmDelete = 0;
    public $confirmButton = 0;
    public $noRegister;
    public $tanggal;

    protected $listeners = [
        'showData' => '$refresh'
    ];

    public function render()
    {
        $user = Auth::user();
        
        $confirms = DB::table('confirms')
                    ->join('members', 'confirms.member_nik', '=', 'members.nik')
                    ->where('confirms.aparat_nik', '=', $user->nik)
                    ->select('confirms.id', 'members.nama', 'confirms.keperluan', 'confirms.keterangan')
                    ->get();

        return view('livewire.confirm-list')->with('confirms', $confirms);
    }

    public function refreshComponent() {
        $this->emit('showData');
    }

    public function showConfirmDelete($id) {
        $this->confirmDelete = $id;
    }

    public function showConfirmData($id) {
        $user = Auth::user();
        $this->noRegister = DB::table('reports')->where('aparat_nik', '=', $user->nik)->count() + 1;
        $this->tanggal = Carbon::now()->isoFormat('DD-MM-Y');

        $this->confirmButton = $id;
    }

    public function hideConfirmData() {
        $this->confirmButton = 0;
    }

    public function removeFlashMessage() {
        $this->emit('removeFlashMessage');
    }

    public function deleteConfirm($id) {
        $confirm = Confirm::find($id);
        $confirm->delete();
        $confirmDelete = 0;
    }

    public function confirm($id) {
        $confirm = Confirm::find($id);
        $user = Auth::user();
        $keterangan;
        $kodeSurat;
        if($confirm->keperluan == 'Lain-Lain') {
            $keterangan = $confirm->keterangan;
            $kodeSurat = 'D.1';
        } else {
            $keterangan = $confirm->keperluan;
        }

        if($confirm->keperluan == 'Kartu Tanda Penduduk (E-KTP)') {
            $kodeSurat = 'D.1';
        } else if($confirm->keperluan == 'Kartu Keluarga (KK)') {
            $kodeSurat = 'C.3';
        } else if($confirm->keperluan == 'Surat Kelahiran') {
            $kodeSurat = 'A.3';
        } else if($confirm->keperluan == 'Surat Kematian') {
            $kodeSurat = 'A.4';
        } else if($confirm->keperluan == 'Surat Boro Kerja') {
            $kodeSurat = 'D.1';
        } else if($confirm->keperluan == 'Surat Pindah') {
            $kodeSurat = 'A.2';
        } else if($confirm->keperluan == 'Surat Nikah') {
            $kodeSurat = 'B.2';
        } else if($confirm->keperluan == 'Surat Pindah Nikah') {
            $kodeSurat = 'B.2';
        } else if($confirm->keperluan == 'Ijin Usaha/Keterangan Usaha') {
            $kodeSurat = 'D.1';
        } else if($confirm->keperluan == 'Keterangan Domisili') {
            $kodeSurat = 'C.3';
        } else if($confirm->keperluan == 'SKCK (Surat Keterangan Catatan Kepolisian)') {
            $kodeSurat = 'B.2';
        } else if($confirm->keperluan == 'I M B (Ijin Mendirikan Bangunan)') {
            $kodeSurat = 'D.1';
        } else if($confirm->keperluan == 'SKTM (Surat Keterangan Tidak Mampu)') {
            $kodeSurat = 'D.1';
        }

        Report::create([
            'kode_surat' => $kodeSurat,
            'member_nik' => $confirm->member_nik,
            'tanggal' => Carbon::now()->isoFormat('DD-MM-Y'),
            'keterangan' => $keterangan,
            'jenisSurat' => $confirm->jenisSurat,
            'aparat_nik' => $user->nik,
        ]);
       

        // $dataRegister = new SheetDB('ryjcf3y4rzhc0');
        // $dataRegister->create([
        //     'No.' => DB::table('reports')->count() + 1,
        //     'Nomor dan Tanggal' => DB::table('reports')->count() + 1 .', '.Carbon::now()->format('Y-m-d'),
        //     'Nama' => $this->nama,
        //     'RT/RW' =>$this->rt .' / '.$this->rw,
        //     'Keperluan' =>$this->keperluan,
        // ]);

        $confirm->delete();  

        session()->flash('message', 'Data Berhasil Dikonfirmasi');
        $this->flashMessage = 1;
        $this->emit('removeFlashMessage');
    }
}
