<?

include_once("link\link.php");
$data_find = $_POST["val"];
if ($data_find==""){
$where='';
	$s_city='<option value="0" selected> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1075;&#1086;&#1088;&#1086;&#1076; --  </option>';
} else{
$where=' where name like "%'.$data_find.'%"';}
	
include_once("link\link.php");
		$t_c=0;
		$count=0;
		//echo ('SELECT name, id, type_city FROM city_zab '.$where.' order by type_city, id ');
			 $q_city=mysql_query ('SELECT name, id, type_city FROM city_zab '.$where.' order by type_city, id ');
				while ($r_city = mysql_fetch_row($q_city)) 
					{ if ($r_city[0] == ""){}
						else{ if ($count==0){if($where==""){$op_val=0;}else{$op_val=$r_city[1];}						
						
						if($s_city==""){$selected='selected';}else{$selected="";}}else{$selected="";}$count++;
								if($t_c==$r_city[2]){$op_gr="";}
								else{
								if($t_c==0){$end="";}
								else {$end="</optgroup>";}
						 $q_reg=mysql_query ('Select name FROM  `district_zab`  where id="'.$r_city[2].'" order by id ');
				while ($r_reg = mysql_fetch_row($q_reg)) 
						 $op_gr=$end.'<optgroup label="'.$r_reg[0].'">';}
						
						$s_city=$s_city.$op_gr.'<option value="'.$r_city[1].'" '.$selected.'> '.$r_city[0].'</option>';
							}
							$t_c=$r_city[2];
					}
					$s_city=$s_city.'<script>changeV("address","'.$op_val.'");	 findstreet(null);</script>';
					echo $s_city;
?>