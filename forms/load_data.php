<?php
	include_once("link\link.php");
$val=$_POST['val'];
$choice=$_POST['choice'];
$user=$_POST['user_val'];
$basis=$_POST['basis'];
switch ($choice){
case 1:
list_obr($val,$user,$basis);
break;
case 2:
list_user($val);
break;
case 3:
list_rasp($val,$user,$basis);
break;
case 4:
list_act($val,$user);
break;
case 5:
list_predpis($val,$user);
break;
case 6:
list_u_protocol($val,$user);
break;
}



function list_obr($val,$user,$basis){
 $op1='<option value="0"></option>';
$date = new \DateTime();
switch ($val) {
case 0:
   $where='where incoming_date="'.$date->format('Y-m-d').'"';
    break;
case 1:
     $in=$date->modify('last Monday')->format('Y-m-d');
$out=$date->modify(' +1 week');
$out=$out->modify('last Sunday')->format('Y-m-d');
$where='where incoming_date>="'.$in.'" and incoming_date<="'.$out.'"';
    break;
case 2:
      
$where='where incoming_date>="'.$date->format('Y-m-01').'" and incoming_date<="'.$date->format('Y-m-t').'"';
    break;
case 3:
    $where='where complaints_year="'.date('Y').'"';
    break;
	case 4:
    $where="";
    break;
}

if ($user==0){}else{
if ($where==""){$where='where link_complaints_workers.id_workers="'.$user.'" ';}
else {$where=$where.' and link_complaints_workers.id_workers="'.$user.'" ';}
}
//$where='where incoming_date>"'..'" and incoming_date<="'..'"';
//$where='where complaints_year="'..'"';

$q_text='SELECT distinct complaints.Id, num_incoming, incoming_date FROM  link_complaints  JOIN complaints ON link_complaints.id_complaints = complaints.Id JOIN incoming ON link_complaints.id_incoming_c = incoming.id  JOIN link_complaints_obj ON link_complaints_obj.id_complaints = complaints.Id  JOIN link_complaints_address ON link_complaints_obj.id = link_complaints_address.id_link_complaints_obj  JOIN link_complaints_violation ON link_complaints_address.id = link_complaints_violation.id_address_link JOIN link_complaints_workers ON link_complaints_workers.id_complants = complaints.Id '.$where.' order by  complaints.Id';
//echo $q_text;
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) 
					{
					if( $r[0]==$obr){
					 $op[$i]=$op[$i].', '.iconv("utf-8","windows-1251",$r[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r[2]));
					
					
					}
					else{
					$i++;
					$value[$i]=$r[0];
					$op[$i]=iconv("utf-8","windows-1251",$r[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r[2]));}
					
					$obr=$r[0];
					
					}
				
for($x=0; $x<=(count($op));$x++){
 if ($op[$x]==""){} else{
 $op1=$op1.'<option value="'.$value[$x].'">'.$op[$x].'</option>';
 }

}
 echo $op1;

}

function list_user($val){

$op1='<option value="'.$_COOKIE['userid'].'">&#1058;&#1077;&#1082;&#1091;&#1097;&#1080;&#1081; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1100; </option>';
$op1=$op1.'<option value="0">&#1042;&#1089;&#1077; </option>';
$q_text='SELECT `id`,`FIO` FROM `workers` where (`id`<>"'.$_COOKIE['userid'].'") order by  `FIO`';
//echo $q_text.' ';
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) 
					{ if ($r[0]==""){}else 
					{$op1=$op1.'<option value="'.$r[0].'">'.iconv("utf-8","windows-1251",$r[1]).'</option>';}
					}
echo $op1;
}


