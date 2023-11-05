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
//array $partidas, $palabras


//Inicialización de variables:
$partidas = cargarPartidas();
$palabras = cargarColeccionPalabras();

//Proceso:

// $partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: 
            echo "Ingrese su nombre";
             $nombre = solicitarJugador();
            echo "Ingrese el numero de una palabra para jugar";
            $numPal = solicitarNumeroEntre(0, (count($palabras) -1) );
            while (palabraJugada($partidas, $nombre, $palabras[$numPal]) <> -1){
                echo "ya utilizo esa palabra, por favor ingrese el numero de otra palabra";
                $numPal = solicitarNumeroEntre(0, (count($palabras) -1) );
            }
            $partidas[count($partidas)] = jugarWordix($palabras[$numPal], $nombre);
            break;

        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            $numMax = count($partidas) - 1;
            $numMin = 0;
            echo "Ingrese un numero de partida";
            $numPar = solicitarNumeroEntre($numMin, $numMax) -1;
            numeroPartida($partidas, $numPar);
            break;
        
        case 4:
            echo "Ingrese el nombre del jugador que desea ver";
            $nombre = solicitarJugador();
            $partidaB = primerGanada($partidas, $nombre);
            
            if (!($partidaB == -1)){
                numeroPartida($partidas, $partidaB);
            }else {
                echo "Este jugador no ha ganado ninguna partida";
            }
            break;
        case 5: 
             echo ("ingrese nombre del jugador a ver");
             $nombre= solicitarJugador();
             $posicion = tieneResumen($jugadores, $nombre);
             if ($posicion <> -1){
                $jugadores[$posicion] = resumenJugador($partida, $nombre);
                imprimirResumen($jugadores, $posicion);
             } else {
                $jugadores[count($jugadores)] = resumenJugador($partida, $nombre);
                imprimirResumen($jugadores, (count($jugadores) -1));
             }
            break;

        case 6:
            mostrarPartidasAbc($partidas);
            break;

        case 7:
            $palabraIN = leerPalabra5Letras();
            $partidas = agregarPalabra($partidas, $palabraIN);
            break;
    }
} while ($opcion != 8);
*/

/** pide a usuario una palabra de 5 letras y retorna la palabra 
 * @return string
*/
function ingresarPalabra (){
    $rPalabra = strtolower(leerPalabra5Letras());
    return $rPalabra;
}


/** Solicita al usuario el nombre del jugador y retorna el nombre en minuscula
 * @return string
 */
