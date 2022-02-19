<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{

    public function index()
    {
        // $data = [
        //     'title' => 'Welcome to ItSolutionStuff.com',
        //     'date' => date('m/d/Y')
        // ];

        // return view('pages.laporan.laba', $data);
        // $pdf = PDF::loadView('layouts.LaporanTemplate', $data);

        // return $pdf->download('Laporan-inventory.pdf');
        // $this->LaporanInventory();
        $this->LaporanLabaKotor();        
    }

    public function store()
    {
        // 1. update status tabel audit
        // 2. ambil data audit
        // 3. ambil data stockin
        // 4. ambil data penjualan
    }

    public function LaporanInventory()
    {
        $data = [
            'title' => 'Laporan Inventory',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('pages.laporan.inventory', $data);

        return $pdf->download('Laporan-inventory.pdf');
    }

    public function LaporanStockin()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('pages.audit', $data);

        return $pdf->download('Laporan-inventory.pdf');
    }

    public function LaporanPenjualan()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('pages.audit', $data);

        return $pdf->download('Laporan-inventory.pdf');
    }

    public function LaporanLabaKotor()
    {
        $data = [
            'title' => 'Laporan laba rugi',
            'date' => date('m/d/Y')
        ];

        $laba = PDF::loadView('pages.laporan.laba', $data);

        return $laba->download('Laporan-laba.pdf');
    }
}
