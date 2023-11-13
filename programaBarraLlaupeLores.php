<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Integrantes del grupo:
/* Barra, Santiago. - Legajo 5007 - mail: santiago.barra@est.fi.uncoma.edu.ar- github: Efimero2004
/* Llaupe, Gaston. - Legajo 4983 - mail: gaston.llaupe@est.fi.uncoma.edu.ar - github: gastonllaupe
/* Lores, Federico. - Legajo: 2948 - mail: federico.lores@est.fi.uncoma.edu.ar - github: FedericoLores



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/** Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras(){
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PAPEL", "CINCO", "TECLA", "RUEDA", "PERRO"
    ];

    return ($coleccionPalabras);
}




/** Solicita al usuario el nombre del jugador y retorna el nombre en minuscula
 * @return string
 */
function solicitarJugador (){
    //string $nombreSol
    $nombreSol = trim(fgets(STDIN));
    $valido = false;
    while (!$valido){
        //condicional anidado para evitar revisar posicion inexistente
        if(strlen($nombreSol)<1){
            echo "Ingrese un nombre valido (minimo 1 caracter)\n";
            $nombreSol = trim(fgets(STDIN));
        }elseif(!(ctype_alpha($nombreSol[0]))){
            echo "Ingrese un nombre valido (debe comenzar con una letra)\n";
            $nombreSol = trim(fgets(STDIN));
        }else{
            $valido = true;
        }
    }
    $nombreSol = strtolower($nombreSol);
    return $nombreSol;
}

/** Comprueba si el usuario ha jugado una partida antes
 * @param string $nombreJug
 * @param array $arregloPartidas
 * @return boolean
 */
function jugadorExiste($nombreJug, $arregloPartidas){
    //boolean $existe
    $m = count($arregloPartidas); // limite del array
    $i = 0; //contador
    $existe = false;
    while ($i < $m && !$existe) {
        if ($arregloPartidas[$i]["jugador"] == $nombreJug){
            $existe = true;
        }
        $i += 1;
    }
    return $existe;
}


/** inicializa una estructura de datos con ejemplos de partidas y retorna el arreglo
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
 * @param array $arregloPartidas
 * @param int $numeroP
 */
function mostrarPartida ($arregloPartidas, $numeroP){
    echo "********************************** \nPartida WORDIX" ,$numeroP ,
    ": palabra " ,
    $arregloPartidas[$numeroP]["palabraWordix"] ,
    "\nJugador: " ,
    $arregloPartidas[$numeroP]["jugador"] ,
    "\nPuntaje: " ,
    $arregloPartidas[$numeroP]["puntaje"] ,
    " puntos \n";
    if ($arregloPartidas[$numeroP]["intentos"] == 0){
        echo "Intento: No adivinó la palabra \n**********************************";
    } else {
        echo "Intento: Adivino la palabra en ",$arregloPartidas[$numeroP]["intentos"] , " intentos \n**********************************\n";
    }
    
}



/** Dada una colección de partidas y el nombre de un jugador, retorne la primer partida ganada 
 * @param array $arregloPartidas
 * @param string $nombreJugador
 * @return int
 */
function primerGanada ($arrregloPartidas, $nombreJugador) {
    // int $m
    // boolean $encontradoGana
    $m = count($arrregloPartidas); // limite del array
    $i = 0; //contador
    $encontradoGana = false;
    $posicionGanada = -1;
    while ($i < $m && !$encontradoGana) {
        if (($arrregloPartidas[$i]["jugador"] == $nombreJugador) && $arrregloPartidas[$i]["puntaje"] > 0){
            $encontradoGana = true;
            $posicionGanada = $i;
        }
        $i += 1;
    }
    return $posicionGanada;
}




/** recibe coleccion partidas, jugador, y palabra, devuelve numero de partida si encontro, o -1 si no la uso
 * @param array $arregloPartidas
 * @param string $nombreJugador, $palabra
 * @return int
 */
function palabraJugada ($arregloPartidas, $nombreJugador, $palabra){
    $i = 0;
    $palabJugada = -1;
    $encontrada = false;
    while ($i < count($arregloPartidas) && !$encontrada){
        if($arregloPartidas[$i]["jugador"] == $nombreJugador && $arregloPartidas[$i]["palabraWordix"] == $palabra){
            $encontrada = true;
            $palabJugada = $i;
        }
        $i += 1;
    }

    return $palabJugada;
}