function solicitarJugador (){
    //string $nombreSol
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


/** Dado un numero de partida muestra en pantalla los datos de esa partida
 * @param int $numeroP
 * @param array $arregloPar
 * @return array
 */
// arreglo de partidas no sabemos si esta permitido como parametro de entrada
function numeroPartida ($arregloPar, $numeroP){
    echo "********************************** \nPartida WORDIX" ,$numeroP ,
    ": palabra " ,
    $arregloPar[$numeroP]["palabraWordix"] ,
    "\nJugador: " ,
    $arregloPar[$numeroP]["jugador"] ,
    "\nPuntaje: " ,
    $arregloPar[$numeroP]["puntaje"] ,
    " puntos \nIntento: Adivino la palabra en " ,
    $arregloPar[$numeroP]["intentos"] ,
    " intentos \n**********************************";
}

/** Dada una colección de partidas y el nombre de un jugador, retorne la primer partida ganada 
 * @param array $partidasT
 * @param string $nombreJugadorGana
 * @return int
 */
function primerGanada ($partidasT, $nombreJugadorGana) {
    // int $m
    // boolean $encontradoGana
    $m = count($partidasT); // limite del array
    $l = 0; //contador
    $encontradoGana = false;
    //remplazar logica con llamado a palabraJugada
    while ($l < $m && !$encontradoGana) {
        if (($partidasT[$l]["jugador"] == $nombreJugadorGana) && $partidasT[$l]["puntaje"] > 0){
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

/** recibe coleccion partidas, jugador, y palabra, devuelve numero de partida si encontro, o -1 si no la uso
 * @param array $arreglo
 * @param string $jugador, $palabra
 * @return int
*/
function palabraJugada ($arreglo, $jugador, $palabra){
    $i = 0;
    $palabJugada = -1;
    $encontrada = false;
    while ($i < count($arreglo) && !$encontrada){
        if($arreglo[$i]["jugador"] = $jugador && $arreglo[$i]["palabraWordix"] = $palabra){
            $encontrada = true;
            $palabJugada = $i;
        }
        $i += 1;
    }

    return $palabJugada;
}


/** recibe coleccion partidas y jugador, devuelve numero de resumen si encontro, o -1 si no tiene
 * @param array $arreglo
 * @param string $jugador
 * @return int
*/
//revisar si se puede combinar logica con palabraJugada
function tieneResumen ($arreglo, $jugador){
    $i = 0;
    $resumen= -1;
    $encontrado = false;
    while ($i < count($arreglo) && !$encontrado){
        if($arreglo[$i]["jugador"] = $jugador){
            $encontrado = true;
            $resumen = $i;
        }
        $i += 1;
    }
    return $resumen;
}








































































































/** 
 *por cada jugador de la partida le saco los datos y veo si es igual a otro asi le sumo los puntos de 
 *ambas partidas del mismo jugador
 *primero con la variable intentoJ 
 *@param array $partidas
 *@param string $nombre
 *@return array
 */
function resumenJugador($partidas, $nombre){
    //variables que se le van a sumar al arreglo de $resumenJugador
    $puntajeJ = 0;
    $victoriasJ = 0;
    $partidasJ = 0;
    $intento1 = 0;
    $intento2 = 0;
    $intento3 = 0;
    $intento4 = 0;
    $intento5 = 0;
    $intento6 = 0;

    foreach ($partidas as $i) {

        if (($partidas[$i]["jugador"]) == $nombre) {
            $puntajeJ += $partidas[$i]["puntaje"];
            $partidasJ += 1;
            if ($puntajeJ > 0) {
                $victoriasJ += 1;
            }
            
            //carga del intento de esta partida en el array 
            switch ($partidas[$i]["intentos"]) {
                case 1:
                    $intento1 += 1;
                    break;
                case 2:
                    $intento2 += 1;
                    break;
                case 3:
                    $intento3 += 1;
                    break;
                case 4:
                    $intento4 += 1;
                    break;
                case 5:
                    $intento5 += 1;
                    break;
                case 6:
                    $intento6 += 1;
                    break;
            }
        }
    }
    $arregloResumen = ["nombre" => $nombre, "partidas" => $partidasJ, "puntaje" => $puntajeJ, "victorias" => $victoriasJ, "intento 1" => $intento1, "intento 2" => $intento2, "intento 3" => $intento3, "intento 4" => $intento4, "intento 5" => $intento5, "intento 6" => $intento6];
    return ($arregloResumen);
}




/**
* imprime la informacion en el array $partida 
* del usuario con el nombre pedido anteriormente en ResumenDeJugador();
* @param string $nombreJ
* @param array $partidas 
*/
function imprimirResumen($arregloJugadores,$posicion) {
        echo (" nombre: ".$arregloJugadores[$posicion]["nombre"]);
        echo (" partidas: ".$arregloJugadores[$posicion]["partidas"]);
        echo (" puntaje: ".$arregloJugadores[$posicion]["puntaje"]);
        echo (" victorias: ".$arregloJugadores[$posicion]["victorias"]);
        echo ("|intento1:  ".$arregloJugadores[$posicion]["intento1"]);
        echo ("|intento2:  ".$arregloJugadores[$posicion]["intento2"]);
        echo ("|intento3:  ".$arregloJugadores[$posicion]["intento3"]);
        echo ("|intento4:  ".$arregloJugadores[$posicion]["intento4"]);
        echo ("|intento5:  ".$arregloJugadores[$posicion]["intento5"]);
        echo ("|intento6:  ".$arregloJugadores[$$posicion]["intento6"]);
}






























































































/**
 * @param array $coleccionPalabras
 * @param string $palabraAgregada
 * @return array
 */
function agregarPalabra ($coleccionPalabras, $palabraAgregada){
    $coleccionActualizada = $coleccionPalabras;
    $coleccionActualizada[count($coleccionActualizada)] = $palabraAgregada;
    return $coleccionActualizada;
}


/** ponemos una introduccion-bienvenida??
 * @return int
 */
function seleccionarOpcion(){
    //int $opcionInput
    echo "seleccione una opción por favor \n";
    echo " 1) Jugar eligiendo palabra \n 2) Jugar con palabra aleatoria \n 3) Ver partida \n 4) Ver primer partida ganadora \n 5) Ver estadísticas de un jugador \n 6) Ver lista de partidas \n 7) Agregar una palabra \n 8) Salir";
    /* llama modulo numeroValido */
    $opcionInput = solicitarNumeroEntre(1, 8);
    return $opcionInput;
}

/** compara para uasort
 * @param array $a, $b
 * @return int
 */
function comparacion($a, $b){
    //boolean $dif
    //int $i, $limit
    $dif = false;
    $i = 0;
    if ($a["jugador"] == $b["jugador"]){
        // no comparamos igualdad porque un jugador no puede tener 2 veces la misma palabra
        do{
            if ((ord($a["palabraWordix"][$i]) < ord($b["palabraWordix"][$i]))){
                $dif = true;
                $orden = -1;
            } elseif ((ord($a["palabraWordix"][$i]) > ord($b["palabraWordix"][$i]))){
                $dif = true;
                $orden = 1;
            }
            $i += 1;       
        } while ($i<5 && !$dif);
    } else{
        //define limite de while
        //devuelve orden correcto si son nombres iguales de diferente largo
        if (count($a) < count($b) ){
            $limit = count($a);
            $orden = -1;
        } else {
            $limit = count($b);
            $orden = 1;
        }
        while ($i<$limit && !$dif) {
            if ((ord($a["jugador"][$i]) < ord($b["jugador"][$i]))){
                $dif = true;
                $orden = -1;
            } elseif ((ord($a["jugador"][$i]) > ord($b["jugador"][$i]))){
                $dif = true;
                $orden = 1;
            }
            $i += 1;
        } 
    }
    return$orden;
}


/** recibe arreglo partidas y las muestra en orden alfabetico por jugador y palabra sin modificar arreglo original
 * @param array $arreglo
 */
function mostrarPartidasAbc($arreglo){
    //array $partidasAbc
    $partidasAbc = $arreglo;
    uasort($partidasAbc, 'comparacion');
    print_r($partidasAbc);
}