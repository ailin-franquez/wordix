<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* franquez, maria ailin. FAI-4593. tecnicatura en desarrollo web. mail. Usuario Github */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

//MODULO 1 
/** Obtiene una colección de palabras
 * @return array $coleccionPalabras
 */
function cargarColeccionPalabras()
{
    //array $coleccionPalabras
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "LUNAS", "METAS", "SILLA", "POLLO", "TESIS"
    ];
    return ($coleccionPalabras);
}

//MODULO 2
/**crea un array con al menos 10 partidas precargadas 
 * @return array $coleccionPartidas
 */
function cargarPartidas(){
    //array multidimencional $coleccionPartidas
    $coleccionPartidas=[
        ["palabra wordix"=>"QUESO","jugador"=>"majo","intentos"=> 0,"puntaje"=>0 ],
        ["palabra wordix"=>"CASAS","jugador"=>"rudolf","intentos"=> 3,"puntaje"=>14 ],
        ["palabra wordix"=>"QUESO","jugador"=>"pink2000","intentos"=> 6,"puntaje"=>10 ],
        ["palabra wordix"=>"LUNAS","jugador"=>"zakku","intentos"=> 4 ,"puntaje"=> 13 ],
        ["palabra wordix"=>"POLLO","jugador"=>"pink2000","intentos"=> 5 ,"puntaje"=>11 ],
        ["palabra wordix"=>"GOTAS","jugador"=>"majo","intentos"=> 2 ,"puntaje"=>15 ],
        ["palabra wordix"=>"TINTO","jugador"=>"zakku","intentos"=> 1 ,"puntaje"=>17 ],
        ["palabra wordix"=>"GOTAS","jugador"=>"zakku","intentos"=> 3 ,"puntaje"=> 14],
        ["palabra wordix"=>"PIANO","jugador"=>"rudolf","intentos"=> 6 ,"puntaje"=> 10],
        ["palabra wordix"=>"PIANO","jugador"=>"majo","intentos"=> 0 ,"puntaje"=> 0],
        ["palabra wordix"=>"VERDE","jugador"=>"pink2000","intentos"=> 3 ,"puntaje"=>14 ],
    ];
    return $coleccionPartidas;
}

//MODULO 3
/**muestra por pantalla el menu y solucita una opcion valida con ayuda del modulo 5
 * @return int $numeroOpcion
 */

function seleccionarOpcion(){
    //int $numeroOpcion
    echo "**************************************************\n";
    echo "__BIENVENIDO AL MENU__\n";
    echo "1) Jugar al wordix con una palabra elegida \n";
    echo "2) Jugar al wordix con una palabra aleatoria \n";
    echo "3) Mostrar una partida \n";
    echo "4) Mostrar la primer partida ganadora \n";
    echo "5) Mostrar resumen de un jugador \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra \n";
    echo "7) Agregar una palabra de 5 letras a wordix \n";
    echo "8) salir \n";
    echo "**************************************************";
    echo "\nseleccione una opcion: ";
    $numeroOpcion=solicitarNumeroEntre(1,8);
    return $numeroOpcion;
}


//MODULO 4 WORDIX
// leerPalabra5Letras()

//MODULO 5  WORDIX
// solicitarNumeroEntre($min, $max)

// MODULO 6 
/** muestra por pantalla el historial de un numero de partida pedido por el jugador 
 * @param int $numero
 * @param array $partidas
 */
function mostrarPartida($numero, $partidas){
    //verificar numero afuera con el modulo 5
    $numero=$numero-1;
    echo "****************************************************************\n";
    echo "Partida WORDIX ".($numero+1).": palabra ".$partidas[$numero]["palabra wordix"]."\n";
    echo "Jugador: ".$partidas[$numero]["jugador"]."\n";
    echo "Puntaje: ".$partidas[$numero]["puntaje"]." puntos\n";
    if($partidas[$numero]["intentos"] != 0){
        echo "Intentos: adivino la palabra en ".$partidas[$numero]["intentos"]." intentos";
    }else{
        echo "Intentos: no adivino la palabra";
    }
    echo "\n****************************************************************\n"; 
}



//MODULO 7
/**toma como parametro el arreglo de palabras y una palabra, para almacenarla dentro del arreglo y retornar el arreglo
 * @param arrayIndexado $arregloPalabras
 * @param string $palabra
 * @return $arregloPalabras
 */
function agregarPalabra($arregloPalabras,$palabra){
    //arrayString $arregloPalabras
    //string $palabra
    $arregloPalabras[]=$palabra;
    return $arregloPalabras;
}


