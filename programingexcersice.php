
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="index.css">
</head>
<body>


<?php 
  
  function excersiceOne($number_array){

      $number_array = [1, 2, 10, 3, 4, 9, 5, 6, 8, 7, 8, 9, 10];
      echo "<h1><strong id=\"optional\">Ejercicio 1 </strong> <b id=\"question_type\">(obligatorio)</b></h1>";
      echo "<p> Se tiene un array de números enteros que puede contener elementos repetidos. Y se quiere
      obtener un nuevo array son los elementos del primer array, pero sin repeticiones. El array
      resultante debe tener <b>el mismo orden</b> que el anterior. En caso de haber elementos repetidos,
      en el array resultante <b>sólo debe aparecer la última ocurrencia</b> de ese elemento en el array
      original.

     <p><b>Ejemplo:</b>
        <p>Entrada: [1, 2, 10, 3, 4, 9, 5, 6, 8, 7, 8, 9, 10]</p>
        <p>Salida: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]</p>
     <p>
      </p>";


      echo "<br/>";

      echo "<form method='post' action='programingexcersice.php?ejercicio=OtherEjecicio1'>
       <p>
        <label for='x1'>Inserte el arreglo de números (separados por comas): </label>
        <input type=\"text\"  id='x1' name=\"x1\">     
       </p> 
 
  
 
        <p><input type=\"submit\" /></p>
      </form>";

      if (isset($_POST["x1"])) {
         //Transform input array with as string
         $array_input = explode(",", $_POST["x1"]);
         $ex_array = array();
         foreach($array_input as $value){
           if (is_numeric($value) == false) {
              echo "<h4> Hay elementos en el arraglo que no son números</h4>";
              return;
           }     
           else {
            $number = (float)$value;
            $ex_array[] =  is_float($number)? $number:(int)$value;
           }      
         }

         $number_array =  $ex_array;


      }

      if (is_array($number_array) == false || count($number_array) == 0)
           throw new Exception("Is not a number array");
      foreach($number_array as $value)
        if (!is_numeric($value))
          throw new Exception("Is not a number array");

      $array_size = count( $number_array);
      $new_array = array();

      for ( $i=0; $i < $array_size; $i++){
        $pos = $i;
        $value = $number_array[$i];
        for ($j = 1; $j <  $array_size; $j++ ){
            if ($i != $j &&  $value == $number_array[$j]){
               $pos = $j;  
               $number_array[$i] = "X";
            }          
        }
        $number_array[$pos] = $value;
      }
    
      foreach ($number_array as $value){
         if ($value != "X") {
          $new_array[] = $value;
         }  
      }
      echo "<h4> Arreglo final: ";
      foreach ($new_array as $value){
        echo $value. " ";
      }
      echo "</h4>";
      return $new_array;        
  }


  function ifStringNewsPaper($var_str){

         if (is_string($var_str) == false)
            throw new Exception("Parameters is not string");
         else {
            $ngrams = 3;
            $length = strlen($var_str);
            if ($ngrams > $length) {
                throw new Exception("String length is lower than possible ngrams");
            }
            else {
                // singlebyte strings
                $result = substr($var_str, 0,$ngrams);
                $array_split = str_split($var_str,$ngrams);

                foreach($array_split as $value){
                    if ($value != $result)
                      return false;
                }
                return true;
            }
         }       
  }

  function next_periodic($number_prmt){
     do {
        $number_prmt +=1;
        $binaryRpr = decbin($number_prmt);
     }
     while (ifStringNewsPaper($binaryRpr ) == false);  
     echo "<h5> La representación binaria de ".$number_prmt." es ".$binaryRpr." </h5>";    
    return $number_prmt;
  }

  function excersiceTwo($number_prmt){

    
     echo "<h1><strong id=\"optional\">Ejercicio 2 </strong> <b id=\"question_type\">(obligatorio)</b></h1>";
     echo "<p>Dadas las siguientes definiciones.
     <ul>
      <li>Un string es periódico si está compuesto por la repetición de un substring. Por ejemplo
       <ul>
         <li>\"blablablabla\" es periódico porque se repite \"bla\" 4 veces.</li>
         <li>\"blablebli\" no es periódico.</li>
         <li>\"blablabl\" tampoco es periódico.</li>
      </ul>
      </li>
      <li>Un número entero es periódico, si su representación en binario es periódica. Por
       ejemplo:
        <ul>
         <li>El número 365 (\"101101101\") es periódico porque el \"101\" se repite 3 veces.</li>
         <li>El número 682 (\"1010101010\") es periódico porque el \"10\" se repite 5 veces.</li>
        </ul> 
      </li>
     </ul>
     Se quiere implementar una función (en el lenguaje de tu preferencia) que reciba como
     parámetro un número entero. Y devuelva el menor número periódico mayor que el que es
     recibido como parámetro.

     <p><b>Nota:</b> En caso de no insertar ningún número se toma el 250 como ejemplo</p>    
     </p>";

     echo "<br/>";

     echo "<form method='post' action='programingexcersice.php?ejercicio=OtherEjecicio2'>
      <p>
       <label for='x1'>Inserte el número: </label>
       <input type=\"text\"  id='x1' name=\"x1\">     
      </p> 

 

       <p><input type=\"submit\" /></p>
     </form>";

     if (isset($_POST["x1"])) {
           $number = $_POST["x1"];
           if (is_numeric($number) == false) {
            echo "<h4>El parámetro no es un número</h4>";  
            return;  
          }
          $number = (float)$number;
          $number_prmt =  is_float($number)?$number:(int)$number;

     }

    if (is_numeric($number_prmt) == false) {
       echo "<h4>El parámetro no es un número</h4>";  
       return;  
    }
    else {
       $nex_number = next_periodic($number_prmt);
       print_r($nex_number." es el primer número, mayor que ".$number_prmt." que es períodico");
    }
  }

  function excersiceThree($x1, $y1, $x2,$y2, $x3,$y3,$x4,$y4) {

       echo "<h1><strong id=\"optional\">Ejercicio 3 </strong> <b id=\"question_type\">(obligatorio)</b></h1>";
       echo "<p>
       Implemente una función (en el lenguaje de su preferencia) que reciba como parámetro 8
       números enteros: x1, y1, x2, y2, x3 y3, x4, y4.
       <ul>
         <li>(x1, y1) representa un vértice de un rectángulo con los lados paralelos a los ejes de
       coordenadas. </li>
         <li>(x2, y2) representa el vértice opuesto del rectángulo mencionado.</li>
         <li>(x3, y3) representa un vértice de un segundo rectángulo con los lados paralelos a los
       ejes de coordenadas.</li>
       <li> (x4, y4) representa el vértice opuesto del segundo rectángulo.</li>
       </ul>
       
       Se quiere que la función devuelva el área de intersección de ambos rectángulos. Si los
       rectángulos no se intersectan el área es cero.</p>";

      
       echo "<br/>";

       echo "<form method='post' action='programingexcersice.php?ejercicio=OtherEjecicio3'>
        <p>
         <label for='x1'>x1: </label>
         <input type=\"text\"  id='x1' name=\"x1\">
         <label for='y1'>y1: </label>
         <input type=\"text\" id='y1' name=\"y1\">
        </p> 

        <p>
        <label for='x2'>x2: </label>
        <input type=\"text\"  id='x2' name=\"x2\">
        <label for='y2'>y2: </label>
        <input type=\"text\" id='y2' name=\"y2\">
       </p> 

        <p>
        <label for='x3'>x3: </label>
        <input type=\"text\"  id='x3' name=\"x3\">
        <label for='y3'>y3: </label>
        <input type=\"text\" id='y3' name=\"y3\">
        </p> 


         
       <p>
       <label for='x4'>x4: </label>
       <input type=\"text\"  id='x4' name=\"x4\">
       <label for='y4'>y4: </label>
       <input type=\"text\" id='y4' name=\"y4\">
      </p> 

         <p><input type=\"submit\" /></p>
       </form>";

      if (!isset($_POST["x1"]) || !isset($_POST["x2"]) || !isset($_POST["x3"]) || !isset($_POST["x4"]) ||
           !isset($_POST["y1"]) || !isset($_POST["y2"]) || !isset($_POST["y3"]) || !isset($_POST["y4"])) {
             echo "<h4> No se ha insertado uno de los valores de las coordenadas y se asume el ejemplo por defecto
             (0, 20), (30, 0), (10, 10), (30, 20)
             </h4>";
        
      }
      else {
           $x1 = (int) $_POST["x1"];
           $y1 = (int) $_POST["y1"];

           $x2 = (int) $_POST["x2"];
           $y2 = (int) $_POST["y2"];

           $x3 = (int) $_POST["x3"];
           $y3 = (int) $_POST["y3"];

           $x4 = (int) $_POST["x4"];
           $y4 = (int) $_POST["y4"];

      }

       if (is_numeric($x1) == false || is_numeric($y1) == false || is_numeric($x2) == false || is_numeric($y2) == false 
            || is_numeric($x3) == false || is_numeric($y3) == false|| is_numeric($x4) == false || is_numeric($y4) == false) {

              echo "<h4>Una de las coordenadas es incorrecta</h4>";    
       }
       else {
        //Si tienes cuatro coordenadas - ((X,Y),(A,B)) y ((X1,Y1),(A1,B1)) - en lugar de dos más ancho y alto, se vería así:

        // if (A<X1 or A1<X or B<Y1 or B1<Y):
        //     Intersection = Empty
        // else:
        //     Intersection = Not Empty

           if ( $x3 < $x2 || $y3 < $y2 || $x4 <$x1 || $y4 <$y1 ) {
              $array_x_min = array();
              $array_x_min[] = $x1;
              $array_x_min[] = $x2;
              $array_x_min[] = $x3;
              $array_x_min[] = $x4;
              $xmin = min ($array_x_min);

              $array_y_min = array();
              $array_y_min[] = $y1;
              $array_y_min[] = $y2;
              $array_y_min[] = $y3;
              $array_y_min[] = $y4;

              $ymax = max($array_y_min);

              if ($ymax > $y2 && $y2 != 0)
                $ymax = $y2;

                $new_x = $x3;
                $new_y = $x3;   

              if ( $x3 < $x2 || $y3 < $y2 ){               
               
                  $new_x1 = $x2;
                  $new_y1 = $y2;
                  if ($new_x1 > $x4) {
                      $new_x1 = $x4;
                  }

                  if ($new_y1 > $y4){
                    $new_y1 = $y4;
                  }              
              }               
              else if ($x4 <$x1 || $y4 <$y1 )  {
                $new_x = $x4;
                $new_y = $x4;
                
                $new_x1 = $x1;
                $new_y1 = $y1;
                if ($new_x1 > $x3) {
                  $new_x1 = $x3;
                }

                if ($new_y1 > $y3){
                  $new_y1 = $y3;
                }

              }

             ///Compute area
             $area = abs($new_x - $new_x1)*abs($new_y - $new_y1);             
             echo "<h3>Respuesta:</h3>";
             echo "El área es ".$area;
             return $area;
           }
           else {
             echo "<h3>Respuesta:</h3>";
             echo "El área es 0";
             return 0;
           }
          
       }
  }


  $request=isset($_GET['ejercicio'])?$_GET['ejercicio']:"";

  if ($request != "" && $request != null)
    
  echo "<a href=\"index.php\">Menu de preguntas</a>";

 switch ($request) {
    case "OtherEjecicio1":
        excersiceOne([1, 2, 10, 3, 4, 9, 5, 6, 8, 7, 8, 9, 10]);
        break;
    case "OtherEjecicio2":
        excersiceTwo(250);
        break;
    case "OtherEjecicio3":
        //0, 20, 20, 0, 10, 30, 30, 10
        //0, 0, 30, 30, 10, 10, 20, 20 
        //0, 20, 30, 0, 10, 10, 30, 20 
        //excersiceThree($x1, $y1, $x2,$y2, $x3,$y3,$x4,$y4);

        excersiceThree(0, 20, 30, 0, 10, 10, 30, 20);
        break;
    case "OtherEjecicio4":
          //0, 20, 20, 0, 10, 30, 30, 10
          //0, 0, 30, 30, 10, 10, 20, 20 
          //0, 20, 30, 0, 10, 10, 30, 20 
          //excersiceThree($x1, $y1, $x2,$y2, $x3,$y3,$x4,$y4);
  
          excerciseFour();
          break;
    case "":            
    default:
      //exercise1();
    }


    ///All String permutation 
    //Bibliografy: https://www.geeksforgeeks.org/php-program-for-write-a-program-to-print-all-permutations-of-a-given-string/


    // PHP program to print all 
    // permutations of a given string. 
  
/* Permutation function @param 
   str string to calculate permutation 
   for @param l starting index @param 
   r end index */
function permute(&$arrayStr,$str, $l, $r) 
{ 
    if ($l == $r) {
        //echo $str. "\n"; 
        $arrayStr[] = $str;
    }   
    else
    { 
        for ($i = $l; $i <= $r; $i++) 
        { 
            $str = swap($str, $l, $i); 
            permute($arrayStr, $str, $l + 1, $r); 
            $str = swap($str, $l, $i); 
        } 
    } 
} 

function permuteEx(&$arrayStr,$str, $l, $len) 
{ 
    
        $arrayStr[] = $str;  

        for ($i = 1; $i <= $len; $i++) 
        { 
            $str = swap($str, 0, $len);
            $arrayStr[] = $str;
            
       } 
  
} 
  
/* Swap Characters at position @param 
   a string value @param i position 1 
   @param j position 2 @return swapped 
   string */
function swap($a, $i, $j) 
{ 
     
    $charArray = str_split($a); 
    $temp = $charArray[$j];
    $newString = "";
    for ($i=0;$i<$j;$i++){
      $newString .= $charArray[$i];
    } 

    $newString  = $temp.$newString;
    return $newString;
} 

function primeCheck($y){
      $num = $y;
      if ($num == 1)
      {
        return false;
      }
      for ($i = 2; $i <= $num/2; $i++){ 
      if ($num % $i == 0) 
          return false; 
      } 
      return true; 
  } 

  function ifSuperPrime($number){
    $numberStr =  strval($number);
    $sizeNumberStr = strlen($numberStr);
    ///Preguntar si tiene mas de 1 caracter
    if ($sizeNumberStr == 1) {
      if (!primeCheck($number))
        return true;
      else  
        return false;

    }
    else {
    
       $allNumberPermutation = array();
       permuteEx( $allNumberPermutation, $numberStr , 0, $sizeNumberStr - 1);
       
       foreach( $allNumberPermutation as $value){

         if (!primeCheck((int)$value))
           return false;
       }

       return true;
       // $n = strlen($str); 
       //  
      
    }


  }
  function find_allSuperPrime($number_target){

     $superPrime = 0;
     for ($i = 2; $i <$number_target; $i++) {

          ///Llevar a string
          if (ifSuperPrime($i))
            $superPrime++;

          ///Comenzar el proceso de conversion de todas las posibles trasformaciones

     }

     return $superPrime;

  }


function excerciseFour(){
      echo "<h1><strong id=\"optional\">Ejercicio 4  <b id=\"question_optional\">(opcional)</b></h1></strong>";
      echo "<p>Implemente una función (en el lenguaje de su preferencia) que reciba como parámetro un
      número entero <strong style=\"color:blue\"> N </strong> y devuelva la cantidad de números <strong style=\"color:red\"> super primos</strong> que hay entre cero y <strong style=\"color:blue\"> N </strong>.
      Un número <strong style=\"color:red\"> super primo </strong> se define de la siguiente forma: 
        <ul>
         <li>Si a un número primo, se le quita la cifra menos significativa y se mueve a la posición
             más significativa y el número resultante sigue siendo primo.</li>

         <li>Si repites el paso anterior, tantas veces como cifras tenga el número.</li>
          <li>Entonces el número dado es super primo (y todos los números intermedios también)</li>
        </ul>
      </p>";

      echo "<br/>";

      echo "<form method='post' action='programingexcersice.php?ejercicio=OtherEjecicio4'>
      <p>
        <label for='x1'>Inserte el número: </label>
        <input type=\"text\"  id='x1' name=\"x1\">     
      </p> 



        <p><input type=\"submit\" /></p>
      </form>";

      $number_prmt = 10000;

      if (isset($_POST["x1"])) {
        $number = $_POST["x1"];
        if (is_numeric($number) == false) {
         echo "<h4>El parámetro no es un número</h4>";  
         return;  
       }
       $number = (float)$number;
       $number_prmt =  is_float($number)?$number:(int)$number;

      }

    if (is_numeric($number_prmt) == false) {
        echo "<h4>El parámetro no es un número</h4>";  
        return;  
    }
    else {
        
        $nex_number = find_allSuperPrime($number_prmt);
        //$nex_number = ifSuperPrime(1193);
        print_r(" Desde el 0 al ".$number_prmt." hay ". $nex_number . " super primos");
    }

}
  
// Driver Code 
// $str = "ABC"; 
// $n = strlen($str); 
// permute($str, 0, $n - 1); 

?>

</body>
</html>