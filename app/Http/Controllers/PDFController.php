<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Review;
use App\Services\ExportService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use PDF;
use ZipArchive;

class PDFController extends Controller
{
    public function exportPDF(Request $request){
        $pdf = PDF::loadView('pdf.pdf-template', $request->all());
        return $pdf->setPaper('a4')->download('test_pdf.pdf');
    }

    public function exportPDFMultiple(Request $request) {
    	$globalData = $request->all();
    	$files = [];
		foreach ($request->get('revieweeIds') as $revieweeId) {
			$files[] = ExportService::exportReviewee($revieweeId, $globalData);
		}

	    $archiveFileName = "export" . time() . ".zip";
	    $archiveFilePath = public_path("pdf/$archiveFileName");
	    $zip = new ZipArchive();
	    if ($zip->open($archiveFilePath, ZIPARCHIVE::CREATE)) {
	    	foreach ($files as $file) {
			    $zip->addFile($file['filePath'], $file['fileName']);
		    }
		    $zip->close();
	    }
	    return response()->download($archiveFilePath);
    }
}