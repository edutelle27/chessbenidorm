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
		<FONT size="6" color="white">Inscripci&oacute;n Open Villa de Benidorm 2008</FONT>&nbsp
	</TH>
</TR></TABLE><P>

<?
  require ("open.php");	
	
  $mi_jugador=new jugador();
  echo "<CENTER><P>
  		<TABLE border='0' width='600'>
  		<TR>
  		   <TD valign=top align=left>
		   	Clasificación final 
  		   </TD><TD><FORM name='form3' METHOD='POST' 
  		   		ACTION=\"index_clasifica.php\">
  		   	<FONT size ='-1'>
  		   	<INPUT TYPE='SUBMIT' NAME='alta' 
  		   		VALUE=\"Clasificacion Final\">
  		   	</FONT>
  		   </FORM></TD><TD>
  		   <FORM name='form3' METHOD='POST' 
  		   		ACTION=\"index_open.php?operacion=listado\">
  		   	<FONT size ='-1'>
  		   	<INPUT TYPE='SUBMIT' NAME='alta' 
  		   		VALUE=\"Listado completo\">
  		   	</FONT>
  		   </FORM>
  		   </TD>
  		</TR>
  		<TR>
  		<TD></TD>
		   <TD>
		      <form action=\"./inf_open.php\" method=\"post\" >
          <input type=\"submit\" value=\"Informes\" />
          </form>
       </TD>
		 </TR>
			</TABLE>";
	
	$mi_jugador->listar_premios_final();
  	echo "<TABLE BORDER=\"0\" cellspacing=\"1\" cellpadding=\"1\" align=\"center\" width=\"500\">
				<TR><TD valign=top align=right><TABLE border=1 CELLSPACING=0 CELLPADDING=3>
				 <TD>
				 <a href = \"./prefinpdf.php\"><FONT color=#990000>Crear PDF</FONT></a> 
			   </TD></TR></TABLE></TABLE>";
?>


</BODY>
</HTML>

