
<?php 
include 'group.php';

//Bibliografy:
// https://www.geeksforgeeks.org/sorting-algorithms/

// PHP program for implementation 
// of Bubble Sort
function bubbleSort(&$arr)
{
    $n = sizeof($arr);
  
    // Traverse through all array elements
    for($i = 0; $i < $n; $i++) 
    {
        // Last i elements are already in place
        for ($j = 0; $j < $n - $i - 1; $j++) 
        {
            // traverse the array from 0 to n-i-1
            // Swap if the element found is greater
            // than the next element
            if ($arr[$j] > $arr[$j+1])
            {
                $t = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $t;
            }
        }
    }
}

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


    echo "<h2>Ejercicio 1 (obligatorio)</h2>";
    echo "<p>Se quiere implementar un método sort_csv(\$csv, \$column) en PHP que ordene un string
    que representa un CSV que reciba como parámetro. El método además recibirá el número de
    la columna por la cual se quiere ordenar. La columna cero es la primera de todas. El método
    retorna un string. Por ejemplo, data la variable:
    
    \$data = \"paco,2,3.6\nperico,5,1.7\npirolo,1.3,2.6\npocholo,11,-1.5\";
    </p>";


    echo "<br/>";

    echo "<form method='post' action='index.php'>
    <p>
     <label for='x1'>Inserte texto en formato CSV: </label>
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
        echo "El valor de x1 es de ".$_POST["x1"];
        echo "El valor de c1 es de ".$_POST["c1"];

        $CsvString = $_POST["x1"];
        $column = 2;
        $colum = $_POST["c1"];

        if (is_numeric($colum) == false) {
           $message =   "<h5>El parámetro para ordenar por columna no es un número</h5>";
           echo $message;
           throw new Exception($message);
        }

        
      }
    
    $CsvString = "paco,2,3.6\nperico,5,1.7\npirolo,1.3,2.6\npocholo,11,-1.5";

    $Data = str_getcsv($CsvString, "\n"); //parse the rows
    $csv = array_map('str_getcsv', explode("\n", $CsvString));
    //echo " CSV processing !!!!\n";
    $csv_len_row = count($csv);
    
    if ($csv_len_row <= 0) {
        throw new Exception("Not exits elements in CSV String for sorting.\n");
    }
    else {   
        //echo "\nLength of rows: ".$csv_len_row;
        $csv_len_column = count($csv[0]);
        if (  $csv_len_column <= 0){
            throw new Exception( "Not exits elements in CSV String for sorting.\n");
        }
        else {
            if (is_numeric($column) == false || $column <= 0 || $column > $csv_len_column) {
                throw new Exception("The column parameter order is incorrect");
            }
            else {
                //echo "\n\nLength of columns: ".$csv_len_column;

                selection_sortCSV($csv,$csv_len_row, $column);
                //var_dump($csv);
            }

        }     
   }
 }



function exercixesPhp2() {

    echo "<h2>Ejercicio 2 (obligatorio)</h2>";

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
        <li>Debe utilizarse la siguiente forma de calcular los puntos y determinar el desempate.</li>
    </ul>";


    $groupA = new Group('Colombia', 'Japón', 'Senegal', 'Polonia');

    $groupA->matchEx("Senegal", 0, 'Colombia', 1);
    $groupA->matchEx('Japón', 0, 'Polonia', 1);
    $groupA->matchEx('Senegal', 2, 'Japón', 2);
    $groupA->matchEx('Polonia', 0, 'Colombia', 3);
    $groupA->matchEx('Polonia', 1, 'Senegal', 2);
    $groupA->matchEx('Colombia', 1, 'Japón', 3);

    $result = $groupA->result();

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