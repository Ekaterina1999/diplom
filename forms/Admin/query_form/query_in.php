<?php 
function list_incoming($op) {
		include_once("..\..\link\link.php");
			 $q_incom=mysql_query ('SELECT incoming.num_incoming, incoming.incoming_date, incoming.id FROM incoming order where incoming.id="'.$id_incoming.'" by incoming.incoming_date, incoming.num_incoming');
				if (mysql_error()){echo"  <p>&#1042;&#1099; &#1085;&#1077; &#1074;&#1085;&#1077;&#1089;&#1083;&#1080; &#1085;&#1080; &#1086;&#1076;&#1085;&#1086;&#1075;&#1086; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; </p>";}
				else{
				while ($r_incom = mysql_fetch_row($q_incom)) 
					{ if ($r_incom[0] == ""){		echo"  <p>&#1042;&#1099; &#1085;&#1077; &#1074;&#1085;&#1077;&#1089;&#1083;&#1080; &#1085;&#1080; &#1086;&#1076;&#1085;&#1086;&#1075;&#1086; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; </p>";}
						else{echo'<p><input  type="checkbox" data_id= "'.$r_incom[2].'" name="selected_in_'.$r_incom[2].'" />'.$r_incom[0].' &#1086;&#1090; '.$r_incom[1].'</p>';
								$op=$op.'<p><input  type="checkbox" data_id= "'.$r_incom[2].'" name="selected_in_'.$r_incom[2].'" />'.$r_incom[0].' &#1086;&#1090; '.$r_incom[1].'</p>';
							}
					}}
}

function list_type_violation($op1) {
$op1='<select name="t_v" onchange="list_name_obj_violation($op2)">';
$op1=$op1.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1090;&#1080;&#1087; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;-- </option>';
		include_once("..\..\link\link.php");
			 $q_incom=mysql_query ("SELECT name_type, Id_type_violation FROM type_violation ");
				while ($r_incom = mysql_fetch_row($q_incom)) 
					{ if ($r_incom[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op1=$op1.'<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
							}
					}
					$op1=$op1.'</select>';
					echo $op1;
}

function list_name_obj_violation($op2) {
if ($_POST[$t_v]=1){
$op2='<select name="n_o_v" onchange="">';
		include_once("..\..\link\link.php");
			 $q_incom=mysql_query ("SELECT name_type, Id_type_violation FROM type_violation ");
				while ($r_incom = mysql_fetch_row($q_incom)) 
					{ if ($r_incom[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op2=$op2.'<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
							}
					}
					$op2=$op2.'</select>';
					echo $op2;}
}


function list_obj($op3) {
$op3='<select name="l_obj" onchange="list_name_obj_violation($op2)">';
$op3=$op3.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1073;&#1098;&#1077;&#1082;&#1090;--  </option>';
	include_once("..\..\link\link.php");
			 $q_obj=mysql_query ("SELECT Name_org, id FROM complaints_obj ");
				while ($r_obj = mysql_fetch_row($q_obj)) 
					{ if ($r_obj[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op3=$op3.'<option value="'.$r_obj[1].'"> '.$r_obj[0].'</option>';
							}
					}
					$op3=$op3.'</select>';
					echo $op3;
}

function list_city($s_city) {
$s_city='<select name="l_city" >';
$s_city=$s_city.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1075;&#1086;&#1088;&#1086;&#1076; --  </option>';
		include_once("..\..\link\link.php");
			 $q_city=mysql_query ("SELECT name, id FROM city_zab order by kod ");
				while ($r_city = mysql_fetch_row($q_city)) 
					{ if ($r_city[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$s_city=$s_city.'<option value="'.$r_city[1].'"> '.$r_city[0].'</option>';
							}
					}
					$s_city=$s_city.'</select>';
					echo $s_city;
}
?>