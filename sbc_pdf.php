<?php require_once('include/session.php');  
require_once('include/conn.php');  

            $user =   $_SESSION['user'];
if(isset($_GET['d']) && $_GET['d']==1){
mysqli_query($conn, "insert into sbc_user set user_id = '$user' , pdf_type='with'");
    add_activity($conn,"SBC Service with reference");

}



$html =  '<h2 align="center" style="margin-top:20px">Appling the SBC during Design Steps</h2>';
$html .=  '<h3 align="left" style="margin-left:10px;">Schematic Desgin</h3>';

$html .=  '<table  border="0" style="    border-spacing: 0;width:98%;margin-bottom:10px;padding:10px;"><tr>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">No</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Step</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Detail</th>';

$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Reference</th></tr>';
$query = mysqli_query($conn,"select * from sbc where category =1 order by id asc");
$i = 1;
while($row = mysqli_fetch_array($query)){
$html .=  '<tr>';
$html .=  '<td align="left" width="5%" style="border :  1px #CCC solid;padding:10px;">'.$i.'</td>';
$html .=  '<td align="left" width="30%"  style="border :  1px #CCC solid;padding:10px;">'.$row['title'].'</td>';
    $html .=  '<td align="left" width="40%"  style="border :  1px #CCC solid;padding:10px;">'.$row['detail'].'</td>';

$html .=  '<td align="left" width="20%"  style="border :  1px #CCC solid;padding:10px;">'.$row['reference'].'</td></tr>';
    $i++;
}
$html .=  '</table>';
$html .=  '<h3 align="left"  style="margin-left:10px;">Desgin Development</h3>';

$html .=  '<table  border="0" style="    border-spacing: 0;width:98%;margin-bottom:10px;padding:10px;"><tr>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">No</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Step</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Detail</th>';

$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Reference</th></tr>';
$query = mysqli_query($conn,"select * from sbc where category =2 order by id asc");
$i = 1;
while($row = mysqli_fetch_array($query)){
$html .=  '<tr>';
$html .=  '<td align="left" width="5%" style="border :  1px #CCC solid;padding:10px;">'.$i.'</td>';
$html .=  '<td align="left" width="30%"  style="border :  1px #CCC solid;padding:10px;">'.$row['title'].'</td>';
    $html .=  '<td align="left" width="40%"  style="border :  1px #CCC solid;padding:10px;">'.$row['detail'].'</td>';

$html .=  '<td align="left" width="20%"  style="border :  1px #CCC solid;padding:10px;">'.$row['reference'].'</td></tr>';
    $i++;
}
$html .=  '</table>';
$html .=  '<h3 align="left" style="margin-left:10px;">Construction Documents</h3>';

$html .=  '<table  border="0" style="    border-spacing: 0;width:98%;margin-bottom:10px;padding:10px;"><tr>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">No</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Step</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Detail</th>';

$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Reference</th></tr>';
$query = mysqli_query($conn,"select * from sbc where category =3 order by id asc");
$i = 1;
while($row = mysqli_fetch_array($query)){
$html .=  '<tr>';
$html .=  '<td align="left" width="5%" style="border :  1px #CCC solid;padding:10px;">'.$i.'</td>';
$html .=  '<td align="left" width="30%"  style="border :  1px #CCC solid;padding:10px;">'.$row['title'].'</td>';
    $html .=  '<td align="left" width="40%"  style="border :  1px #CCC solid;padding:10px;">'.$row['detail'].'</td>';

$html .=  '<td align="left" width="20%"  style="border :  1px #CCC solid;padding:10px;">'.$row['reference'].'</td></tr>';
    $i++;
}
$html .=  '</table>';

$html .=  '<div style="text-align:right; height:40px;background:#074334; line-height:40px;color:#FFF;padding-right:10px;">www.tahqq.com</div>';

$filename = "sbc";
//echo $html;
//exit;
// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

//Define("DOMPDF_UNICODE_ENABLED",true);

// instantiate and use the dompdf class
$dompdf = new Dompdf();

//$dompdf->loadHtml($aData['html']);

//$dompdf->set_option("IsRemoteEnabled", TRUE);


$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("index.php");
    
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename);


