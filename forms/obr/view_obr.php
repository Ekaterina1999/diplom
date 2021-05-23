<? 
include_once("..\link\link.php");

$path=$_POST['path'];
$id=$_POST['id'];

$b_b= '<input  type="button" height="50" align="center" class="back_form" value="&#1053;&#1072;&#1079;&#1072;&#1076;" onclick="divindiv('."'".$path.'_tab'."'".')" />';
$b_u= '<input  type="button" height="50" align="center" class="up_form" value="&#1056;&#1077;&#1076;&#1072;&#1082;&#1090;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100;" onclick="butt_up('."'".$path."'".''.",$(this).val()".')" />';
  echo '<div id="view_'.$path.'_p">';
 echo '<form method="post" align="center">'.$b_b.' '.$b_u.'</form>';
 echo '<p>&#1054;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1077; &#1086;&#1089;&#1085;&#1086;&#1074;&#1072;&#1085;&#1086; &#1085;&#1072; &#1089;&#1083;&#1077;&#1076;&#1091;&#1102;&#1097;&#1080;&#1093; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1080;&#1093; :</p>';
 echo incom($id);
 echo '<p>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;: </p>';
  echo obj($id);

echo '</div>';
  echo '<div id="view_'.$path.'_r" style="display:none"></div>';
 echo '<form method="post" align="center">'.$b_b.' '.$b_u.'</form>';
 
 function incom($id_obr){
$text_q='SELECT distinct num_incoming, incoming_date, incoming.id
FROM  link_complaints 
 JOIN complaints ON link_complaints.id_complaints = complaints.Id
 JOIN incoming ON link_complaints.id_incoming_c = incoming.id
  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 
 JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj
  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link where complaints.id ="'.$id_obr.'"';


$q_obj=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj = mysql_fetch_row($q_obj))
 {
 
$incom=$incom.'<p>'.iconv("utf-8","windows-1251",$r_obj[0]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_obj[1])).'<input style="display:none"  type="button" height="50" align="center" class="del_b" value="X" onclick="del_date('."'1'".''."'".$r_obj[2]."'".')" /></p>';
 }

return $incom;
}
function obj($id_obr){
 $text_q='SELECT distinct Name_org,license, complaints_obj.id
FROM  link_complaints 

 JOIN complaints ON link_complaints.id_complaints = complaints.Id

 JOIN incoming ON link_complaints.id_incoming_c = incoming.id

  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 

  JOIN complaints_obj ON complaints_obj.id= link_complaints_obj.id_obj_c
 JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj

  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link  WHERE complaints.id="'.$id_obr.'"';
 
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
						if($r_obj1[1]==1){$lic='<input disabled type="checkbox"  checked />';}
						else {$lic='<input disabled type="checkbox" />';}
						
						$obj=$obj.'<p onclick="open_obj('."'".$r_obj1[2]."'".')">'.$lic.iconv("utf-8","windows-1251",$r_obj1[0]).'<input style="display:none"  type="button" height="50" align="center" class="del_b" value="X" onclick="del_date('."'2'".''."'".$r_obj1[2]."'".')" /></p><div id="open_obj_'.$r_obj1[2].'" style="display:none">'.adr($id_obr,$r_obj1[2]).'</div>';
				}
return $obj;
}
function adr($id,$obj){
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
  WHERE  complaints.id="'.$id.'" and link_complaints_obj.id_obj_c="'.$obj.'"';
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
FROM  link_complaints 

 JOIN complaints ON link_complaints.id_complaints = complaints.Id

 JOIN incoming ON link_complaints.id_incoming_c = incoming.id

  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 

 JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj

 
  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link 

JOIN  violation ON violation.ID_violation =link_complaints_violation.ID_violation 

JOIN  type_violation
					ON  violation.ID_TYPE_VIOLATION =type_violation.Id_type_violation 


 WHERE complaints.id="'.$id_obr.'" AND id_address="'.$adr.'"';
 
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				
		
			
$v=$v.'<p>'.iconv("utf-8","windows-1251",$r_obj1[1]).' - '.iconv("utf-8","windows-1251",$r_obj1[0]).'</p>';
		
			}
return $v;
}

 ?>
