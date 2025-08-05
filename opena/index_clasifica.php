<HTML>
<HEAD><TITLE>Incripcion Open con MySQL</TITLE>
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
		<FONT size="6" color="white">Benidorm Chess Open A - Tabla final</FONT>&nbsp
	</TH>
</TR></TABLE><P>

<?php
  require ("opena.php");	
	
  $mijugador=new jugador();
  
  echo "<CENTER><P>
  		<TABLE border='0' width='600'>
  		<TR>
  		  <TD><FORM name='form3' METHOD='POST' 
  		   		ACTION=\"index_clasifica.php?operacion=genera\">
  		   	<FONT size ='-1'>
  		   	<INPUT TYPE='SUBMIT' NAME='alta' 
  		   		VALUE=\"Genera Premiados\">
  		   	</FONT>
  		   </FORM></TD>
  		   <TD><FORM name='form3' METHOD='POST' 
  		   		ACTION=\"index_premiados.php?operacion=ver\">
  		   	<FONT size ='-1'>
  		   	<INPUT TYPE='SUBMIT' NAME='Ver' 
  		   		VALUE=\"Ver Premiados\">
  		   	</FONT>
  		   </FORM></TD>
  		   <TD>
  		   <FORM name='form3' METHOD='POST' 
  		   		ACTION=\"index_open.php?operacion=listado\">
  		   	<FONT size ='-1'>
  		   	<INPUT TYPE='SUBMIT' NAME='alta' 
  		   		VALUE=\"Jugadores\">
  		   	</FONT>
  		   </FORM>
  		   </TD>
		   <TD>
			 <form action=\"./leerfinalcsv.php\" method=\"post\" >
			 <FONT size ='-1'>
		     <input type=\"submit\" value=\"Importar Clasif. Final\" /></FONT>
		     </form>
		 </TD>
  		</TR></TABLE>";
  	if (isset($_REQUEST["operacion"])){
	   if ($_REQUEST["operacion"]=="alta") {
  	             $puesto=$_REQUEST["nume"];
  	             $id_jugador=$_POST["idjugador"];
  	             $mijugador->alta_clasifica_jugador($puesto,$id_jugador);
					 } //alta 	
		if ($_REQUEST["operacion"]=="borrar") {
		     $mijugador->del_clasifica_jugador($_REQUEST["puesto"],$_REQUEST["nume"]);

	     } //borrar	
	     if ($_REQUEST["operacion"]=="genera"){
	        $mijugador->genera_premio();

	    }

  		}




  $mijugador->clasifica();
	
?>


</BODY>
</HTML>

