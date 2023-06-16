<?php


namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Report;
use App\Models\User;
use Livewire\Component;
use DB;
use Carbon\Carbon;
use SheetDB\SheetDB;
use Redirect;

class InputDataWarga extends Component
{
    public $showForm = 0;
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

    protected $listeners = [
        'Show' => '$refresh'
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
        return view('livewire.input-data-warga')->with('r_t_s',$r_t_s)->with('r_w_s',$r_w_s);
    }

    public function removeFlashMessage() {
        $this->emit('removeFlashMessage');
    }

    public function showForm($on) {
        $this->showForm = $on;
        $this->emit('Show');
    }

    public function createData()
    {
        $member = Member::where('nik', $this->nik)->first();

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
            $this->alamat == '') {
                session()->flash('message', 'Isi semua data!');
                $this->flashMessage = 1;
                $this->emit('removeFlashMessage');
        } else {
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
                $this->nik = '';
                $this->nama = '';
                $this->jenisKelamin = '';
                $this->tempat = '';
                $this->tanggal = '';
                $this->agama = '';
                $this->status = '';
                $this->pendidikan = '';
                $this->negara = '';
                $this->pekerjaan = '';
                $this->noKk = '';
                $this->rt = '';
                $this->rw = '';
                $this->alamat = '';
    
                $this->showForm = 0;
    
                session()->flash('message', 'Data berhasil ditambahkan');
                $this->flashMessage = 1;
                $this->emit('removeFlashMessage');
    
                $this->emit('dataCreated');
            } else {
                session()->flash('message', 'Sudah ada data dengan NIK '.$this->nik.'!');
                $this->flashMessage = 1;
                $this->emit('removeFlashMessage');
            }
        }
    } 
}

