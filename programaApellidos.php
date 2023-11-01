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
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PAPEL", "CINCO", "TECLA", "RUEDA", "PERRO"
    ];

    return ($coleccionPalabras);
}

/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
$partidas = cargarPartidas();


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
$ejemPartidas[0]=["palabraWordix"=>"QUESO","jugador"=>"jose","intentos"=> 0,"puntaje"=>0];
$ejemPartidas[1]=["palabraWordix"=>"CASAS","jugador"=>"pato","intentos"=>3,"puntaje"=>15];
$ejemPartidas[2]=["palabraWordix"=>"QUESO","jugador"=>"nico","intentos"=>6,"puntaje"=>10];
$ejemPartidas[3]=["palabraWordix"=>"FUEGO","jugador"=>"agus","intentos"=>2,"puntaje"=>12];
$ejemPartidas[4]=["palabraWordix"=>"RASGO","jugador"=>"julian","intentos"=>5,"puntaje"=>12];
$ejemPartidas[5]=["palabraWordix"=>"NAVES","jugador"=>"javier","intentos"=>4,"puntaje"=>14];
$ejemPartidas[6]=["palabraWordix"=>"PISOS","jugador"=>"agus","intentos"=>6,"puntaje"=>12];
$ejemPartidas[7]=["palabraWordix"=>"YUYOS","jugador"=>"tomas","intentos"=>2,"puntaje"=>16];
$ejemPartidas[8]=["palabraWordix"=>"PISOS","jugador"=>"damian","intentos"=>1,"puntaje"=>17];
$ejemPartidas[9]=["palabraWordix"=>"TINTO","jugador"=>"damian","intentos"=>6,"puntaje"=>12];
return $ejemPartidas;
}

/** Dada colección de partidas y nombre del jugador, retorna un arreglo con el resumen del jugador 
 * @param array $partidas
 * @param string $nombreJugador
 * @return array
*/
// che que onda esto esta pidiendo una coleccion al pedo????
function resumenJugador ($partidas, $nombreJugador) {
    //int $arrayCuenta
    //boolean $encontrado
    $arrayCuenta = count($partidas);
    $k = 0; /*variable para ir armando el arreglo resumen */
    $encontrado = false;
    while ($k < $arrayCuenta && !$encontrado) {
        if ($partidas[$k]["jugador"]["nombre"] == $nombreJugador){
            $encontrado = true;
            //se resta $k para mantener el valor resultado para mostrar, si encuentran una manera mas eficiente por favor remplazen
            $k -= 1;
        }
        $k += 1;
    }
    //se asume que nunca se va a ejecutar con valores invalidos
    return $partidas[$k]["jugador"];
}

/** Dado un numero de partida muestra en pantalla los datos de esa partida
 * @param int $numeroP
 * @param array $arregloPar
 * @return array
 */
// arreglo de partidas no sabemos si esta permitido como parametro de entrada
function numeroPartida ($arregloPar, $numeroP){
    print_r ($arregloPar[$numeroP]); //ver si se usa print_r
}

/** Dada una colección de partidas y el nombre de un jugador, retorne la primer partida ganada 
 * @param array $partidasG
 * @param string $nombreJugadorGana
 * @return int
 */
function primerGanada ($partidasG, $nombreJugadorGana) {
    // int $m
    // boolean $encontradoGana
    $m = count($partidasG); // limite del array
    $l = 0; 
    $encontradoGana = false;
    while ($l < $m && !$encontradoGana) {
        if (($partidasG[$l]["jugador"] == $nombreJugadorGana) && $partidasG[$l]["puntaje"] > 0){
            $encontradoGana = true;
            $l -= 1;
        }
        $l += 1;
    }
    if ($encontradoGana = false){
        $l = -1;
    }
    return $l;
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
