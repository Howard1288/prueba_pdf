<?php

namespace Controllers;

use Mpdf\Mpdf;
use MVC\Router;

class ReporteController
{
    public static function pdf(Router $router)
    {
        $userData = 'Howard Alvarado';
        $grado = 'Capitan';

        $mpdf = new Mpdf([
            "orientation" => "L",
            "default_font_size" => 12,
            "default_font" => "arial",
            "format" => "Letter",
            "mode" => 'utf-8',
        ]);

        $mpdf->SetMargins(30, 45, 15);
        $html = $router->load('reporte/pdf', [
            'userData' => $userData,
            'grado' => $grado,
        ]);

        $htmlHeader = $router->load('reporte/header');
        $htmlFooter = $router->load('reporte/footer');
        $mpdf->SetHTMLHeader($htmlHeader);
        $mpdf->SetHTMLFooter($htmlFooter);

        echo $html;
        exit;

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
