<?php 


$year_f=$_POST['year_f'];
$date_rmw1=$_POST['date_rmw1'];
$date_rmw2=$_POST['date_rmw2'];
$sel_rmw=$_POST['sel_rmw'];
 if ($sel_rmw=="0"){$depart="";}else{$depart="WHERE  `depart` in (0, ".$sel_rmw.')';}
include_once("..\link\link.php");
	$q='SELECT `name_f`, `text_q`, `date_name`, `user_name`, `year_name` FROM `report_rmw` '.$depart.' order by `id`';
//	echo $q;
include 'schet.php';
	$q_res=mysql_query ($q)or die (Mysql_error());
	while ($r = mysql_fetch_row($q_res))
 { 
 if ($r[1]==""){$p1="";$b='<b>';$b1="</b>";}else{ $b=""; $b1="";
 $p1=schet_rmw($r[1],$r[2],$r[3],$r[4],$year_f, $date_rmw1, $date_rmw2, $sel_rmw);
 }
 $pp=$pp."<tr><td>".$b.iconv("utf-8","windows-1251",$r[0]).$b1."</td><td>".$p1."</td></tr>";
 }	






	


$span='<table border="2" align="center" cellpadding="0" cellspacing="0">'.$pp.'</table>';
echo $span;		

//echo "FFFFFFFF";

?>
