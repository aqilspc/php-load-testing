<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
class DataExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('peserta')->get();
        return view('pendaftar.report', compact('data'));
    }
}
