<?php

namespace App\Http\Livewire;

use App\Models\RT;
use App\Models\RW;
use Livewire\WithFileUploads;

use Livewire\Component;

class InputDataKelurahan extends Component
{
    use WithFileUploads;

    public $tombolTambahRt = 0;
    public $tombolDeleteRt = 0;
    public $updateFormRt = 0;
    public $noRt;
    public $nikRt;
    public $namaRt;
    public $tandaTanganRt;
    

    protected $listeners = [
        'dataCreated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.input-data-kelurahan')->with('r_t_s', RT::orderBy('nomorRt', 'ASC')->get())->with('r_w_s', RW::orderBy('nomorRw', 'ASC')->get());
    }

    public function showRtForm($on) {
        $this->tombolDeleteRt = 0;
        $this->updateFormRt = 0;

        $this->noRt = '';
        $this->nikRt = '';
        $this->namaRt = '';
        $this->tandaTanganRt = '';
        $this->tombolTambahRt = $on;
    }


    public function showConfirmDeleteRt($id) {
        $this->tombolTambahRt = 0;
        $this->updateFormRt = 0;
        $this->tombolDeleteRt = $id;
    }

    public function showUpdateFormRt($id) {
        $this->tombolTambahRt = 0;
        $this->tombolDeleteRt = 0;

        $rt = RT::find($id);
        $this->noRt = $rt->nomorRt;
        $this->nikRt = $rt->nik;
        $this->namaRt = $rt->nama;
        $this->tandaTanganRt = $rt->tandaTangan;
        $this->updateFormRt = $id;
    }

    public function batalUpdateRt() {
        $this->updateFormRt = 0;
    }

    public function createDataRt() {
        $dataValid = $this->validate([
            'noRt' => 'required',
            'nikRt' => 'required',
            'namaRt' => 'required',
            'tandaTanganRt' => 'required|image|mimes:jpg,jpeg,png|max:5048',
        ]);

        $rt = RT::where('nomorRt', $this->noRt)->first();

        if(!$rt) {
            RT::create([
                'nomorRt' => $this->noRt,
                'nik' => $this->nikRt,
                'nama' => $this->namaRt,
                'tandaTangan' => $this->tandaTanganRt->store('img/tandaTanganRt'),
            ]);
        } else if($rt) {
            $rt->nomorRt = $this->noRt;
            $rt->nik = $this->nikRt;
            $rt->nama = $this->namaRt;
            $rt->tandaTangan = $this->tandaTanganRt->store('img/tandaTanganRt');
            $rt->save();
        }

        
        $this->noRt = '';
        $this->nikRt = '';
        $this->namaRt = '';
        $this->tandaTanganRt = '';
        $this->tombolTambahRt = 0;
        $this->emit('dataCreated');
    }

    public function updateDataRt($id) {
        $rt = RT::find($id);
        $rt->nomorRt = $this->noRt;
        $rt->nik = $this->nikRt;
        $rt->nama = $this->namaRt;
        if($rt->tandaTangan != $this->tandaTanganRt){
            $rt->tandaTangan = $this->tandaTanganRt->store('img/tandaTanganRt');
        }
        $rt->save();

        $this->updateFormRt = 0;
        
    }

    public function deleteDataRt($id) {
        $rt = RT::find($id);
        $rt->delete();
        $this->confirmDelete = 0;
    }

    // RW
    public $tombolTambahRw = 0;
    public $tombolDeleteRw = 0;
    public $updateFormRw = 0;
    public $noRw;
    public $nikRw;
    public $namaRw;
    public $tandaTanganRw;

    public function showRwForm($on) {
        $this->tombolDeleteRw = 0;
        $this->updateFormRw = 0;

        $this->noRw = '';
        $this->nikRw = '';
        $this->namaRw = '';
        $this->tandaTanganRw = '';
        $this->tombolTambahRw = $on;
    }

    public function showConfirmDeleteRw($id) {
        $this->tombolTambahRw = 0;
        $this->updateFormRw = 0;
        $this->tombolDeleteRw = $id;
    }

    public function showUpdateFormRw($id) {
        $this->tombolTambahRw = 0;
        $this->tombolDeleteRw = 0;

        $rw = RW::find($id);
        $this->noRw = $rw->nomorRw;
        $this->nikRw = $rw->nik;
        $this->namaRw = $rw->nama;
        $this->tandaTanganRw = $rw->tandaTangan;
        $this->updateFormRw = $id;
    }

    public function batalUpdateRw() {
        $this->updateFormRw = 0;
    }

    public function createDataRw() {
        $dataValid = $this->validate([
            'noRw' => 'required',
            'nikRw' => 'required',
            'namaRw' => 'required',
            'tandaTanganRw' => 'required|image|mimes:jpg,jpeg,png|max:5048',
        ]);

        $rw = RW::where('nomorRw', $this->noRw)->first();

        if(!$rw) {
            RW::create([
                'nomorRw' => $this->noRw,
                'nik' => $this->nikRw,
                'nama' => $this->namaRw,
                'tandaTangan' => $this->tandaTanganRw->store('img/tandaTanganRw'),
            ]);
        } else if($rw) {
            $rw->nomorRw = $this->noRw;
            $rw->nik = $this->nikRw;
            $rw->nama = $this->namaRw;
            $rw->tandaTangan = $this->tandaTanganRw->store('img/tandaTanganRw');
            $rw->save();
        }

        
        $this->noRw = '';
        $this->nikRw = '';
        $this->namaRw = '';
        $this->tandaTanganRw = '';
        $this->tombolTambahRw = 0;
        $this->emit('dataCreated');
    }

    public function updateDataRw($id) {
        $rw = RW::find($id);
        $rw->nomorRw = $this->noRw;
        $rw->nik = $this->nikRw;
        $rw->nama = $this->namaRw;
        if($rw->tandaTangan != $this->tandaTanganRw){
            $rw->tandaTangan = $this->tandaTanganRw->store('img/tandaTanganRw');
        }
        $rw->save();

        $this->updateFormRw = 0;
    }

    public function deleteDataRw($id) {
        $rw = RW::find($id);
        $rw->delete();
        $this->confirmDelete = 0;
        
    }
}

