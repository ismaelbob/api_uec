<?php
    include_once 'cronograma.php';
    $cronograma = new Cronograma();

    header('Access-Control-Allow-Origin: *');
    $data = json_decode(file_get_contents('php://input'));

    if ($data === null) {
        $respuesta = [
            'estado'=> 'no hay datos',
        ];
    } else {
        $idsemana = $data -> idsemana;
        $idmes = $data -> idmes;
        $idgrupo = $data -> idgrupo;
        $domingo = $data -> domingo;
        $martes = $data -> martes;
        $jueves = $data -> jueves;

        //$resultado = $cronograma -> setTurnoSemana($idsemana, $idmes, $idgrupo, $domingo, $martes, $jueves);
        
        if ($resultado) {
            $respuesta = [
                'estado' => 'correcto',
                'id' => $idsemana,
            ];
        } else {
            $respuesta = [
                'estado' => 'error',
                'id' => $idsemana,
            ];
        }
    }
?>