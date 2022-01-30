<?php
require_once('Connections/examcon.php');
session_start();
if(isset ($_POST['export']))
{
	//echo "export";
	$exportquery = "select question,category,subject,mark,optiona,optionb,optionc,optiond,correctoption from qtable order by qid desc";
	$exportData=mysqli_query($iqcon,$exportquery);
	
	$columnHeader ='';
$columnHeader = "Question"."\t"."category"."\t"."subject"."\t"."mark"."\t"."optiona"."\t"."optionb"."\t"."optionc"."\t"."optiond"."\t"."correctoption";
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
header("Content-Disposition: attachment; filename=Question".rand().".xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$columnHeader\n$result";



}

?>
		