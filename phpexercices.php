<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="index.css">
</head>
<body>


<?php 
include 'group.php';

//Bibliografy:
// https://www.geeksforgeeks.org/sorting-algorithms/

// PHP program for implementation 
// of Bubble Sort

// PHP program for implementation 
// of selection sort 
function selection_sort(&$arr, $n) 
{
    for($i = 0; $i < $n ; $i++)
    {
        $low = $i;
        for($j = $i + 1; $j < $n ; $j++)
        {
            if ($arr[$j] < $arr[$low])
            {
                $low = $j;
            }
        }
          
        // swap the minimum value to $ith node
        if ($arr[$i] > $arr[$low])
        {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$low];
            $arr[$low] = $tmp;
        }
    }
}


function selection_sortCSV(&$arr, $n, $column) 
{
    for($i = 0; $i < $n ; $i++)
    {
        $low = $i;
        for($j = $i + 1; $j < $n ; $j++)
        {
            if ((float)$arr[$j][$column] < (float)$arr[$low][$column])
            {
                $low = $j;
                //print_r("Excuteee ==> ");
            }

         
        }
          
        // swap the minimum value to $ith node
        if (  (float)$arr[$i][$column] >  (float)$arr[$low][$column])
        {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$low];
            $arr[$low] = $tmp;
        }
    }
}

function exercise1(){       


    echo "<h2><strong id=\"php_question\">Ejercicio 1 </strong> <b id=\"question_type\">(obligatorio)</b></h2>";
    echo "<p>Se quiere implementar un método sort_csv(\$csv, \$column) en PHP que ordene un string
    que representa un CSV que reciba como parámetro. El método además recibirá el número de
    la columna por la cual se quiere ordenar. La columna cero es la primera de todas. El método
    retorna un string. Por ejemplo, data la variable:
    
    \$data = \"paco,2,3.6\\nperico,5,1.7\\npirolo,1.3,2.6\\npocholo,11,-1.5\";
    </p>";


    echo "</br><p> <b>Nota:</b> Si usted no inserta una cadena CSV como la del ejemplo, pero si el número de la columna se asume
       por defecto como CSV: \"paco,2,3.6\\nperico,5,1.7\\npirolo,1.3,2.6\\npocholo,11,-1.5\"</p>";

    echo "<br/>";

    echo "<form method='post' action='phpexercices.php?ejercicio=PhpEjecicio1'>
    <p>
     <label for='x1'>Inserte texto en formato CSV (Siga el ejemplo): </label>
     <input type=\"text\"  id='x1' name=\"x1\">     
    </p> 

    <label for='c1'>Columna a ordenar: </label>
     <input type=\"text\"  id='c1' name=\"c1\">     
    </p>


     <p><input type=\"submit\" /></p>
   </form>";


    // $arr = array(64, 25, 12, 22, 11);
    // $len = count($arr);
    // selection_sort($arr, $len);
    // //echo "Sorted array : \n"; 
    
    // for ($i = 0; $i < $len; $i++) 
    //     echo $arr[$i] . " "; 

    // This code is contributed 
    // by Deepika Gupta. 
    $column = 2;

    $CsvString = "paco,2,3.6\nperico,5,1.7\npirolo,1.3,2.6\npocholo,11,-1.5";

    if (isset($_POST["x1"]) && isset($_POST["c1"])) {
        // echo "El valor de x1 es de ".$_POST["x1"];
        // echo "El valor de c1 es de ".$_POST["c1"];

        $CsvString = $_POST["x1"];
        $column = 2;
        $column = $_POST["c1"];

        if (is_numeric($column) == false) {
           $message =   "<h3>El parámetro para ordenar por columna no es un número</h3>";
           echo $message;

           return;
           //throw new Exception($message);
        }
  
   
        $column = (int) $column;

        if ($column == 0){
            $message =   "<h3>Ordenar por la columna de valor 0 no es válido</h3>";
            echo $message;
 
            return;

        }

        if ( $CsvString == "")
          $CsvString = "paco,2,3.6\\nperico,5,1.7\\npirolo,1.3,2.6\\npocholo,11,-1.5";    

        $Data = str_getcsv($CsvString, "\n"); //parse the rows
        $csv = array_map('str_getcsv', explode("\\n", $CsvString));

        
        //echo " CSV processing !!!!\n";
        $csv_len_row = count($csv);
        
        if ($csv_len_row <= 0) {
          
            $message = "<h3>No existe una cadena CSV para ordenar.</h3>";
            echo $message;
            return;
        }
        else {   
            //echo "\nLength of rows: ".$csv_len_row;
            $csv_len_column = count($csv[0]);
            if (  $csv_len_column <= 0){
               
                $message =   "<h3>No existe una cadena CSV para ordenar.</h3>";
                echo $message;
     
                return;
            }
            else {
                if (is_numeric($column) == false || $column <= 0 || $column > $csv_len_column) {
                    $message =   "<h3>El parámetro del número de la columna es incorrecto.</h3>";
                    echo $message;
         
                    return;
                }
                else {
                    //echo "\n\nLength of columns: ".$csv_len_column;
    
                    selection_sortCSV($csv,$csv_len_row, $column);
                    $elements = $csv;
                    $elementSize = count($elements);
                    echo "<h5>Resultado: </h5>";
                    for ($i = 0; $i < $elementSize; $i++){
                        $message = "";
                        $jelement = count($elements[$i]);
                        for ($j = 0; $j < $jelement; $j++){
                            $message .=  (string)$elements[$i][$j];
                            $message .= ($jelement-1 != $j)? ",":";";
                        }
                        echo "<h4>".$message. "</h4>";
                    }             
                   
                }
    
            }     
       }

        
      }
    

 }



