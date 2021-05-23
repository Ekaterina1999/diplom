<?

include_once("..\link\link.php");
$id_r=$_POST['id_r'];

$Q_t='SELECT  `type_violation`.`Id_type_violation`,Name_type, `name_obj_violation`.`id` , name_obj,  `violation`.`ID_violation` , NAME_CODE FROM link_order_obj
LEFT JOIN `link_order_address` ON `link_order_obj`.`id` = `link_order_address`.`id_link_order_obj` 
LEFT JOIN `link_order_violation` ON `link_order_address`.`id` = `link_order_violation`.`id_address_link` 
LEFT JOIN  `violation` ON  `link_order_violation`.`id_violation` =  `violation`.`ID_violation` 
LEFT JOIN  `name_obj_violation` ON  `violation`.`ID_NAME_OBJ` =  `name_obj_violation`.`id` 
LEFT JOIN  `type_violation` ON  `violation`.`ID_TYPE_VIOLATION` =  `type_violation`.`Id_type_violation` where id_order="130"';//'.$id_r.'"';
$q=mysql_query ($Q_t) or die (mysql_error());
$num_q=mysql_num_rows($q);
while ($r = mysql_fetch_row($q)) 
{$i++;
$v='<li type="square" value="'.$r[4].'" id="v_li'.$r[4].'" class="v_li">'.iconv("utf-8","windows-1251",$r[5]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="v'.$r[4].'"></li>';
if($r[0]=="1"){

$val_type=iconv("utf-8","windows-1251",$r[1]);
if($r[0]==$id_t)
{$begin1=""; $end1="";}else{
if($begin==""){
$begin1='<li type="circle" value="'.$r[2].'" id="o_v_li'.$r[2].'" class="o_v_li">'.iconv("utf-8","windows-1251",$r[3]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="o_v'.$r[2].'"><id="o_v_li'.$r[2].'">'; $end1="";}else{
if ($num_q==$i){$end1='</ul></li>';}else{
$begin1='</ul></li><li type="circle" value="'.$r[2].'" id="o_v_li'.$r[2].'" class="o_v_li">'.iconv("utf-8","windows-1251",$r[3]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="o_v'.$r[2].'"><id="o_v_li'.$r[2].'">'; $end1="";}}
	}
	$val2=$val2.$begin1.$v.$end1;



}else{
if($r[0]==$id_t)
{$begin=""; $end="";}else{
if($begin==""){
$begin='<li value="'.$r[0].'" id="t_v_li'.$r[0].'" class="t_v_li">'.iconv("utf-8","windows-1251",$r[1]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="t_v'.$r[0].'"><ul id="t_v_ul'.$r[0].'">'; $end="";}else{
if ($num_q==$i){$end='</ul></li>';}else{
$begin='</ul></li><li value="'.$r[0].'" id="t_v_li'.$r[0].'" class="t_v_li">'.iconv("utf-8","windows-1251",$r[1]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="t_v'.$r[0].'"><ul id="t_v_ul'.$r[0].'">'; $end="";}}
	}
$val=$val.$begin.$v.$end;
	
}
$id_t=$r[0];
$id_o=$r[2];
$id_v=$r[4];

}
	if ($val2==""){$val=$val.$begin.$v.$end;}else{	$val='<li value="1" id="t_v_li1" class="t_v_li">'.$val_type.'<input type="button" value="X" onclick="del_temp_v($(this))" id="t_v1"><ul id="t_v_ul1">'.$val2.'</ul></li>'.$val.$begin.$v.$end;}
echo $val;
?>