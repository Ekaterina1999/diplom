<?php

		include_once("..\link\link.php");
$id_rasp=$_POST['id_rasp'];

$text_q='SELECT distinct `link_order_address`.id_address FROM `link_order_obj` 
LEFT JOIN `link_order_address` ON `link_order_obj`.`id` = `link_order_address`.`id_link_order_obj` 
where link_order_obj.id_order="'.$id_rasp.'"';
$adr="";
$q_address=mysql_query ($text_q)or die (Mysql_error());
while ($r_address = mysql_fetch_row($q_address))
 {
 if ($r_address[0]==0){}else{
 if($adr==""){$adr=$r_address[0];}else{$adr=$adr.', '.$r_address[0];}
 }
 }
$op='<p>&#1040;&#1076;&#1088;&#1077;&#1089; <select id="address_rasp" onchange="obj_rasp1()" >';
 
 if (!$adr==""){
 $text_q2='SELECT  `address`.`id` ,  `city_zab`.name,  `street_zab`.name,  `address`.`house` ,  `address`.`housing` ,  `address`.`flat` 
FROM address
LEFT JOIN  `city_zab` ON  `address`.`id_city` =  `city_zab`.`id` 
LEFT JOIN  `street_zab` ON  `address`.`id_street` =  `street_zab`.`id` 
WHERE  `address`.`id` 
IN ('.$adr.') ';
$i=0;
$q_address2=mysql_query ($text_q2)or die (Mysql_error());
while ($r_address2 = mysql_fetch_row($q_address2))
 { if ($r_address2[0]==0){}else{
			 if ($i==0){$id_frist=$r_address2[0];}
			 if ($r_address2[4]==""){$housing="";}else{
			$housing=' &#1082;&#1086;&#1088;&#1087;. '.iconv("utf-8","windows-1251",$r_address2[4]);}
				 if ($r_address2[5]==0){$flat="";}else{
					$flat=' &#1082;&#1074;. '.$r_address2[5];}
  $op=$op.'<option  value="'.$r_address2[0].'">'.iconv("utf-8","windows-1251",$r_address2[1]).' '.iconv("utf-8","windows-1251",$r_address2[2]).' &#1076;. '.$r_address2[3].$housing.$flat.'</option>';
  $i++;	 }

 }

 }
 $text="'#obj_rasp option:selected'";
 $attr="'micro_org'";
 echo $op.'</select>  	<input id="id_adr" type="hidden" value="'.$id_frist.'" /><p>&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; (&#1059;&#1050;, &#1058;&#1057;&#1046; &#1080; &#1090;&#1076;.)   <select id="obj_rasp" onchange="obj_rasp2($('.$text.').attr('.$attr.'))">';
 require_once("obj_load.php"); 
  $res=create_sel($id_rasp,$id_frist);
  echo $res[0];
 echo '</select></p>';
echo '<input id="micro" type="hidden" value="'.$res[1].'"/>';
  echo '<script>   var el=document.getElementById("choice_list");
      var  basis_rasp= el.options[[el.selectedIndex]].attributes["basis_rasp"].value;
    if (basis_rasp=="3"){document.getElementById("predpis_isp_view").style.display="block";}
    else
    {document.getElementById("predpis_isp_view").style.display="none";}

   obj_rasp2('.$res[1].'); 
	</script>';
?>