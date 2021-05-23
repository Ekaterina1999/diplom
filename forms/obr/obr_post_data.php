<?
$user_id=$_COOKIE['userid'];
$n=$_POST['note'];
$u_id=$_POST['u_id'];

include_once("..\link\link.php"); 
$textQuery='select *
from `obr_obj_id'.$user_id.'_user`  where `flag`=1 ';
$text_q='select   * from obr_incoming_id'.$user_id.'_user where flag=1';

$q=mysql_query ($text_q);
$q2=mysql_query ($textQuery);
if (( (!$q or !($r=mysql_num_rows($q)) ))or ( (!$q2 or !($r=mysql_num_rows($q2)) ))){ }else {
include_once("obr_add_data.php");
add_complaints($n, $u_id, $n_c);
 $q_droup=mysql_query ('DROP TABLE obr_incoming_id'.$user_id.'_user');
  $q_droup=mysql_query ('DROP TABLE obr_obj_id'.$user_id.'_user'); 
 



echo $n_c;
}
  
?>
