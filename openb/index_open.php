<HTML>
<HEAD><TITLE>Incripcion Open 2021 Sub 2000ccon MySQL</TITLE>
	<STYLE  TYPE="text/css">
		<!--
		input
			{
			font-family : Arial, Helvetica;
			font-size : 14;
			color : #000033;
			font-weight : normal;
   			border-color : #999999;
   			border-width : 1;
   			background-color : #FFFFFF;
			}
		-->
	</style>

</HEAD>

<BODY bgcolor="#C0C0C0" link="teal" vlink="teal" alink="teal">
<BASEFONT face="arial, helvetica">

<TABLE border="0" align="center" cellspacing="3" cellpadding="3" width="650">
<TR>
	<TH colspan="2" width="100%" bgcolor="teal">&nbsp;
		<FONT size="6" color="white"> Benidorm Chess Open B - Sub 2000</FONT>&nbsp
	</TH>
</TR></TABLE><P>

<?php
 require ("openb.php");	

 $mijugador=new jugador();


  echo "<CENTER><P>
  		<TABLE border='0' width='600'>
  		<TR>
  		   <TD valign=top align=left>
  		   <FORM name='form1' METHOD='POST' 
  		   		ACTION=\"index_open.php?operacion=buscar\">
  		   	<FONT size ='-1'>
  		   		Buscar contacto por nombre<BR>";
  		   	if (!isset($lo_q_busco)) $lo_q_busco="";
  		   	echo "<INPUT TYPE='TEXT' NAME='lo_q_busco' 
  		   		value='$lo_q_busco' size='20'> ";
  		   	echo "<INPUT TYPE='SUBMIT' NAME='boton_buscar' 
  		   		VALUE=\"Buscar!\">
  		   	</FONT>
  		   </FORM>
  		   </TD><TD>
  		   <FORM name='form2' METHOD='POST' ACTION=
  		   		\"index_open.php?operacion=introduce&ver=0
  		   		&nume=0#ancla\">
  		   	<FONT size ='-1'>
  		   	<BR><INPUT TYPE='SUBMIT' NAME='alta' 
  		   			VALUE=\"Alta\"></FONT>
  		   </FORM>
  		   </TD>
  		   <TD>
  		   <FORM name='form3' METHOD='POST' ACTION=
  		   		\"index_open.php?operacion=introduce&ver=3#ancla\">
  		   	<FONT size ='-1'>
  		   	<BR><INPUT TYPE='SUBMIT' NAME='optapremio' 
  		   			VALUE=\"Gen OptaPremio\"></FONT>
  		   </FORM>
  		   </TD>
  		    <TD>
		      <form action=\"./index_clasifica.php\" method=\"post\" >
		      <FONT size ='-1'><BR>
            <input type=\"submit\" value=\"Clasif. Final\" /></FONT>
            </form>
          </TD>
  		</TR>
		</TABLE>";	
			
	if (isset($_REQUEST["operacion"])){
	 if ($_REQUEST["operacion"]=="buscar") 
			$mijugador->buscar($_POST["lo_q_busco"]);


	 if ($_REQUEST["operacion"]=="listado") $mijugador->buscar("");
	

	 if ($_REQUEST["operacion"]=="introduce") 
	   { 
	      //ver=0 Alta ver==1 Consulta; ver==2 Modificacion

	      if ($_REQUEST["ver"]==0 or $_REQUEST["ver"]==1 or $_REQUEST["ver"]==2) 
	      { $caption="Datos del jugador";
	        echo "<A><NAME='ancla'></A>
	            <FONT color='teal'>$caption</FONT>";
	        $mijugador->introduce($_REQUEST["nume"], $_REQUEST["ver"]); }
	      if ($_REQUEST["ver"]==3) 
	      { 

	        $mijugador->genera_auto_optapremio(); }
  


	  } // fin introduce
	  

	   if ($_REQUEST["operacion"]=="exec_mod") 
	   { 
	      if ($_POST["nombre"]=="") 
			echo "<CENTER>No se puede realizar la operación: el 
				campo 'Nombre' es obligatorio.</CENTER><P>";
		else {
			$mijugador->mod_jugador($_POST["idjugador"], $_POST["nombre"], $_POST["elo"],$_POST["origen"],$_POST["hotel"],$_POST["ranking"]);

			$caption="modificado";
			echo "<P><CENTER><FONT color='teal'>
				Se ha $caption correctamente el jugador: 
				".$_POST["nombre"]."</FONT></CENTER><P>";
		     }

	    } // fin exec_mod -- Modo edición modifcando
	    
	    if ($_REQUEST["operacion"]=="exec_alta") {
  		if (($_POST["idjugador"]=="") || ($_POST["nombre"]=="")) 
			echo "<CENTER>No se puede realizar la operación: el 
				campo 'Nombre' es obligatorio.</CENTER><P>";
		else {
			$mijugador->add_jugador($_POST["idjugador"], $_POST["nombre"], $_POST["elo"],$_POST["origen"],$_POST["hotel"],$_POST["ranking"]);
	      $caption="dado de alta";
			echo "<P><CENTER><FONT color='teal'>
				Se ha $caption correctamente el jugador: 
				".$_POST["nombre"]."</FONT></CENTER><P>";
		}
	} 
	   if ($_REQUEST["operacion"]=="borrar")     


		{ 
           $mijugador->del_jugador($_REQUEST["nume"]);
		  }	 
	}
	
?>


</BODY>
</HTML>

