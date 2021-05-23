<?php 
global $id_obr_view;
not_find($text_load);

function not_find($text_load) {


$year=date('Y');
$col_end=$_POST['col_end'];

include_once("..\..\link\link.php");
	$page_q='SELECT  `page_length` FROM `workers` WHERE `id`="'.$_COOKIE['userid'].'"';
	$q_page=mysql_query ($page_q)or die (Mysql_error());
	while ($r_page = mysql_fetch_row($q_page))
 { if ($r_page[0]==""){}else{$page_length=$r_page[0];}}	

$text_q='SELECT distinct complaints.id , notice, num_complaints
FROM  link_complaints 
JOIN complaints ON link_complaints.id_complaints = complaints.Id
JOIN incoming ON link_complaints.id_incoming_c = incoming.id
JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 
JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj
JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link where complaints_year="'.$year.'" group by complaints.id , id_incoming_c, id_obj_c, id_address, id_violation ORDER BY complaints.id DESC ';


$q_obj=mysql_query ($text_q)or die (Mysql_error());
$count=mysql_num_rows($q_obj);
$max_col=$count;
$page_count=floor($max_col/$page_length);
if (($max_col%$page_length)>0){$page_count=$page_count+1;}
for($x=1; $x<=($page_count);$x++){
$span=$span.'<input name="page_'.$x.'" align="center"  type="button" value="'.$x.'" onclick="page_length_fun('."'".$x."'".", 'obr'".')"/>';
}


$end=$max_col-($page_length*$col_end);
$begin=$end+$page_length;
//echo $begin.' '.$end;
while ($r_obj = mysql_fetch_row($q_obj))
 {
 if (($count<=($begin)) and ($count>($end))){
 $i++;
$incom=incom($r_obj[0]);
$obj=obj($r_obj[0]);
$address=address($r_obj[0]);
$v=v($r_obj[0]);

$pp='<tr><td>'.$r_obj[2].'</td><td>'.$incom.'</td><td>'.$obj.'</td><td>'.$address.'</td><td>'.$v.'</td><td>'.iconv("utf-8","windows-1251",$r_obj[1]).'</td><td><input   type="button" name="tab_button_obr" value="&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088;"  onclick="show_view('."'obr', ".$r_obj[0].')" /></td></tr>';

//echo $pp;
$buf1=$buf1.$pp;
	} 
	$count--;
	}


$span='<table><tr><td width="25%">&#1042;&#1089;&#1077;&#1075;&#1086; &#1079;&#1072;&#1087;&#1080;&#1089;&#1077;&#1081; : <b>'.$max_col.'   </b><p>&#1050;&#1086;&#1083;&#1080;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086; &#1089;&#1090;&#1088;&#1086;&#1082; <input align="left"  maxlength="3" size ="1"  type="text" id="page_col" value="'.$page_length.'" onkeydown="page_update_length('."'obr'".',event)" /></p></td><td align="center">'.$span.'</td></tr></table>';
echo $span;		
echo '<p><input value="&#1060;&#1080;&#1083;&#1100;&#1090;&#1088;" id="Filtr_obr"  onclick="filtr_obr_fun()" type="button"/></p>' ;include("filrt_obr.php"); 
echo '<table width="100%"  border="2" align="center" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF id="obr_table">
<td  height="46" class="td_style_1"><div align="center"><strong>&#8470;</strong></div></td>
<td class="td_style_2"><div align="center"><strong>&#1053;&#1086;&#1084;&#1077;&#1088; &#1080; &#1076;&#1072;&#1090;&#1072; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; </strong></div></td>
<td  class="td_style_4"><div align="center"><b>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090;</b></div></td>
<td class="td_style_5"><div align="center"><b>&#1052;&#1077;&#1089;&#1090;&#1086; &#1087;&#1088;&#1086;&#1074;&#1077;&#1076;&#1077;&#1085;&#1080;&#1103;</b></div></td>
<td  class="td_style_7"><div align="center"><b>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</b>
</div>
<td class="td_style_8"><div align="center"><b>&#1055;&#1088;&#1080;&#1084;&#1077;&#1095;&#1072;&#1085;&#1080;&#1077; </b></div></td>
<td width="9%" class="td_style_9"><div align="center"><b>&#1044;&#1077;&#1081;&#1089;&#1090;&#1074;&#1080;&#1077;</b></div></td>
</tr>'.$buf1.'</table>';
echo $span;
}

function incom($id_obr){
$text_q='SELECT distinct num_incoming, incoming_date
FROM  link_complaints 
 JOIN complaints ON link_complaints.id_complaints = complaints.Id
 JOIN incoming ON link_complaints.id_incoming_c = incoming.id
  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 
 JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj
  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link where complaints.id ="'.$id_obr.'"';


$q_obj=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj = mysql_fetch_row($q_obj))
 {
 
$incom=$incom.'<p>'.iconv("utf-8","windows-1251",$r_obj[0]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_obj[1])).'</p>';
 }

return $incom;
}


function obj($id_obr){
 $text_q='SELECT distinct Name_org,license
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
						
						$obj=$obj.'<p>'.$lic.iconv("utf-8","windows-1251",$r_obj1[0]).'</p>';
				}
return $obj;
}


function address($id_obr){
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


  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link  WHERE complaints.id="'.$id_obr.'"';
 $count_rec=0;
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				$ii++;
	
			/*
			$v=v($id_obr);
$count_v=$count_rec;//count($address);
if($count_v>1){$rowspan=' rowspan="'.$count_v.'"';}else{$rowspan="";}


	if(count($v)>1){$rowspan=' rowspan="'.count($v).'"';}else{$rowspan="";}
	if(!$rowspan==""){$td='<td'.$rowspan.'>';}else{$td='<td>';	}
	unset($x);
$text_v="";
for($x=1; $x<=(count($v));$x++){
if($x==1){$text_v=$text_v.$v[$x].'</tr>';}else{
$text_v=$text_v.'<tr>'.$v[$x].'</tr>';}
}	
			
			*/
		
				if(($r_obj1[3]=="")or($r_obj1[3]=="0")){$housing="";}else{$housing=', '.iconv("utf-8","windows-1251",$r_obj1[3]);}
				if(($r_obj1[4]=="")or($r_obj1[4]=="0")){$flat="";}else{$flat=', '.$r_obj1[4];}
				
$address=$address.'<p>'.iconv("utf-8","windows-1251",$r_obj1[0]).', '.iconv("utf-8","windows-1251",$r_obj1[1]).', '.$r_obj1[2].$housing.$flat.'</p>';
				
				}
		
return $address;
}



function v($id_obr){//,$id_address){
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


 WHERE complaints.id="'.$id_obr.'" ';//AND id_address="'.$id_address.'"';
 
	  		$q_obj1=mysql_query ($text_q)or die (Mysql_error());
				while ($r_obj1 = mysql_fetch_row($q_obj1))
				{
				
		
			
$v=$v.'<p>'.iconv("utf-8","windows-1251",$r_obj1[1]).' - '.iconv("utf-8","windows-1251",$r_obj1[0]).'</p>';
		
			}
return $v;
}


?>
