<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
class DataExportPending implements FromView
{
    public function view(): View
    {
        $data = DB::table('peserta')->where('status','pending')->get();
        return view('pendaftar.report', compact('data'));
    }
}
