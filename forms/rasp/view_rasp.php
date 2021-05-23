<? 
 include_once("..\link\link.php");
$path=$_POST['path'];
$id=$_POST['id'];


$b_b= '<input  type="button" height="50" align="center" class="back_form" value="&#1053;&#1072;&#1079;&#1072;&#1076;" onclick="divindiv('."'".$path.'_tab'."'".')" />';
$b_u= '<input  type="button" height="50" align="center" class="up_form" value="&#1056;&#1077;&#1076;&#1072;&#1082;&#1090;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100;" onclick="butt_up('."'".$path."'".''.",$(this).val()".')" />';
  echo '<div id="view_'.$path.'_p">';
 echo '<form method="post" align="center">'.$b_b.' '.$b_u.'</form>';


 echo base_rasp($id);


echo '</div>';
  echo '<div id="view_'.$path.'_r" style="display:none"></div>';
 echo '<form method="post" align="center">'.$b_b.' '.$b_u.'</form>';
 
 function base_rasp($id_rasp){

$text_q='SELECT `num_order`, `date_order`, `id_base`, `date_start`, `date_stop`, `approval`, `num_approval`, `value_approval`
FROM  `order` where `id_order`="'.$id_rasp.'"';

$q_order=mysql_query ($text_q)or die (Mysql_error());
while ($r_order = mysql_fetch_row($q_order))
 {
 $num=$r_order[0];
 $d=$r_order[1];
 $base=$r_order[2];
 $d_b=$r_order[3];
 $d_e=$r_order[4];
 $app=$r_order[5];
 $n_app=$r_order[6];
 $v_app=$r_order[7];
 }
 echo '<p>&#1056;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1077; &#8470; '.$num.'  &#1086;&#1090; '.date('d.m.Y',strtotime($d)).' &#1075;. </p>';
 
 
 
$b_rasp=' <p>&#1053;&#1072; &#1086;&#1089;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1080;';
 switch ($base) {
case 1:
$b_rasp=$b_rasp.' &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1103; <label onclick="clickDiv('."'".'base_rasp_obr'."'".')">'.base1($id_rasp).' </label></p><div id="base_rasp_obr" style="display:none">'.obj_obr($id_rasp).'</div>';

break;
case 2:
$b_rasp=$b_rasp.' &#1087;&#1083;&#1072;&#1085;&#1086;&#1074;&#1086;&#1081; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080; '.base2($id_rasp).' </p>';
break;
case 3:
$b_rasp=$b_rasp.' &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080; &#1087;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1103; '.base3($id_rasp).'</p>';
break;
case 4:
$b_rasp=$b_rasp.' &#1090;&#1077;&#1088;&#1073;&#1086;&#1074;&#1072;&#1085;&#1080;&#1103; &#1087;&#1088;&#1086;&#1082;&#1091;&#1088;&#1072;&#1090;&#1091;&#1088;&#1099; '.base4($id_rasp).'</p>';
break;
case 5:
$b_rasp=$b_rasp.'  &#1084;&#1086;&#1090;&#1080;&#1074;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1085;&#1086;&#1075;&#1086; &#1087;&#1088;&#1077;&#1076;&#1089;&#1090;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1103;   '.base5($id_rasp).'</p>';

 break;
 }
 
 echo $b_rasp;
 echo '<p>&#1057;&#1088;&#1086;&#1082; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;: '.date('d.m.Y',strtotime($d_b)).' - '.date('d.m.Y',strtotime($d_e)).'</p>';
 
 echo '<p>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;: </p>';
  //echo 
  obj($id_rasp);
  
  echo ' <p>'.iconv("utf-8","windows-1251",$n_app).' '.iconv("utf-8","windows-1251",$v_val).'</p>';
}
function obj($id_rasp){
 $text_q='SELECT distinct `link_order_obj`.`id`,Name_org
FROM  `link_order_obj`
join complaints_obj on complaints_obj.id=link_order_obj.`id_obj_c`  WHERE  `id_order`="'.$id_rasp.'"';
 //echo  $text_q;
$q_obj=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj = mysql_fetch_row($q_obj))
{
						
						
$obj=$obj.'<p onclick="open_obj('."'".$r_obj[0]."'".')">'.iconv("utf-8","windows-1251",$r_obj[1]).'</p><div id="open_obj_'.$r_obj[0].'" style="display:none">'.adr($id_rasp,$r_obj[0]).'</div>';
				}
