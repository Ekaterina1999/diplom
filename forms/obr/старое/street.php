<?
function street_s($s_street){
$s_street='<select id="id_addr_l_street" name="l_street" onchange="list_street($l_city)" >';
$s_street=$s_street.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1075;&#1086;&#1088;&#1086;&#1076; --  </option>';
	include_once("..\..\link\link.php");
		echo ('SELECT name, id FROM street_zab where id_city="'.$_POST['city_zab'].'"  order by kod ');
		 $q_street=mysql_query ('SELECT name, id FROM street_zab where id_city="'.$_POST['city_zab'].'"  order by kod ');
			 
				while ($r_street = mysql_fetch_row($q_street)) 
					{ if ($r_street[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$s_street=$s_street.'<option value="'.$r_street[1].'"> '.$r_street[0].'</option>';
							}
					}
					$s_street=$s_street.'</select>';
					echo $s_street;
					}
					
?>					