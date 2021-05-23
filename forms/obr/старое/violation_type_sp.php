<?

$id_tv=$_POST['t_v_id'];
if ($id_tv=='1')
{
$s_v_o='<form name="form"><select id="v_o" name="v_o"';
$s_v_o=$s_v_o.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1075; --  </option>';
	include_once("..\..\link\link.php");
			 $q_v_o=mysql_query ('SELECT name_obj, id FROM name_obj_violation order by id ');
				while ($r_v_o = mysql_fetch_row($q_v_o))
					{ if ($r_v_o[0] == ""){}
						else{
								$s_v_o=$s_v_o.'<option value="'.$r_v_o[1].'"> '.$r_v_o[0].'</option>';
							}
					}
					$s_v_o=$s_v_o.'</select></form>';
					echo $s_v_o;
					echo"<script>$(function(){
    $('#v_o').change(function(){
        var val = $(this).val(); 
        $.ajax({
            type:'post',
            url:'violation_sp.php',
            data:'v_o_id='+val,
            success:function(result){
                $('#res2').html(result);
            }

        })
        console.log($(this).val());
     })
})</script>";
		
}else{
		$s_v='<select id="v" name="v"';
$s_v=$s_v.'<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1075; --  </option>';
	include_once("..\..\link\link.php");

			 $q_v=mysql_query ('SELECT 	NAME_CODE, ID_violation FROM violation where 	ID_TYPE_VIOLATION='.$id_tv.' order by ID_violation ');
				while ($r_v = mysql_fetch_row($q_v))
					{ if ($r_v[0] == ""){}
						else{
								$s_v=$s_v.'<option value="'.$r_v[1].'"> '.$r_v[0].'</option>';
							}
					}
					$s_v=$s_v.'</select>';
		echo $s_v;
		}
?>
