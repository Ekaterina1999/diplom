<?


 include_once("..\link\link.php");
 $list=$_POST['list'];
 $period=$_POST['period'];
 $year_f=$_POST['year_f'];

$t_q_mrl=  'SELECT `id`, `name`, `period`, `Name_table` FROM `minstroy_report_list` WHERE `id`='.$list;

$q_mrl=mysql_query ($t_q_mrl)or die (Mysql_error());
while ($r_mrl = mysql_fetch_row($q_mrl))
 { 
 $body="<p><b>".$period.'-&#1081;'.iconv("utf-8","windows-1251",$r_mrl[2]).' '.$year_f.'-&#1075;&#1086; &#1075;&#1086;&#1076;&#1072;, '.iconv("utf-8","windows-1251",$r_mrl[1]).'</b></p>';
 
 $tab='<table id="tab_report" cellspacing="0" cellpadding="0" border="2" >
 <tr>';
 $t_q_mrcol=  'SELECT `id`, `Name`, `width_col` FROM `minstroy_report_column` WHERE  `id_report`='.$list.' and  `active_col`="1" order by `position_col`';
$c_col=0;
$q_mrcol=mysql_query ($t_q_mrcol)or die (Mysql_error());
while ($r_mrcol = mysql_fetch_row($q_mrcol))
 { 
 $c_col++;

   $tab=  $tab. ' <td  width="'.$r_mrcol[2].'">'.iconv("utf-8","windows-1251",$r_mrcol[1]).'</td>';
 
  
  
}

 $tab=$tab.'</tr>';
 
 
  $t_q_mrrow=  'SELECT `id`, `Name` FROM `minstroy_report_row` WHERE  `id_report`='.$list.' and  `active_row`="1" order by `position_row`';
//echo $t_q_mrrow;
$q_mrrow=mysql_query ($t_q_mrrow)or die (Mysql_error());
while ($r_mrrow = mysql_fetch_row($q_mrrow))
 { 
$f= formula($list, $r_mrrow[0]);
if ($f==""){
$td_big=' colspan="'.($c_col-1).'" '; $b_teg1="<b>"; $b_teg2="</b>";}else {$td_big=""; $b_teg1="";    $b_teg2="";}
   $tab=  $tab. ' <tr><td'.$td_big.'>'.$b_teg1.iconv("utf-8","windows-1251",$r_mrrow[1]).$b_teg2.'</td>'.$f;
   
 
     $tab=  $tab.'</tr>';
  
}
 
 $body=$body.$tab;
echo $body;
}

function formula($id_report, $id_row){

$td="";
  $t_q_mrf=  'SELECT `id`,  `type`, `text_formula`,  `id_column`, `version_report` FROM `minstroy_report_formula` where `id_report`="'.$id_report.'" and `id_row`="'.$id_row.'" order by `id_column` ';
//echo $t_q_mrf;
$q_mrf=mysql_query ($t_q_mrf)or die (Mysql_error());
while ($r_mrf = mysql_fetch_row($q_mrf))
 { 
 if($r_mrf[1]=="1") {$td=$td.'<td>'.iconv("utf-8","windows-1251",$r_mrf[2]).'</td>';}
  if($r_mrf[1]=="2") {
  $where="";
  						  $t_q_mrcon=  'SELECT `id`, `param_c`, `metod_c`, `conditions`, `unity_conditions`, `position_c`, `type_c` FROM `minstroy_report_conditions` where  `id_f`='.$r_mrf[0].' order by `position_c` ';
//echo $t_q_mrcon;
$q_mrcon=mysql_query ($t_q_mrcon)or die (Mysql_error());
while ($r_mrcon = mysql_fetch_row($q_mrcon))
 {
switch ($r_mrcon[6])
{
case ("1"):
$val=$r_mrf[0];
break;

case ("3"):
$val=$_POST['period'];

break;

case ("2"):
if ($r_mrf[3]=="4"){
$val=  $_POST['year_f']-1;}else{$val=  $_POST['year_f'];}
break;
case ("4"):
 switch ($_POST['period']){
 	case ("1"):
	$val=$_POST['year_f']."-01-01";
	break;
	case ("2"):
	$val=$_POST['year_f']."-04-01";
	break;
	case ("3"):
	$val=$_POST['year_f']."-07-01";
	break;
	case ("4"):
	$val=$_POST['year_f']."-10-01";
	break;
 }
break;
case ("5"):
switch ($_POST['period']){
 	case ("1"):
	$val=$_POST['year_f']."-03-31";
	break;
	case ("2"):
	$val=$_POST['year_f']."-06-30";
	break;
	case ("3"):
	$val=$_POST['year_f']."-09-30";
	break;
	case ("4"):
	$val=$_POST['year_f']."-12-31";
	break;
 }
break;
 }
 if ($r_mrcon[4]==""){$unity_c1="";$unity_c2="";}else{if($r_mrcon[4]=="("){$unity_c1="(";$unity_c2="";}else{$unity_c1="";$unity_c2=")";}}
 if ($where==""){$where=' where '.$r_mrcon[3].' '.$unity_c1.$r_mrcon[1].$r_mrcon[2].'"'.$val.'"'.$unity_c2;}else{$where=$where.' '.$r_mrcon[3].' '.$unity_c1.$r_mrcon[1].$r_mrcon[2].'"'.$val.'"'.$unity_c2;}
 
 }
 
 				  $t_q_mrsql=  $r_mrf[2].$where;
//echo $t_q_mrsql;
$q_mrsql=mysql_query ($t_q_mrsql)or die (Mysql_error());
while ($r_mrsql = mysql_fetch_row($q_mrsql))
 {
 $td=$td.'<td>'.$t_q_mrsql.iconv("utf-8","windows-1251",$r_mrsql[0]).'</td>';
						
				}		
						
					}
 
 }

return $td;
}
?>