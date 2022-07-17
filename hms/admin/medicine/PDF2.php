<?php
if(isset($_GET['user'])){
  $customer_phone_number = $_GET['user'];
}

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$document = new Dompdf();
$html = '
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>

';

//$document->loadHtml($html);
$page = file_get_contents("cart.php");

$total_price = 0;
//$document->loadHtml($page);

$connect = mysqli_connect("localhost", "root", "", "hms");

$query = "
SELECT customer_phn, medi_name, medi_quantity, medi_price FROM cart WHERE customer_phn = '$customer_phone_number'
";
$result = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);

$output = '
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

  tr:nth-child(even) {
      background-color: #dddddd;
  }
</style>
<h2>Hospital Management System </h2>
<h4>Customer Phone Number : '.$customer_phone_number.' </h4>
<table>
 <tr>
 
  <th>Medicine Name</th>
  <th>Quantity</th>
  <th>Price</th>
 </tr>';

 while($row = mysqli_fetch_array($result))
      {
        $total_price = $total_price+$row["medi_price"];
      $output .= '
      <tr>
     
      <td>'.$row["medi_name"].'</td>
      <td>'.$row["medi_quantity"].'</td>
      <td>'.$row["medi_price"].' /- </td>
      </tr>
      ';
      }

 $output .= '<tr>
 <td>Total Price</td>
 <td></td>
 <td>'.$total_price.' Taka</td>
</tr> ';

    $output .= '</table>';
    $document->loadHtml($output);//echo $output;
    $document->setPaper('A4', 'landscape');//set page size and orientation
    $document->render();//Render the HTML as PDF
    $document->stream("HMS Medicine bill", array("Attachment"=>1));//Get output of generated pdf in Browser
    //1  = Download
    //0 = Preview


?>
