<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;

class Aparat extends Component
{
    public $buttonDashboard = 1;
    public $buttonBuatSurat = 0;
    public $buttonDataWarga = 0;
    public $buttonBukuRegister = 0;
    public $buttonProfile = 0;

    public $responsive = 'no responsive';

    protected $listeners = [
        'responsive'
    ];

    public function render()
    {
        $nik = Auth::user()->nik;
        $user = User::join('aparats', 'aparats.nik', '=', 'users.nik')
                ->where('users.nik', '=', $nik)
                ->select('users.name', 'aparats.jabatan', 'aparats.rt', 'aparats.rw')
                ->first();

        
        
        if(is_null($user)) {
            return view('livewire.failed');
        }
                
        return view('livewire.aparat')->with('user', $user);
    }

    public function responsive($value) {
        if(!is_null($value) && $value == 'tablet') {
            $this->responsive = 'tablet';
        } else if(!is_null($value) && $value == 'mobile') {
            $this->responsive = 'mobile';
        } else if(!is_null($value) && $value == 'desktop') {
            $this->responsive = 'no responsive';
        }
    }

    public function showDashboard() {
        $this->buttonDashboard = 1;
        $this->buttonBuatSurat = 0;
        $this->buttonDataWarga = 0;
        $this->buttonBukuRegister = 0;
        $this->buttonProfile = 0;
    }

    public function showBuatSurat() {
        $this->buttonDashboard = 0;
        $this->buttonBuatSurat = 1;
        $this->buttonDataWarga = 0;
        $this->buttonBukuRegister = 0;
        $this->buttonProfile = 0;
    }

    public function showDataWarga() {
        $this->buttonDashboard = 0;
        $this->buttonBuatSurat = 0;
        $this->buttonDataWarga = 1;
        $this->buttonBukuRegister = 0;
        $this->buttonProfile = 0;
    }

    public function showBukuRegister() {
        $this->buttonDashboard = 0;
        $this->buttonBuatSurat = 0;
        $this->buttonDataWarga = 0;
        $this->buttonBukuRegister = 1;
        $this->buttonProfile = 0;
    }

    public function showProfile() {
        $this->buttonDashboard = 0;
        $this->buttonBuatSurat = 0;
        $this->buttonDataWarga = 0;
        $this->buttonBukuRegister = 0;
        $this->buttonProfile = 1;
    }
}
