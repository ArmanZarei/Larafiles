<?php

namespace App\Http\Controllers\Frontend;

use App\Model\File;
use App\Model\FilesReports;
use App\Model\User;
use App\Utility\File as FileUtility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function details($file_id)
    {
        $file = File::find($file_id);
        $current_user_id = Auth::check() ? Auth::user()->id : null;
        if ($file && $file instanceof File) {
            return view('front.files.index', compact('file', 'current_user_id'));
        }

        return redirect()->route('front.home');
    }

    public function download($file_id)
    {
        $file = File::find($file_id);
        $user = User::find(Auth::user()->id);
        if (!$file || !FileUtility::can_user_download($user)) {
            return redirect()->back();
        }
        $file_path = public_path('storage\\') . $file->name;
        $user->getCurrentSubscribe()->increment('download_count');
        $file->increment('download_count');
        $file->updateDownloadCount();
        return response()->download($file_path);
    }

    public function report($file_id, Request $request)
    {
        if ($file_id &&
            intval($file_id) > 0 &&
            $file = File::find($file_id)
        ) {
            $report = FilesReports::create([
                'file_id' => $file_id,
                'description' => $request->input('description')
            ]);

            if ($report && $report instanceof FilesReports) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your Report was successfully sent. you can track it with ID : ' . $report->id,
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Reporting the file was unsuccessful.',
        ]);
    }
}
