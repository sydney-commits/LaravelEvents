<?php

namespace App\Http\Controllers;
use App\Jobs\GeneratePdfJob;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        $html = "<h1>Hello, World!</h1>";
        $filename = '23.pdf';
        // $html = $request->input('html');
        // $filename = $request->input('filename');

        GeneratePdfJob::dispatch($html, $filename);

      return redirect('/');
    }


}
