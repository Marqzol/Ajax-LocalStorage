<?php

    /*
     * Archivo PHP que será llamado por nuestra petición de Ajax para tratar
     * con el objeto recibido, codificarlo con hash y el algoritmo de
     * encriptación Blowfish y luego devolverlo en formato JSON.
     */

    /*
     * Establece la cabecera de tipo JSON y con codificación UTF-8.
     * Es opcional y esta línea podría eliminarse, pero es recomendable tenerla.
     */

    header("Content-Type: application/json; charset=UTF-8");
    
    /*
     * Recibimos el FormData desde la variable global $_POST y la pasamos a una
     * variable local (está en formato array). Cabe destacar que aquí $_POST
     * no se refiere a todos los campos del formulario o que contenga el HTML,
     * sino ÚNICAMENTE a los datos enviados por Ajax en el FormData.
     */
    $datos_recibidos = $_POST;

    /*
     * Este paso no es obligatorio: puede trabajarse con el array y sus valores,
     * o bien convertirlo en un objeto y acceder a sus atributos. En este caso
     * se efectuará el parseo a objeto.
     */
    $objeto = (object) $datos_recibidos;

    
    
    /*
     * A continuación, se efectúa la codificación en el propio atributo del objeto,
     * seleccionando como segundo parámetro de la función password_hash el
     * algoritmo de encriptación Blowfish.
     */
    if (!empty(trim($objeto->password_sin_hash))) {
       $objeto->password_sin_hash = password_hash($objeto->password_sin_hash, PASSWORD_BCRYPT); 
    }
    
    /*
     * Finalmente el objeto es codificado a formato JSON y se envía de vuelta
     * al cliente.
     */
    echo json_encode($objeto);
        
?>