/** recibe arreglo partidas y nombre, y hace recorrido exhaustivo para crear arreglo jugador
 *@param array $arregloPartidsa
 *@param string $nombre
 *@return array
 */
function resumenJugador($arregloPartidas, $nombre){
    //variables que se le van a sumar al arreglo de $resumenJugador
    //int $puntaje, $victorias, $partidas, $intento1, $intento2, $intento3, $intento4, $intento5, $intento6
    $puntaje = 0;
    $victorias = 0;
    $partidas = 0;
    $intento1 = 0;
    $intento2 = 0;
    $intento3 = 0;
    $intento4 = 0;
    $intento5 = 0;
    $intento6 = 0;

    foreach ($arregloPartidas as $elemento) {
        if (($elemento["jugador"]) == $nombre) {
            $puntaje += $elemento["puntaje"];
            $partidas += 1;
            if ($puntaje > 0) {
                $victorias += 1;
            }
            //carga del intento de esta partida en el array 
            switch ($elemento["intentos"]) {
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
    $arregloResumen = ["nombre" => $nombre, "partidas" => $partidas, "puntaje" => $puntaje, "victorias" => $victorias, "intento 1" => $intento1, "intento 2" => $intento2, "intento 3" => $intento3, "intento 4" => $intento4, "intento 5" => $intento5, "intento 6" => $intento6];
    return ($arregloResumen);
}



/** recibe arreglo de jugador y lo muestra por pantalla
 * @param array $arregloJugador
 */
function imprimirResumen($arregloJugador) {
    echo "**********************************\n";
    echo (" RESUMEN DEL JUGADOR: ".$arregloJugador["nombre"]."\n");
    echo (" Partidas: ".$arregloJugador["partidas"]."\n");
    echo (" Puntaje: ".$arregloJugador["puntaje"]."\n");
    echo (" Victorias: ".$arregloJugador["victorias"]."\n");
    echo (" Intento1:  ".$arregloJugador["intento 1"]."\n");
    echo (" Intento2:  ".$arregloJugador["intento 2"]."\n");
    echo (" Intento3:  ".$arregloJugador["intento 3"]."\n");
    echo (" Intento4:  ".$arregloJugador["intento 4"]."\n");
    echo (" Intento5:  ".$arregloJugador["intento 5"]."\n");
    echo (" Intento6:  ".$arregloJugador["intento 6"]."\n");
    echo "**********************************\n";
}



/** recibe arreglo palabras y string, agrega string al arreglo
 * @param array $coleccionPalabras
 * @param string $palabraAgregada
 * @return array
 */
function agregarPalabra ($coleccionPalabras, $palabraAgregada){
    $coleccionActualizada = $coleccionPalabras;
    $coleccionActualizada[count($coleccionActualizada)] = $palabraAgregada;
    return $coleccionActualizada;
}

/** recibe arreglo palabras y palabra, devuelve si la palabra ya existe adentro
 * @param array $coleccionPalabras
 * @param string $palabra
 * @return boolean
 */
function revisarPalabra($coleccionPalabras, $palabra){
    $i = 0;
    $encontrada = false;
    while($i<count($coleccionPalabras) && !$encontrada){
        $encontrada = ($coleccionPalabras[$i] == $palabra);
        $i += 1;
    }
    return $encontrada;
}


/** muestra menu de opciones por pantalla
 * @return int
 */
function seleccionarOpcion(){
    //int $opcionInput
    //multiple echo para legibilidad
    echo "seleccione una opción por favor \n";
    echo " 1) Jugar eligiendo palabra \n 2) Jugar con palabra aleatoria \n";
    echo " 3) Ver partida \n 4) Ver primer partida ganadora \n"; 
    echo " 5) Ver estadísticas de un jugador \n 6) Ver lista de partidas \n"; 
    echo " 7) Agregar una palabra \n 8) Salir\n";
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
        do{
            // no comparamos igualdad porque un jugador no puede tener 2 veces la misma palabra
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
            $orden = 1;
        } else {
            $limit = count($b);
            $orden = -1;
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
 * @param array $arregloPartidas
 */
function mostrarPartidasAbc($arregloPartidas){
    //array $partidasAbc
    $partidasAbc = $arregloPartidas;
    uasort($partidasAbc, 'comparacion');
    print_r($partidasAbc);
}


/** recibe partidas, palabras, y nombre, revisa si jugador tiene palabras disponibles, escribe si no quedan disponibles y devuelve bandera
 * @param array $arregloPartidas, $arregloPalabras
 * @param string $nombre
 * @return boolean
 */
function palabraDisponible($arregloPartidas, $arregloPalabras, $nombre){
    $palabrasUsadas = 0;
    foreach ($arregloPartidas as $partida){
        if($partida["jugador"] == $nombre){
            $palabrasUsadas += 1;
        }
    }
    $palabraDisponible = $palabrasUsadas < count($arregloPalabras);
    if(!($palabraDisponible)){
        echo "Ya jugó con todas las palabras disponibles\n";
    }
    return $palabraDisponible;
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
//array $partidas, $palabras, $jugador


//Inicialización de variables:
$partidas = cargarPartidas();
$palabras = cargarColeccionPalabras();
$jugador = [];

//Proceso:

do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: //jugar con palabra elegida
            echo "Ingrese su nombre: ";
            $nombre = solicitarJugador();
            //revisa que el jugador tenga palabras disponibles
            if (palabraDisponible($partidas, $palabras, $nombre)){
                echo "Ingrese el numero de una palabra para jugar\n";
                $numPal = solicitarNumeroEntre(0, (count($palabras) -1) );
                while (!(palabraJugada($partidas, $nombre, $palabras[$numPal]) == -1)){
                    echo "ya utilizo esa palabra, por favor ingrese el numero de otra palabra\n";
                    $numPal = solicitarNumeroEntre(0, (count($palabras) -1) );
                }
                $partidas[count($partidas)] = jugarWordix($palabras[$numPal], $nombre);
            }
            break;

        case 2: //jugar con palabra aleatoria
            echo "Ingrese su nombre: ";
            $nombre = solicitarJugador();
            //revisa que el jugador tenga palabras disponibles
            if (palabraDisponible($partidas, $palabras, $nombre)){
                do {
                    $numPal = rand(0, (count($palabras) -1) );
                } while (palabraJugada($partidas, $nombre, $palabras[$numPal]) != -1);
                $partidas[count($partidas)] = jugarWordix($palabras[$numPal], $nombre);
            }
            break;

        case 3: //mostar partida elegida
            $numMax = count($partidas) - 1;
            $numMin = 0;
            echo "Ingrese un numero de partida: ";
            $numPar = solicitarNumeroEntre($numMin, $numMax);
            mostrarPartida($partidas, $numPar);
            break;
        
        case 4: //mostar primer partida ganadora
            echo "Ingrese el nombre del jugador que desea ver\n";
            $nombre = solicitarJugador();
            if (jugadorExiste($nombre,$partidas)){
                $partida = primerGanada($partidas, $nombre);  
                if (!($partida == -1)){
                    mostrarPartida($partidas, $partida);
                }else {
                    echo $nombre , " no ha ganado ninguna partida\n";
                }
            }else {
                echo $nombre , " no ha jugado ninguna partida\n";
            }
            break;
        case 5: //mostrar estadisticas jugador
             echo ("ingrese nombre del jugador a ver: ");
             $nombre= solicitarJugador();
             if (jugadorExiste($nombre, $partidas)){ 
                $jugador = resumenJugador($partidas, $nombre);
                imprimirResumen($jugador);
             } else {
                echo $nombre , " no ha jugado ninguna partida \n";
             }
            break;

        case 6: //mostrar partidas por jugador y palabra
            mostrarPartidasAbc($partidas);
            break;

        case 7: //agregar palabra
            $palabraIn = leerPalabra5Letras();
            while (revisarPalabra($palabras,$palabraIn)){
                echo "La palabra ingresada ya existe\n";
                $palabraIn = leerPalabra5Letras();
            }
            $palabras = agregarPalabra($palabras, $palabraIn);
            break;
    }
//salir
} while ($opcion != 8);

echo "Adios!";


?>