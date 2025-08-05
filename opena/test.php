<?php





require('./fpdf183/fpdf.php');

class PDF extends FPDF

{

// Cabecera de página

function Header()

{

   $this->Image('logo.jpg',10,8,33);
   
	// Arial bold 15

	$this->SetFont('Arial','B',15);

	// Movernos a la derecha

	$this->Cell(45);

	// Título

	$this->Cell(30,10,'Open B Sub 2000 - Premios');

	// Salto de línea

	$this->Ln();

}




// Pie de página

function Footer()

{

	// Posición: a 1,5 cm del final

	$this->SetY(-15);

	// Arial italic 8

	$this->SetFont('Arial','I',8);

	// Número de página

	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}

}// fin clase





  $DBHost="localhost";
  $DBUser="root";
  $DBPass="";
  $DBMybda="opena1800";

  /* Intentamos establecer una conexión persistente con el servidor.*/
 $id_conexion = mysqli_connect($DBHost, $DBUser, $DBPass, $DBMybda);
 if(!$id_conexion){
       die ("Fallo en la conexion a MySQL " . mysqli_connect_error());
    } 
 $sql_script = "SELECT p.nombre,c.orden,j.nombre,c.valor FROM cuadropremio c,premio p,jugador j where p.idpremio=c.idpremio and c.idjugador=j.idjugador and 
 not (c.idjugador='') order by c.idpremio,c.orden asc";
 
 $datos = mysqli_query($id_conexion,$sql_script) or die ("<CENTER><H2>Error al consultar la base de 
   					datos.</H2></CENTER>");
   				
 $numfilas = mysqli_num_rows($datos);
 
 $pdf = new PDF();






 $pdf->AliasNbPages();

 $pdf->AddPage();

 $pdf->SetFont('Times','B',12);
 
 $pdf->Cell(0,10,"Premio - Pos.                         Nombre                                                              Euros",0,1);
 $pdf->Cell(0,1,"-----------------------------------------------------------------------------------------------------",0,1);
 $pdf->SetFont('Times','',12);
 $linea=1;
 $tipo=""; 
 while ($mifila = mysqli_fetch_row($datos))

   {  
      if ($tipo != $mifila[0])
      {
      $pdf->SetFont('Times','B',12);
      $pdf->Cell(50,10,$mifila[0]." - ".$mifila[1],'C');
      $tipo=$mifila[0];}
      else{
         $pdf->SetFont('Times','',12);
         $str_en_blanco="          ";
         $pdf->Cell(50,10,$str_en_blanco.$mifila[1],'C');
      }   
      $pdf->Cell(35,10,$mifila[2],'C');

      $pdf->Cell(0,10,$mifila[3],0,1,'C');
      $linea++;
      if ($linea % 25 ==0 ){
         $pdf->SetFont('Times','B',12);
         $pdf->Cell(0,10,"Premio - Pos.                         Nombre                                                              Euros",0,1);
         $pdf->Cell(0,1,"-----------------------------------------------------------------------------------------------------",0,1);
         $linea=1; 
         $pdf->SetFont('Times','',12);
         }   
   }
   

 $pdf->Output();						          
 
  if (isset($datos)) mysqli_free_result($datos);
     /* Liberamos la conexión persistente con el servidor.*/
  if (isset($id_conexion)) mysqli_close($id_conexion);
  




  

?>




