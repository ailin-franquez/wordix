<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Franquez, Maria Ailin. 
FAI-4593. 
tecnicatura en desarrollo web. 
mail: maria.franquez@est.fi.uncoma.edu.ar 
Usuario Github: ailin-franquez */



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
        ["palabrawordix"=>"QUESO","jugador"=>"majo","intentos"=> 0,"puntaje"=>0 ],
        ["palabrawordix"=>"CASAS","jugador"=>"rudolf","intentos"=> 3,"puntaje"=>14 ],
        ["palabrawordix"=>"QUESO","jugador"=>"pink2000","intentos"=> 6,"puntaje"=>10 ],
        ["palabrawordix"=>"LUNAS","jugador"=>"zakku","intentos"=> 4 ,"puntaje"=> 13 ],
        ["palabrawordix"=>"POLLO","jugador"=>"pink2000","intentos"=> 5 ,"puntaje"=>11 ],
        ["palabrawordix"=>"GOTAS","jugador"=>"majo","intentos"=> 2 ,"puntaje"=>15 ],
        ["palabrawordix"=>"TINTO","jugador"=>"zakku","intentos"=> 1 ,"puntaje"=>17 ],
        ["palabrawordix"=>"GOTAS","jugador"=>"zakku","intentos"=> 3 ,"puntaje"=> 14],
        ["palabrawordix"=>"PIANO","jugador"=>"rudolf","intentos"=> 6 ,"puntaje"=> 10],
        ["palabrawordix"=>"PIANO","jugador"=>"majo","intentos"=> 0 ,"puntaje"=> 0],
        ["palabrawordix"=>"VERDE","jugador"=>"pink2000","intentos"=> 3 ,"puntaje"=>14 ],
    ];
    return $coleccionPartidas;
}

//MODULO 3
/**muestra por pantalla el menu y solucita una opcion valida con ayuda del modulo 5
 * @return int $numeroOpcion
 */

