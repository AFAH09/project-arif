<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Confirm;
use App\Models\Report;
use App\Models\User;
use Livewire\Component;
use SheetDB\SheetDB;
use Redirect;

class CetakSuratPengantar extends Component
{
    public $confirm = 0;
    public $flashMessage = 0;

    public $nik;
    public $nama;
    public $jenisKelamin;
    public $tempat;
    public $tanggal;
    public $agama;
    public $status;
    public $negara;
    public $pendidikan;
    public $pekerjaan;
    public $noKk;
    public $rt;
    public $rw;
    public $alamat;
    public $tujuan;  
    public $keperluan;  
    public $keterangan = '';  

    protected $listeners = [
        'Cetak' => '$refresh'
    ];

    public function render()
    {
        $r_t_s = User::join('aparats', 'aparats.nik', '=', 'users.nik')
                ->where('aparats.jabatan', '=', 'RT')
                ->orderBy('aparats.rt', 'ASC')
                ->select('aparats.rt')
                ->get();

        $r_w_s = User::join('aparats', 'aparats.nik', '=', 'users.nik')
                ->where('aparats.jabatan', '=', 'RW')
                ->orderBy('aparats.rw', 'ASC')
                ->select('aparats.rw')
                ->get();
                    
        return view('livewire.cetak-surat-pengantar')->with('r_t_s', $r_t_s)->with('r_w_s', $r_w_s);
    }

    public function updatedNik() {
        $member = Member::where('nik', ((int)$this->nik))->first();
        if($member) {
            $this->nama = $member->nama;
            $this->jenisKelamin = $member->jenisKelamin;
            $this->tempat = $member->tempatLahir;
            $this->tanggal = $member->tanggalLahir;
            $this->agama = $member->agama;
            $this->status = $member->status;
            $this->pendidikan = $member->pendidikan;
            $this->negara = $member->negara;
            $this->pekerjaan = $member->pekerjaan;
            $this->noKk = $member->noKk;
            $this->rt = $member->rt;
            $this->rw = $member->rw;
            $this->alamat = $member->alamat;
        }
    }

    public function removeFlashMessage() {
        $this->emit('removeFlashMessage');
    }

    public function showConfirm($on) {
        if($on == 1) {
            if($this->nik == '' ||
                $this->nama == '' ||
                $this->jenisKelamin == '' ||
                $this->tempat == '' ||
                $this->tanggal == '' ||
                $this->agama == '' ||
                $this->status == '' ||
                $this->pendidikan == '' ||
                $this->negara == '' ||
                $this->pekerjaan == '' ||
                $this->noKk == '' ||
                $this->rt == '' ||
                $this->rw == '' ||
                $this->alamat == '' ||
                $this->tujuan == '' ||
                $this->keperluan == '') {
                    session()->flash('message', 'Isi Semua Data!');
                    $this->flashMessage = 1;
                    $this->emit('removeFlashMessage');
            } else {
                $this->confirm = $on;
            }
        } else {
            $this->confirm = $on;   
        }
    }

    public function downloadSurat() {
        $this->createData();
        $this->confirm = 0;
        return redirect()->to('download/surat/'.$this->nik);
    }

    public function cetakSurat()
    {
        $this->createData();
        $this->confirm = 0;
        return redirect()->to('cetak/'.$this->nik);
    }

    public function createData() {
        $member = Member::where('nik', $this->nik)->first();

        $dataValid = $this->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'tempat' => 'required',
            'tanggal' => 'required',
            'agama' => 'required',
            'status' => 'required',
            'negara' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'noKk' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
            'tujuan' => 'required',
            'keperluan' => 'required',
        ]);

        if(!$member) {
            Member::create([
                'nik' =>$this->nik,
                'nama' =>$this->nama,
                'jenisKelamin' =>$this->jenisKelamin,
                'tempatLahir' =>$this->tempat,
                'tanggalLahir' =>$this->tanggal,
                'agama' =>$this->agama,
                'status' =>$this->status,
                'pendidikan' =>$this->pendidikan,
                'negara' =>$this->negara,
                'pekerjaan' =>$this->pekerjaan,
                'noKk' =>$this->noKk,
                'rt' =>$this->rt,
                'rw' =>$this->rw,
                'alamat' =>$this->alamat,
            ]);
        } else if($member) {
            $member->nama = $this->nama;
            $member->jenisKelamin = $this->jenisKelamin;
            $member->tempatLahir = $this->tempat;
            $member->tanggalLahir = $this->tanggal;
            $member->agama = $this->agama;
            $member->status = $this->status;
            $member->negara = $this->negara;
            $member->pendidikan = $this->pendidikan;
            $member->pekerjaan = $this->pekerjaan;
            $member->noKk = $this->noKk;
            $member->rt = $this->rt;
            $member->rw = $this->rw;
            $member->alamat = $this->alamat;
            $member->save();
        }

        $aparatRt = User::join('aparats', 'aparats.nik', '=', 'users.nik')
                ->where([
                    ['aparats.jabatan', '=', 'RT'],
                    ['aparats.rt', '=', $this->rt],
                    ['aparats.rw', '=', $this->rw],
                ])
                ->select('aparats.nik')
                ->first();
        
        $aparatRw = User::join('aparats', 'aparats.nik', '=', 'users.nik')
                ->where([
                    ['aparats.jabatan', '=', 'RW'],
                    ['aparats.rt', '=', $this->rt],
                    ['aparats.rw', '=', $this->rw],
                ])
                ->select('aparats.nik')
                ->first();            

        Confirm::create([
            'member_nik' => $this->nik,
            'tujuan' => $this->tujuan,
            'keperluan' => $this->keperluan,
            'keterangan' => $this->keterangan,
            'jenisSurat' => 'Surat Pengantar',
            'aparat_nik' => $aparatRt->nik,
        ]);

        Confirm::create([
            'member_nik' => $this->nik,
            'tujuan' => $this->tujuan,
            'keperluan' => $this->keperluan,
            'keterangan' => $this->keterangan,
            'jenisSurat' => 'Surat Pengantar',
            'aparat_nik' => $aparatRw->nik,
        ]);
    }
    
}
