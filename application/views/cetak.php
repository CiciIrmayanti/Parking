<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- 
<script type="text/javascript">
	 window.onload = function() { 
	 	this.print({bUI: false, bSilent: true, bShrinkToFit: true});
	 	window.print();
	 }
  
</script> -->

<?php 

require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
$connector = new FilePrintConnector("php://stdout");
$printer = new Printer($connector);
$printer -> text("<img src=".base_url('Secure/create_barcode/').'MTR'.date('Ymdhis')."001>\n");
$printer -> cut();
$printer -> close();

// $jam = date('d-m-Y');
  
//     echo "<center><strong>IZZI PARKING<strong><br>(MOTOR)<br>";
//     echo date('d-m-Y H:i:s');
//     echo "<br><br>";
//     echo "<img src=".base_url('Secure/create_barcode/').'MTR'.date('Ymdhis')."001>";
//     echo "</center>"; 
//     echo "<br><br>";
//     echo "<br><br>";
 ?>