function seleccionarOpcion(){
    //int $numeroOpcion
    echo "\n**************************************************\n";
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
/** pide al usuario una palabra de 5 letras y verifica que sea correcto
 * @return string $palabra
 */
//function leerPalabra5Letras()

//MODULO 5  WORDIX
/**solicita al usuario un numero y verifica que sea correcto, retorna el numero entre el minimo y el maximo
 * @param int $min
 * @param int $max
 * @return int $numero
 */
//function solicitarNumeroEntre($min, $max)

// MODULO 6 
/** muestra por pantalla el historial de un numero de partida pedido por el jugador 
 * @param int $numero
 * @param array $partidas
 */
function mostrarPartida($numero, $partidas){
    //array $partidas
    //int $numero
    echo "****************************************************************\n";
    echo "Partida WORDIX ".($numero+1).": palabra ".$partidas[$numero]["palabrawordix"]."\n";
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
function partidaGanada($partidas, $nombre){
    //int $cant, $i, $indice
    //string $nombre
    //array $partidas
    //boolean $logico
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
    //array $partidas, $resumenJugador
    //string $nombre
    //boolean $logico
    /*int $cant, $i, $cantPartidasJugadas, $acumPuntos, $acumVictorias, $intento1, $intento2, $intento3, $intento4
    $intento4, $intento5, $intento6 */
    
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
            $jugador=solicitarJugador(); 
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
    //string $nombre, $jugador
    //int
    //boolean $logic
    //array $caracteres
    echo "ingrese el nombre de jugador (el nombre no puede comenzar con caracteres especiales o numeros):\n";
    $nombre=trim(fgets(STDIN));
    $nombre=strtolower($nombre);
    $caracteres=str_split($nombre); //convierte una variable string en un array
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



/**funcion que ayuda a ordenar con uasort del modulo 11 (el profe dijo que la ponga afuera)
 * @param $a
 * @param $b
 * @return int $orden
 */
function ccc($a,$b){
    // $a, $b
    //int $orden
    if($a["jugador"]==$b["jugador"]){
        if($a["palabraWordix"]==$b["palabraWordix"]){
            $orden=0;
        }elseif($a["palabraWordix"]<$b["palabraWordix"]){
            $orden=-1;
        }else{
            $orden=1;
        }
    }elseif($a["jugador"]<$b["jugador"]){
        $orden=-1;
    }else{
        $orden=1;
    }
    return $orden;
}

//MODULO 11
/**ordena con uasort un array de partidas en base al nombre del jugador y las palabras
 * @param array $partidas
 */
function ordenarPartidas($partidas){
    //array $partidas
    
    uasort($partidas,'ccc');
    print_r($partidas);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);

//Declaración de variables:

//string $jugador, $palabra, $palabraNueva
//boolean $logico
//array $partidas, $arrayPartidas, $partidaNueva, $estadisticas
//int $opcion, $cantidadPalabras, $numero, $cantPartidas, $i, $numRandom, $num, $indicePartida, $cant


//Inicialización de variables:

$partidas=cargarPartidas();//modulo 2
$arrayPalabras=cargarColeccionPalabras();//modulo 1

//Proceso:

do {
    $opcion =seleccionarOpcion();//modulo 3 (dentro se usa el modulo 5)

    switch ($opcion) {
        case 1: 
            $jugador=solicitarJugador();//modulo 10
            $cantidadPalabras=count($arrayPalabras); //cuenta la cantidad de palabras de la coleccion
            echo "ingrese un numero del 1 al ".$cantidadPalabras." para elegir una palabra para jugar: ";
            $numero = solicitarNumeroEntre(1, $cantidadPalabras);//modulo 5
            $numero=$numero-1; //para tener el indice
            
            $palabra=$arrayPalabras[$numero]; //extraer palabra de la coleccion para verificar
            $cantPartidas=count($partidas);

            do{       
                $i=0;
                $logico=false;//por si no encuetra errores deja de iterar
                while($i<$cantPartidas){
                    if($jugador == $partidas[$i]["jugador"]){
                        if($palabra == $partidas[$i]["palabraWordix"]){
                            echo "la palabra elegida ya fue jugada\n";
                            echo "ingrese otro numero de palabra: ";
                            $numero=solicitarNumeroEntre(1, $cantidadPalabras);
                            $numero=$numero-1; 
                            $palabra=$arrayPalabras[$numero];  
                            $logico=true;//para que itere el do while para verificar otra vez
                        }
                    }
                    $i++;
                }
            }while($logico);

            $partidaNueva=jugarWordix($palabra, $jugador);//modulo de wordix
            $partidas[]=$partidaNueva; //almacenar partida nueva en el arreglo de partidas
            break;
        case 2: 
            $cantPartidas=count($partidas);
            $jugador=solicitarJugador(); //modulo 10
            $numRandom=rand(0,count($arrayPalabras));//rand sirve para sacar un numro aletorio, param: $min,$max. return $num
            $palabra=$arrayPalabras[$numRandom];
            do{
                $i=0;
                $logico=false;
                while($i<$cantPartidas){
                    if($partidas[$i]["jugador"]==$jugador){
                        if($partidas[$i]["palabraWordix"]== $palabra){
                            $numRandom=rand(0,count($arrayPalabras));//pide un nuevo numero si se repite la palabra
                            $palabra=$arrayPalabras[$numRandom];
                            $logico=true;
                        }
                    }
                    $i++;
                }
            }while($logico);
            
            $partidaNueva=jugarWordix($palabra, $jugador);//modulo de wordix
            $partidas[]=$partidaNueva; //almacenar partida nueva en el arreglo de partidas

            break;
        case 3: 
            echo "seleccione un numero de partida entre 1 y ".count($partidas)." para mostrar: ";
            $num=solicitarNumeroEntre(1, count($partidas));//modulo 5
            $num=$num-1;
            mostrarPartida($num, $partidas);//modulo 6
            break;
        
        case 4:
            $jugador=solicitarJugador(); //modulo 10
            $indicePartida=partidaGanada($partidas, $jugador);//modulo 8 (tiene la verificacion dentro)
            mostrarPartida($indicePartida, $partidas); //modulo 6
            break;

        case 5: 
            $jugador=solicitarJugador();//modulo 10
            $estadisticas=resumenJugador($partidas,$jugador);//modulo 9 (para array de estadisticas)
            echo "*******************************************************\n";
            echo "Jugador: ".$estadisticas["jugador"];
            echo "\nPartidas: ".$estadisticas["partidas"];
            echo "\nPuntaje Total: ".$estadisticas["puntaje"];
            echo "\nVictorias: ".$estadisticas["victorias"];
            if($estadisticas["victorias"]!=0){//para no dividir por cero
                echo "\nPorcentaje Victorias: ".(($estadisticas["victorias"]*100 )/$estadisticas["partidas"])."%" ;
            }else{
                echo "\nPorcentaje Victorias: 0%";
            }
            echo "\nAdivinadas: ";
            echo "\n    Intento 1:".$estadisticas["intento1"];
            echo "\n    Intento 2:".$estadisticas["intento2"];
            echo "\n    Intento 3:".$estadisticas["intento3"];
            echo "\n    Intento 4:".$estadisticas["intento4"];
            echo "\n    Intento 5:".$estadisticas["intento5"];
            echo "\n    Intento 6:".$estadisticas["intento6"];
            echo "\n**************************************************";
            break;
        case 6:
            ordenarPartidas($partidas);//modulo 11
            break;
        case 7:
            $palabraNueva=leerPalabra5Letras(); //modulo 4 sacado de wordix
            $cant=count($arrayPalabras);
            do{
                $i=0;
                $logico=false;
                while($i<$cant){
                    if($arrayPalabras[$i]==$palabraNueva){
                        echo "\nla palabra que desea ingresar ya fue ingresada\n";
                        echo "por favor ingrese otra palabra\n";
                        $palabraNueva=leerPalabra5Letras();
                        $logico=true;
                    }
                    $i++;
                }
            }while($logico);
            $arrayPalabras=agregarPalabra($arrayPalabras,$palabraNueva);//modulo 7
            echo "listo para seguir jugando";
            break;
        case 8:
            echo "salida";
            break;
    }
} while ($opcion != 8);


?>