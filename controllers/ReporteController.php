<?php 

namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;

Class ReporteController {
    public static function pdf (Router $router){
        $mpdf = new Mpdf ([
            "orientacion" => "L",
            "def=ult_font_size" => 12,
            "default_font" => "arial",
            "format" => "Letter",
            "mode" => 'utf-8',
        ]);

        //$mpdf->format= "Letter";
        $mpdf->SetMargins (30,45,45);
        $html = $router -> load ('reporte/pdf') ;
        $htmlHeader = $router -> load ('reporte/header') ;
        $htmlFooter = $router -> load ('reporte/footer') ;
        $mpdf->SetHTMLHeader($htmlHeader);
        $mpdf->SetHTMLFooter($htmlFooter);
        $mpdf->WriteHTML($html);

        $mpdf -> Output();
    }
};













?>