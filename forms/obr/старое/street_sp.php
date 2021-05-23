<?
$s_street='<select id="l_street" name="l_street"';
$s_street=$s_street.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1075;&#1086;&#1088;&#1086;&#1076; --  </option>';
	include_once("..\..\link\link.php");

			 $q_street=mysql_query ('SELECT name, id FROM street_zab where id_city= "'.$_POST['city_zab'].'" order by kod ');
				while ($r_street = mysql_fetch_row($q_street))
					{ if ($r_street[0] == ""){$count_street=0;}
						else{
						$count_street=1;
						$text_op=iconv("cp1251","utf8",$r_street[0]);
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$s_street=$s_street.'<option value="'.$r_street[1].'"> '.$text_op.'</option>';
							}
					}
					$s_street=$s_street.'</select>';
					if ($count_street==0){echo' &#1044;&#1072;&#1085;&#1085;&#1099;&#1077; &#1074; &#1089;&#1087;&#1088;&#1072;&#1074;&#1086;&#1095;&#1085;&#1080;&#1082;&#1077; &#1086;&#1090;&#1089;&#1091;&#1090;&#1089;&#1090;&#1074;&#1091;&#1102;&#1090;.';}
					else{
					echo $s_street;
					echo '<p>&#1044;&#1086;&#1084;
	      <input  type="text" name="house" size="4" class="button_style_1" /> 
	      &#1050;&#1086;&#1088;&#1087;&#1091;&#1089;
	      <input  type="text" name="housing"  size="3" class="button_style_1" /> 
	      &#1050;&#1074;&#1072;&#1088;&#1090;&#1080;&#1088;&#1072;
	      <input  type="text" name="flat" size="3" class="button_style_1" /></p>';
		  }
        
?>
