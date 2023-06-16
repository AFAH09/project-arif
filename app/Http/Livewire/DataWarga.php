<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use Carbon\Carbon;
use App\Models\Member;
use App\Models\User;
use App\Models\Aparat;
use Illuminate\Support\Facades\Auth;

class DataWarga extends Component
{
    public $confirmDelete = 0;
    public $showEditForm = 0;
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
        'dataCreated' => '$refresh'
    ];

    public function render()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

        $nik = Auth::user()->nik;
        $jabatan = Aparat::where('nik', '=', $nik)->first()->jabatan;
        $members;
        
        if($jabatan == 'RW') {
            $rw = Aparat::where('nik', '=', $nik)->first()->rw;
            $members = DB::table('members')
                    ->where('rw', '=', $rw)
                    ->orderBy('nik', 'ASC')
                    ->get();
        } else if($jabatan == 'RT') {
            $rt = Aparat::where('nik', '=', $nik)->first()->rt;
            $rw = Aparat::where('nik', '=', $nik)->first()->rw;
            $members = DB::table('members')
                    ->where([
                        ['rt', '=', $rt],
                        ['rw', '=', $rw],
                        ])
                    ->orderBy('nik', 'ASC')
                    ->get();
        }
        
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

        $ttl = array();
        $tanggalLahir = array();
        $tempatLahir = array();
        foreach($members as $member) {
            array_push($tanggalLahir, $member->tanggalLahir);
            array_push($tempatLahir, $member->tempatLahir);
        }
        for($i = 0; $i < count($tanggalLahir); $i++) {
            $ttlCarbon = $tempatLahir[$i] . ', ' . Carbon::parse($tanggalLahir[$i])->isoFormat('D MMMM Y');
            array_push($ttl, $ttlCarbon);
        }   
            
        return view('livewire.data-warga')->with('members', $members)
                                            ->with('ttl', $ttl)
                                            ->with('r_t_s', $r_t_s)
                                            ->with('r_w_s', $r_w_s);
    }
    public function showEditForm($id) {
        $member = Member::find($id);
        $this->nik = $member->nik;
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

        $this->showEditForm = $id;
    }

    public function removeFlashMessage() {
        $this->emit('removeFlashMessage');
    }

    public function batalUpdateData() {
        $this->showEditForm = 0;
    }

    public function showConfirmDelete($id) {
        $this->confirmDelete = $id;
    }

    public function updateData($id)
    {
        $member = Member::find($id);
        $member->nik = $this->nik;
        $member->nama = $this->nama;
        $member->jenisKelamin = $this->jenisKelamin;
        $member->tempatLahir = $this->tempat;
        $member->tanggalLahir = $this->tanggal;
        $member->agama = $this->agama;
        $member->status = $this->status;
        $member->pendidikan = $this->pendidikan;
        $member->negara = $this->negara;
        $member->pekerjaan = $this->pekerjaan;
        $member->noKk = $this->noKk;
        $member->rt = $this->rt;
        $member->rw = $this->rw;
        $member->alamat = $this->alamat;
        $member->save();

        $this->showEditForm = 0;
        session()->flash('message', 'Data berhasil diubah');
        $this->flashMessage = 1;
        $this->emit('removeFlashMessage');
    } 
    
    public function deleteData($id) {
        $member = Member::find($id);
        $member->delete();
        session()->flash('message', 'Data telah dihapus');
        $this->flashMessage = 1;
        $this->emit('removeFlashMessage');
        $confirmDelete = 0;
    }
}
