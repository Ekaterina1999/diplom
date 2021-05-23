<? 
 include_once("..\link\link.php");
$path=$_POST['path'];
$id=$_POST['id'];


$b_b= '<input  type="button" height="50" align="center" class="back_form" value="&#1053;&#1072;&#1079;&#1072;&#1076;" onclick="divindiv('."'".$path.'_tab'."'".')" />';
$b_u= '<input  type="button" height="50" align="center" class="up_form" value="&#1056;&#1077;&#1076;&#1072;&#1082;&#1090;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100;" onclick="butt_up('."'".$path."'".",$(this).val(),'".$id."'".')" />';

 echo '<div id="view_'.$path.'_p">';
 
echo '<form method="post" align="center">'.$b_b.' '.$b_u.'</form>'; 

 echo base_rasp($id,1);


echo '</div>';
  echo '<div id="view_'.$path.'_r" style="display:none">'.base_rasp($id,2);
  include_once("..\general\gen_viol.php"); 
  echo'</div>';
 echo '<form method="post" align="center">'.$b_b.' '.$b_u.'</form>';
 
 function base_rasp($id_act,$base_a){

$text_q='SELECT `num`, `date_act`,  `id_order`, `address_id`, `obj_id`, `num_time`, `complaint_check`, `area`, `risc`, `risc_v`, `in_police`, `size_recalculation`, `recalculation_charge`, `id_act_real` FROM `act` WHERE `id`="'.$id_act.'"';

$q_order=mysql_query ($text_q)or die (Mysql_error());
while ($r_order = mysql_fetch_row($q_order))
 {
 $num=$r_order[0];
 $d=$r_order[1];
 $base=$r_order[2];

 
 $s='<p>&#1040;&#1082;&#1090;
 &#8470; '.$num.'  &#1086;&#1090; '.date('d.m.Y',strtotime($d)).' &#1075;. </p>';
 
 

  
 return $s.obj($r_order[4],$r_order[3],$id_act,$base_a);
 }
}
function obj($id_obj,$id_adr,$act,$base_a){
 $text_q='SELECT `id`, `Name_org`, `full_name_org`, `license`, `ogrn`, `inn`, `kpp`, `address_org_id`, `address_fact`, `type_org`, `micro_org`, `size_base` FROM `complaints_obj` where `id`="'.$id_obj.'"';
 //echo  $text_q;
$q_obj=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj = mysql_fetch_row($q_obj))
{
						
						
//$obj=$obj.'<p onclick="open_obj('."'".$r_obj[0]."'".')">'.iconv("utf-8","windows-1251",$r_obj[1]).'</p>';
$obj=$obj.'<p>'.iconv("utf-8","windows-1251",$r_obj[1]).'</p><div id="open_obj_'.$r_obj[0].'" >'.adr($id_adr,$act,$base_a).'</div>';
				}
return  $obj;
}
function adr($id,$act,$base_a){
global $count_rec;
 $text_q='SELECT distinct city_zab.name ,  street_zab.name , address.house,  address.housing ,  address.flat
FROM   address 
 JOIN  city_zab ON  address.id_city =  city_zab.id 
 JOIN  street_zab ON  address.id_street =  street_zab.id 
  WHERE   address.`id`="'.$id.'"';
//  echo  $text_q;
 $count_rec=0;
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				$ii++;
		
				if(($r_obj1[3]=="")or($r_obj1[3]=="0")){$housing="";}else{$housing=', '.iconv("utf-8","windows-1251",$r_obj1[3]);}
				if(($r_obj1[4]=="")or($r_obj1[4]=="0")){$flat="";}else{$flat=', '.$r_obj1[4];}
				
$address=$address.'<p>&#1040;&#1076;&#1088;&#1077;&#1089; : '.iconv("utf-8","windows-1251",$r_obj1[0]).', '.iconv("utf-8","windows-1251",$r_obj1[1]).', '.$r_obj1[2].$housing.$flat.'</p><p>
&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1077; :'.v($id,$r_obj1[5],$act,$base_a).'</p>';
				
				}

return  $address;

}

function v($id_obr,$adr,$act,$base_a){//,$id_address){
if($base_a=="2"){ $r="r";}else{ $r="";}
$v='<ul id="t_v_ul'.$r.'">';
 $text_q='SELECT distinct violation.NAME_CODE ,  type_violation.Name_type, violation.ID_violation
FROM  `linc_act_violation`

 JOIN  violation ON violation.ID_violation =`linc_act_violation`.`id_v`  

JOIN  type_violation
					ON  violation.ID_TYPE_VIOLATION =type_violation.Id_type_violation 


 WHERE `id_act`="'.$act.'"';
 //echo  $text_q;
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				
		if($base_a=="2"){$but_del='<input type="button" value="X" onclick="del_el_li($(this))" id="v'.$r_obj1[2].'">'; $r="r";}else{$but_del=""; $r="";}
			
$v=$v.'<li type="square" value="'.$r_obj1[2].'" id="v_lir'.$r_obj1[2].$r.'" class="v_lir'.$r.'">'.iconv("utf-8","windows-1251",$r_obj1[1]).' - '.iconv("utf-8","windows-1251",$r_obj1[0]).$but_del.'</li>';
		
			}
			$v=$v.'</ul>';
return $v;
}



 ?>
