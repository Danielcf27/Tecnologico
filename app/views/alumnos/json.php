<?php 

header('Content-type:application/json');
header('Content-Dispotition: attachment; filename= alumnos.json');
echo json_encode($data['alumnos']);