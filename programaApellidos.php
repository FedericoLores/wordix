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
    $rPalabra = leerPalabra5Letras();
    $rPalabra = strtolower($rPalabra);
    return $rPalabra;
}


/** Solicita al usuario el nombre del jugador y retorna el nombre en minuscula
 * @return string
 */
function solicitarJugador (){
    //string $nombreSol
    echo "Ingrese el nombre del jugador";
    $nombreSol = trim(fgets(STDIN));
    while (!ctype_alpha($nombreSol[0])){
        echo "Ingrese un nombre valido";
        $nombreSol = trim(fgets(STDIN));
    }
    $nombreSol = strtolower($nombreSol);
    return $nombreSol;
}

/** Inicializa una estructura de datos con ejemplos de partidas y retorna el arreglo 
* @return array
*/
function cargarPartidas(){
//array $cargPartidas
$cargPartidas[0]=["palabraWordix"=>"QUESO","jugador"=>"jose","intentos"=> 0,"puntaje"=>0];
$cargPartidas[1]=["palabraWordix"=>"CASAS","jugador"=>"pato","intentos"=>3,"puntaje"=>14];
$cargPartidas[2]=["palabraWordix"=>"QUESO","jugador"=>"nico","intentos"=>6,"puntaje"=>10];
$cargPartidas[3]=["palabraWordix"=>"FUEGO","jugador"=>"agus","intentos"=>2,"puntaje"=>8];
$cargPartidas[4]=["palabraWordix"=>"RASGO","jugador"=>"julian","intentos"=>5,"puntaje"=>12];
$cargPartidas[5]=["palabraWordix"=>"NAVES","jugador"=>"javier","intentos"=>4,"puntaje"=>20];
$cargPartidas[6]=["palabraWordix"=>"PISOS","jugador"=>"agus","intentos"=>6,"puntaje"=>7];
$cargPartidas[7]=["palabraWordix"=>"YUYOS","jugador"=>"tomas","intentos"=>2,"puntaje"=>12];
$cargPartidas[8]=["palabraWordix"=>"PISOS","jugador"=>"damian","intentos"=>1,"puntaje"=>22];
$cargPartidas[9]=["palabraWordix"=>"TINTO","jugador"=>"damian","intentos"=>6,"puntaje"=>13];
return $cargPartidas;
}

/** Dada colección de partidas y nombre del jugador, retorna un arreglo con el resumen del jugador 
 * @param array $arregloPartidas
 * @param string $nombreJugador
 * @return array
*/
function resumenJugador () {
    //array $partidaResumen
    //int $arrayCuenta
    $arrayCuenta = count($arregloDePartidas); // reemplazar $arregloDePartidas cuando se haga el arreglo de partidas con el nombre correcto
    $k = 0; /*variable para ir armando el arreglo resumen */
    for ($j = 0; $j < $arrayCuenta; $j++){
        if  /* comprobar si en el $arregloDePartidas[$j] en la clave "jugador" es igual al string $nombrejugador*/ {
            $partidaresumen[$k]=$arregloDePartidas[$j] /*copiara el array pero hacae falta sumar las victorias y los puntajes y en que intento lo resuelve */
            $k = $k +1;
        }
}
return $partidaResumen
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
    /* llama modulo numeroValido */
    $opcionInput = solicitarNumeroEntre(1, 8);
    return $opcionInput;
}
