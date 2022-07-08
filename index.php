

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="index.css">
</head>
<body>

<?php

include 'phpexercices.php';
include 'programingexcersice.php';
include 'sqlexercise.php';

  
function examples(){

    print_r( isset($_GET['ejercicio'])?$_GET['ejercicio']:"");
    // Driver Code

}
    


examples();


?>


<div id="navigation">
    <ul>
        <li> <h4 id="question">Ejecicios SQL</h4></li>
            <ul>
                <li><a href="sqlexercise.php?ejercicio=SqlEjecicio1">Ejercicio 1</a></li>
                <li><a href="sqlexercise.php?ejercicio=SqlEjecicio2">Ejercicio 2</a></li>
                <li><a href="sqlexercise.php?ejercicio=SqlEjecicio3">Ejercicio 3</a></li>
            </ul>
        <li><h4 id="php_question">Ejercicios PHP</h4></li>
            <ul>
                    <li><a href="phpexercices.php?ejercicio=PhpEjecicio1">Ejercicio 1</a></li>
                    <li><a href="phpexercices.php?ejercicio=PhpEjecicio2">Ejercicio 2</a></li>
              
            </ul>
        <li><h4 id="optional">Otros Ejercicios</h4></li>
             <ul>
                    <li><a href="programingexcersice.php?ejercicio=OtherEjecicio1">Ejercicio 1</a></li>
                    <li><a href="programingexcersice.php?ejercicio=OtherEjecicio2">Ejercicio 2</a></li>
                    <li><a href="programingexcersice.php?ejercicio=OtherEjecicio3">Ejercicio 3</a></li>
                    <li><a href="programingexcersice.php?ejercicio=OtherEjecicio4">Ejercicio 4</a></li>
            </ul>
    <ul>
</div>

<?php
$request=isset($_GET['ejercicio'])?$_GET['ejercicio']:"";

 switch ($request) {
    case "SqlEjecicio1":
       sqlExerciseOne();
        break;
    case "SqlEjecicio2":
        sqlExerciseTwo();        
        break;
    case "SqlEjecicio3":
        sqlExerciseThree();
        break;
    case "PhpEjecicio1":
        exercise1();
        break;
    case "PhpEjecicio2":
        //echo "i es un pastel";
        exercixesPhp2();
        break;         
    
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

</body>
</html>