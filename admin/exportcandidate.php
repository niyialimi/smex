<?php
require_once('Connections/examcon.php');
session_start();
if(isset ($_POST['export']))
{
	//echo "export";
	$exportquery = "select concat(register.lastname,' ',register.firstname) as Firstname,register.examcode,register.Phone,register.email,register.desiredexam,register.examstatus,register.date from register order by regid desc";
	$exportData=mysqli_query($iqcon,$exportquery);
	
	$columnHeader ='';
$columnHeader = "Full Name"."\t"."Exam Code"."\t"."Phone"."\t"."Email"."\t"."Exam Taken"."\t"."Exam Status"."\t"."Registration Date";
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
header("Content-Disposition: attachment; filename=Candidate".rand().".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$columnHeader\n$result";



}

?>
		