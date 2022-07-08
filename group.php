<?php
  class Group{

    private $SIZE_GROUP = 4;
    private $groupMembers = array();

    private $groupMatches = array();
    public function __construct($team1, $team2, $team3, $team4){

      if (is_string($team1) == false || is_string($team2) == false  || is_string($team3) == false || is_string($team4) == false|| $team1 == '' || $team2 == ''|| $team3== ''|| $team4 == '')
      throw  new Exception(" Team parameter name is incorrect");
      
      $this->groupMembers[] = $team1;
      $this->groupMembers[] = $team2;
      $this->groupMembers[] = $team3;
      $this->groupMembers[] = $team4;
          
    }

    public function __destruct(){
        
    }

    /**
     * Explied that macth is a new key word in php 8 and not is a good programing technique 
     * call a function with the same name. 
     */
    public function matchex($team1, $score1, $team2, $score2){

       if (is_numeric( $score1) == false || is_numeric($score2) == false)
          throw  new Exception(" Score parameters is incorrect");
        
       if (is_string($team1) == false || is_string($team2) == false || $team1 == '' || $team2 == '')
          throw  new Exception(" Team parameter name is incorrect");

      if ( in_array( $team1, $this->groupMembers) == false || in_array( $team2 ,$this->groupMembers) == false)
             throw new Exception(" Some team names is not in group");

      //que 2 equipos no jueguen más de una vez, 
      
      $some_result =  array_key_exists( $team1,  $this->groupMatches);  
      
      if ($some_result == false)
        $this->groupMatches[$team1] = array( $team2  => array($score1, $score2));
      else {
         $some_result =  array_key_exists( $team2,  $this->groupMatches[$team1]); 
         if ( $some_result  == false)
            $this->groupMatches[$team1 ][$team2] = array($score1, $score2);
         else
           throw new Exception(" Match result just inserted");   
      }     
    }

    private 
    function selection_sort( $score_matrix_result) 
    {
        $nsize = count($this->groupMembers);
        $new_array = array();

        foreach( $score_matrix_result as $memberi =>$iRow){
          $new_array[] = $iRow;
        }

        $nsize = count($new_array);
        for ( $i = 0; $i < $nsize; $i++)
        {
            $low = $i;
           
            for( $j = $i; $j < $nsize; $j++)
            {
              if ($j != $i){
   
                if ( $new_array[ $j]["Puntos"] > $new_array[$low]["Puntos"])
                {
                    $low =  $j;
                    //print_r("Excuteee ==> ");
                }
                else if  ( $new_array[ $j]["Puntos"] ==  $new_array[$low]["Puntos"]){

                        //echo "Desempate!!!!!";

                        //   b. Formas de desempatar
                        //     i. Mayor cantidad de puntos
                        //     ii. Mayor diferencia de goles
                        if ( $new_array[ $j]["Diferencia"] >  $new_array[$low]["Diferencia"]){

                          $low =  $j;
                        }
                        else if ( $new_array[ $j]["Diferencia"] == $new_array[$low]["Diferencia"]){
                                //     iii. Mayor números de goles a favor
                                if ( $new_array[ $j]["A Favor"] >  $new_array[$low]["A Favor"]){

                                  $low =  $j;
                                }
                                else if ( $new_array[ $j]["A Favor"] == $new_array[$low]["A Favor"]){
                                           //   c. Si 2 o más equipos quedan empatados según los criterios anteriores entonces
                                            //     i. Mayor número de puntos obtenidos en los partidos entre ellos
                                            //     ii. Mayor diferencia de goles en los partidos entre ellos
                                            //     iii. Número de goles anotados en los partidos entre ellos
                                            //   Nota: en el caso c) cuando se dice "los partidos entre ellos" se refiere a los partidos entre todos
                                            //   los empatados (que pueden ser 2, 3 o 4).
                                        
        
                                }

                        }
                  
                   

                }

              } 
             
            }
              
            // swap the minimum value to $ith node
            if ($i != $low){
              if (  $new_array[ $i]["Puntos"] <   $new_array[ $low]["Puntos"])
               {
                  $tmp = $new_array[ $i];
                  $new_array[ $i] =  $new_array[ $low];
                  $new_array[$low] = $tmp;
               }

            }

        
        }

        return $new_array;
    }

    public function result(){
      //debe devolver la lista de los 4
      //equipos ordenados por clasificación hacia la próxima ronda. El método debe devolver
      //en todo momento la tabla de posiciones actual, incluso aunque no se hayan jugado
      //todos los partidos.

      $score_matrix = array();
      $score_matrix_result = array();
      $counter = 0;
      foreach( $this->groupMatches as $team1 => $matches){
          $score_matrix[$team1] = $counter;
          $score_matrix_result[$team1] = array("Equipo"=>$team1, "Ganados"=>0, "Empates"=>0, "Perdidos"=>0, "A Favor"=>0, "En Contra"=>0, "Diferencia"=>0, "Puntos"=>0);
          $counter += 1;
      }

      ///Compute result in Games

      foreach( $this->groupMatches as $team1 => $matches){
        foreach($matches as  $team2 => $scores ) {
          $scoreTeam1 = $scores[0];
          $scoreTeam2 = $scores[1];
          
          if ($scoreTeam1 > $scoreTeam2){
            $score_matrix_result[$team1]["Ganados"] += 1;
            $score_matrix_result[$team2]["Perdidos"] += 1;
            $score_matrix_result[$team1]["Puntos"] += 3;
        
          }
          else if ($scoreTeam1 == $scoreTeam2){
            $score_matrix_result[$team1]["Empates"] += 1;
            $score_matrix_result[$team2]["Empates"] += 1;

            $score_matrix_result[$team1]["Puntos"] += 1;
            $score_matrix_result[$team2]["Puntos"] += 1;
          }
          else {
            $score_matrix_result[$team1]["Perdidos"] += 1;
            $score_matrix_result[$team2]["Ganados"] += 1;
            $score_matrix_result[$team2]["Puntos"] += 3;
          }

          $score_matrix_result[$team1]["Diferencia"] +=$scoreTeam1 - $scoreTeam2;
          $score_matrix_result[$team2]["Diferencia"] +=$scoreTeam2 - $scoreTeam1;

          $score_matrix_result[$team1]["A Favor"] += $scoreTeam1;
          $score_matrix_result[$team1]["En Contra"] +=$scoreTeam2;

          $score_matrix_result[$team2]["A Favor"] += $scoreTeam2;
          $score_matrix_result[$team2]["En Contra"] +=$scoreTeam1;
        }      
      }


      // Debe utilizarse la siguiente forma de calcular los puntos y determinar el desempate.
      //   a. Formas de ganar puntos
      //     i. Ganar un partido 3 puntos para el ganador
      //     ii. Perder un partido 0 puntos para el perdedor
      //     iii. Empatar un partido 1 punto para cada equipo.
      $score_result_sort =$this->selection_sort( $score_matrix_result);

      $rowHeader = array("Equipo"=>0, "Ganados"=>1,"Empates"=>2,"Perdidos"=>3,"A Favor"=>4,"En Contra"=>5,"Diferencia"=>6,"Puntos"=>7);
      echo "<br/>";
      echo "<h3>Resultados:</h3>";
      echo "<br/>";
      echo "<table>";
      echo "<tr>";
      foreach($rowHeader as $row2 => $topic){
          echo "<td>" . $row2 . "</td>";
      }
      echo "</tr>";
     
      $finalResult = array();
      foreach($score_result_sort as $row) {
          echo "<tr>";
          $rowString = array();       
          foreach($row as $key2=>$row2){
              //echo "<td>" . $row2 . "</td>";
              $rowString[$rowHeader[$key2]] = "<td style=\"text-align:center\">" . $row2 . "</td>";
              if ($key2 == 'Equipo')
                $finalResult[] =  $row2;
          }

          $endRow = "";
          foreach( $rowString  as $cell){
            $endRow  .= $cell;
          }

          echo $endRow;
          echo "</tr>";
      }
      
      echo "</table>";
      return $finalResult;
    }

    

  }
?>