<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Report;
use DB;

class BukuRegister extends Component
{
    public $confirmDelete = 0;

    public function render()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");

        $nik = Auth::user()->nik;
        $reports = DB::table('reports')
                    ->join('members', 'reports.member_nik', '=', 'members.nik')
                    ->where('reports.aparat_nik', $nik)
                    ->select('reports.*', 'members.nama', 'members.status', 'members.alamat', 'members.tempatLahir', 'members.tanggalLahir')
                    ->get();

        $tanggalLahir = array();

        foreach($reports as $report) {
            $tanggal = Carbon::parse($report->tanggalLahir)->isoFormat('D MMMM Y');
            array_push($tanggalLahir, $tanggal);
        }
        
        return view('livewire.buku-register')->with('reports', $reports)->with('tanggalLahir', $tanggalLahir);
    }

    public function download() {
        $nik = Auth::user()->nik;
        return redirect()->to('download/buku-register/'.$nik);
    }

    public function showConfirmDelete($id) {
        $this->confirmDelete = $id;
    }

    public function deleteData($id) {
        $report = Report::find($id);
        $report->delete();
        $confirmDelete = 0;
    }
}