//MODULO 8
/**busca la primer partida ganada de un jugador en base al nombre y el array de partidas, retorna el indice de la partida o -1 si no gano ninguna
 * @param array $partidas
 * @param string $nombre
 * @return int $indice
 */
/* 
$nombre=solicitarJugador();
$cant=count($partidas);
$logico=true;
do{
    $i=0;
    while($i<$cant && $logico){
        if($partidas[$i]["jugador"]== $nombre){
            $logico=false;
        }
        $i++;
    }
    if($logico){
        echo "el jugador ingresado no existe\n";
        $nombre=solicitarJugador(); //cambiar strtolower por el 10 cuando este listo
    }
}while($logico);
 */
function partidaGanada($partidas, $nombre){

    $cant=count($partidas);
    $logico=true;
    do{
        $i=0;
        while($i<$cant && $logico){
            if($partidas[$i]["jugador"]== $nombre){
                $logico=false;
            }
            $i++;
        }
        if($logico){
            echo "el jugador ingresado no existe\n";
            $nombre=solicitarJugador(); //cambiar strtolower por el 10 cuando este listo
        }
    }while($logico);

    $i=0;
    $cant=count($partidas);
    $logico=true;
    $indice=-1;
    while($i<$cant && $logico){
        if ($partidas[$i]["jugador"]==$nombre){
            if($partidas[$i]["intentos"] != 0){
                $indice=$i;
                
            }elseif($partidas[$i]["intentos"]== 0){
                $indice=-1;
                
            }
            $logico=false;
        }
        $i++;
    }
    return $indice;
}


//MODULO 9
/** cuenta el resumen total de un jugador especifico en base al nombre y retorna los datos como un array asociativo
 * @param array $partidas
 * @param string $jugador
 * @return array $resumenJugador
 */
function resumenJugador($partidas,$jugador){
    $cant=count($partidas);
    $logico=true;
    do{
        $i=0;
        while($i<$cant && $logico){
            if($partidas[$i]["jugador"]== $jugador){
                $logico=false;
            }
            $i++;
        }
        if($logico){
            echo "el jugador ingresado no existe\n";
            $jugador=solicitarJugador(); //cambiar strtolower por el 10 cuando este listo
        }
    }while($logico);

    $cant=count($partidas);
    $cantPartidasJugadas=0;
    $acumPuntos=0;
    $acumVictorias=0;
    $intento1=0;
    $intento2=0;
    $intento3=0;
    $intento4=0;
    $intento5=0;
    $intento6=0;
    for($i=0;$i<$cant;$i++){
        if($partidas[$i]["jugador"]==$jugador){
            $cantPartidasJugadas++;
            $acumPuntos+=$partidas[$i]["puntaje"];

            if($partidas[$i]["intentos"]!=0){
                $acumVictorias++;

                if($partidas[$i]["intentos"]==1){
                    $intento1++;
                }elseif($partidas[$i]["intentos"]==2){
                    $intento2++;
                }elseif($partidas[$i]["intentos"]==3){
                    $intento3++;
                }elseif($partidas[$i]["intentos"]==4){
                    $intento4++;
                }elseif($partidas[$i]["intentos"]==5){
                    $intento5++;
                }elseif($partidas[$i]["intentos"]==6){
                    $intento6++;
                }
            }
        }
    }

    $resumenJugador=[
        "jugador"=> $jugador,
        "partidas"=> $cantPartidasJugadas,
        "puntaje"=> $acumPuntos,
        "victorias"=> $acumVictorias,
        "intento1"=> $intento1,
        "intento2"=> $intento2,
        "intento3"=> $intento3,
        "intento4"=> $intento4,
        "intento5"=> $intento5,
        "intento6"=> $intento6,
    ];
    return $resumenJugador;
}


//MODULO 10
/**pide al usuario que ingrese un nombre de jugador y verifica que comience con una letra obligatoriamente
 * @return string $jugador
 */
function solicitarJugador(){
    echo "ingrese el nombre de jugador (el nombre no puede comenzar con caracteres especiales o numeros):\n";
    $nombre=trim(fgets(STDIN));
    $nombre=strtolower($nombre);
    $caracteres=str_split($nombre);
    $logic=false;
    $jugador="";
    do{
        if(!ctype_alpha($caracteres[0])){
            echo "tipo de caracter no valido\ningrese otro nombre:\n";
            $nombre=trim(fgets(STDIN));
            $nombre=strtolower($nombre);
            $caracteres=str_split($nombre);
            $logic=true;
        }else{
            $logic=false;
        }
    }while($logic);
    $jugador=$nombre;
    return $jugador;
 }

//MODULO 11
/**
 * 
 */






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

?>