<?php
require_once('Connections/examcon.php');
session_start();
if(isset ($_POST['export']))
{
	//echo "export";
	$exportquery = "select concat(register.lastname,' ',register.firstname) as Firstname,register.Phone,scoretab.exam_code,scoretab.exam_type,scoretab.exam_subject,scoretab.exam_score,scoretab.exam_date from register inner join scoretab on register.examcode=scoretab.exam_code order by register.regid desc";
	$exportData=mysqli_query($iqcon,$exportquery);
	
	$columnHeader ='';
$columnHeader = "Full Name"."\t"."Phone"."\t"."Exam Code"."\t"."Exam Category"."\t"."Subject"."\t"."Exam Score"."\t"."Exam Date";
$header = '';
$result ='';
$sn=0;
$fields = mysqli_num_fields ( $exportData );
 
while( $row = mysqli_fetch_row( $exportData ) )
{
	$sn++;
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "Nil"."\t";
        }
        else
        {
            //$value = str_replace( '"' , '""' , $value );
            $value = '"' .$value . '"' . "\t";
        }
        $line .= $value;
    }
    $result .= trim( $line ) . "\n";
}
$result = str_replace( "\r" , "" , $result );
 
if ( $result == "" )
{
    $result = "\nNo Record(s) Found!\n";                        
}
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Result".rand().".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$columnHeader\n$result";



}

?>
		