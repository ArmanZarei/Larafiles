<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $fileDownloads = DB::table('file_downloads')->select(DB::raw('SUM(download_count) as total_download_count, DATE(date) as download_date'))->groupBy(DB::raw('DATE(date)'))->get();
        $stats = [];
        foreach ($fileDownloads as $fileDownload) {
            $stats[$fileDownload->download_date] = $fileDownload->total_download_count;
        }

        return view('admin.dashboard.index')->with([
            'panel_title'         => 'Admin Dashboard',
            'panel_icon'          => 'fal fa-chart-bar',
            'file_downloads_stat' => $stats
        ]);
    }
}
