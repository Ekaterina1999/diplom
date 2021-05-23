<?php 
global $id_obr_view;
not_find($text_load);
function not_find($text_load) {
include_once("..\..\link\link.php"); 
$text_q="SELECT complaints.id , id_incoming_c, notice, data_user_cr, num_incoming, incoming_date, id_obj_c, id_address, id_violation 
FROM  link_complaints 

RIGHT JOIN complaints ON link_complaints.id_complaints = complaints.Id

RIGHT JOIN incoming ON link_complaints.id_incoming_c = incoming.id

 RIGHT JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 

RIGHT JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj

 RIGHT JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link order by complaints.id , id_incoming_c, id_obj_c, id_address, id_violation  ";

$id_complaints="";
$id_inncoming="";
$id_obj="";
$id_address="";
$id_v="";
$q_obj=mysql_query ($text_q)or die (Mysql_error());
$i_com=1;
$i_incom=1;
$i_obj=1;

while ($r_obj = mysql_fetch_row($q_obj))
 {
 
  if ($id_complaints==$r_obj[0]){}else{$count_com[$i]=$i_com; $val_com[$i]=$i; $i++; $ii=0; $iii=0; $i_com=0;}
  
  if ($id_inncoming==$r_obj[1]){$ii++;}else{ $ii++;$count_incom[$i][$ii]=$i_incom; $val_incom[$i][$ii]=iconv("utf-8","windows-1251",$r_obj[4]).' &#1086;&#1090;: '.$r_obj[5];$i_incom=0;}
  
	if ($id_obj==$r_obj[6]){$iii++; }else{
								$iii++;
							$count_obj[$i][$iii]=$i_obj;
								
$text_q='SELECT `Name_org`,`license` FROM `complaints_obj` WHERE `id`="'.$r_obj[6].'"';
$q_obj1=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj1 = mysql_fetch_row($q_obj1))
 {$name=iconv("utf-8","windows-1251",$r_obj1[0]);
  $lic=$r_obj1[1];}

 	
								
								
								$val_obj[$i][$iii]=$name;
								$val_lic[$i][$iii]=$lic;
								
								$i_obj=0;}		
			
		$id_complaints=$r_obj[0];	
		$id_inncoming=$r_obj[1];
		$id_obj=$r_obj[6];
		$id_address=$r_obj[7];
		$id_v=$r_obj[8];
	$end_val_incom=iconv("utf-8","windows-1251",$r_obj[4]).' &#1086;&#1090;: '.$r_obj[5];
					//unset($obr);
					$all_record++;
					
$i_com++;
$i_incom++;
$i_obj++;
}
$count_com[$i+1]=$i_com;
$val_com[$i+1]=$i;
$count_incom[$i+1][$ii+1]=$i_incom; $val_incom[$i+1][$ii+1]=$end_val_incom;
$count_obj[$i+1][$iii+1]=$i_obj;
								$val_obj[$i+1][$iii+1]=obj_name($id_obj);//$name;
								$val_lic[$i+1][$iii+1]=$lic;
//echo $i;

for ($x = 0; $x <= ($i+1); $x++)
	{
	if($count_com[$x]==""){}else{
	echo '<b><p>com '.$count_com[$x].' '.$val_com[$x].'</p></b>';}
	//if($count_incom[$x]==""){}else{
	for($y=1; $y<=(count($count_incom[$x]));$y++){
	echo '<p>incom '.$count_incom[$x][$y].' '.$val_incom[$x][$y].'</p>';//}
	}
	for($z=1; $z<=(count($count_obj[$x]));$z++){
	//if($count_obj[$x]==""){}else{
	echo '<p>obj '.$count_obj[$x][$z].' '.$val_obj[$x][$z].' '.$val_lic[$x][$z].'</p>';//}
	}
	}

/*if ($ii>1){$pp='<td rowspan="'.$row_pp.'">'.$i.'</td>';
			}	else{$pp='<td>'.$i.'</td>';}
	$buf1=$buf1.'<tr>'.$pp.$incom.'</tr>';*/


					
echo '<table width="100%" border="2" name="Tab_form_obr_head">'.$buf1.'</table>';

}

function obj_name($id_obj) {
global $lic;
$text_q='SELECT `Name_org`,`license` FROM `complaints_obj` WHERE `id`="'.$id_obj.'"';
$q_obj1=mysql_query ($text_q)or die (Mysql_error());
if ($r_obj1 = mysql_fetch_row($q_obj1))
 {return $name=iconv("utf-8","windows-1251",$r_obj1[0]);
  $lic=$r_obj1[1];}

 }
?>