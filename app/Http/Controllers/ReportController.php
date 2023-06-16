<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Member;
use App\Models\Report;

class ReportController extends Controller
{
    //
    public function render()
    {
        $reports = DB::table('reports')
                    ->join('members', 'reports.member_nik', '=', 'members.nik')
                    ->select('reports.id','reports.no','reports.noRegisterRw','members.nama','reports.tanggal','reports.keperluan')
                    ->get();

        return view('buku-register')->with('reports', $reports);
    }
}
