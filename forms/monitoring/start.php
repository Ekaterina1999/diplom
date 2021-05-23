<?

 include_once("..\link\link.php");
 $sel_monitoring=$_POST['sel_monitoring'];
$d1=$_POST['d1'];
$d2=$_POST['d2'];
$viol_document_gi=$_POST['viol_document_gi'];
 $y=$_POST['y'];
 $fio_worker_m=$_POST['fio_worker_m'];
$w_m=$_POST['w_m'];

 	if ($w_m==1){
					$q="select id, FIO from workers where id='".$fio_worker_m."'order by fio";
				  }else{
				  if($sel_monitoring>0)
					{		  $q="select id, FIO from workers where id_department='".$sel_monitoring."'order by fio";
							 // echo  $q;
							  
							 } 
							   else{$q="select id, FIO from workers where not(id in('34','35')) order by fio";}
 						}
echo  '<table  bordercolor="#000000" border="2">';
 $r=mysql_query($q);
 $c=1;
while ($rows= mysql_fetch_row($r)) {


//echo iconv("utf-8","windows-1251",$rows[1]);
echo '<tr><td>'.$c.'.  '.iconv("utf-8","windows-1251",$rows[1])."</td><td>". monitoring_find($y,$viol_document_gi,$d1,$d2,$rows[0],$c).'</td></tr>';
$c++;} 
// $htmlText=$htmlText.;
echo  '</table>';

 function monitoring_find($y,$viol_document_gi,$d1,$d2,$id,$c){
if ($y>0) {

for ($x = 0; $x <= ($y-1); $x++) 
  { 
// $docum=$docum.'<p>**'..'</p>';
 switch($viol_document_gi[$x]){
case "1":
$docum=$docum.obr($d1,$d2,$id,$c);
break;
case "2":
$docum=$docum.rasp($d1,$d2,$id,$c);
break;
case "3":
$docum=$docum.zadan($d1,$d2,$id,$c);
break;
case "4":
$docum=$docum.uved($d1,$d2,$id,$c);
break;
case "5":
$docum=$docum.predoster($d1,$d2,$id,$c);
break;
case "6":
$docum=$docum.act($d1,$d2,$id,$c);
break;
case "7":
$docum=$docum.predpis($d1,$d2,$id,$c);
break;

case "8":
$docum=$docum.uved_protocol($d1,$d2,$id,$c);
break;

case "9":
$docum=$docum.protocol($d1,$d2,$id,$c);
break;
}

} 
return $docum;
}
}

 function obr($d1,$d2,$id,$c){
$text="";
$q='SELECT  `num_incoming`, `incoming_date` FROM `incoming` 
join `link_complaints` on `link_complaints`.`id_incoming_c`=`incoming`.`id`
join `link_complaints_workers` on `link_complaints`.`id_complaints`= `link_complaints_workers`.`id_complants`
where 
 `id_workers`="'.$id.'" and  `incoming_date`>="'.$d1.'" and  `incoming_date`<="'.$d2.'"';
 //echo $q;
  $r=mysql_query($q);
$oc=0;
while ($rows= mysql_fetch_row($r)) {
$oc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td></tr>';
}
 $obr='<div><label ><input type="checkbox" id="w_v_o'.$c.'" onchange='."'".'div_nide("w_v_o'.$c.'","w_obr'.$c.'");'."'".'/>&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1103; ('.$oc.')</label></div> <div id="w_obr'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';

 return $obr;
 }
  function rasp($d1,$d2,$id,$c){
  $text="";
 $q='SELECT  `num_order`, `date_order`, `Name_org` FROM `order`
join `link_order_workers` on `link_order_workers`.`id_order`=`order`.`id_order`
join `link_order_obj` on `link_order_obj`.`id_order`=`order`.`id_order`
join `complaints_obj` on `link_order_obj`.`id_obj_c`= `complaints_obj`. `id`

WHERE `id_workers`="'.$id.'" and `date_order`>="'.$d1.'" and `date_order`<="'.$d2.'"';
// echo $q;
  $r=mysql_query($q);
$rc=0;
while ($rows= mysql_fetch_row($r)) {
$rc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td><td>'.iconv("utf-8","windows-1251",$rows[2]).'</td></tr>';
}
 $rasp='<div><label ><input type="checkbox" id="w_view_r'.$c.'" onchange='."'".'div_nide("w_view_r'.$c.'","w_rasp'.$c.'");'."'".' />&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1088;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1103;
 ('.$rc.')</label></div><div id="w_rasp'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';
 return $rasp;
 }
   function zadan($d1,$d2,$id,$c){
     $text="";
 $q=' SELECT  `num`,  `date_tasks`FROM `tasks` 
join `link_task_workes` on `link_task_workes`.`id_tasks`=`tasks`.`id`
where `id_user`="'.$id.'" and `date_tasks`>="'.$d1.'" and `date_tasks`<="'.$d2.'"';
 //echo $q;
  $r=mysql_query($q);
$rc=0;
while ($rows= mysql_fetch_row($r)) {
$rc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td></tr>';
}
 $zadan='<div><label ><input type="checkbox" id="w_view_z'.$c.'" onchange='."'".'div_nide("w_view_z'.$c.'","w_zadan'.$c.'");'."'".' />&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1079;&#1072;&#1076;&#1072;&#1085;&#1080;&#1103;
 ('.$rc.')</label></div><div id="w_zadan'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';

 return $zadan;
 }
   function uved($d1,$d2,$id,$c){
 $text="";
 $q=' SELECT  `num`,  `date_notify` FROM `notify` 
where `user`="'.$id.'" and `date_notify`>="'.$d1.'" and `date_notify`<="'.$d2.'"';
// echo $q;
  $r=mysql_query($q);
$rc=0;
while ($rows= mysql_fetch_row($r)) {
$rc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td></tr>';
}
 $uved='<div><label ><input type="checkbox" id="w_view_uved'.$c.'" onchange='."'".'div_nide("w_view_uved'.$c.'","w_uved'.$c.'");'."'".' />&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1091;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1103;
 ('.$rc.')</label></div><div id="w_uved'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';
 return $uved;
 }


  function predoster($d1,$d2,$id,$c){
     $text="";
 $q=' SELECT `num`, `date_caveat` FROM `caveat` 
WHERE `id_user`="'.$id.'" and `date_caveat`>="'.$d1.'" and `date_caveat`<="'.$d2.'"';
// echo $q;
  $r=mysql_query($q);
$rc=0;
while ($rows= mysql_fetch_row($r)) {
$rc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td><td>'.iconv("utf-8","windows-1251",$rows[2]).'</td></tr>';
}
 $predoster='<div><label ><input type="checkbox" id="w_view_predoster'.$c.'" onchange='."'".'div_nide("w_view_predoster'.$c.'","w_predoster'.$c.'");'."'".' />&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1087;&#1088;&#1077;&#1076;&#1086;&#1089;&#1090;&#1077;&#1088;&#1077;&#1078;&#1077;&#1085;&#1080;&#1103;
 ('.$rc.')</label></div><div id="w_predoster'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';
 return $predoster;
 }
 
  function act($d1,$d2,$id, $c){
 $text="";
 $q=' SELECT  `num`, `date_act`, `Name_org` FROM `act` 
join `link_act_workes` on `link_act_workes`.`id_act`=`act`.`id`
join `complaints_obj` on `act`.`obj_id`= `complaints_obj`. `id`
where `id_user`="'.$id.'" and `date_act`>="'.$d1.'" and `date_act`<="'.$d2.'"';
 //echo $q;
  $r=mysql_query($q);
$rc=0;
while ($rows= mysql_fetch_row($r)) {
$rc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td><td>'.iconv("utf-8","windows-1251",$rows[2]).'</td></tr>';
}
 $act='<div><label ><input type="checkbox" id="w_view_act'.$c.'" onchange='."'".'div_nide("w_view_act'.$c.'","w_act'.$c.'");'."'".' />&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1072;&#1082;&#1090;&#1099;
 ('.$rc.')</label></div><div id="w_act'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';
 return $act;
 }
 
  function predpis($d1,$d2,$id, $c){
 $text="";
 $q=' SELECT `num`, `Date_ordinance`, `Name_org` FROM `ordinance` join `link_ordinance_workers` on `link_ordinance_workers`.`id_ordinance`=`ordinance`.`id` join `complaints_obj` on `ordinance`.`id_obj`= `complaints_obj`.`id` where `id_workers`="'.$id.'" and `Date_ordinance`>="'.$d1.'" and `Date_ordinance`<="'.$d2.'"';
// echo $q;
  $r=mysql_query($q);
$rc=0;
while ($rows= mysql_fetch_row($r)) {
$rc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td><td>'.iconv("utf-8","windows-1251",$rows[2]).'</td></tr>';
}
 $predpis='<div><label ><input type="checkbox" id="w_view_predpis'.$c.'" onchange='."'".'div_nide("w_view_predpis'.$c.'","w_predpis'.$c.'");'."'".' />&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1087;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1103;
 ('.$rc.')</label></div><div id="w_predpis'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';
 return $predpis;
 }
 
  function uved_protocol($d1,$d2,$id, $c){
  $text="";
 $q=' SELECT  `num`,  `date_notify` FROM `notify_protocol` 
join `link_u_protocol_workers` on `link_u_protocol_workers`.`id_u_protocol`=`notify_protocol`.`id`
where `id_user`="'.$id.'" and `date_notify`>="'.$d1.'" and `date_notify`<="'.$d2.'"';
// echo $q;
  $r=mysql_query($q);
$rc=0;
while ($rows= mysql_fetch_row($r)) {
$rc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td></tr>';
}
 $uved_protocol='<div><label ><input type="checkbox" id="w_view_uved_protocol'.$c.'" onchange='."'".'div_nide("w_view_uved_protocol'.$c.'","w_uved_protocol'.$c.'");'."'".' />&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1091;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1103; &#1085;&#1072; &#1087;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;&#1099;  
 ('.$rc.')</label></div><div id="w_uved_protocol'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';
 return $uved_protocol;
 }
 
  function protocol($d1,$d2,$id, $c){
   $text="";
 $q=' SELECT  `num`, `Date_protocol`, `Name_org`  FROM `protocol`
join `link_protocol_workers` on `link_protocol_workers`.`id_protocol`=`protocol`.`id`
join `complaints_obj` on `protocol`.`id_obj`= `complaints_obj`. `id`
where `id_user`="'.$id.'" and `Date_protocol`>="'.$d1.'" and `Date_protocol`<="'.$d2.'"';
// echo $q;
  $r=mysql_query($q);
$rc=0;
while ($rows= mysql_fetch_row($r)) {
$rc++;
$text=$text.'<tr><td>'.iconv("utf-8","windows-1251",$rows[0]).' &#1086;&#1090; '.iconv("utf-8","windows-1251",$rows[1]).'</td><td>'.iconv("utf-8","windows-1251",$rows[2]).'</td></tr>';
}
 $protocol='<div><label ><input type="checkbox" id="w_view_protocol'.$c.'" onchange='."'".'div_nide("w_view_protocol'.$c.'","w_protocol'.$c.'");'."'".' />&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100; &#1087;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;&#1099;
 ('.$rc.')</label></div><div id="w_protocol'.$c.'" style="display:none"><table  bordercolor="#000000" border="2">'.$text.'</table></div>  ';
 return $protocol;
 }
 
?>