function list_rasp($val,$user,$basis){
 $op1='<option value="0"></option>';
$date = new \DateTime();
switch ($val) {
case 0:
   $where='where date_order="'.$date->format('Y-m-d').'"';
    break;
case 1:
     $in=$date->modify('last Monday')->format('Y-m-d');
$out=$date->modify(' +1 week');
$out=$out->modify('last Sunday')->format('Y-m-d');
$where='where date_order>="'.$in.'" and date_order<="'.$out.'"';
    break;
case 2:
      
$where='where date_order>="'.$date->format('Y-m-01').'" and date_order<="'.$date->format('Y-m-t').'"';
    break;
case 3:
    $where='where year(date_order)="'.date('Y').'"';
    break;
		case 4:
    $where="";
    break;
}

if ($user==0){}else{
if ($where==""){$where='where link_order_workers.id_workers="'.$user.'" ';}
else {$where=$where.' and link_order_workers.id_workers="'.$user.'" ';}
}
//$where='where incoming_date>"'..'" and incoming_date<="'..'"';
//$where='where complaints_year="'..'"';

$q_text='SELECT distinct  `order`.`id_order`, `order`.`num_order`, `order`.`date_order` ,  `order`.`id_base` 
FROM  `order` 
LEFT JOIN  `link_order_obj` ON  `order`.`id_order` =  `link_order_obj`.`id_order` 
LEFT JOIN  `link_order_workers` ON  `order`.`id_order` =  `link_order_workers`.`id_order` 
LEFT JOIN  `link_order_address` ON  `link_order_obj`.`id` =  `link_order_address`.`id_link_order_obj` 
LEFT JOIN  `link_order_violation` ON  `link_order_address`.`id` =  `link_order_violation`.`id_address_link` '.$where.' order by  `order`.`id_order`';

//echo $q_text;
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) 
					{
					if( $r[0]==$obr){
					 $op[$i]=$op[$i].', '.iconv("utf-8","windows-1251",$r[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r[2]));
					
					
					}
					else{
					$i++;
					$value[$i]=$r[0];
					$basis_rasp[$i]=$r[3];
					$op[$i]=iconv("utf-8","windows-1251",$r[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r[2]));}
					
					$obr=$r[0];
					
					}
				
for($x=0; $x<=(count($op));$x++){
 if ($op[$x]==""){} else{
 $op1=$op1.'<option value="'.$value[$x].'" basis_rasp="'.$basis_rasp[$x].'">'.$op[$x].'</option>';
 }

}
 echo $op1;

}



function list_act($val,$user){
 $op1='<option value="0"></option>';
$date = new \DateTime();
switch ($val) {
case 0:
   $where='where date_act="'.$date->format('Y-m-d').'"';
    break;
case 1:
     $in=$date->modify('last Monday')->format('Y-m-d');
$out=$date->modify(' +1 week');
$out=$out->modify('last Sunday')->format('Y-m-d');
$where='where date_act>="'.$in.'" and date_act<="'.$out.'"';
    break;
case 2:
      
$where='where date_act>="'.$date->format('Y-m-01').'" and date_act<="'.$date->format('Y-m-t').'"';
    break;
case 3:
    $where='where year(date_act)="'.date('Y').'"';
    break;
	case 4:
    $where="";
    break;	
}

if ($user==0){}else{
if ($where==""){$where='where link_act_workers.id_workers="'.$user.'" ';}
else {$where=$where.' and link_act_workers.id_workers="'.$user.'" ';}
}
//$where='where incoming_date>"'..'" and incoming_date<="'..'"';
//$where='where complaints_year="'..'"';

$q_text='SELECT distinct `act`.`id`,`act`.`num`,`act`.`date_act`,`order`.`id_base`,`order`.`id_order` FROM act
 JOIN `linc_act_violation` ON `act`.`id` = `linc_act_violation`.`id_act` 
 JOIN `link_act_workes` ON `act`.`id` = `link_act_workes`.`id_act` 
 JOIN  `order` ON  `act`.`id_order` =  `order`.`id_order`  '.$where.' order by  `act`.`id`';

//echo $q_text;
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) 
					{
					
					
					
					$op1=$op1.'<option value="'.$r[0].'"  val_order="'.$r[4].'" val_base="'.$r[3].'">'.iconv("utf-8","windows-1251",$r[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r[2])).'</option>';
					
					
					
					}
				

 echo $op1;

}

