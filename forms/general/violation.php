<?
 
 $op='<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1090;&#1080;&#1087; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; --</option>';
		include_once("..\link\link.php");
		if ($_POST['id_n_o']=="")
		{$q_incom=mysql_query ('SELECT NAME_CODE, ID_violation FROM violation where   ID_TYPE_VIOLATION="'.$_POST['id_t_v'].'"');
		}else {
		 $q_incom=mysql_query ('SELECT NAME_CODE, ID_violation FROM violation where ID_NAME_OBJ="'.$_POST['id_n_o'].'"  and  ID_TYPE_VIOLATION="'.$_POST['id_t_v'].'"');
		 }	
		 
		 	while ($r_incom = mysql_fetch_row($q_incom)) 
		 {
		 
					{ if ($r_incom[0] == ""){}
						else{
						$op=$op. '<option value="'.$r_incom[1].'"> '.iconv("utf-8","windows-1251",$r_incom[0]).'</option>';
								
							}
					}
					}
				echo $_POST['id_t_v'].' '.$op;

?>