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
    $cant=count($partidas);
    $i=0;
    while($i<$cant){
        if ($partidas[$i]["jugador"]== ""){
            break;
        }
        $i++;
    }
    //el while cuenta las partidas que se jugaron
    //todo el while de arriba es solo para mostrar la cantidad de partidas disponibles a ver y jugadas

    $logico=true;
    while($partidas[$numero]["jugador"] == "" && $logico ){
        echo "la partida solicitada aun no fue jugada\n";
        echo "por favor ingrese un numero de partida valido o 0 para salir: ";
        $numero=solicitarNumeroEntre(0, $i); //si el numero de partida no fue jugado muestra hastq eu numero de partida si fue jugado
        if($numero == 0){
            $logico=false;
            $numero=$numero+1;
        }
        $numero=$numero-1;
        
    }
    if($logico){
        echo "****************************************************************\n";
        echo "Partida WORDIX ".($numero+1).": palabra ".$partidas[$numero]["palabra wordix"]."\n";
        echo "Jugador: ".$partidas[$numero]["jugador"]."\n";
        echo "Puntaje: ".$partidas[$numero]["puntaje"]." puntos\n";
        if($partidas[$numero]["intentos"] != "no adivino la palabra"){
            echo "Intentos: adivino la palabra en ".$partidas[$numero]["intentos"]." intentos";
        }else{
            echo "Intentos: ".$partidas[$numero]["intentos"];
        }
        echo "\n****************************************************************\n";
    }elseif(!$logico){
        echo "salida";
    }
    
    
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
/**
 * 
 */

//MODULO 9
/**
 * 
 */

//MODULO 10
/**
 * 
 */

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