
<?

include_once("..\link\link.php");
	$year=$_POST['year_r'];

	switch ($_POST['period']){
	case (1): echo '<p>I &#1050;&#1074;&#1072;&#1088;&#1090;&#1072;&#1083; '.$year.' &#1075;&#1086;&#1076;&#1072;</p>';
	$where=$where.'  and (`ordinance_violation`.`Date_plan`>="'.$year.'-01-01" and `ordinance_violation`.`Date_plan`<"'.$year.'-04-01") ';
	break;
		case (2): echo '<p>II &#1050;&#1074;&#1072;&#1088;&#1090;&#1072;&#1083; '.$year.' &#1075;&#1086;&#1076;&#1072;</p>';
			$where=$where.'  and (`ordinance_violation`.`Date_plan`>="'.$year.'-03-01" and `ordinance_violation`.`Date_plan`<"'.$year.'-07-01") ';
			break;
			case (3): echo '<p>III &#1050;&#1074;&#1072;&#1088;&#1090;&#1072;&#1083; '.$year.' &#1075;&#1086;&#1076;&#1072;</p>';
				$where=$where.'  and (`ordinance_violation`.`Date_plan`>="'.$year.'-06-01" and `ordinance_violation`.`Date_plan`<"'.$year.'-09-01") ';
				break;
				case (4): echo '<p>IV &#1050;&#1074;&#1072;&#1088;&#1090;&#1072;&#1083; '.$year.' &#1075;&#1086;&#1076;&#1072;</p>';
					$where=$where.'  and (`ordinance_violation`.`Date_plan`>="'.$year.'-08-01" and `ordinance_violation`.`Date_plan`<"'.($year+1).'-01-01") ';
					break;
	}
	
$text_q='SELECT distinct `FIO`, `num`,  `Date_ordinance`,     `Date_plan`, `Date_prolongation`, `Date_execution`, `Date_cancellation`FROM `ordinance` 
join `ordinance_violation` on `ordinance_violation`.`id_ordinance`=`ordinance`.`id`
join `link_ordinance_workers` on `link_ordinance_workers`.`id_ordinance`=`ordinance`.`id`
join `workers` on  `workers`.`id`=`link_ordinance_workers`.`id_workers`

where `eliminated`=0 and `Date_plan`<now() '.$where.'
order by `workers`.`id_department`, `FIO`, `num`';
//echo $text_q;
	

	$q_l_i=mysql_query ($text_q)or die (Mysql_error());	
		while ($r_l_i = mysql_fetch_row($q_l_i))
 {
 if ($r_l_i[2]=="")
{$d1="";} else{$d1= date('d.m.Y',strtotime($r_l_i[2]));}
 
  if ($r_l_i[3]==""){$d2="";}else{$d2= date('d.m.Y',strtotime($r_l_i[3]));}
   if ($r_l_i[4]!==""){$d3="";}else{$d3= date('d.m.Y',strtotime($r_l_i[4]));}
    if ($r_l_i[5]!==""){$d4="";}else{$d4= date('d.m.Y',strtotime($r_l_i[5]));}
	 if ($r_l_i[6]==""){$d5="";}else{$d5= date('d.m.Y',strtotime($r_l_i[6]));}
 $data= $data.'<tr><td>'.iconv("utf-8","windows-1251",$r_l_i[0]).'</td><td>'.$r_l_i[1].' &#1086;&#1090; '.$d1.'</td><td>'.$d2.'</td><td>'.$d3.'</td><td>'.$d4.'</td><td>'.$d5.'</td></tr>';
}		
	

	
	echo '<table table width="100%"  border="2" align="center" cellpadding="0" cellspacing="0" bgcolor=#FFFFFF><tr><td>&#1060;&#1048;&#1054;</td>
<td>&#1055;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077; </td>

<td>&#1055;&#1083;&#1072;&#1085;&#1086;&#1074;&#1072;&#1103; &#1076;&#1072;&#1090;&#1072;</td>
<td>&#1044;&#1072;&#1090;&#1072; &#1080;&#1089;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1080;&#1103;</td>
<td>&#1044;&#1072;&#1090;&#1072; &#1087;&#1088;&#1086;&#1076;&#1083;&#1077;&#1085;&#1080;&#1103;</td>
<td>&#1044;&#1072;&#1090;&#1072; &#1080;&#1089;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1080;&#1103;</td>
<td>&#1044;&#1072;&#1090;&#1072; &#1086;&#1090;&#1084;&#1077;&#1085;&#1099;  </td>
<td>&nbsp;  </td><td>&#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</td></tr>'.$data.'
	
	</table>';
	

?>