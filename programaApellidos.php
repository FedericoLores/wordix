<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS"
        /* Agregar 5 palabras más */
    ];

    return ($coleccionPalabras);
}

/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/

/** pide a usuario una palabra de 5 letras y retorna la palabra 
 * @param string $inpalabra
 * @return string
*/
function ingresarPalabra ($inPalabra){
    //string $rPalabra
    $rPalabra = $inPalabra;
    return $rPalabra;

}

/** pide al usuario un numero, comprueba si es valido y lo retorna, sino pude uno nuevo
 * @param int $esNumeroVal
 * @return int
 * 
*/
function numeroValido ($esNumeroVal){
    //int $rangoVal
    $rangoVal = count(cargarColeccionPalabras());
    while ($esNumeroVal < 0 || $esNumeroVal > $rangoVal){
        echo "Ingrese un numero valido: ";
        $esNumeroVal = trim(fgets(STDIN));
    }
    $numeroSiVal = $esNumeroVal;
    return $esNumeroVal;

}






















































































































































































































function agregarPalabra ($coleccionPalabras, $palabraAgregada){
    $coleccionActualizada = $coleccionPalabras;
    $coleccionActualizada[count($coleccionActualizada)] = $palabraAgregada;
    return $coleccionActualizada;
}
