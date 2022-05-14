<?php require_once('include/session.php');  
require_once('include/conn.php');  

            $user_id =   $_SESSION['user'];
if(!isset($_GET['session']) && $_GET['session']==""){
    $rurl = 'index.php';
	redirect($rurl);
}
$session = $_GET['session'];
$answer_symbol ='';
    

$html =  '<h3 align="left" style="margin-left:10px;">Adminstraitive check</h3>';

$html .=  '<table  border="0" style="    border-spacing: 0;width:98%;margin-bottom:10px;padding:10px;"><tr>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Question</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Answer</th>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Result</th>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Regulation</th></tr>';

$query = mysqli_query($conn,"select * from user_answer where category =1 and user_id='$user_id' and session='$session' order by id asc");
$i = 1;
while($row = mysqli_fetch_array($query)){
    
    
$question_query = mysqli_query($conn,"select * from checking where id = '$row[question_id]'");
$row_question  = mysqli_fetch_assoc($question_query);

    
$answer_query = mysqli_query($conn,"select * from checking_answer where question_id = '$row[question_id]'");
$row_answer  = mysqli_fetch_assoc($answer_query);

    
$html .=  '<tr>';
$html .=  '<td align="left" width="40%" style="border :  1px #CCC solid;padding:10px;">'.$row_question['question'].'</td>';
$html .=  '<td align="left" width="30%"  style="border :  1px #CCC solid;padding:10px;">'.$row['answer'].'</td>';
    
        
    

if($row['answer']=="No") {
    $ans = "Not Compiled";
}elseif($row['answer']=="Yes"){
    $ans  = "Compiled";
}else{
        $ans  = "Not Compiled";

}
    
    
$html .=  '<td align="left" width="15%"  style="border :  1px #CCC solid; padding:10px;">'.$ans.'</td>';
    $html .=  '<td align="left" width="15%"  style="border :  1px #CCC solid; padding:10px;">'.$answer_symbol.' '.$row_answer['compare'].'</td></tr>';

    $i++;
}
$html .=  '</table>';
$html .=  '<h3 align="left"  style="margin-left:10px;">Architectural check</h3>';

$html .=  '<table  border="0" style="    border-spacing: 0;width:98%;margin-bottom:10px;padding:10px;"><tr>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Question</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Answer</th>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Result</th>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Regulation</th></tr>';

$query = mysqli_query($conn,"select * from user_answer where category =2 and user_id='$user_id' and session='$session' order by id asc");
$i = 1;
while($row = mysqli_fetch_array($query)){
    
    
$question_query = mysqli_query($conn,"select * from checking where id = '$row[question_id]'");
$row_question  = mysqli_fetch_assoc($question_query);

    
$answer_query = mysqli_query($conn,"select * from checking_answer where question_id = '$row[question_id]'");
$row_answer  = mysqli_fetch_assoc($answer_query);

    
$html .=  '<tr>';
$html .=  '<td align="left" width="40%" style="border :  1px #CCC solid;padding:10px;">'.$row_question['question'].'</td>';
$html .=  '<td align="left" width="30%"  style="border :  1px #CCC solid;padding:10px;">'.$row['answer'].'</td>';
    
        
 $answer_symbol = "";   

if($row['answer']=="No" ) {
    $ans = "Not Compiled";
}elseif($row['answer']==$row_answer['result']){
    
    $ans  = "Compiled";
}elseif($row['answer']=="Yes"){
    $ans  = "Compiled";
}elseif($row_answer['type_compare']=="less"){
    
    $answer_symbol = "<=";
    if($row['answer']<=$row_answer['result'] && $row['answer']!=""){
            $ans  = "Compiled";

    }else{
            $ans  = "Not Compiled";

    }
    
}elseif($row_answer['type_compare']=="grater"){
    $answer_symbol = ">=";
    if($row['answer']>=$row_answer['result'] && $row['answer']!=""){
        
        
            $ans  = "Compiled";

    }else{
            $ans  = "Not Compiled";

    }
}elseif($row_answer['type_compare']=="between"){
    $answer_symbol = "between";
    if($row['answer']>=$row_answer['result']  && $row['answer']<$row_answer['cr'] && $row['answer']!=""){
        
        
            $ans  = "Compiled";

    }else{
            $ans  = "Not Compiled";

    }
    
}
    
    
$html .=  '<td align="left" width="15%"  style="border :  1px #CCC solid; padding:10px;">'.$ans.'</td>';
    $html .=  '<td align="left" width="15%"  style="border :  1px #CCC solid; padding:10px;">'.$row_answer['compare'].'</td></tr>';

    $i++;
}
$html .=  '</table>';
$html .=  '<h3 align="left" style="margin-left:10px;">General check</h3>';
$html .=  '<table  border="0" style="    border-spacing: 0;width:98%;margin-bottom:10px;padding:10px;"><tr>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Question</th>';
$html .=  '<th align="left"  bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Answer</th>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Result</th>';
$html .=  '<th align="left" bgcolor="#f5f5f5"  style="border :  1px #CCC solid;padding:10px;">Regulation</th></tr>';

$query = mysqli_query($conn,"select * from user_answer where category =3 and user_id='$user_id' and session='$session' order by id asc");
$i = 1;
while($row = mysqli_fetch_array($query)){
    
    
$question_query = mysqli_query($conn,"select * from checking where id = '$row[question_id]'");
$row_question  = mysqli_fetch_assoc($question_query);

    
$answer_query = mysqli_query($conn,"select * from checking_answer where question_id = '$row[question_id]'");
$row_answer  = mysqli_fetch_assoc($answer_query);

    
$html .=  '<tr>';
$html .=  '<td align="left" width="40%" style="border :  1px #CCC solid;padding:10px;">'.$row_question['question'].'</td>';
$html .=  '<td align="left" width="30%"  style="border :  1px #CCC solid;padding:10px;">'.$row['answer'].'</td>';
    
        
    

if($row['answer']=="No") {
    $ans = "Not Compiled";
}elseif($row['answer']=="Yes"){
    $ans  = "Compiled";
}else{
        $ans = "Not Compiled";

    
}
    
    
$html .=  '<td align="left" width="15%"  style="border :  1px #CCC solid; padding:10px;">'.$ans.'</td>';
    $html .=  '<td align="left" width="15%"  style="border :  1px #CCC solid; padding:10px;"> '.$row_answer['compare'].'</td></tr>';

    $i++;
}
$html .=  '</table>';
$html .=  '<div style="text-align:right; height:40px;background:#074334; line-height:40px;color:#FFF;padding-right:10px;">www.tahqq.com</div>';

$filename = "checking";
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


