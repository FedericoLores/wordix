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
 * @return string
*/
function ingresarPalabra (){
    echo "Ingrese una palabra de 5 letras";
    $rPalabra = trim(fgets(STDIN));
    return $rPalabra;
}

/** pide al usuario un numero, comprueba si es valido y lo retorna, sino pude uno nuevo
 * @param int $NumeroVal
 * @return int
 * 
*/
function numeroValido ($rangoVal){
    echo "Ingrese un numero";
    $NumeroVal = trim(fgets(STDIN));
    while ($NumeroVal < $rangoVal || $NumeroVal > $rangoVal){
        echo "Ingrese un numero valido: ";
        $NumeroVal = trim(fgets(STDIN));
    }
    return $NumeroVal;

}

/** Solicita al usuario el nombre del jugador y retorna el nombre en minuscula
 * @return string
 */
function solicitarJugador (){
    //string $nombreSol
    echo "Ingrese el nombre del jugador";
    $nombreSol = trim(fgets(STDIN));
    $nombreSol = strtolower($nombreSol);
    return $nombreSol;
}




















































































































































































































function agregarPalabra ($coleccionPalabras, $palabraAgregada){
    $coleccionActualizada = $coleccionPalabras;
    $coleccionActualizada[count($coleccionActualizada)] = $palabraAgregada;
    return $coleccionActualizada;
}


/* ponemos una introduccion-bienvenida?? */
function seleccionarOpcion(){
    //int $opcionInput
    echo "seleccione una opción por favor \n";
    echo " 1) Jugar eligiendo palabra \n 2) Jugar con palabra aleatoria \n 3) Ver partida \n 4) Ver primer partida ganadora \n 5) Ver estadísticas de un jugador \n 6) Ver lista de partidas \n 7) Agregar una palabra \n 8) Salir";
    $opcionInput = trim(fgets(STDIN));
    while ($opcionInput < 0 || $opcionInput > 9){
        echo "Ingrese una opción disponible por favor";
        $opcionInput = trim(fgets(STDIN));
    } 
    return $opcionInput;
}
