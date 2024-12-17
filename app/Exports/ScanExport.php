<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
use Session;
class ScanExport implements FromView
{
    public function view(): View
    {
    	$id = Session::get('scanId');
        $data = DB::table('scan')->whereIn('id',$id)->get();
        return view('pendaftar.report_scan', compact('data'));
    }
}