function list_predpis($val,$user){
$op1='<option value="0"></option>';
$date = new \DateTime();
switch ($val) {
			case 0:
			   $where='where Date_ordinance="'.$date->format('Y-m-d').'"';
		    break;
			case 1:
			     $in=$date->modify('last Monday')->format('Y-m-d');
				$out=$date->modify(' +1 week');
				$out=$out->modify('last Sunday')->format('Y-m-d');
				$where='where Date_ordinance>="'.$in.'" and Date_ordinance<="'.$out.'"';
		    break;
			case 2:
      			$where='where Date_ordinance>="'.$date->format('Y-m-01').'" and Date_ordinance<="'.$date->format('Y-m-t').'"';
		    break;
			case 3:
			    $where='where year_ordinance="'.date('Y').'"';
		    break;
				case 4:
    $where="";
    break;
}

if ($user==0){}else{
		if ($where==""){$where='where   `link_ordinance_workers`.`id_workers` ="'.$user.'" ';}
		else {$where=$where.' and   `link_ordinance_workers`.`id_workers` ="'.$user.'" ';}
}
if ($where==""){$where=' where `ordinance_violation`.`eliminated` =  "0"';}else{$where=$where.' and `ordinance_violation`.`eliminated` =  "0"';}


$q_text='SELECT distinct `ordinance`.`id`, `ordinance`.`num` ,    `ordinance`.`Date_ordinance`
FROM ordinance
JOIN  `link_ordinance_workers` ON  `ordinance`.`id` =  `link_ordinance_workers`.`id_ordinance` 
JOIN  `ordinance_violation` ON  `ordinance`.`id` =  `ordinance_violation`.`id_ordinance`  '.$where.' order by `ordinance`.`id`';
echo $q_text;
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) 
					{
						if( $r[0]==""){
						}
						else{
						$op1=$op1.'<option value="'.$r[0].'">'.$r[1].' &#1086;&#1090;: '.date('d.m.Y',strtotime($r[2])).'</option>';			}
					}
					echo $op1;
					
}

function list_u_protocol($val,$user){
 $op1='<option value="0"></option>';
$date = new \DateTime();
switch ($val) {
case 0:
   $where='where date_notify="'.$date->format('Y-m-d').'"';
    break;
case 1:
     $in=$date->modify('last Monday')->format('Y-m-d');
$out=$date->modify(' +1 week');
$out=$out->modify('last Sunday')->format('Y-m-d');
$where='where date_notify>="'.$in.'" and date_notify<="'.$out.'"';
    break;
case 2:
      
$where='where date_notify>="'.$date->format('Y-m-01').'" and date_notify<="'.$date->format('Y-m-t').'"';
    break;
case 3:
    $where='where year(date_notify)="'.date('Y').'"';
    break;
		case 4:
    $where="";
    break;
}

if ($user==0){}else{
if ($where==""){$where='where link_u_protocol_workers.id_workers="'.$user.'" ';}
else {$where=$where.' and link__u_protocol_workers.id_workers="'.$user.'" ';}
}
//$where='where incoming_date>"'..'" and incoming_date<="'..'"';
//$where='where complaints_year="'..'"';

$q_text='SELECT    `notify_protocol`.`id` ,    `notify_protocol`.`num` ,   `notify_protocol`.`date_notify` FROM notify_protocol LEFT JOIN  `link_u_protocol_workers` ON  `notify_protocol`.`id` =  `link_u_protocol_workers`.`id_u_protocol`  '.$where.' order by  `notify_protocol`.`id`';

//echo $q_text;
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) 
					{
					
					
					
					$op1=$op1.'<option value="'.$r[0].'"  >'.iconv("utf-8","windows-1251",$r[1]).' &#1086;&#1090;: '.date('d.m.Y',strtotime($r[2])).'</option>';
					
					
					
					}
				

 echo $op1;

}


?>