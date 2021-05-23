<?php 
global $id_obr_view;
not_find($text_load);
function not_find($text_load) {
include_once("..\..\link\link.php");
$text_q="SELECT complaints.id , id_incoming_c, notice, data_user_cr, num_incoming, incoming_date, id_obj_c, id_address, id_violation 
FROM  link_complaints 

 JOIN complaints ON link_complaints.id_complaints = complaints.Id

 JOIN incoming ON link_complaints.id_incoming_c = incoming.id

  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 

 JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj

  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link order by complaints.id , id_incoming_c, id_obj_c, id_address, id_violation  ";

$id_complaints="";
$id_inncoming="";
$id_obj="";
$id_address="";

$q_obj=mysql_query ($text_q)or die (Mysql_error());
$i_com=1;
$i_incom=1;
$i_obj=1;
$num_rows=mysql_num_rows($q_obj);
echo $num_rows;
while ($r_obj = mysql_fetch_row($q_obj))
 {
$rows_base++;
	if (($id_complaints==$r_obj[0])and ($id_address==$r_obj[7])and($id_v==$r_obj[8])){}else{
	$i++;
	 $text_q='SELECT  `violation`.`NAME_CODE` ,  `type_violation`.`Name_type`  
					 FROM violation
					LEFT JOIN  `type_violation`
					ON  `violation`.`ID_TYPE_VIOLATION` =`type_violation`.`Id_type_violation` 								  where `violation`.`ID_violation` ="'.$id_v.'" order by `type_violation`.`Name_type ';
$q_obj1=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj1 = mysql_fetch_row($q_obj1))
{$violation[$i]='<td>'.iconv("utf-8","windows-1251",$r_obj1[1]).' - '.iconv("utf-8","windows-1251",$r_obj1[0]).'</td>';
}
		}
		
		
			if (($id_complaints==$r_obj[0])and ($id_address==$r_obj[7])){}else{
$i=0;
$ii++;
	 $text_q='SELECT  `city_zab`.`name` ,  `street_zab`.`name` ,  `address`.`house` ,  `address`.`housing` ,  `address`.`flat`
FROM address
LEFT JOIN  `city_zab` ON  `address`.`id_city` =  `city_zab`.`id` 
LEFT JOIN  `street_zab` ON  `address`.`id_street` =  `street_zab`.`id` 
where    `address`.`id` ="'.$id_address.'"';
$q_obj1=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj1 = mysql_fetch_row($q_obj1))
{ if ((count($violation))==1){
$address[$ii]='<td>'.iconv("utf-8","windows-1251",$r_obj1[0]).', '.iconv("utf-8","windows-1251",$r_obj1[1]).', '.$r_obj1[2].', '.iconv("utf-8","windows-1251",$r_obj1[3]).', '.$r_obj1[4].'</td>'.$violation[1];

}
else
{
unset($x);
$text_v="";
for($x=2; $x<=(count($violation));$x++){
$text_v=$text_v.'<tr>'.$violation[$x].'</tr>';
}
$address[$ii]='<td rowspan="'.(count($violation)).'">'.iconv("utf-8","windows-1251",$r_obj1[0]).', '.iconv("utf-8","windows-1251",$r_obj1[1]).', '.$r_obj1[2].', '.iconv("utf-8","windows-1251",$r_obj1[3]).', '.$r_obj1[4].'</td>'.$violation[1].'</tr>'.$text_v;

}


}
/*if ($id_complaints==$r_obj[0]){*/$count_v=$count_v+count($violation);//}else{
	//$count_v=count($violation);
unset($violation);	//}
}
		
	if($id_complaints==$r_obj[0]){
$obj_text=$obj_text.$obj;}else{$obj_text=$obj;}	

	if (($id_complaints==$r_obj[0])and ($id_obj==$r_obj[6])){}else{
		
echo count($address);
if (count($address)==1){$text_v=$text_v.$address[1];}else{
			$x=0;
			$text_v="";
			$text_v=$text_v.$address[1];
			for($x=2; $x<=(count($address)+1);$x++){
			 
				$text_v=$text_v.'<tr>'.$address[$x];
			}
		}
if($count_v>1){$rowspan=' rowspan="'.$count_v.'"';}else{$rowspan="";}
$obj_in_tab='<td'.$rowspan.'>'.$obj_text.'</td>'.$text_v;

unset($address);
$ii=0;


}
		
	if (($id_complaints==$r_obj[0])and ($id_inncoming==$r_obj[1])){}else{

	

$incom_text=$incom_text.'<p>'.$val_incom.'</p>';


if($count_v>1){$rowspan=' rowspan="'.$count_v.'"';}else{$rowspan="";}
$incom_in_tab='<td'.$rowspan.'>'.$incom_text.'</td>';
$incom_text=$val_incom;




}		
if($id_complaints==$r_obj[0]){}else{
if($count_com>0){
if($count_v>1){$rowspan=' rowspan="'.$count_v.'"';}else{$rowspan="";}
$buf1=$buf1.'<tr><td'.$rowspan.'>'.$count_com.'</td>'. $incom_in_tab.$obj_in_tab;}
unset($violation);	
unset($address);	
$obj_in_tab="";
$incom_in_tab="";
$incom_text="";
$count_com++;
$count_v=0;
}		
	/*if (($id_complaints==$r_obj[0])and ($id_obj==$r_obj[6])){$i_i++;}else{

$i_i++;
$i_incom;
unset($x);
$text_v="";
for($x=1; $x<=(count($obj));$x++){
if($x=1){$text_v=$text_v.$obj[$x];}
else{
$text_v=$text_v.'<tr>'.$obj[$x];}
}
if($i_i=1){$incom[$i_incom]='<td>'.$val_incom.'</td>'$text_v;}
$incom[$ii]='<td rowspan="'.$count_v.'">'.$val_incom.'</td>'$text_v;

}


unset($address);

		}		*/	
			
		$id_complaints=$r_obj[0];	
		$id_inncoming=$r_obj[1];
		$id_obj=$r_obj[6];
		$id_address=$r_obj[7];
		$id_v=$r_obj[8];
	$val_incom=iconv("utf-8","windows-1251",$r_obj[4]).' &#1086;&#1090;: '.$r_obj[5];
	 $text_q='SELECT `Name_org`,`license` FROM `complaints_obj` WHERE `id`="'.$id_obj.'"';
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
						if($r_obj1[1]==1){$lic='<input disabled type="checkbox"  value="checked" />';}
						else {$lic='<input disabled type="checkbox" />';}
						
						$obj='<p>'.$lic.iconv("utf-8","windows-1251",$r_obj1[0]).'</p>';
				}

	
	
					//unset($obr);
					

/*if($$all_record=$num_rows){

$incom_text=$incom_text.'<p>'.$val_incom.'</p>';


if($count_v>1){$rowspan=' rowspan="'.$count_v.'"';}else{$rowspan="";}
$incom_in_tab='<td'.$rowspan.'>'.$incom_text.'</td>';
$incom_text=$val_incom;


if($count_v>1){$rowspan=' rowspan="'.$count_v.'"';}else{$rowspan="";}
$buf1=$buf1.'<tr><td'.$rowspan.'>'.$count_com.'</td>'. $incom_in_tab.$obj_in_tab;

}$all_record++;*/
}


					
echo '<table width="100%" border="2" name="Tab_form_obr_head">'.$buf1.'</table>';

}


?>