function exercixesPhp2() {

    echo "<h2><strong id=\"php_question\">Ejercicio 2  </strong> <b id=\"question_type\">(obligatorio)</b></h2>";

    echo "<p>    Para el mundial de Fútbol se quiere crear una clase para controlar la fase clasificatoria por
    grupos. Se quiere crear la clase Group de forma tal que permita lo siguiente:</p>";
    echo "<ul> 
        <li>El constructor de la clase recibe un array con 4 strings que representa los nombres de
        los equipos del grupo. Debe validar que la entrada sea correcta en caso contrario lanzar
        excepciones.</li>
        <li>La clase debe tener un método match(\$team1, \$score1, \$team2, \$score2)
        que permite definir el resultado de un encuentro entre 2 equipos del grupo. Las
        variables \$team1 y \$team2 son string (los nombres) y las variables \$score1 y
        \$score2 es la cantidad de goles de cada equipo en ese partido. Debe validar que los
        nombres de los equipos sean correctos, que 2 equipos no jueguen más de una vez, etc.
        </li>
        <li>Debe implementar además un método result() que debe devolver la lista de los 4
        equipos ordenados por clasificación hacia la próxima ronda. El método debe devolver
        en todo momento la tabla de posiciones actual, incluso aunque no se hayan jugado
        todos los partidos.</li>
        <li>Debe utilizarse la siguiente forma de calcular los puntos y determinar el desempate.

            <ul>Formas de ganar puntos
               <ul>
                    <li>i. Ganar un partido 3 puntos para el ganador</li>
                    <li>ii. Perder un partido 0 puntos para el perdedor</li>
                    <li>iii. Empatar un partido 1 punto para cada equipo.<li>
               </ul> 
               <ul> b. Formas de desempatar
                    <li>i. Mayor cantidad de puntos</li>
                    <li>ii. Mayor diferencia de goles</li>
                    <li>iii. Mayor números de goles a favor</li>
                </ul>
                <ul>c. Si 2 o más equipos quedan empatados según los criterios anteriores entonces
                    <li>i. Mayor número de puntos obtenidos en los partidos entre ellos</li>
                    <li>ii. Mayor diferencia de goles en los partidos entre ellos</li>
                    <li>iii. Número de goles anotados en los partidos entre ellos</li>
                </ul>
             </ul>   
           </li>
    </ul>";

    echo "<p> Se usó la corrida de ejemplo: 
     (del grupo H del mundial de Fútbol de 2018):
            <p>\$groupA = new Group('Colombia', 'Japón', 'Senegal', 'Polonia');</p>
            <p>\$groupA.match('Senegal', 0, 'Colombia', 1);</p>
            <p>\$groupA.match('Japón', 0, 'Polonia', 1);</p>
            <p>\$groupA.match('Senegal', 2, 'Japón', 2);</p>
            <p>\$groupA.match('Polonia', 0, 'Colombia', 3);<p>
            <p>\$groupA.match('Polonia', 1, 'Senegal', 2);</p>
            <p>\$groupA.match('Colombia', 1, 'Japón', 3);</p>
            <p>\$result = \$groupA.result();</p>
        </p>";

    echo "<p><b>Nota:</b> Ver código en archivo <b>group.php</b> y <b>phpexercices.php</b> para comprobar implementación</p>";  
    $groupA = new Group('Colombia', 'Japón', 'Senegal', 'Polonia');

    $groupA->matchEx("Senegal", 0, 'Colombia', 1);
    $groupA->matchEx('Japón', 0, 'Polonia', 1);
    $groupA->matchEx('Senegal', 2, 'Japón', 2);
    $groupA->matchEx('Polonia', 0, 'Colombia', 3);
    $groupA->matchEx('Polonia', 1, 'Senegal', 2);
    $groupA->matchEx('Colombia', 1, 'Japón', 3);

    $result = $groupA->result();
    $strResult = implode(", ", $result);
    echo "<h4>".$strResult."</h4>";
    

}


function excercisPhp3(){

  echo "";
  echo "";

}



$request=isset($_GET['ejercicio'])?$_GET['ejercicio']:"";

if ($request != "" && $request != null)
  echo "<a href=\"index.php\">Menu de preguntas</a>";

 switch ($request) {
   
    case "PhpEjecicio1":
        exercise1();
        break;
    case "PhpEjecicio2":
        //echo "i es un pastel";
        exercixesPhp2();
        break;         
    
   
    case "":            
    default:
      //exercise1();
}

?>

</body>
</html>