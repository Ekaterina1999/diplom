<?

include_once("..\link\link.php");
	
	
$year=$_POST['year_r'];
$where=' and  `act`.`act_year`="'.$year.'" ';
switch ($_POST['period']){
	case (1): echo '<b><p>I  &#1087;&#1086;&#1091;&#1075;&#1086;&#1076;&#1080;&#1077;  '.$year.' &#1075;&#1086;&#1076;&#1072;</p></b>';
	$where=$where.'  and (`act`.`Date_act`>="'.$year.'-01-01" and `act`.`Date_act`<"'.$year.'-07-01") ';
	break;
	case (2): echo '<b><p>'.$year.' &#1075;&#1086;&#1076;</p></b>';
	break;
	}
	
$text_q='SELECT * FROM `report_1l` order by `section` ';
$report=mysql_query ($text_q)or die (Mysql_error());	
		while ($row_report = mysql_fetch_row($report))
 			{ if($r!==$row_report[7]){ if ($r1==""){$r1='<b><p>&#1056;&#1077;&#1079;&#1076;&#1077;&#1083; &#8470;'.$row_report[7].'</b></p><table width="100%" border="2" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"><tr><td>&#1053;&#1072;&#1080;&#1084;&#1077;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077;    &#1087;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1077;&#1083;&#1077;&#1081;</td><td>&#8470; &#1089;&#1090;&#1088;&#1086;&#1082;&#1080;</td><td>&#1045;&#1076;&#1080;&#1085;&#1080;&#1094;&#1072; &#1080;&#1079;&#1084;&#1077;&#1088;&#1077;&#1085;&#1080;&#1103;</td><td width="77">&#1050;&#1086;&#1076; &#1087;&#1086; &#1054;&#1050;&#1045;&#1048;</td><td>&#1042;&#1089;&#1077;&#1075;&#1086;</td></tr><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>';}else{
			if($row_report[7]=="2"){$r2="<td>&#1055;&#1083;&#1072;&#1085;&#1086;&#1074;&#1099;&#1077;    &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;</td><td>&#1042;&#1085;&#1077;&#1087;&#1083;&#1072;&#1085;&#1086;&#1074;&#1099;&#1077; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;</td>";}else{$r2="";}
			$r1=$r1.'</table><b><p>&#1056;&#1077;&#1079;&#1076;&#1077;&#1083; &#8470;'.$row_report[7].'</b><table width="100%" border="2" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"><tr><td>&#1053;&#1072;&#1080;&#1084;&#1077;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1077;    &#1087;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1077;&#1083;&#1077;&#1081;</td><td>&#8470; &#1089;&#1090;&#1088;&#1086;&#1082;&#1080;</td><td>&#1045;&#1076;&#1080;&#1085;&#1080;&#1094;&#1072; &#1080;&#1079;&#1084;&#1077;&#1088;&#1077;&#1085;&#1080;&#1103;</td><td width="77">&#1050;&#1086;&#1076; &#1087;&#1086; &#1054;&#1050;&#1045;&#1048;</td><td>&#1042;&#1089;&#1077;&#1075;&#1086;</td>'.$r2.'</tr><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>';}}
					if (($row_report[7]!=="2")) {
							$r1=$r1.'<tr><td>'.iconv("utf-8","windows-1251",$row_report[0]).'</td><td>'
							.$row_report[1].'</td><td>'.iconv("utf-8","windows-1251",$row_report[2]).'</td><td>'.$row_report[3].'</td>';
								 if (($row_report[4]=="?")or($row_report[4]=="0")){$r1=$r1.'<td>'.$row_report[4].'</td></tr>';}
								 else{
								 	$text_r="";
									$text_r=$row_report[4].$where;
										$report_1=mysql_query ($text_r)or die (Mysql_error());
										while ($row_report_1 = mysql_fetch_row($report_1))
										{  $r1=$r1.'<td>'.$row_report_1[0].'</td></tr>';}
									}
 						}
						else
						{	$r1=$r1.'<tr><td>'.iconv("utf-8","windows-1251",$row_report[0]).'</td><td>'
							.$row_report[1].'</td><td>'.iconv("utf-8","windows-1251",$row_report[2]).'</td><td>'.$row_report[3].'</td>';
 if (($row_report[4]=="?")or($row_report[4]=="0")){$r1=$r1.'<td>'.$row_report[4].'</td>';}
 else{
								 	$text_r="";
									$text_r=$row_report[4].$where;
									$report_2=mysql_query ($text_r)or die (Mysql_error());
										while ($row_report_2 = mysql_fetch_row($report_2))
										{  $r1=$r1.'<td>'.$row_report_2[0].'</td>';}}
if (($row_report[5]=="?")or($row_report[5]=="0")){$r1=$r1.'<td>'.$row_report[5].'</td>';} 
else{	$text_r="";
									$text_r=$row_report[5].$where;
									//echo $text_r;
										$report_3=mysql_query ($text_r)or die (Mysql_error());
										while ($row_report_3 = mysql_fetch_row($report_3))
										{  $r1=$r1.'<td>'.$row_report_3[0].'</td>';}	}	
								 	 if (($row_report[6]=="?")or($row_report[6]=="0")){$r1=$r1.'<td>'.$row_report[6].'</td></tr>';}else
								 
										{		 
											$text_r="";
									$text_r=$row_report[6].$where;
										$report_4=mysql_query ($text_r)or die (Mysql_error());
										while ($row_report_4 = mysql_fetch_row($report_4))
										{  $r1=$r1.'<td>'.$row_report_4[0].'</td></tr>';}
									}
						
						}
$r=$row_report[7];
 
 }	

echo $r1;
	

?>