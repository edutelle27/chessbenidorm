<html>
  	<head>
  	 <title>
  	   Recibo datos del fichero . csv
  	 </title>
  	</head>

 <body>
  	 <?php 
  	 
  	  require "openb.php";
  	  $fila=5;
  	  if (($gestor = fopen("./importar/iniciotorneo.csv","r")) !== FALSE) {

  	  while (($datos=fgetcsv($gestor,1000,";"))!== FALSE) {
        $numero=count($datos);
        echo "<p> $numero de campo en la fila: $fila <br /></p> \n";
      
       // $j=localizar_cabecera($datos,$fila,$ind_idfide,$ind_nombre,$ind_elo,$ind_club);
       // calcular ind_idfide,ind_nombre,ind_elo,ind_club
       
          $ind_ranking=0;
          $ind_idfide=5;
          $ind_nombre=2;
          $ind_elo=4;
          $ind_club=6;
          $ind_info=7;      
       // $fila=$j+1;        

        
        $fila++;
                
        for ($i=0;$i<$numero;$i++) { 
          
           echo "Indice: $i ".$datos[$i]."<br />\n";
           if ($i==$ind_ranking)
              { $ranking=$datos[$i];}
           if ($i==$ind_idfide)
              { $idfide=$datos[$i];}
           if ($i==$ind_nombre)
              { $nombre=$datos[$i];}
           if ($i==$ind_elo)
              { $elo=$datos[$i];}
           if ($i==$ind_club)
              { $club=$datos[$i];}
              //modifico esta parte ya que el árbitro ha introducido 
              // datos en la columna info - CV ; H; CVH
           if ($i==$ind_info)
               {   echo "Indice: $i ".$datos[$i]."<br />\n";
                   $alojado='N';
                   // me curo en salud hay clubs que valen VAL
                   // pero no son de Valencia
               if ($club=="VAL") $club="XXX";
               if  (strpos($datos[$i],'H')== true) $alojado='S';
               if  (strpos($datos[$i],'CV')== true) $club="VAL";
               }
               
          } // cierro for 
           
           if ($fila>=7 and is_numeric($ranking)) {

             $player = new jugador();  

             $player->add_jugador($idfide,$nombre,$elo,$club,$alojado,$ranking);

            } // if

          } // while
  	    fclose($gestor);
  	    echo "Total de jugadores:".$player->num_jugadores();
  	  }  //if 
   ?>
  </body>
 </hmtl> 	 