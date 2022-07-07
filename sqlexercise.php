
<?php

function headerQuestion(){
  echo "<h3>Tienes una base de datos con las siguientes tablas y campos (a continuación un pseudo código
  de la creación de las tablas)</h3>";

  echo "<h4>
   <p>create table people { </br>
      &nbsp;&nbsp; id integer primary key,  </br>
      &nbsp;&nbsp; name string,  </br>
      &nbsp;&nbsp; age integer,    </br>
      &nbsp;&nbsp; boss_id integer reference people(id),  </br>
      &nbsp;&nbsp; -- foreign key a esta misma tabla personas (el jefe)  </br>
      &nbsp;&nbsp; favorite_author_id integer reference people(id)  </br>
      &nbsp;&nbsp; -- foreign key a esta misma tabla (autor preferido)  </br>
     
    }  </br>
    </p>
    </h4>";

    echo "<h4>
    <p>
    create table books {     </br>
        &nbsp;&nbsp; id integer primary key,  </br>
        &nbsp;&nbsp; title string,             </br>
        &nbsp;&nbsp; owner_id integer reference people(id),      </br>
        &nbsp;&nbsp; -- foreign key a la tabla personas (el dueño del libro)  </br>
        &nbsp;&nbsp; author_id integer reference people(id),                </br>
        &nbsp;&nbsp; -- foreign key a la tabla personas (el autor del libro)     </br>
    }                </br>
    </p>
    </h4>";

}
function sqlExerciseOne(){
     headerQuestion();
     echo "</br>";
     echo "<h1>Ejercicio 1 (obligatorio)
     </h1>";
     echo "Crea una consulta SQL que devuelva el listado de personas con la cantidad de libros de las
     que es dueño, este listado debe aparecer ordenado de mayor a menor. Las personas que no
     tengan ningún libro, no deben aparecer en el resultado. Si más de una persona tiene la misma
     cantidad de libros, entonces deben quedar ordenadas alfabéticamente entre ellas. La salida
     debe ser algo como:";
     echo "<h5>
     <table>
     <tr><td> title </td><td>owner_age</td><td>author_age</td></tr>
     <tr><td> papa goriot </td><td style=\"text-align:center\">15</td><td style=\"text-align:center\">50</td></tr>
     <tr><td> don quijote  </td><td style=\"text-align:center\">18</td><td style=\"text-align:center\">34</td></tr>
     <tr><td> la iliada </td><td style=\"text-align:center\">18</td><td style=\"text-align:center\">34</td></tr>     
     </table>
     </h5>";

     echo "</br> 
        <h2>Respuesta:</h2>
        <h3>
     
          use library;
          select  e.name as 'name',count(name) as 'amount' from people as e INNER JOIN books b ON e.id = b.owner_id  group by name order by  amount DESC, name DESC;
        </h3>";
}


function sqlExerciseTwo(){
    headerQuestion();
    echo "</br>";
    echo "<h1>Ejercicio 2 (obligatorio)
    </h1>";
    echo "<p>Crea una consulta SQL que devuelva el listado de personas con la cantidad de libros de las
    que es dueño, este listado debe aparecer ordenado de mayor a menor. Las personas que no
    tengan ningún libro, no deben aparecer en el resultado. Si más de una persona tiene la misma
    cantidad de libros, entonces deben quedar ordenadas alfabéticamente entre ellas. La salida
    debe ser algo como:</p>";
    echo "<h5>
    <table>
    <tr><td> name </td><td>amount</td></tr>
    <tr><td> paco </td><td style=\"text-align:center\">10</td></tr>
    <tr><td> perico </td><td style=\"text-align:center\">8</td></tr>
    <tr><td> pocholo </td><td style=\"text-align:center\">8</td></tr>
    <tr><td> pupo </td><td style=\"text-align:center\">5</td></tr>
    <tr><td> pirolo </td><td style=\"text-align:center\">3</td></tr>
    </table>
    </h5>";

    echo "</br> 
       <h2>Respuesta:</h2>
       <h3>

       select b.title as 'title', e.age as \"owner_age\", e1.age as \"author_age\" from people as e INNER JOIN books b ON e.id = b.owner_id INNER JOIN people e1 ON e1.id = b.author_id order by owner_age; 
  
       </h3>";

}


function sqlExerciseThree(){
    headerQuestion();
    echo "</br>";
    echo "<h1>Ejercicio 3 (obligatorio)
    </h1>";
    echo "<p>Crea una consulta SQL que devuelva el listado de personas <span>que han escrito más libros que
    la cantidad que poseen</span>. O sea cada persona puede haber escrito N libros y ser dueña de M
    libros. El resultado solo deben salir los nombres de las personas en las N > M.
    </p>";

    echo "<h5>
    <table>
    <tr><td> name </td></tr>
    <tr><td> paco </td></tr>
    <tr><td> perico </td></tr>  
    <tr><td> pirolo </td></tr>
    </table>
    </h5>";

    echo "</br> 
       <h2>Respuesta:</h2>
       <h3>
       select e.name as 'name' from people as e INNER JOIN books b ON e.id = b.owner_id INNER JOIN people e1 ON e1.id = b.author_id GROUP BY b.owner_id, b.author_id HAVING COUNT(b.owner_id ) < COUNT(b.author_id); 
       </h3>";

}


function sqlExerciseFour(){
    headerQuestion();
    echo "</br>";
    echo "<h1>Ejercicio 3 (obligatorio)
    </h1>";
    echo "<p>Se quiere actualizar la columna <span style=\"color: blue\">favorite_author_id<span> de la tabla <span style=\"color: red\">people</span>, y almacenar en
    ella, el autor preferido de cada persona. Ese nuevo valor debe calcularse a partir de los autores
    de los libros de cada persona.   
    </p>";

    echo "<p>Por ejemplo, si una persona, es dueña de 10 libros, de los cuales 5 son del autor X, 3 son del
    autor Y, y 2 son del autor Z. debe aparecer el id del autor X en la columna
    favorite_author_id de dicha persona.<p>";

    echo "<p>Se quiere realizar una sentencia SQL (UPDATE) para actualizar esa columna para todas las
    personas.<p>";

    echo "<h5>
    <table>
    <tr><td> name </td></tr>
    <tr><td> paco </td></tr>
    <tr><td> perico </td></tr>  
    <tr><td> pirolo </td></tr>
    </table>
    </h5>";

    echo "</br> 
       <h2>Respuesta:</h2>
       <h3>
       select e.name as 'name' from people as e INNER JOIN books b ON e.id = b.owner_id INNER JOIN people e1 ON e1.id = b.author_id GROUP BY b.owner_id, b.author_id HAVING COUNT(b.owner_id ) < COUNT(b.author_id); 
       </h3>";

}



$request=isset($_GET['ejercicio'])?$_GET['ejercicio']:"";

 if ($request != "" && $request != null)
   echo "<a href=\"index.php\">Menu de preguntas</a>";
   
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
  
    case "":            
    default:
      //exercise1();
    }
?>