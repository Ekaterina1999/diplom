<?
$_user_id=$_COOKIE['userid'];
$in_name_1=$_POST['inName1'];
$in_date_1=$_POST['inDate1'];
$buf="";

include_once("..\link\link.php");
		
if (!mysql_query('SELECT * FROM obr_incoming_id'.$_user_id.'_user')){

mysql_query('create table IF NOT EXISTS obr_incoming_id'.$_user_id.'_user (     `id` int(11) NOT NULL AUTO_INCREMENT,
                                                                              `num_incoming` varchar(255) NOT NULL,
                                                                              `incoming_date` date NOT NULL,
`flag` int(11),																			  
                                                                              PRIMARY KEY (`id`)
                                                                            )'
);
}
if (($in_name_1=="")or($in_date_1=="")){}else{
$q_temp_tab=mysql_query('SELECT * FROM obr_incoming_id'.$_user_id.'_user where  num_incoming="'.$in_name_1.'" and incoming_date	= "'.$in_date_1.'"');

$r_temp= mysql_fetch_row($q_temp_tab);
if ($r_temp==""){

$insert_tab=mysql_query ('INSERT INTO  `obr_incoming_id'.$_user_id.'_user` (
					`num_incoming` ,`incoming_date`,`flag`)
					VALUES ( "'.$in_name_1.'", "'.$in_date_1.'", "1")',$db);}
										
					}

$add_in2=mysql_query ('select id ,num_incoming, incoming_date, flag
from obr_incoming_id'.$_user_id.'_user ');

while ($row_in2 = mysql_fetch_row($add_in2))
{

if ($row_in2[3]==1){
$check_val=' checked ';}

else 
{ $check_val='';}
$text_buf='<p>'.
'<input  type="checkbox"'.
' name="in_doc_base" '.
'   id="idb'.$row_in2[0].'"'.
'    onclick="checkObr('."'".$row_in2[0]."'".','."'".'idb'.$row_in2[0]."'".') "'.
$check_val.
' />'.
	iconv("utf-8","windows-1251",$row_in2[1]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$row_in2[2]).'</p>';


$buf=$buf.$text_buf; 
}
if ($buf==""){}else{
echo $buf;
}
?>