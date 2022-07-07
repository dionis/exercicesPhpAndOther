


<?php 
  
  function excersiceOne($number_array){


      echo "<h1>Ejercicio 1 (obligatorio)</h1>";
      echo "<p> Se tiene un array de números enteros que puede contener elementos repetidos. Y se quiere
      obtener un nuevo array son los elementos del primer array, pero sin repeticiones. El array
      resultante debe tener el mismo orden que el anterior. En caso de haber elementos repetidos,
      en el array resultante sólo debe aparecer la última ocurrencia de ese elemento en el array
      original.
      </p>";


      echo "<br/>";

      echo "<form method='post' action='#'>
       <p>
        <label for='x1'>Inserte el arreglo de números (separados por comas): </label>
        <input type=\"text\"  id='x1' name=\"x1\">     
       </p> 
 
  
 
        <p><input type=\"submit\" /></p>
      </form>";


      if (is_array($number_array) == false || count($number_array) == 0)
           throw new Exception("Is not a number array");
      foreach($number_array as $value)
        if (!is_numeric($value))
          throw new Exception("Is not a number array");

      $array_size = count( $number_array);
      $new_array = array();

      for ( $i=0; $i < $array_size; $i++){
        $pos = $i;
        for ($j = 0; $j <  $array_size; $j++ ){
            if ($i != $j && $number_array[$i] == $number_array[$j])
               $pos = $j;  
        }
            $new_array[] = $number_array[$pos];
      }

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
     }
     while (ifStringNewsPaper( decbin($number_prmt)) == false);       
    return $number_prmt;
  }

  function excersiceTwo($number_prmt){
     echo "<h1>Ejercicio 2 (obligatorio)</h1>";
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
     </p>";

     echo "<br/>";

     echo "<form method='post' action='#'>
      <p>
       <label for='x1'>Inserte el número: </label>
       <input type=\"text\"  id='x1' name=\"x1\">     
      </p> 

 

       <p><input type=\"submit\" /></p>
     </form>";

    if (is_numeric($number_prmt) == false) {
        throw new Exception("Paramert is not a number");    
    }
    else {
       $nex_number = next_periodic($number_prmt);
       print_r($nex_number." es el primer número, mayor que ".$number_prmt." que es períodico");
    }
  }

  function excersiceThree($x1, $y1, $x2,$y2, $x3,$y3,$x4,$y4) {

       echo "<h1>Ejercicio 3 (obligatorio)</h1>";
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

       echo "<form method='post' action='#'>
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

      if (isset($_POST["x1"])) {
        echo "El valor de x1 es de ".$_POST["x1"];
        
      }

       if (is_numeric($x1) == false || is_numeric($y1) == false || is_numeric($x2) == false || is_numeric($y2) == false 
            || is_numeric($x3) == false || is_numeric($y3) == false|| is_numeric($x4) == false || is_numeric($y4) == false) {

              throw new Exception("Paramert incorrect");    
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
    case "":            
    default:
      //exercise1();
    }

?>