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
$ii=1;
while ($r_obj = mysql_fetch_row($q_obj))
 {
	 //if ($r_obj[0] == ""){}
	 //else{
	
	 	if ($id_complaints==$r_obj[0]){
			//$ii++;	echo " povtor".$i.' '.$ii.' ';
			
				if ($id_inncoming==$r_obj[1]){}else{$ii++;	echo " povtor".$i.' '.$ii.' ';
				$obr[$i][$ii]=iconv("utf-8","windows-1251",$r_obj[4]).' &#1086;&#1090;: '.$r_obj[5];
 						}
						
						if ($id_obj==$r_obj[6]){}
						else{$iii++;
						obj_name($r_obj[6]);
						$obj[$i][$iii]=$name;
						$obj_lic[$i][$iii]=$lic;
						}
										
			}
			else{
			
			$count_obr[$i]=$ii;
			$count_obj[$i]=$iii;
				$i++;
			echo " net povtor".$i.' '.$ii.' !!! ';	
			$ii=1;
			$iii=1;
			$obr[$i][$ii]=iconv("utf-8","windows-1251",$r_obj[4]).' &#1086;&#1090;: '.$r_obj[5];
			obj_name($r_obj[6]);
						$obj[$i][$iii]=$name;
						$obj_lic[$i][$iii]=$lic;
				      			}
			
		//}
					
		$id_complaints=$r_obj[0];	
		$id_inncoming=$r_obj[1];
		$id_obj=$r_obj[6];
		$id_address=$r_obj[7];
		$id_v=$r_obj[8];
		
					//unset($obr);
$all_count++;
}

$count_obr[$i]=$ii;

	for ($x = 1; $x <= ($i); $x++)
	{
	
				if ($count_obr[$x]==1){$buf1=$buf1.'<tr><td>'.$x.'</td><td>'.$obr[$x][1].'</td>';
				}
				else{$buf1==$buf1.'<tr>';
						for($y = 1; $y <= $count_obr[$x]; $y++)
						{$buf1=$buf1.'<tr>';
							if($y==1){
							if ($count_obj[$x]>$count_obr[$x]){$l=$count_obj[$x];}else{$l=$count_obr[$x];}
							echo '"<td rowspan='.$l.'>"';
							$buf1=$buf1.'<td rowspan="'.$l.'">'
									.$x.'</td><td>'.$obr[$x][$y].'</td>';
									}
									else
									{$buf1=$buf1.'<td>'.$obr[$x][$y].'</td>';}
		
								
							}
							
						}
						for($z = 1; $z <= $count_obj[$x]; $z++)
									{ echo '%'.$z." ".$count_obj[$x].' '.$obj[$x][$z][0];
										
										if($count_obj[$x]==1)
										{$buf1=$buf1.'<td>'.$obj[$x][$z].'</td><td>1</td>';
										}
										else{
											if($z==1){$buf1=$buf1.'<td rowspan="'.$count_obj[$x].'">'.
											$obj[$x][$z].'</td><td>2</td>';}
											else{$buf1=$buf1.'<td>3</td>';}
											}
											$buf1=$buf1.'</tr>';
									}
						
	
									
	}
								/*if ($ii>1){		for ($x = 1; $x <= count($obr); $x++) 	
										{
									if ($x==1){$buf1='<tr><td rowspan="'.$ii.'">'
									.$i.'</td><td>'.$obr[$x].'</td></tr>';}
									else{$buf1=$buf1.'<tr><td>'.$r_obj[$x].'</td></tr>';}
										}	
									}
									else{$buf1='<tr><td>'.$i.'</td><td>'.$obr[1].'</td></tr>';}*/
//$buf=$buf.$buf1;
echo '<table width="100%" border="2" name="Tab_form_obr_head">'.$buf1.'</table>';

}

function obj_name($id_obj) {
global $name, $lic;
$text_q='SELECT `Name_org`,`license` FROM `complaints_obj` WHERE `id`="'.$id_obj.'"';
$q_obj1=mysql_query ($text_q)or die (Mysql_error());
if ($r_obj1 = mysql_fetch_row($q_obj1))
 {$name=iconv("utf-8","windows-1251",$r_obj1[0]);
  $lic=$r_obj1[1];}

 }
?>