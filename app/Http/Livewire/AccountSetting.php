<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Aparat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSetting extends Component
{
    public $editProfile = 0;
    public $flashMessage = 0;
    public $email;
    public $name;
    public $nik;
    public $jabatan;
    public $rt;
    public $rw;
    public $noTelp;
    public $alamat;
    public $password;
    public $confirmPassword;

    protected $listeners = [
        'refreshData' => '$refresh'
    ];

    public function render()
    {
        $nik = Auth::user()->nik;
        $user = User::join('aparats', 'aparats.nik', '=', 'users.nik')
                ->where('users.nik', '=', $nik)
                ->select('users.*','aparats.nik','aparats.jabatan','aparats.rt','aparats.rw','aparats.noTelp','aparats.alamat')
                ->first();
    
        return view('livewire.account-setting')->with('user', $user);
    }

    public function showEditProfile($id) {
        $nik = Auth::user()->nik;
        $user = User::join('aparats', 'aparats.nik', '=', 'users.nik')
                ->where('users.nik', '=', $nik)
                ->first();

        $this->email = $user->email;
        $this->name = $user->name;
        $this->nik = $user->nik;
        $this->jabatan = $user->jabatan;
        $this->rt = $user->rt;
        $this->rw = $user->rw;
        $this->noTelp = $user->noTelp;
        $this->alamat = $user->alamat;

        $this->editProfile = 1;
    }

    public function hideEditProfile() {
        $this->editProfile = 0;
    }

    public function removeFlashMessage() {
        $this->emit('removeFlashMessage');
    }

    public function updateData($id) {
        $nik = Auth::user()->nik;

        $user = User::find($id);
       
        $aparat = Aparat::join('users', 'aparats.nik', '=', 'users.nik')
                ->where('users.nik', '=', $nik)
                ->select('aparats.*')
                ->first();
        
        $user->name = $this->name;
        $user->nik = $this->nik;
        $user->save();

        $aparat->nik = $this->nik;
        $aparat->jabatan = $this->jabatan;
        $aparat->noTelp = $this->noTelp;
        $aparat->alamat = $this->alamat;
        $aparat->save();

        $this->editProfile = 0;

        session()->flash('message', 'Data Berhasil di Simpan');
        $this->flashMessage = 1;
        $this->emit('removeFlashMessage');
    }

    public function updatePassword($id) {
        $user = User::find($id);
        if($this->password == $this->confirmPassword && $this->password != '') {
            $user->password = Hash::make($this->password);
            $user->save();
            $this->password = '';
            $this->confirmPassword = '';

            session()->flash('message', 'Data Berhasil di Simpan');
            $this->flashMessage = 1;
            $this->emit('removeFlashMessage'); 
        }
    }
}
