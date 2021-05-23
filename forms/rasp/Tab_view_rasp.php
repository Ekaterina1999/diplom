<?

	
$add_obj_tab=mysql_query ('select distinct id_obj from rasp_obj_id'.$user_id.'_user order by id_obj');
	while ($row_obj_tab = mysql_fetch_row($add_obj_tab))
		{//1	
		
		
					if ($row_obj_tab[0] == ""){}
							else{	//2	
								$name_obj_tab=mysql_query ('select id, Name_org 
														from complaints_obj where id='.$row_obj_tab[0]);
								
								while ($row_obj_name = mysql_fetch_row($name_obj_tab))
								{//3
								
										$flag_tab2=mysql_query ('select sum(flag) 
																	 from rasp_obj_id'.$user_id.'_user
																	 where id_obj="'.$row_obj_tab[0].'" and flag="1"');
											$r_flag2=mysql_fetch_row($flag_tab2);
							
							$ii++;
							
						 if	($r_flag2[0]>0){$text_buf=' checked '; $count_check_v++;}else{$text_buf='';}
										$value_obj='<p><input  type="checkbox" name="in_obj_tab"  										'.$text_buf.' value="'.	$row_obj_name[0].'" onclick="checkObr('."'".$row_obj_name[0]."'".','."'".'iot'.$ii."'".') " id="iot'.$ii.'" />
										'.iconv("utf-8","windows-1251",$row_obj_name[1]).'</p>';
					
										$c_a=0;
					
										$address_tab=mysql_query ('select  distinct id_city, id_street,
																 house, housing, flat, id_address 
																	 from rasp_obj_id'.$user_id.'_user
																	 where id_obj="'.$row_obj_tab[0].'"');
											$count_adress=mysql_num_rows($address_tab);
											while ($r_a_tab = mysql_fetch_row($address_tab))
												{//4
													
													
													$t_viol="";
														$address_name=mysql_query('SELECT
														  `city_zab`.`name` , `street_zab`.`name` 
														  FROM street_zab
														  LEFT JOIN  `city_zab` 
														  ON  `street_zab`.`id_city` =  `city_zab`.`id` 
														  where `street_zab`.`id_city` ="'.$r_a_tab[0].'" 
														and `street_zab`.`id` ="'.$r_a_tab[1].'"');
													while ($r_a_n = mysql_fetch_row($address_name))
															{//5
														$flag_tab1=mysql_query ('select sum(flag) 
																	 from rasp_obj_id'.$user_id.'_user
																	 where id_obj="'.$row_obj_tab[0].'" and id_address="'.$r_a_tab[5].'" and flag="1"');
											$r_flag1=mysql_fetch_row($flag_tab1);
							
							
							$iii++;
						 if	($r_flag1[0]>0){$text_buf=' checked '; $count_check_v++;}else{$text_buf='';}			
															
																$value_adr[$c_a]= '<p><input  type="checkbox"
																 name="in_adress_tab" 
																 '.$text_buf.'
																 value="'.	$r_a_tab[5].'" id="iat'.$iii.'"
																 onclick="checkObr('."'".$r_a_tab[5]."'".','."'".'iat'.$iii."'".')"
																 />'.iconv("utf-8","windows-1251",$r_a_n[0]).', '.iconv("utf-8","windows-1251",$r_a_n[1]).', '.$r_a_tab[2].', '.iconv("utf-8","windows-1251",$r_a_tab[3]).', '.$r_a_tab[4].'</p>
									 ';

								 									
									 								$v_a_tab=mysql_query ('select id_v
																	 from rasp_obj_id'.$user_id.'_user
						 where id_obj="'.$row_obj_tab[0].'" and id_city="'.$r_a_tab[0].'" and id_street="'.$r_a_tab[1].'" and house="'.$r_a_tab[2].'" and housing="'.$r_a_tab[3].'" and flat ="'.$r_a_tab[4].'" order by id_v');
						$count_v=mysql_num_rows($v_a_tab);
						$c_v=$c_v++;
						while ($r_v_a_tab = mysql_fetch_row($v_a_tab))
							{//6
							
						
							$v_tab=mysql_query ('SELECT  `violation`.`ID_violation` ,
							  `violation`.`NAME_CODE` ,  `type_violation`.`Name_type`  
							 
							   FROM violation
								LEFT JOIN  `type_violation`
								 ON  `violation`.`ID_TYPE_VIOLATION` =`type_violation`.`Id_type_violation` 								  where `violation`.`ID_violation` ="'.$r_v_a_tab[0].'" order by `type_violation`.`Name_type ');
								 
							
							while ($row_v_tab = mysql_fetch_row($v_tab))
							{//7
							if 
							($row_v_tab[2]!=$t_viol){
							$value_viol=$value_viol.' <p>'.iconv("utf-8","windows-1251",$row_v_tab[2]).':</p>';
							}
							
							
							$flag_tab=mysql_query ('select flag ,id
																	 from rasp_obj_id'.$user_id.'_user
																	 where id_obj="'.$row_obj_tab[0].'" and id_address="'.$r_a_tab[5].'" and id_v="'.$row_v_tab[0].'"');

											$r_flag=mysql_fetch_row($flag_tab);
							
							$iiii++;
							
						 if	($r_flag[0]==1){$text_buf=' checked '; $count_check_v++;}else{$text_buf='';}
									$value_viol=$value_viol. '<p><input  type="checkbox" name="in_v_tab"
								 '.$text_buf.'
								  value="'.	$row_v_tab[0].'" id="ivt'.$iiii.'"
								   onclick="checkObr('."'".$r_flag[1]."'".','."'".'ivt'.$iiii."'".')"
								  />'.iconv("utf-8","windows-1251",$row_v_tab[1]).' </p>';
									 $t_viol=$row_v_tab[2];
									 
								 
									 
							}//7
						
						
							}//6
$val_viol[$c_a]=$value_viol;								
	
	
}//5
						

/*
if ($count_v>1) {
//$buf2=$buf2.'<tr><td rowspan="'.$count_v.'">'.$value_obj.'</td><td>'.$value_adr[1].'</td></tr>';
for ($i = 1; $i <= count($count_v); $i++) 
  { 
  
$buf2=$buf2.$value_viol[$i];//.'</td></tr>';
} 
} else{ $buf2=$buf2.$value_viol[$count_v]; } 


echo $buf2;*/
				
$c_a++;	
$value_viol="";
}//4




if ($count_adress>1){

$i=-1;
while ($i++<($count_adress-1))

  { 

  if ($i==0){
  $buf2=$buf2.'<td>'.$value_adr[$i].'</td><td>'.$val_viol[$i].'</td></tr>';}
  else{
$buf2=$buf2.'<tr><td>'.$value_adr[$i].'</td><td>'.$val_viol[$i].'</td></tr>';
	}
} 


$buf1=$buf1.'<tr><td rowspan="'.($count_adress).'">'.$value_obj.'</td>'.$buf2;

}
else {$buf1=$buf1.'<tr><td>'.$value_obj.'</td><td>'.$value_adr[0].'</td><td>'.$val_viol[0].'</td></tr>';}

$val_viol="";

$buf2="";

/*	if ($count_adress>1) {

for ($i = 0; $i <= count($count_adress); $i++) 
  { 
  if ($i=1){
  $buf1=$buf1.'<tr><td rowspan="'.$count_adress.'">'.$value_obj.'</td><td>'.$value_adr[i].'</td><td>'.$value_viol.'</td></tr>';}
  else{
$buf1=$buf1.'<tr><td>'.$value_adr[$i].'</td><td>'.$value_viol.'</td></tr>';}
} 
} else{ $buf1=$buf1.'<tr><td>'.$value_obj.'</td><td>'.$value_adr[$count_adress].'</td><td>'.$value_viol.'</td></tr>'; } 		*/

}//3


}//2


}//1



$buf='<table width="100%" border="2" name="Tab_form_obr_head">
			<tr><td width="20%">&#1054;&#1073;&#1098;&#1077;&#1082;&#1090;</td>
			<td width="40%">&#1040;&#1076;&#1088;&#1077;&#1089;</td>
			<td width="40%">&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</td></tr>';
			
$buf=$buf.$buf1.'</table>';			
			echo $buf;
?>