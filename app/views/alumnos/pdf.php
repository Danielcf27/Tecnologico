<?php

$html= '
<link href="'. URLROOT .'/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<table class="table table-striped table-sm table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>No de Control</th>
                <th>Nombre</th>
                <th>Fotografia</th>
            </tr>
        </thead>
        <tbody id="alumnos">';
            foreach ($data['alumnos'] as $registro) {
               $html.='<tr>
                    <td>'. $registro->id .'</td>
                    <td>'. $registro->alumno_no_control .'</td>
                    <td>'.$registro->alumno_nombre .'</td>
                    <td><img src="data:image/png;base64,'. base64_encode($registro->alumno_fotografia).'" width="30" alt="Foto"></td>
                </tr>';

             } 
       $html.= '</tbody>
    </table>';

    use Dompdf\Dompdf;
    $pdf = new Dompdf();
    $pdf->loadhtml($html);
    #$pdf->setPaper('');
    #conversion
    $pdf->render();
    #descarga
    $pdf->stream('alumnos.pdf');
