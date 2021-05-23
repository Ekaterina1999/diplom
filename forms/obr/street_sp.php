<?
//$s_street='<select id="l_street" name="l_street"';


		include_once("..\link\link.php");
		mysql_query("set NAMES 'windows-1251'");
		$data_find = $_POST["val"];
if ($data_find==""){
$where='';
	$s_street=$s_street.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1091;&#1083;&#1080;&#1094;&#1091; --  </option>';
} else{
$where=' and name like "%'.$data_find.'%"';}
echo ('SELECT name, id FROM street_zab where id_city= "'.$_POST['city_zab'].'" '.$where.' order by kod ');
			 $q_street=mysql_query ('SELECT name, id FROM street_zab where id_city= "'.$_POST['city_zab'].'" '.$where.' order by kod ');
				while ($r_street = mysql_fetch_row($q_street))
					{ if ($r_street[0] == ""){$count_street=0;}
						else{
						$count_street=1;
						$text_op=iconv("utf-8","windows-1251",$r_street[0]);
												//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$s_street=$s_street.'<option value="'.$r_street[1].'"> '.$text_op.'</option>';
							}
					}
				//	$s_street=$s_street.'</select>';
					if ($count_street==0){echo' &#1044;&#1072;&#1085;&#1085;&#1099;&#1077; &#1074; &#1089;&#1087;&#1088;&#1072;&#1074;&#1086;&#1095;&#1085;&#1080;&#1082;&#1077; &#1086;&#1090;&#1089;&#1091;&#1090;&#1089;&#1090;&#1074;&#1091;&#1102;&#1090;.';}
					else{
					echo $s_street;
		
		  }
        
?>
