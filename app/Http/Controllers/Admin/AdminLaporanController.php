<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function laporan()
    {
        $response = Http::get('http://localhost:8080/api/admin/laporan');

        if ($response->successful()) {
            $laporan = $response->json()['data'];
        } else {
            $laporan = [];
        }

        return view('admin.pages.laporan.index', [
            'title' => 'Laporan Masyarakat',
            'laporan' => $laporan,
        ]);
    }

    public function detailLaporan()
    {
        return view('admin.pages.laporan.detail_laporan', [
            'title' => 'Detail Laporan Masyarakat',
        ]);
    }
}