//return 
echo $obj;
}
function adr($id,$obj){
global $count_rec;
 $text_q='SELECT distinct city_zab.name ,  street_zab.name , address.house,  address.housing ,  address.flat, link_order_address.id
FROM  link_order_address 

 JOIN  address ON  address.id = id_address
 JOIN  city_zab ON  address.id_city =  city_zab.id 
 JOIN  street_zab ON  address.id_street =  street_zab.id 
  WHERE   link_order_address.id_link_order_obj="'.$obj.'"';
//  echo  $text_q;
 $count_rec=0;
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				$ii++;
		
				if(($r_obj1[3]=="")or($r_obj1[3]=="0")){$housing="";}else{$housing=', '.iconv("utf-8","windows-1251",$r_obj1[3]);}
				if(($r_obj1[4]=="")or($r_obj1[4]=="0")){$flat="";}else{$flat=', '.$r_obj1[4];}
				
$address=$address.'<tr><td>'.iconv("utf-8","windows-1251",$r_obj1[0]).', '.iconv("utf-8","windows-1251",$r_obj1[1]).', '.$r_obj1[2].$housing.$flat.'</td><td>'.v($id,$r_obj1[5]).'</td></tr>';
				
				}
		$address='<table border="2" ><tr><td>&#1040;&#1076;&#1088;&#1077;&#1089;</td>
<td>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1077; </td></tr>'.$address.'</table>';
return  $address;
}

function v($id_obr,$adr){//,$id_address){
 $text_q='SELECT distinct violation.NAME_CODE ,  type_violation.Name_type 
FROM  link_order_violation 

 JOIN  violation ON violation.ID_violation =link_order_violation.ID_violation 

JOIN  type_violation
					ON  violation.ID_TYPE_VIOLATION =type_violation.Id_type_violation 


 WHERE link_order_violation.id_address_link="'.$adr.'"';
 //echo  $text_q;
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				
		
			
$v=$v.'<p>'.iconv("utf-8","windows-1251",$r_obj1[1]).' - '.iconv("utf-8","windows-1251",$r_obj1[0]).'</p>';
		
			}
return $v;
}

function  base1($id_rasp){
$text_q='SELECT distinct num_incoming, incoming_date, incoming.id
FROM  `complaints_order`
join link_complaints on complaints_order.id_complaints=link_complaints.`id_complaints`  
JOIN incoming ON link_complaints.id_incoming_c = incoming.id
WHERE  `complaints_order`.`id_order`="'.$id_rasp.'"';
// echo  $text_q;
$q_obr=mysql_query ($text_q)or die (Mysql_error());
while ($r_obr = mysql_fetch_row($q_obr))
{
if ($obr==""){
$obr=' ('.iconv("utf-8","windows-1251",$r_obr[0]).'  &#1086;&#1090; '.date('d.m.Y',strtotime($r_obr[1]));}
else{
$obr=$obr.', '.iconv("utf-8","windows-1251",$r_obr[0]).'  &#1086;&#1090; '.date('d.m.Y',strtotime($r_obr[1]));}

}
if ($obr<>""){
$obr=$obr.')';}
return $obr;	
}

