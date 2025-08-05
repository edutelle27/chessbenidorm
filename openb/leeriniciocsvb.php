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

  	  while (($datos=fgetcsv($gestor,1000,","))!== FALSE) {
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
              
              // En este open B diferencia del B en info se guarda
              // En este open B de momento se guarda en info
              // "P" PHCV" "HCV" "CV" "PCV" "S-1800 PCV" "S-1600 CV" 
              // este tipo de combinaciones

            if ($i==$ind_info)
            { 
               $alojado='N';

               // en el open b han incorporado etiquetas en info
               // if (($datos[$i]=="H") or ($datos[$i]=="PH")) $alojado='S';
               // if  (($datos[$i]=="CV") or ($datos[$i]=="PCV")) $club="VAL";
               // if (($datos[$i]=="HCV") or ($datos[$i]=="PHCV")){$club="VAL";$alojado='S';}

               // en el open b han incorporado etiquetas en info ejemplo: S-1800 PHCV
               if (strpos($datos[$i],"H")) $alojado='S';
               if (strpos($datos[$i],"CV")) $club="VAL";

            } // if
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