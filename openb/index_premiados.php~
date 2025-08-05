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
		<FONT size="6" color="white">Benidorm Chess Open B - Premiados</FONT>&nbsp
	</TH>
</TR></TABLE><P>

<?php
  require ("openb.php");	
	
  $mijugador=new jugador();
  
  echo "<CENTER><P>
  		<TABLE border='0' width='600'>
  		<TR>
  		  <TD><FORM name='form3' METHOD='POST' 
  		   		ACTION=\"http://localhost/chessbenidorm/openb/premiospdf2000.php\">
  		   	<FONT size ='-1'>
  		   	<INPUT TYPE='SUBMIT' NAME='imprime' 
  		   		VALUE=\"Imprimir\">
  		   	</FONT>
  		   </FORM></TD>
  		   <TD>
  		   <FORM name='form5' METHOD='POST' 
  		   		ACTION=\"./index_clasifica.php\">
  		   	<FONT size ='-1'>
  		   	<INPUT TYPE='SUBMIT' NAME='Clasifica' 
  		   		VALUE=\"Clasif. Final\">
  		   	</FONT>
  		   </FORM>
  		   </TD>
  		   <TD>
  		   <FORM name='form4' METHOD='POST' 
  		   		ACTION=\"index_open.php?operacion=listado\">
  		   	<FONT size ='-1'>
  		   	<INPUT TYPE='SUBMIT' NAME='listado' 
  		   		VALUE=\"Jugadores\">
  		   	</FONT>
  		   </FORM>
  		   </TD>
  		</TR></TABLE>";
 	
  if (isset($_REQUEST["operacion"]))
  	if ($_REQUEST["operacion"]=="ver")$mijugador->premiados();
   

 	
?>


</BODY>
</HTML>

