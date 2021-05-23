<?

include_once("..\link\link.php");
$id_r= $_POST['id_r'];
$id_address= $_POST['id_address'];
$id_obj= $_POST['id_obj'];

$Q_t='SELECT distinct  `type_violation`.`Id_type_violation`,Name_type FROM link_order_obj
LEFT JOIN `link_order_address` ON `link_order_obj`.`id` = `link_order_address`.`id_link_order_obj` 
LEFT JOIN `link_order_violation` ON `link_order_address`.`id` = `link_order_violation`.`id_address_link` 
LEFT JOIN  `violation` ON  `link_order_violation`.`id_violation` =  `violation`.`ID_violation` 
LEFT JOIN  `name_obj_violation` ON  `violation`.`ID_NAME_OBJ` =  `name_obj_violation`.`id` 
LEFT JOIN  `type_violation` ON  `violation`.`ID_TYPE_VIOLATION` =  `type_violation`.`Id_type_violation` where id_order ="'.$id_r.'" and `link_order_address`.`id_address`="'.$id_address.'" and `id_obj_c`= "'.$id_obj.'" order by `type_violation`.`Id_type_violation`';
$q=mysql_query ($Q_t) or die (mysql_error());
$num_q=mysql_num_rows($q);
while ($r = mysql_fetch_row($q)) 
{
if ($r[0]=="1"){
$val=$val.'<li value="'.$r[0].'" id="t_v_li'.$r[0].'" class="t_v_li">'.iconv("utf-8","windows-1251",$r[1]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="t_v'.$r[0].'"><ul id="t_v_ul'.$r[0].'">';
$val=$val.o_v_fun($r[0],$id_r,$id_address,$id_obj).'</ul></li>';

}else{
$val=$val.'<li value="'.$r[0].'" id="t_v_li'.$r[0].'" class="t_v_li">'.iconv("utf-8","windows-1251",$r[1]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="t_v'.$r[0].'"><ul id="t_v_ul'.$r[0].'">';


$val=$val.v_fun("",$r[0],$id_r,$id_address,$id_obj).'</ul></li>';
}

}
echo $val;

function o_v_fun($t_v,$id_r,$id_address,$id_obj){

include_once("..\link\link.php");
$Q_t1='SELECT distinct  `name_obj_violation`.`id` , name_obj FROM link_order_obj
LEFT JOIN `link_order_address` ON `link_order_obj`.`id` = `link_order_address`.`id_link_order_obj` 
LEFT JOIN `link_order_violation` ON `link_order_address`.`id` = `link_order_violation`.`id_address_link` 
LEFT JOIN  `violation` ON  `link_order_violation`.`id_violation` =  `violation`.`ID_violation` 
LEFT JOIN  `name_obj_violation` ON  `violation`.`ID_NAME_OBJ` =  `name_obj_violation`.`id` 
LEFT JOIN  `type_violation` ON  `violation`.`ID_TYPE_VIOLATION` =  `type_violation`.`Id_type_violation` where `type_violation`.`Id_type_violation`="'.$t_v.'" and id_order ="'.$id_r.'"  and `link_order_address`.`id_address`="'.$id_address.'" and `id_obj_c`= "'.$id_obj.'" order by `name_obj_violation`.`id`';
//echo $Q_t1;
$q1=mysql_query ($Q_t1) or die (mysql_error());
$num_q1=mysql_num_rows($q1);
while ($r1 = mysql_fetch_row($q1)) 
{
$val1=$val1.'<li type="circle" value="'.$r1[0].'" id="o_v_li'.$r1[0].'" class="o_v_li">'.iconv("utf-8","windows-1251",$r1[1]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="o_v'.$r1[0].'"></li><ul id="o_v_li'.$r1[0].'">';
$val1=$val1.v_fun($r1[0],$t_v,$id_r,$id_address,$id_obj).'</ul></li>';
}
return $val1;
//echo $val1;
}

function v_fun($o_v,$t_v,$id_r,$id_address,$id_obj){

include_once("..\link\link.php");

if ($o_v==""){$where="";}else{$where='`name_obj_violation`.`id`="'.$o_v.'"  and ';}
$Q_t2='SELECT distinct `violation`.`ID_violation` , NAME_CODE  FROM link_order_obj
LEFT JOIN `link_order_address` ON `link_order_obj`.`id` = `link_order_address`.`id_link_order_obj` 
LEFT JOIN `link_order_violation` ON `link_order_address`.`id` = `link_order_violation`.`id_address_link` 
LEFT JOIN  `violation` ON  `link_order_violation`.`id_violation` =  `violation`.`ID_violation` 
LEFT JOIN  `name_obj_violation` ON  `violation`.`ID_NAME_OBJ` =  `name_obj_violation`.`id` 
LEFT JOIN  `type_violation` ON  `violation`.`ID_TYPE_VIOLATION` =  `type_violation`.`Id_type_violation` where  '.$where.' `type_violation`.`Id_type_violation`="'.$t_v.'" and id_order ="'.$id_r.'"  and `link_order_address`.`id_address`="'.$id_address.'" and `id_obj_c`= "'.$id_obj.'"  order by `violation`.`ID_violation`';
//echo $Q_t2;
$q=mysql_query ($Q_t2) or die (mysql_error());
$num_q=mysql_num_rows($q);
while ($r = mysql_fetch_row($q)) 
{
$v=$v.'<li type="square" value="'.$r[0].'" id="v_li'.$r[0].'" class="v_li">'.iconv("utf-8","windows-1251",$r[1]).'<input type="button" value="X" onclick="del_temp_v($(this))" id="v'.$r[0].'"></li>';
}

return $v;
}

?>