<?


$v_o=$_POST['v_o_id'];

$s_v='<select id="v" name="v">';
$s_v=$s_v.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077;  --  </option>';
	include_once("..\..\link\link.php");

			 $q_v=mysql_query ('SELECT 	NAME_CODE, ID_violation FROM violation where  ID_NAME_OBJ = '.$v_o.' order by ID_violation ');
				while ($r_v = mysql_fetch_row($q_v))
					{ if ($r_v[0] == ""){}
						else{
								$s_v=$s_v.'<option value="'.$r_v[1].'"> '.$r_v[0].'</option>';
							}
					}
					$s_v=$s_v.'</select>';
		echo $s_v;
		
?>
