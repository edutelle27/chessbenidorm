<?php


  
  function boton_ficticio($caption,$url)
  {
  	return "<TABLE border=1 CELLSPACING=0 CELLPADDING=3 bgcolor=black>
  			<TR><TD bgcolor=\"white\">
  				<FONT size =\"-1\">
  					<A href = \"$url\">$caption</A>
				 </FONT>
			   </TD></TR></TABLE>";
  }
	
	
  class jugador {
  	


  	public $id_conexion;
  	

  //Esto es el constructor	
  function __construct() 
  	{
  	  $DBHost="localhost";
  	  $DBUser="root";
  	  $DBPass="";
  	  $DBMybda="opena1800";
  	  


  	  /* Intentamos establecer una conexión persistente con el servidor.*/
  	  $this->id_conexion = mysqli_connect($DBHost, $DBUser, $DBPass, $DBMybda);
  	   
     //chequeamos la conexion     	  
      if(!$this->id_conexion){
       die ("Fallo en la conexion a MySQL " . mysqli_connect_error());
       } 	
  	 ;
  	}
  	function obtener_nombre()
  	{ 
    ;
  	}
  	function __destruct() //Esto es el destructor
	{ 
	 mysqli_close($this->id_conexion);
	 }

	 


  // Buscar jugadores inscritos
   function buscar($lo_q_busco) {


   	if ($lo_q_busco!="") 
   		$sql_script="SELECT * FROM jugador 
   							WHERE nombre like '%".$lo_q_busco."%' 
   							ORDER BY nombre";
   	else $sql_script = "SELECT * FROM jugador order by ranking asc , elo desc";
   	
   	$resultado = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   		
   	$filas = mysqli_num_rows($resultado);
   	if ($filas==0) { //resultado query vacío
   		echo "<CENTER>
   			<TABLE BORDER=1 WIDTH=650 bordercolorlight='#FFFFFF' 
   				bordercolor='#FFFFFF' bgcolor='#C0C0C0'>
   			<TR><TD ALIGN=CENTER VALIGN=CENTER>
   				<H2>No se encuentra ningún registro</H2>
   			</TD></TR></TABLE></CENTER>";
   	}else //la búsqueda no es vacía
   	
   		echo "<TABLE BORDER='0' cellspacing='1' cellpadding='1' 
						align='center' width='650'>
					<TR>
					   <TH bgcolor='teal'>
							<FONT color='white'>Ranking</FONT>
						</TH>
						<TH bgcolor='teal'>
							<FONT color='white'>IdFide</FONT>
						</TH>
						<TH bgcolor='teal'>
							<FONT color='white'>Nombre</FONT>
						</TH>
						<TH bgcolor='teal'>
							<FONT color='white'>ELO</FONT>
						</TH>
						<TH bgcolor='teal' colspan='4'>
							<FONT color='white'>Operaciones</FONT>
						</TH>
					</TR>";
		while ( $myrow = mysqli_fetch_row($resultado))
		{
			echo "<TR>
			      <TD><FONT size='-1'><B>".$myrow[5]."</B></FONT></TD>
					<TD><FONT size='-1'><B>".$myrow[0]."</B></FONT></TD>
					<TD><FONT size='-1'><B>".$myrow[1]."</B></FONT></TD>
					<TD align='center'><FONT size='-1'><B>".$myrow[2]."</B></FONT></TD> 
					<TD>".
						 boton_ficticio("Consulta","index_open.php?operacion=
							introduce&ver=1&nume=".$myrow[0]."#ancla")."</TD>
					<TD>".
						 boton_ficticio("Editar","index_open.php?operacion=
							introduce&ver=2&nume=".$myrow[0]."#ancla")."</TD>
					<TD>".
						 boton_ficticio("Borrar","index_open.php?operacion=
							borrar&nume=".$myrow[0]."#ancla")."</TD><TD>".
						 boton_ficticio("Premios","index_premio.php?nume=".$myrow[0])."</TD>
				</TR>";
		}
		echo "</TABLE><BR>";
		$num_jugadores=$this->num_jugadores();
		$num_alojados=$this->num_alojados();
		$num_valencianos=$this->num_valencianos();
		echo " Participantes: ".$num_jugadores." - "." Alojados: ".$num_alojados." - "." C.Val: ".$num_valencianos."<BR>";
		
 }//END function Buscar jugadores
		
function introduce($id_to_edit, $ver) {
    		// ver = 1 -- modo consulta
    		// ver = 2 modo edicion - modificar
    		// ver = 0 modo alta
   	 $campos=array(	
    	   0=>array(0=>"idjugador",1=>"Fide ID",2=>8, 3=>8, 4=>""),
    	   1=>array(0=>"nombre",1=>"Nombre",2=>30, 3=>30, 4=>""),
    	   2=>array(0=>"elo",1=>"ELO",2=>4, 3=>4, 4=>""),


    	   3=>array(0=>"origen",1=>"Origen",2=>3, 3=>3, 4=>""),
    	   4=>array(0=>"hotel",1=>"Alojado Hotel",2=>1, 3=>1, 4=>""),
    	   5=>array(0=>"ranking",1=>"Ranking",2=>3, 3=>3, 4=>"")

				 );
				 
		//Modo consulta o modo modificación		 
		  if ( ($ver==1) || ($ver==2)) {
    	 	$sql_script = "SELECT idjugador,nombre,elo,origen,hotel,ranking

    	 			FROM jugador where idjugador='$id_to_edit'";
    	 			
    	 	$resultado = mysqli_query($this->id_conexion, $sql_script)
    			or die ("<CENTER><H2>Error al consultar la base 
    					de datos.</H2></CENTER>");
    					
    		$filas = mysqli_num_rows($resultado);
    		if ($filas==0) { //resultado query vacío
    	  	echo "<CENTER>
    	  		<TABLE BORDER=1 WIDTH=600 bordercolorlight='#FFFFFF' 
    	  				bordercolor='#FFFFFF' bgcolor='#C0C0C0'>
    	  		<TR><TD ALIGN=CENTER VALIGN=CENTER>
    	  			<H2>No se encuentra ningún registro</H2>
    	  		</TD></TR></TABLE></CENTER>";
    		}
    		else
    		 if ($filas==1)
    		 //la búsqueda no es vacía , debe dar 1 fila relleno indice 4 con datos
    		{
    			$myrow = mysqli_fetch_row($resultado);
    			for ($i=0; $i < count($campos); $i++)
    				$campos[$i][4]=$myrow[$i];
   		
    		
    		// Si es modo modificación monto un formulario

    		if ($ver==2) 
    		   echo "<FORM name='form9' method='post' 
    				action=\"index_open.php?operacion=exec_mod\">";
    	  // fin modo modificacion
    	  
    	           
    	  	// en cualquier caso creo tabla indpdte del modo
    	    echo "<TABLE BORDER='0' cellspacing='10' cellpadding='0' 
    				align='center' width='600'>";
    				
    	    for ($i=0; $i < count($campos); $i++){
    	
       		echo "<TR><TD bgcolor='teal' align=center width=140>
    			<FONT size=-1 color='white'>".$campos[$i][1]."</FONT>
    			</TD><TD>";
    			

    			if ($ver==1) // Modo consulta los muestro
    		     { echo "<FONT size=-1><B>". $campos[$i][4]."</B></FONT>";
    	          echo "</TD> </TR>"; }
    	          
    	      if ($ver==2) // Formulario modo modificación
    	      { 
    	         if ($campos[$i][0]=="hotel")
    		      {
    		        if ($campos[$i][4]=='S') 
    		     	  {echo "<input type='radio' name='".$campos[$i][0]."' value = 'S' CHECKED> Si ";
    		     	   echo "<input type='radio' name='".$campos[$i][0]."' value = 'N'> No";}
    		      	else if  ($campos[$i][4]=='N') 
    		     	  {echo "<input type='radio' name='".$campos[$i][0]."' value = 'S'> Si ";
    		     	   echo "<input type='radio' name='".$campos[$i][0]."' value = 'N' CHECKED> No";}
    		     	else 
    		     	  {  echo "<input type='radio' name='".$campos[$i][0]."' value = 'S'> Si ";
    		     	     echo "<input type='radio' name='".$campos[$i][0]."' value = 'N'> No";}
    	         }
    	         else 
    	           if (($campos[$i][0]=="elo") or ($campos[$i][0]=="ranking")) {
    	            echo "<input type='number' name='".$campos[$i][0]."' 
    					size='".$campos[$i][2]."' value = \"".$campos[$i][4].
    					"\" maxlength='".$campos[$i][3]."'>"; } //campo numérico
    				else {
    				   echo "<input type='text' name='".$campos[$i][0]."' 
    					size='".$campos[$i][2]."' value = \"".$campos[$i][4].
    					"\" maxlength='".$campos[$i][3]."'>";}	
    			
    			echo "</TD> </TR>";}		    					
    		} // end for

         echo "</TABLE><CENTER>";
         
         // cierro tabla
      // Si es modificacion
      if ($ver==2) {
    		echo "<INPUT type='hidden' NAME='id' value = '$id_to_edit'>";

    			echo "<INPUT TYPE='SUBMIT' NAME='pulsa' 
    					VALUE=\"Modificar jugador\">";
    		echo "</CENTER>";
    		echo "</FORM>"; }
    	} // end if filas=1
    }//end if ver==1 o 2	tipo consulta o modifica
    
    					
    	// Si es alta programo todo por legibilidad
    	// separo codigo aunque sea redundante al anterior en varias partes				
    	if ($ver==0) {
    	    echo "<FORM name='form10' method='post' 
    				action=\"index_open.php?operacion=exec_alta\">";
    		 echo "<TABLE BORDER='0' cellspacing='10' cellpadding='0' 
    				align='center' width='600'>";
    				
         for ($i=0; $i < count($campos); $i++){
    	
       		echo "<TR><TD bgcolor='teal' align=center width=140>
    			<FONT size=-1 color='white'>".$campos[$i][1]."</FONT>
    			</TD><TD>"; 
    	         if ($campos[$i][0]=="hotel")
    		      {
    		        if ($campos[$i][4]=='S') 
    		     	  {echo "<input type='radio' name='".$campos[$i][0]."' value = 'S' CHECKED> Si ";
    		     	   echo "<input type='radio' name='".$campos[$i][0]."' value = 'N'> No";}
    		      	else if  ($campos[$i][4]=='N') 
    		     	  {echo "<input type='radio' name='".$campos[$i][0]."' value = 'S'> Si ";
    		     	   echo "<input type='radio' name='".$campos[$i][0]."' value = 'N' CHECKED> No";}
    		     	else 
    		     	  {  echo "<input type='radio' name='".$campos[$i][0]."' value = 'S'> Si ";
    		     	     echo "<input type='radio' name='".$campos[$i][0]."' value = 'N'> No";}
    	         }
    	         else 
    	           if (($campos[$i][0]=="elo") or ($campos[$i][0]=="ranking")){
    	            echo "<input type='number' name='".$campos[$i][0]."' 
    					size='".$campos[$i][2]."' value = \"".$campos[$i][4].
    					"\" maxlength='".$campos[$i][3]."'>"; } //campo numérico
    				else {
    				   echo "<input type='text' name='".$campos[$i][0]."' 
    					size='".$campos[$i][2]."' value = \"".$campos[$i][4].
    					"\" maxlength='".$campos[$i][3]."'>";}	 
    			echo "</TD> </TR>";   					
    		} // end for


            echo "</TABLE><CENTER>";


    		   echo "<INPUT TYPE='SUBMIT' NAME='pulsa' 
    					VALUE=\"Alta jugador\">"; 			



    	     echo "</FORM>";
    	   
    	   } // fin ver = 0
    	   		      
   }	// fin introduce	
   
   function mod_jugador ($id, $nombre, $elo,$club,$hotel,$ranking) 
	{


	    $sql_script = "UPDATE jugador SET 
	    					nombre='$nombre',  
		    				elo='$elo', 
	    					origen='$club', 
	    					hotel='$hotel',
	    					ranking='$ranking'
	    				   WHERE idjugador=$id";
	     $resultado = mysqli_query($this->id_conexion,$sql_script); 				
	   } //end mod_jugador modificacion
	    				
	//Elimina jugador y premios a los que opta--preparar
	function del_jugador($id_to_del) {
	

    		$sql_script = "delete FROM jugador where idjugador=$id_to_del";
    		$resultado = mysqli_query($this->id_conexion,$sql_script);    		
    			
      }
      




   // Añadir un jugador a la lista
   

	function add_jugador ($id, $nombre,$elo,$club,$hotel,$ranking) 
	{
	  

    	  $sql_script = "INSERT INTO jugador (idjugador,nombre,elo,origen,hotel,ranking)
    	  				VALUES('$id','$nombre','$elo','$club','$hotel','$ranking')";	  					
    	$resultado = mysqli_query($this->id_conexion,$sql_script);
    }
    
    //end add_jugador Alta
    
    // Funcion principal de optapremio
    function premio($id_jugador)
	{
	   $sql_script="SELECT p.idpremio,p.nombre FROM optapremio op,premio p 
   	WHERE op.idpremio= p.idpremio and op.idjugador=".$id_jugador." order by prioridad asc";
   	
   	//$sql_script="SELECT p.idpremio,p.nombre FROM optapremio op,premio p 
   	//WHERE op.idpremio= p.idpremio and op.idjugador=$id_jugador";
   	$resultado = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   		
   	$filas = mysqli_num_rows($resultado);
   	if ($filas==0) { //resultado query vacío
   		echo "<CENTER>
   			<TABLE BORDER=1 WIDTH=650 bordercolorlight='#FFFFFF' 
   				bordercolor='#FFFFFF' bgcolor='#C0C0C0'>
   			<TR><TD ALIGN=CENTER VALIGN=CENTER>
   				<H2>No se encuentra ninguna fila</H2>
   			</TD></TR></TABLE></CENTER>";
   	}else //la búsqueda no es vacía
   	
   		echo "<TABLE BORDER='0' cellspacing='1' cellpadding='1' 
						align='center' width='650'>
					<TR>
						<TH bgcolor='teal'>
							<FONT color='white'>Modalidad</FONT>
						</TH>
						<TH bgcolor='teal'>
							<FONT color='white'>Operaciones</FONT>
						</TH>
					</TR>";
		while ( $myrow = mysqli_fetch_row($resultado))
		{
			echo "<TR>
					<TD><FONT size='-1'><B>".$myrow[1]."</B></FONT></TD> 
					<TD align='center'>".
						 boton_ficticio("Borrar","index_premio.php?operacion=
							borrar&id_prem=".$myrow[0]."&nume=".$id_jugador)."</TD>
				</TR>";
		}
		
		// Incorporo Alta en la última fila de la página tras mostrar todos los premios
		// a los que opta el jugador
		
		echo "<TR><FORM name=\"form2\" method=\"post\" action=\"index_premio.php?operacion=alta&nume=$id_jugador\">"; 					
            
      $sql_query = "SELECT idpremio,nombre from premio where idpremio not in (select idpremio from optapremio where idjugador=$id_jugador)";
			 
			$resultado2 = mysqli_query($this->id_conexion,$sql_query);
			echo "<TD><SELECT NAME=\"id_pre\">";
			
			while ( $myrow = mysqli_fetch_row($resultado2))
			{
			echo "<OPTION VALUE=\"$myrow[0]\">$myrow[1]</OPTION>";}
			
			echo "</SELECT></TD><TD colspan=\"2\"><INPUT TYPE=\"SUBMIT\" NAME=\"pulsa\"  VALUE=\"Agregar premio\"></TD>
				</FORM></TR>";
			
		echo "</TABLE>";
		
		 mysqli_free_result($resultado);
		
		
	}	// fin función premio
						
  function alta_optapremio_jugador($id_premio,$id_jugador) {
    	$sql_script = "INSERT INTO optapremio(idjugador,idpremio) VALUES('$id_jugador', '$id_premio')";
    	$resultado = mysqli_query($this->id_conexion,$sql_script);
    	//mysqli_free_result($resultado);
    }	// fin alta_premio_jugador
    
    
    // Pulsar auto y se generan auto los optapremios del jugador
    function alta_auto_optapremio($id_jugador) {
       
    	$sql_script = "SELECT idjugador,nombre,elo,origen,hotel FROM jugador WHERE idjugador=$id_jugador";    		
   	$resultado = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>"); 					   		
   	$filas = mysqli_num_rows($resultado);
   	
   	// encuentra jugador
   	if ($filas==1)
           { 
             $mijug = mysqli_fetch_row($resultado);
             $sql_script1 = "SELECT idpremio,tipo,maxelo FROM premio";
             $datos1 = mysqli_query($this->id_conexion,$sql_script1) 
             or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   			 while( $myrow = mysqli_fetch_row($datos1))
   	       { if ($myrow[1]=="ELO")
   	            if ($mijug[2] < $myrow[2])
   	             $this->alta_optapremio_jugador($myrow[0],$mijug[0]);		 
   			   if ($myrow[1]=="VAL")
   	              if ($mijug[3]=="VAL")
   	                 $this->alta_optapremio_jugador($myrow[0],$mijug[0]);
   	         if ($myrow[1]=="HOT")
   	              if ($mijug[4]=='S')
   	                 $this->alta_optapremio_jugador($myrow[0],$mijug[0]);
              } // fin while  	
       }// fin filas  	
    	
    }	// fin alta_auto_optapremio
    
   // Genera de forma automática la tabla optapremio de todos los jugadores 
    function genera_auto_optapremio()
    {
      $this->del_todo_optapremio();
      $sql_script = "SELECT idjugador FROM jugador";    		
   	$resultado = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>"); 					   		

      while ($mifila = mysqli_fetch_row($resultado))
         $this->alta_auto_optapremio($mifila[0]);    	
   }
    
    //Borrar premio que opta el  jugador
    function del_todo_optapremio() {
    		$sql_script = "delete FROM optapremio";
    		$datos1 = mysqli_query($this->id_conexion,$sql_script);			

    }// Fin borra todo opta premio
    
    //Borrar premio que opta el  jugador
    function del_optapremio_jugador($id_premio,$id_jugador) {
    		$sql_script = "delete FROM optapremio where idpremio='$id_premio' and idjugador=$id_jugador";
    		$datos1 = mysqli_query($this->id_conexion,$sql_script);    			

    }// Fin borra opta premio
 
 // devuelve nombre del jugador
 function nom_jugador($id_jugador)
	{ 
	  $sql_script="SELECT nombre FROM jugador where idjugador=$id_jugador";
	  
	  
   	$datos1 = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   		
   	$filas = mysqli_num_rows($datos1);
   	if ($filas==0) { //resultado query vacío
   		echo "<CENTER>
   			<TABLE BORDER=1 WIDTH=650 bordercolorlight='#FFFFFF' 
   				bordercolor='#FFFFFF' bgcolor='#C0C0C0'>
   			<TR><TD ALIGN=CENTER VALIGN=CENTER>
   				<H2>No se encuentra ninguna fila</H2>
   			</TD></TR></TABLE></CENTER>";
   	}else //la búsqueda no es vacía
   	 {	
		  $myrow = mysqli_fetch_row($datos1);
   	  return ($myrow[0]);
		}
		 
   }	// fin función nom_jugador
  

 function datos_jugador($id_jugador)
	{
	  $sql_script="SELECT nombre,elo,origen,hotel FROM jugador where idjugador=$id_jugador";
	  

   	$datos1 = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   		
   	$filas = mysqli_num_rows($datos1);
   	if ($filas==0) { //resultado query vacío
   		echo "<CENTER>
   			<TABLE BORDER=1 WIDTH=650 bordercolorlight='#FFFFFF' 
   				bordercolor='#FFFFFF' bgcolor='#C0C0C0'>
   			<TR><TD ALIGN=CENTER VALIGN=CENTER>
   				<H2>No se encuentra ninguna fila</H2>
   			</TD></TR></TABLE></CENTER>";
   	}else //la búsqueda no es vacía
   	 {	
		  $myrow = mysqli_fetch_row($datos1);
		  $cadena = $myrow[1]." - ".$myrow[2]." - ".$myrow[3];
   	  return ($cadena);
		}
 }	// fin función datos_jugador
 


function num_jugadores()
	{
	$num_jugadores=0;
	  $sql_script="SELECT count(*) FROM jugador";


   	$datos1 = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   	$num_filas=mysqli_num_rows($datos1);
   	if ($num_filas==1){
   	   $myrow = mysqli_fetch_row($datos1);
   	   $num_jugadores=$myrow[0]; }
   	 return ($num_jugadores);				
   } 	// fin función num_jugadores
   
   
function num_alojados()
	{
	$num_alojados=0;
	  $sql_script="SELECT count(*) FROM jugador where hotel='S'";


   	$datos1 = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   	$num_filas=mysqli_num_rows($datos1);
   	if ($num_filas==1){
   	   $myrow = mysqli_fetch_row($datos1);
   	   $num_alojados=$myrow[0]; }
   	 return ($num_alojados);				
   } 	// fin función num_alojados
   
   function num_valencianos()
	{
	$num_val=0;
	  $sql_script="SELECT count(*) FROM jugador where origen='VAL'";


   	$datos1 = mysqli_query($this->id_conexion,$sql_script)
   		or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   	$num_filas=mysqli_num_rows($datos1);
   	if ($num_filas==1){
   	   $myrow = mysqli_fetch_row($datos1);
   	   $num_val=$myrow[0]; }
   	 return ($num_val);				
   } 	// fin fun

//Funcion principal clasificacion
function clasifica()
	{
	 
	   $sql_script="SELECT puesto,j.idjugador,nombre FROM clasifica c,jugador j 
   							WHERE c.idjugador=j.idjugador  order by puesto asc";
   	   $datos1 = mysqli_query($this->id_conexion,$sql_script);
   					
      	
   	$filas = mysqli_num_rows($datos1);
   	echo "<TABLE BORDER='0' cellspacing='1' cellpadding='1' 
						align='center' width='650'>
					<TR>
					<TH bgcolor='teal'>
							<FONT color='white'>Puesto</FONT>
					</TH>
					<TH bgcolor='teal'>
							<FONT color='white'>Jugador</FONT>
						</TH>
						<TH bgcolor='teal'>
							<FONT color='white'>ELO - Origen - Hotel</FONT>

						</TH>
						<TH bgcolor='teal' colspan='3'>
							<FONT color='white'>Operaciones</FONT>
						</TH>
					</TR>";
					
   	if ($filas==0) $puesto = 1;
   	else 
   	 {
   	  $sql_script1="SELECT MAX(puesto) FROM clasifica";
   	  $datos3 = mysqli_query($this->id_conexion,$sql_script1);
   	  $mifila1 = mysqli_fetch_row($datos3);
   	  $puesto=$mifila1[0]+1;
   	  mysqli_free_result($datos3);
   	     	   		

	     while ( $myrow = mysqli_fetch_row($datos1))
		   {
		   $cadena= $this->datos_jugador($myrow[1]);
			echo "<TR>
	        <TD><FONT size='-1'><B>".$myrow[0]."</B></FONT></TD>		

					<TD><FONT size='-1'><B>".$myrow[2]."</B></FONT></TD>
					<TD><FONT size='-1'><CENTER><B>".$cadena."</B></CENTER></FONT></TD>
					<TD align='center'>".
						 boton_ficticio("Borrar","index_clasifica.php?operacion=
							borrar&puesto=".$myrow[0]."&nume=".$myrow[1])."</TD></TR>";
				
		  } // fin while
		} // fin else
		
		echo "<TR><TD></TD><FORM name=\"form2\" method=\"post\" action=\"index_clasifica.php?operacion=alta&nume=$puesto\">"; 					
            
      $sql_query = "SELECT idjugador,nombre from jugador where idjugador not in (select c.idjugador from clasifica c) order by nombre asc";
			 
			$datos2 = mysqli_query($this->id_conexion,$sql_query);
			echo "<TD><SELECT NAME=\"idjugador\">";
			
			while ( $mifila = mysqli_fetch_row($datos2))
			{
			echo "<OPTION VALUE=\"$mifila[0]\">$mifila[1]</OPTION>";}
			
			echo "</SELECT></TD><TD colspan=\"2\"><INPUT TYPE=\"SUBMIT\" NAME=\"pulsa\"  VALUE=\"Agregar jugador\"></TD>
				</FORM></TR>";
				
				
		echo "</TABLE>";
		
		echo "<TABLE BORDER=\"0\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\" width=\"500\">
				<TR><TD valign=top align=right><TABLE border=1 CELLSPACING=0 CELLPADDING=3>
				 <TD>
				 <a href = \"./premiospdf2.php\"><FONT color=#990000>Imprimir Premios</FONT></a> 
			   </TD></TR></TABLE></TABLE>";
		 mysqli_free_result($datos1);
		 mysqli_free_result($datos2);
	}	// fin función clasifica					

function import_clasifica($puesto,$ranking)
  {
     $sql_script = "SELECT idjugador FROM jugador where ranking=$ranking";
     $datos1 = mysqli_query($this->id_conexion,$sql_script);
     if ($mifila1 = mysqli_fetch_row($datos1))
      {$this->alta_clasifica_jugador($puesto,$mifila1[0]);}  
   } 
   
  function alta_clasifica_jugador($puesto,$id_jugador) {
    	 $sql_script = "INSERT INTO clasifica(puesto,idjugador) VALUES($puesto,$id_jugador)";
    	 $datos1 = mysqli_query($this->id_conexion,$sql_script);
    	 //mysqli_free_result($datos1);
    }	// fin alta_clasificacion_jugador
    
 //Borrar puesto en la clasificacion
 function del_clasifica_jugador($puesto,$id_jugador) {
       $sql_script = "delete FROM clasifica where puesto=$puesto and idjugador=$id_jugador";
    	 $datos1 = mysqli_query($this->id_conexion,$sql_script);    			
    	 // @mysql_free_result($this->datos1);
    }//fin del_clasifica_jugador
    
    // módulo principal de generación de premios
 function genera_premio()
 {
   $sql_query1="UPDATE cuadropremio SET idjugador=''";
   $datos2=mysqli_query($this->id_conexion,$sql_query1);
    // mysqli_free_result($datos2);
   
	 $sql_query="SELECT puesto,idjugador from clasifica order by puesto asc";
	 $datos1=mysqli_query($this->id_conexion,$sql_query);
	 $filas = mysqli_num_rows($datos1);


   	while ($myrow=mysqli_fetch_row($datos1))
   	{
   	   $id_jugador=$myrow[1];
         $indice=$myrow[0]; 	  
			$jugador[$indice]=$id_jugador;
   	}
	 mysqli_free_result($datos1);
	 
	 for ($i=1;$i<=$filas;$i++)
	 {
	   $v_jugador=$jugador[$i];
	   $this->asigna_premio($v_jugador);
	 }
	 
	} // fin genera premios
	
	

	function asigna_premio($p_jugador)
  {
  
  // Premios a los que opta
  // He ordenado la tabla premio por prioridad 
     $sql_query="SELECT o.idpremio from optapremio o,premio p where o.idjugador='$p_jugador' and o.idpremio=p.idpremio order by p.prioridad,o.idpremio asc";
	  $datos1=mysqli_query($this->id_conexion,$sql_query);
     $filas = mysqli_num_rows($datos1);

  // si hay filas entonces entonces hago la operativa completa- hay jugadores que no optan a nada
  // por castigo
     	
   	if ($filas > 0)
   	{
 //Inicializo variables
                $ant_puesto=0;
                $ant_premio=0;
                $ant_importe=0;
                
// Asigno primer premio al que opta el jugador     
// mientras el jugador opte por premios
                 while ($myrow=mysqli_fetch_row($datos1))
                {
                $i_idpre=$myrow[0];
// Leer de Cuadro Premios las vacantes ordenado según prioridad 
      $sql_query1="SELECT c.idpremio,c.orden,c.valor,c.idjugador from cuadropremio c where c.idpremio='$i_idpre' and c.idjugador='' order by c.idpremio,c.orden asc";

							 $datos2=mysqli_query($this->id_conexion,$sql_query1);
// si existe vacante 
                 if ($mifila=mysqli_fetch_row($datos2))
                   { 
// Obtengo importe actual
                     $importe_actual=$mifila[2];
                     if ( $importe_actual > $ant_importe)
                     { 
                       $ant_puesto=$mifila[1];
                       $ant_premio=$mifila[0];
                       $ant_importe=$importe_actual;
                     } //del if 2
                   } // del if 1
            
                 } // del while principal
                 
								     
                 if (($ant_premio <> 0) and ($ant_puesto<>0) )
                 {
                    
                    $sql_script = "UPDATE cuadropremio SET 
	    					idjugador='$p_jugador'
								WHERE idpremio=$ant_premio and orden=$ant_puesto";
                     $datos3= mysqli_query($this->id_conexion,$sql_script);  
                 }
           
	   } // fin if filas

	} // funcion asigna
	
	 
function premiados()
	{
	 
	   $sql_script="SELECT p.nombre,c.orden,c.idjugador,c.valor FROM cuadropremio c,premio p 
   							WHERE c.idpremio=p.idpremio  and not(c.idjugador='') order by c.idpremio,c.orden asc";
   	$datos1 = mysqli_query($this->id_conexion,$sql_script)
   	or die ("<CENTER><H2>Error al consultar la base de datos.</H2></CENTER>");
	
   	$filas = mysqli_num_rows($datos1);
   	if ($filas>=1) {
   	echo "<TABLE BORDER='0' cellspacing='1' cellpadding='1' 
						align='center' width='650'>
					<TR>
					<TH bgcolor='teal'>
							<FONT color='white'>Modalidad</FONT>
					</TH>
					<TH bgcolor='teal'>
							<FONT color='white'>Orden</FONT>
						</TH>
						<TH bgcolor='teal'>
							<FONT color='white'>Nombre</FONT>

						</TH>
						<TH bgcolor='teal'>
							<FONT color='white'>Euros</FONT>
						</TH>
						<TH bgcolor='teal' colspan='3'>
							<FONT color='white'>Id.Fide - ELO - Origen - Hotel</FONT>
						</TH>
					</TR>";
					   	     	   		

	     while ( $myrow = mysqli_fetch_row($datos1))
		   {
		   $cadena= $this->datos_jugador($myrow[2]);
		   $nombre= $this->nom_jugador($myrow[2]);
			echo "<TR>
	        <TD><FONT size='-1'><B>".$myrow[0]."</B></FONT></TD>		

					<TD><FONT size='-1'><CENTER><B>".$myrow[1]."</B></CENTER></FONT></TD>
					<TD><FONT size='-1'><B>".$nombre."</B></FONT></TD>
               <TD><FONT size='-1'><CENTER><B>".$myrow[3]."</B></CENTER></FONT></TD>					
					<TD><FONT size='-1'><CENTER><B>".$myrow[2]." - ".$cadena."</B></CENTER></FONT></TD></TR>";

		  } // fin while

		
				
		echo "</TABLE>";

			   
		 mysqli_free_result($datos1);
		 } // fin if
		 	 

	}	// fin función premiados
						
function actualizar_ranking()
	 {
	   $sql_script = "SELECT * FROM jugador order by elo desc";
	   $resultado = mysqli_query($this->id_conexion,$sql_script)
	   or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
	   $filas = mysqli_num_rows($resultado);
   	if ($filas==0) { //resultado query vacío
   		echo "<CENTER>
   			<TABLE BORDER=1 WIDTH=650 bordercolorlight='#FFFFFF' 
   				bordercolor='#FFFFFF' bgcolor='#C0C0C0'>
   			<TR><TD ALIGN=CENTER VALIGN=CENTER>
   				<H2>No se encuentra ningún registro</H2>
   			</TD></TR></TABLE></CENTER>";
   	}else //la búsqueda no es vacía
          { $ranking=1;
            while ($myrow = mysqli_fetch_row($resultado))
            { $sql_script2 = "UPDATE jugador set ranking=$ranking where idjugador=$myrow[0]";
              $datos=mysqli_query($this->id_conexion,$sql_script2);
              $ranking=$ranking+1; } //fin while
           }//fin else    	
	   }// fin funcion
	 		   

function imprime_premiados()
{ 
  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Times','',12);
  $pdf->Cell(0,10,'Imprimiendo Nombre ',0,1);



  $pdf->Output();

 }
		   

} //fin clase
	










?>



