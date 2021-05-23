<? 
//if ($_POST[$t_v]=1){
//$op2='<select name="n_o_v" onchange="">';
$op2='<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1090;&#1080;&#1087; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; --</option>';
		include_once("..\link\link.php");
		 $q_incom=mysql_query ('SELECT name_obj, Id FROM name_obj_violation');		while ($r_incom = mysql_fetch_row($q_incom)) 
					{ if ($r_incom[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
							$op2=$op2.'<option value="'.$r_incom[1].'"> '.iconv("utf-8","windows-1251",$r_incom[0]).'</option>';
						
							}
					}
					//$op2=$op2.'</select>';
					//}
					
				
					
					echo $op2;

?>