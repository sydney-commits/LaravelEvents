<?php

namespace App\Jobs;

use Dompdf\Dompdf;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\File;

class GeneratePDFJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $html;
    private $filename;

   
    public function __construct( $html,  $filename)
    {
       // $this->data = $data;
        $this->html = $html;
        $this->filename = $filename;
      
    }


  
   
    public function handle()
    {
        $dompdf = new Dompdf();
        $dompdf->load_html($this->html);
        $dompdf->render();

        $output = $dompdf->output();
        $filename = $this->filename;

        //saves PDF to computer

    

     
         return response()->streamDownload(function () use ($output) {
             echo $output;
         }, $this->filename);

        

        // $headers = [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        // ];
        // return response()->make($output, 200, $headers);

           //--Saves PDF to Disk--//
        // $path = storage_path('app/' .$this->filename);
        // file_put_contents($path, $output);

        
    }
}
