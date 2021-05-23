<?php 
include_once("..\..\link\link.php");

$el=$_POST['el'];
$id_rasp=$_POST['id_rasp'];
$val=$_POST['val'];
$butt_id=$_POST['butt_id'];
//echo $el;
switch($el){
case ("obj"):
obj($id_rasp,$val,$butt_id);
break;
case ("adr"):
adr($id_rasp,$val);
break;
}
 function obj($id_rasp,$val,$butt_id){
$text_q='SELECT  `id_obj_c`,`id` FROM `link_order_obj` WHERE `id_order`="'.$id_rasp.'"';
$q_obj_order=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj_order = mysql_fetch_row($q_obj_order))
{$obj_order=$r_obj_order[0];}
if ($obj_order==""){ 
		$text_q='INSERT INTO `link_order_obj` (`id_order`, `id_obj_c`)
		 VALUES ( "'.$id_rasp.'", "'.$val.'")';
	  	$add_t=mysql_query($text_q);
		$text_q='SELECT  `id_obj_c`,`id` FROM `link_order_obj`  WHERE `id_order`="'.$id_rasp.'"';
  		$q_obj_order=mysql_query ($text_q)or die (Mysql_error());
		while ($r_obj_order = mysql_fetch_row($q_obj_order))
		{$obj_order=$r_obj_order[0];
				if ($obj_order==""){echo "2";}
				else{
						if($butt_id=="1"){echo "1";}
						else{adr($id_rasp,"");}	
		}			}	
				
}else{echo "0";}
 }
 
 function adr($id_rasp,$val1){
 $q_text_o='SELECT `id`,  `id_obj_c` FROM `link_order_obj` WHERE `id_order`="'.$id_rasp.'"';

 $q_t_o=mysql_query ($q_text_o)or die (Mysql_error());
				while ($r_t_o = mysql_fetch_row($q_t_o))
				{$obj=$r_t_o[1]; $id_order=$r_t_o[0];
				}
if ($obj==""){echo "3";}else{	if($val1==""){$where_adr="";}else{$where_adr=' and id_address="'.$val1.'"';}			
	$text_q='SELECT distinct id_address FROM  link_complaints 
	 JOIN complaints ON link_complaints.id_complaints = complaints.Id
	 JOIN incoming ON link_complaints.id_incoming_c = incoming.id
	  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 
	 JOIN link_complaints_address ON 
	 link_complaints_obj.id = link_complaints_address.id_link_complaints_obj
	  JOIN link_complaints_violation 
	  ON link_complaints_address.id = link_complaints_violation.id_address_link 
	JOIN  violation ON violation.ID_violation =link_complaints_violation.ID_violation 
	JOIN  type_violation ON  violation.ID_TYPE_VIOLATION =type_violation.Id_type_violation 
	join complaints_order on  complaints.id=complaints_order.`id_complaints`
	WHERE complaints_order.`id_order`="'.$id_rasp.'" and `link_complaints_obj`.`id_obj_c`="'.$obj.'"'.$where_adr;

	$q_adr=mysql_query ($text_q)or die (Mysql_error());
	while ($r_adr = mysql_fetch_row($q_adr))
	{ $val_adr=$r_adr[0];
	$count++;
		if ($val_adr=="")
		{$count2++;}else{
			
			$q_t='SELECT    id_address FROM link_order_obj
			LEFT JOIN   `link_order_address` ON  
			`link_order_obj`.`id` =  `link_order_address`.`id_link_order_obj` 
			LEFT JOIN   `link_order_violation`
			ON  `link_order_address`.`id` =`link_order_violation`.`id_address_link`
			join complaints_obj on complaints_obj.id=link_order_obj.`id_obj_c`
			WHERE   link_order_obj.`id_order` ="'.$id_rasp.'" and 
			`link_order_obj`.`id_obj_c`="'.$obj.'"
			and `link_order_address`.`id_address`="'.$val_adr.'"';
		
				$q_v=mysql_query ($q_t)or die (Mysql_error());
				while ($r_q_v = mysql_fetch_row($q_v)){$id_adr=$r_q_v[0];}
						if ($id_adr==""){
								$text_q='INSERT INTO `link_order_address` 
								(`id_address`, `id_link_order_obj`) VALUES 
								("'.$val_adr.'","'.$id_order.'")';
						
 						  		$add_t=mysql_query($text_q);
								$q_t='SELECT    `link_order_address`.`id` FROM link_order_obj 
								LEFT JOIN   `link_order_address`
								ON  `link_order_obj`.`id` =  `link_order_address`.`id_link_order_obj`
								LEFT JOIN   `link_order_violation` 
								ON  `link_order_address`.`id` = `link_order_violation`.`id_address_link` 								join complaints_obj on complaints_obj.id=link_order_obj.`id_obj_c`
								WHERE   link_order_obj.`id_order` ="'.$id_rasp.'" 
								and `link_order_address`.`id_address`="'.$val_adr.'"';
								
									$q_v=mysql_query ($q_t)or die (Mysql_error());
									while ($r_q_v = mysql_fetch_row($q_v)){	$val11=$r_q_v[0];}
											if($val11<>""){v($id_rasp,$val11,$obj,$val_adr);}else{echo "2";}
								}else{ echo "0";}
						
				
}
 }
 }
 }
 
 function v($id_rasp,$id_adr,$obj,$val_adr){
 $text_q='SELECT distinct violation.ID_violation FROM  link_complaints 
	 JOIN complaints ON link_complaints.id_complaints = complaints.Id
	 JOIN incoming ON link_complaints.id_incoming_c = incoming.id
	  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id 
	 JOIN link_complaints_address ON 
	 link_complaints_obj.id = link_complaints_address.id_link_complaints_obj
	  JOIN link_complaints_violation 
	  ON link_complaints_address.id = link_complaints_violation.id_address_link 
	JOIN  violation ON violation.ID_violation =link_complaints_violation.ID_violation 
	JOIN  type_violation ON  violation.ID_TYPE_VIOLATION =type_violation.Id_type_violation 
	join complaints_order on  complaints.id=complaints_order.`id_complaints`
	WHERE complaints_order.`id_order`="'.$id_rasp.'" and `link_complaints_obj`.`id_obj_c`="'.$obj.'" and id_address="'.$val_adr.'"';
	//echo $text_q;
		$q_v=mysql_query ($text_q)or die (Mysql_error());
	while ($r_v = mysql_fetch_row($q_v))
	{ $v=$r_v[0];
	$count++;
		if ($v=="")
		{$count2++;}else{
			
			$q_t='SELECT    `link_order_violation`.`ID_violation` FROM link_order_obj
			LEFT JOIN   `link_order_address` ON  
			`link_order_obj`.`id` =  `link_order_address`.`id_link_order_obj` 
			LEFT JOIN   `link_order_violation`
			ON  `link_order_address`.`id` =`link_order_violation`.`id_address_link`
			join complaints_obj on complaints_obj.id=link_order_obj.`id_obj_c`
			WHERE   link_order_obj.`id_order` ="'.$id_rasp.'" and 
			`link_order_obj`.`id_obj_c`="'.$obj.'"
			and `link_order_address`.`id`="'.$id_adr.'"';
			//echo $q_t;
				$q_v=mysql_query ($q_t)or die (Mysql_error());
				while ($r_q_v = mysql_fetch_row($q_v)){$id_v=$r_q_v[0];}
						if ($id_v==""){
								$text_q='INSERT INTO `link_order_violation` 
								(`id_violation`, `id_address_link`) 
								VALUES ("'.$v.'", "'.$id_adr.'")';
								//echo $text_q;
 						  		$add_t=mysql_query($text_q);
								$q_t='SELECT   `link_order_violation`.`ID_violation` FROM link_order_obj 
								LEFT JOIN   `link_order_address`
								ON  `link_order_obj`.`id` =  `link_order_address`.`id_link_order_obj`
								LEFT JOIN   `link_order_violation` 
								ON  `link_order_address`.`id` = `link_order_violation`.`id_address_link` 								join complaints_obj on complaints_obj.id=link_order_obj.`id_obj_c`
								WHERE   link_order_obj.`id_order` ="'.$id_rasp.'" 
								and `link_order_address`.`id_address`="'.$val_adr.'"';
								//echo $q_t;
									$q_v=mysql_query ($q_t)or die (Mysql_error());
									while ($r_q_v = mysql_fetch_row($q_v)){	$v1=$r_q_v[0];}
											if($v1==""){echo "2";}
								}else{ echo "0";}
						
				
}
 }
 }

?>
