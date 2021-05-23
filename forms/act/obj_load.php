<?php
//global $res;
 
		include_once("..\link\link.php");
		$flag=$_POST['flag'];
if($flag=="1"){
$id_rasp=$_POST['id_rasp'];
$id_adr=$_POST['id_adr'];
$res2=create_sel($id_rasp,$id_adr);
  echo $res2[0];
  echo '<script>  obj_rasp2('.$res2[1].');  </script>';
  }
//create_sel($id_rasp,$id_adr);
//echo $res;
function create_sel($id_rasp,$id_adr){

//$id_rasp=$_POST['id_rasp'];
//$id_adr=$_POST['id_adr'];
$text_q='SELECT distinct `link_order_obj`.id_obj_c FROM `link_order_obj` 
LEFT JOIN `link_order_address` ON `link_order_obj`.`id` = `link_order_address`.`id_link_order_obj` 
where link_order_obj.id_order="'.$id_rasp.'" and `link_order_address`.id_address="'.$id_adr.'"';
$obj="";
$q_obj=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj = mysql_fetch_row($q_obj))
 {
 if ($r_obj[0]==0){}else{
 if($obj==""){$obj=$r_obj[0];}else{$obj=$obj.', '.$r_obj[0];}
 }
 }
$op="";//'<p>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; (&#1059;&#1050;, &#1058;&#1057;&#1046; &#1080; &#1090;&#1076;.)   <select id="obj_rasp">';
 
 if (!$obj==""){
 $text_q2='SELECT id, Name_org, micro_org FROM  `complaints_obj` where id  IN ('.$obj.') ';
$micro_f="";
// echo $text_q2;
$q_obj2=mysql_query ($text_q2)or die (Mysql_error());
while ($r_obj2 = mysql_fetch_row($q_obj2))
 { 
 if ($r_obj2[0]==0){}else{ 
 if ($micro_f==""){$micro_f=$r_obj2[2];}
 if ($r_obj2[2]==""){$micro=' micro_org= "0" ';}else {$micro=' micro_org= "'.$r_obj2[2].'" ';}
  $op=$op.'<option value="'.$r_obj2[0].'" '.$micro.' >'.iconv("utf-8","windows-1251",$r_obj2[1]).'</option>';
 }
 
 }
 }
 $res[0]=$op;
 $res[1]=$micro_f;
 return $res;
 echo $op;//.'</select></p>';
// $res=$micro_f;
 //return $micro_f ;
 // $op;
}
?>