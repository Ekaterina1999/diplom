<?php 

	include_once("..\..\link\link.php");
		function showBasis1($basis_rasp,$id_com){
if($basis_rasp==1){		
$q_base='SELECT distinct link_complaints.id_complaints, link_complaints_obj.id_obj_c, complaints_obj.Name_org,  complaints_obj.ogrn, complaints_obj.inn, address.id, city_zab.name, street_zab.name, address.house, address.housing, address. flat,
type_violation.id_type_violation,type_violation.Name_type, name_obj_violation.ID_TYPE_VIOLATION,
name_obj_violation.name_obj,
violation.Id_violation, violation.Name_code
FROM  link_complaints  
JOIN link_complaints_obj ON link_complaints_obj.id_complaints = link_complaints.id_complaints 
 JOIN `complaints_obj` ON `link_complaints_obj`.`id_obj_c` = `complaints_obj`.`id` 
JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj 
 JOIN `address` ON `link_complaints_address`.`id_address` = `address`.`id`  
 JOIN `city_zab` ON `address`.`id_city` = `city_zab`.`id` 
 JOIN `street_zab` ON `address`.`id_street` = `street_zab`.`id` 
JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link 
 JOIN `violation` ON `link_complaints_violation`.`id_violation` = `violation`.`ID_violation` 
LEFT JOIN `name_obj_violation` ON `violation`.`ID_NAME_OBJ` = `name_obj_violation`.`id` 
 JOIN `type_violation` ON `violation`.`ID_TYPE_VIOLATION` = `type_violation`.`Id_type_violation` 
JOIN link_complaints_workers ON link_complaints_workers.id_complants = link_complaints.id_complaints  
where link_complaints.id_complaints in('.$id_com.')
order by  link_complaints.id_complaints, link_complaints_obj.id_obj_c, complaints_obj.Name_org,  complaints_obj.ogrn, complaints_obj.inn, address.id, city_zab.name, street_zab.name, address.house, address.housing, address. flat,
type_violation.id_type_violation,type_violation.Name_type, name_obj_violation.ID_TYPE_VIOLATION,
name_obj_violation.name_obj,
violation.Id_violation, violation.Name_code';
}

$q=mysql_query ($q_base) or die (mysql_error());
$num_q=mysql_num_rows($q);

while ($r = mysql_fetch_row($q)) 
	{
		$count++;
		if( $r[0]==$obr){
			$rowspan1++;
			if( $r[1]==$old_obj){$rowspan2++;
					if( $r[5]==$old_adr){$rowspan3++;}
					else{$rowspan_adr[($count-$rowspan3)]=$rowspan3;  $rowspan3=1;
					if ($r[9]==""){$housing="";}else{$housing=iconv("utf-8","windows-1251",$r[9]);}
		if ($r[10]=="0"){$flat="";}else{$flat=iconv("utf-8","windows-1251",$r[10]);	}				
		$adr[$count]=iconv("utf-8","windows-1251",$r[6]).'  '.iconv("utf-8","windows-1251",$r[7]).'  '
		.iconv("utf-8","windows-1251",$r[8]).' '.$housing.' '.$flat;

					}
			
			}
			else{$rowspan_obj[($count-$rowspan2)]=$rowspan2;  $rowspan2=1;
				$obj[$count]=iconv("utf-8","windows-1251",$r[2]).'  '
				.iconv("utf-8","windows-1251",$r[3]).'  '.iconv("utf-8","windows-1251",$r[4]);
				$rowspan_adr[($count-$rowspan3)]=$rowspan3;  $rowspan3=1;
					if ($r[9]==""){$housing="";}else{$housing=iconv("utf-8","windows-1251",$r[9]);}
		if ($r[10]=="0"){$flat="";}else{$flat=iconv("utf-8","windows-1251",$r[10]);	}				
		$adr[$count]=iconv("utf-8","windows-1251",$r[6]).'  '.iconv("utf-8","windows-1251",$r[7]).'  '
		.iconv("utf-8","windows-1251",$r[8]).' '.$housing.' '.$flat;
		
				}
		}else{ $i++; $rowspan[($count-$rowspan1)]=$rowspan1;  $rowspan1=1; 
		$rowspan_obj[($count-$rowspan2)]=$rowspan2;  $rowspan2=1; $pp[$count]=$i;
		$obj[$count]=iconv("utf-8","windows-1251",$r[2]).'  '
		.iconv("utf-8","windows-1251",$r[3]).'  '.iconv("utf-8","windows-1251",$r[4]);
		$rowspan_adr[($count-$rowspan3)]=$rowspan3;  $rowspan3=1;
					
		if ($r[9]==""){$housing="";}else{$housing=iconv("utf-8","windows-1251",$r[9]);}
		if ($r[10]=="0"){$flat="";}else{$flat=iconv("utf-8","windows-1251",$r[10]);	}				
		$adr[$count]=iconv("utf-8","windows-1251",$r[6]).'  '.iconv("utf-8","windows-1251",$r[7]).'  '
		.iconv("utf-8","windows-1251",$r[8]).' '.$housing.' '.$flat;
		
		}
		$viol[$count]=iconv("utf-8","windows-1251",$r[12]).'  '.iconv("utf-8","windows-1251",$r[14])
		.'  '.iconv("utf-8","windows-1251",$r[16]);			
	$obr=$r[0];
	$old_obj=$r[1];
	$old_adr=$r[5];
	
	$val_obj[$count]=$r[1];
	$val_adr[$count]=$r[5];
	$val_v[$count]=$r[15];
		
		if (($count)==$num_q){
		$rowspan[(($count+1)-$rowspan1)]=$rowspan1;
		$rowspan_obj[(($count+1)-$rowspan2)]=$rowspan2;
		$rowspan_adr[(($count+1)-$rowspan3)]=$rowspan3;
		}
	}
					
$y=0;				
for($x=1; $x<=($count);$x++){

//if ($rowspan[$x]>1){$r_c='rowspan='.$rowspan[$x];}else{$r_c="";}
if ($rowspan_obj[$x]>1){$r_obj='rowspan='.$rowspan_obj[$x];}else{$r_obj="";}
if ($rowspan_adr[$x]>1){$r_adr='rowspan='.$rowspan_adr[$x];}else{$r_adr="";}

if($basis_rasp==3){
$obj_text=$obj[$x];
$adr_text=$adr[$x];
$viol_text=$viol[$x];
}else{

if ($val_obj[$x]==$val_obj[1]) {$checked="checked";}else{$checked="";}
$obj_text='<label><input  type="radio" '.$checked.' name="obj_rasp" value="'.$val_obj[$x].'" onclick="obj_rasp_click()"/>'. $obj[$x].'</label>';
$adr_text='<label><input  type="checkbox" '.$checked.' name="adr'.$val_obj[$x].'" onclick="adr_rasp_click('.$val_obj[$x].','.$val_adr[$x].')" id="adr'.$val_obj[$x].'_'.$val_adr[$x].'" value="'.$val_adr[$x].'"/>'.$adr[$x].'</label>' ;
$viol_text='<label><input  type="checkbox" '.$checked.' name="viol_ch_'.$val_obj[$x].'_'.$val_adr[$x].'" value="'.$val_v[$x].'"/>'.$viol[$x].'</label>';}

//if ($pp[$x]==""){
 			if ($obj[$x]==""){
				if ($adr[$x]==""){
				$op='<tr><td>'.$viol_text.'</td></tr>';}else{
				$op='<tr><td '.$r_adr.'>'.$adr_text.'</td><td>'.$viol_text.'</td></tr>';}
			} else{
		/*	$op='<tr><td  '.$r_obj.'>'.$obj_text.'</td><td '.$r_adr.'>
			'.$adr_text.'</td><td>'.$viol_text.'</td></tr>';
			}
}
else{
$y++;
*/
 $op='<tr><td '.$r_obj.'>'.$obj_text.'</td><td '.$r_adr.'>'.$adr_text.'</td><td>'.$viol_text.'</td></tr>';

}
$op1=$op1.$op;
}
echo '<table border="2">'.$op1.'</table>';
}
function showBasis3($basis_rasp,$id_com){
$q_base='SELECT `act`.`address_id`,`act`.`obj_id`,`ordinance`.`id`,`ordinance_violation`.`id_violation`,
complaints_obj.Name_org,  complaints_obj.ogrn, complaints_obj.inn,  city_zab.name, street_zab.name, address.house, address.housing, address. flat,
`type_violation`.`Name_type`,`name_obj_violation`.`name_obj`,`violation`.`NAME_CODE`,
Date_plan
FROM act 
LEFT JOIN `ordinance` ON `act`.`id` = `ordinance`.`id_act` 
LEFT JOIN `ordinance_violation` ON `ordinance`.`id` = `ordinance_violation`.`id_ordinance` 
 JOIN `complaints_obj` ON `act`.`obj_id` = `complaints_obj`.`id`  
 JOIN `violation` ON `ordinance_violation`.`id_violation` = `violation`.`ID_violation` 
LEFT JOIN `name_obj_violation` ON `violation`.`ID_NAME_OBJ` = `name_obj_violation`.`id` 
 JOIN `type_violation` ON `violation`.`ID_TYPE_VIOLATION` = `type_violation`.`Id_type_violation` 
  JOIN `address` ON `act`.`address_id` = `address`.`id`  
 JOIN `city_zab` ON `address`.`id_city` = `city_zab`.`id` 
 JOIN `street_zab` ON `address`.`id_street` = `street_zab`.`id` 
 where `ordinance`.`id`="'.$id_com.'" and `eliminated`=0';
$q=mysql_query ($q_base) or die (mysql_error());
$num_q=mysql_num_rows($q);
$v_val="";
while ($r = mysql_fetch_row($q)) 
{
$obj='<p class="obj_class" id="obj_'.$r[1].'">'.iconv("utf-8","windows-1251",$r[4]).' &#1054;&#1043;&#1056;&#1053; : '.iconv("utf-8","windows-1251",$r[5]).' &#1048;&#1053;&#1053; : '.iconv("utf-8","windows-1251",$r[6]).'</p>';
$adr='<p class="adr_class" id="adr_'.$r[0].'">'.iconv("utf-8","windows-1251",$r[7]).', '.iconv("utf-8","windows-1251",$r[8]).', &#1076;. '.iconv("utf-8","windows-1251",$r[9]);
if ($r[10]==""){}else{$adr=$adr.', &#1082;&#1086;&#1088;&#1087;. '.iconv("utf-8","windows-1251",$r[10]);}
if ($r[11]=="0"){}else{$adr=$adr.', &#1082;&#1074;.'.iconv("utf-8","windows-1251",$r[11]);}
$adr=$adr.'</p>';
if ($count==""){$tr="";}else{$tr='<tr>';}
$v_val=$v_val.$tr.'<td><label><input  type="checkbox" check class="viol_ch_class" id="viol_ch_'.$r[3].'" />'.iconv("utf-8","windows-1251",$r[12]).' '.iconv("utf-8","windows-1251",$r[13]).' '.iconv("utf-8","windows-1251",$r[14]).'</label>';
$d=date_create($r[15]);
$v_val=$v_val.'<p>&#1055;&#1083;&#1072;&#1085;&#1086;&#1074;&#1072;&#1103; &#1076;&#1072;&#1090;&#1072; :'.$d->format('d.m.Y').' </p></td></tr>';

$count++;
}
					
			
echo '<table border="2"><tr><td rowspan="'.$count.'">'.$obj.$adr.'</td>'.$v_val.'</table>';// ;//
}

?>