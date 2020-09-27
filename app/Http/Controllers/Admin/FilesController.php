<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FileRequest;
use App\Jobs\LoggerTest;
use App\Model\File;
use App\Model\FilesReports;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public function list()
    {
        $files = File::all();
        return view('admin.files.list',compact('files'),[
            'panel_title' => 'Files List',
            'panel_icon' => "fad fa-folders"
        ]);
    }

    public function create()
    {
        return view('admin.files.create',[
            'panel_title' => 'Create File',
            'panel_icon' => "fad fa-file-plus"
        ]);
    }

    public function store(FileRequest $fileRequest)
    {
        $data = [
            'title' => request()->input('title'),
            'description' => request()->input('description'),
            'type' => request()->file('file')->getMimeType(),
            'size' => request()->file('file')->getSize(),
            'name' => str_random(45) . '.' . request()->file('file')->getClientOriginalExtension()
        ];
        $moved_file = request()->file('file')->move(public_path('storage'),$data['name']);
        if ($moved_file instanceof \Symfony\Component\HttpFoundation\File\File){
            $file = File::create($data);
            if ($file instanceof File){
                return redirect()->route('admin.files.list')->with([
                    'success' => true,
                    'message' => 'File (' . $data['title'] . ') Successfully Created.'
                ]);
            }
        }
        return redirect()->route('admin.files.list')->with([
            'error' => true,
            'message' => 'Error While Creating File ! Please try again later.'
        ]);
    }

    public function reports()
    {
        $reports = FilesReports::all();
        return view('admin.files.reports',compact('reports'),[
            'panel_title' => 'Files Reports',
            'panel_icon' => "fal fa-exclamation-triangle"
        ]);
    }

    public function changeReportStatus($report_id, Request $request)
    {
        $report = FilesReports::find(intval($report_id));
        $isStatusValid = in_array($request->input('status'), [
            FilesReports::STATUS_IN_PROGRESS,
            FilesReports::STATUS_SOLVED
        ]);

        if (!$report || !$isStatusValid) {
            return response()->json([
                'success' => false
            ]);
        }

        $report->update([
            'status' => $request->input('status')
        ]);

        return response()->json([
            'success' => true,
            'status' => (int)$report->status
        ]);
    }
}