function obj_obr($id_obr){
 $text_q='SELECT distinct Name_org,license, complaints_obj.id FROM link_complaints JOIN complaints ON link_complaints.id_complaints = complaints.Id JOIN incoming ON link_complaints.id_incoming_c = incoming.id JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id JOIN complaints_obj ON complaints_obj.id= link_complaints_obj.id_obj_c JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link join complaints_order on  complaints.id=complaints_order.`id_complaints` WHERE complaints_order.`id_order`="'.$id_obr.'"';
 //echo $text_q;
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
						if($r_obj1[1]==1){$lic='<input disabled type="checkbox"  checked />';}
						else {$lic='<input disabled type="checkbox" />';}
						
						$obj=$obj.'<p onclick="open_obj('."'".$r_obj1[2]."'".')">'.$lic.iconv("utf-8","windows-1251",$r_obj1[0]).'</p><input   type="button" height="50" align="center" class="add_obr_into_rasp" value="&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1090;&#1086;&#1083;&#1100;&#1082;&#1086; &#1086;&#1073;&#1098;&#1077;&#1082;&#1090;  " onclick="add_obr_in_rasp('."'obj','".$id_obr."','".$r_obj1[2]."','1')".'" /><input   type="button" height="50" align="center" class="add_obr_into_rasp" value="&#1055;&#1077;&#1088;&#1077;&#1085;&#1077;&#1089;&#1090;&#1080; &#1076;&#1072;&#1085;&#1085;&#1099;&#1077; &#1074; &#1088;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1077; " onclick="add_obr_in_rasp('."'obj','".$id_obr."','".$r_obj1[2]."','2')".'" /><div id="open_obj_'.$r_obj1[2].'" style="display:none">'.adr_obr($id_obr,$r_obj1[2]).'</div>';
				}
return $obj;
}
function adr_obr($id,$obj){
global $count_rec;
 $text_q='SELECT distinct city_zab.name ,  street_zab.name , address.house,  address.housing ,  address.flat, id_address
FROM  link_complaints 

 JOIN complaints ON link_complaints.id_complaints = complaints.Id

 JOIN incoming ON link_complaints.id_incoming_c = incoming.id

  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 

 JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj

 
 JOIN  address ON  address.id = id_address
 JOIN  city_zab ON  address.id_city =  city_zab.id 
 JOIN  street_zab ON  address.id_street =  street_zab.id 


  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link 
 join complaints_order on  complaints.id=complaints_order.`id_complaints` WHERE complaints_order.`id_order`="'.$id.'" and link_complaints_obj.id_obj_c="'.$obj.'"';
 $count_rec=0;
 //echo $text_q;
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				$ii++;
		
				if(($r_obj1[3]=="")or($r_obj1[3]=="0")){$housing="";}else{$housing=', '.iconv("utf-8","windows-1251",$r_obj1[3]);}
				if(($r_obj1[4]=="")or($r_obj1[4]=="0")){$flat="";}else{$flat=', '.$r_obj1[4];}
				
$address=$address.'<tr><td>'.iconv("utf-8","windows-1251",$r_obj1[0]).', '.iconv("utf-8","windows-1251",$r_obj1[1]).', '.$r_obj1[2].$housing.$flat.'<input   type="button" height="50" align="center" class="add_obr_into_rasp" value="&#1055;&#1077;&#1088;&#1077;&#1085;&#1077;&#1089;&#1090;&#1080; &#1076;&#1072;&#1085;&#1085;&#1099;&#1077; &#1074; &#1088;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1077; " onclick="add_obr_in_rasp('."'adr','".$id."','".$r_obj1[5]."','0'".')" /></td><td>'.v_obr($id,$r_obj1[5]).'</td></tr>';
				
				}
		$address='<table border="2" ><tr><td>&#1040;&#1076;&#1088;&#1077;&#1089;</td>
<td>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1077; </td></tr>'.$address.'</table>';
return  $address;
}

function v_obr($id_obr,$adr){//,$id_address){
 $text_q='SELECT distinct violation.NAME_CODE ,  type_violation.Name_type 
FROM  link_complaints 

 JOIN complaints ON link_complaints.id_complaints = complaints.Id

 JOIN incoming ON link_complaints.id_incoming_c = incoming.id

  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 

 JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj

 
  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link 

JOIN  violation ON violation.ID_violation =link_complaints_violation.ID_violation 

JOIN  type_violation
					ON  violation.ID_TYPE_VIOLATION =type_violation.Id_type_violation 

join complaints_order on  complaints.id=complaints_order.`id_complaints` WHERE complaints_order.`id_order`="'.$id_obr.'" AND id_address="'.$adr.'"';
 //echo $text_q;
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				
		
			
$v=$v.'<p>'.iconv("utf-8","windows-1251",$r_obj1[1]).' - '.iconv("utf-8","windows-1251",$r_obj1[0]).'</p>';
		
			}
return $v;
}



function  base2($id_rasp){
}
function  base3($id_rasp){
}
function  base4($id_rasp){
}
function  base5($id_rasp){
}

 ?>
