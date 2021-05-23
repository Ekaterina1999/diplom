<?php
include_once("link\link.php");


$w=date('w',strtotime($_POST['data_start']));
if (($w==1)or($w==2)or($w==3)or($w==4)or($w==5)){//1
$date = date_create($_POST['data_start']);

$date_beg=$date;
$date_beg2 =$date_beg->format('Y-m-d');
//echo $date_beg2 ;
$year=$date_beg->format('Y');
$date_end=weekend($date,20);
$date_end2=date_create($date_end);
$year2=$date_end2->format('Y');



$text_q='SELECT `id`, `current_year`, `date_in`, `date_out`, `type_date` FROM `holidays` where (`current_year`="'.$year.'" or `current_year`="'.$year2.'") and (( `date_in`>="'.$date_beg2.'" and  `date_in`<="'.$date_end.'")or ( `date_out`>="'.$date_beg2.'" and  `date_out`<="'.$date_end.'"))' ;
echo $text_q;



$r=mysql_query ($text_q);
$t=0;
$day=1;
$c_d=0;
while ($myrow = mysql_fetch_row($r)) 
{//2
 		if ($myrow[0]==""){$t=0; break;}else
				{//3
				$t++;
				if ($myrow[4]==1){//4
				if(($myrow[2]>=$date_beg2) and($myrow[3]<=$date_beg2)){//5
				$day="err"; break;}else{
						           if ($myrow[2]==$myrow[3]){//6
								   $day++;}else
								   {$c_d=hollydays($myrow[2],$myrow[3],$date_beg2,$date_end);
								    $day=$day+$c_d;;}//6
						}//5
								}else{//4
									if ($myrow[2]==$myrow[3]){$day--;}
									else{$c_d=hollydays($myrow[2],$myrow[3],$date_beg2,$date_end); 
									$day=$day-$c_d;$cd=0;}
								}//4
								
				}//3
				
				
}//2

if ($t==0){$date_result=$date_end;}else
{
	$date_end2=weekend(date_create($date_end),($day));
	$w=date('w',strtotime($date_end2));
	$d=date_create($date_end2);
	if ($w==0){ $date_result=$d->modify('+ 1 day')->format('Y-m-d'); echo '+ 1 day';}
	if ($w==6){ $date_result=$d->modify('+ 2 day')->format('Y-m-d'); echo '+ 2 day';}
	if ((!$w==6)and(!$w==0))
	{$date_result=$d->format('Y-m-d'); echo '+ 0 day';}
}



//if($day=="err"){echo $day." err"; }else{
echo $day." ".$date_result.' t'.$t;//}
}//1

function weekend($d,$cd){
$date1= $d->format('Y-m-d');
$p=$cd;
//echo $p;
$x=1;
$y=0;
$z=0;
while ($x++<$p){
//echo $date->format('d.m.Y');
$week=date('w',strtotime($date1));

if (($week==0)or ($week==6)){$z++;
 $x--;
}else{$y++;}
//echo '<p>'. $date1.'  '.$week.'   week end='.$z.' job='.$y.'</p> ';
//} 
//echo $x;
$date1=$d->modify('+ 1 day')->format('Y-m-d');

}

$w=date('w',strtotime($date1));
switch ($w) {
case 0: $date2=$d->modify('+ 1 day')->format('Y-m-d'); break;
case 6:$date2=$d->modify('+ 2 day')->format('Y-m-d');  break;
case 1:
case 2:
case 3:
case 4:
case 5:
$date2=$d->format('Y-m-d');
     break;
}
/*	if ($w==0){}
	if ($w==6){ }
	if ((!$w==6)and(!$w==0))	{}*/

return $date2;
//echo '<textarea>'. $date2.'</textarea>';
$cd=0;}

function hollydays($d_in, $d_out,$d_b,$d_o){
$count_day=0;
$in = date_create($d_in);
$out=date_create($d_out);
$b = date_create($d_b);
$o=date_create($d_o);
$u11=($b>=$in);
$u12=($b<$in);
//$u13=($b<=$out);
$u21=($o>$out);
$u22=($o<=$out);
//echo '<p>('.$b->format('d.m.Y').' '.$in->format('d.m.Y').')('.$o->format('d.m.Y').' '.$out->format('d.m.Y').')</p>';
if (($u12==true)and($u21==true))
{ $count_day=(($out->diff($in)->format('%d'))+1);}
if (($u12==true)and($u22==true))
{ $count_day=(($o->diff($in)->format('%d'))+1);}
if (($u11==true)and($u22==true)){ $count_day=(($o->diff($b)->format('%d'))+1);}
if (($u11==true)and($u21==true)){ $count_day=(($out->diff($b)->format('%d'))+1);}
/*
if (($u11==true)/*and($u13==true))
{ $count_day="err";}*/


//echo '  $count_day ='. $count_day;
return $count_day;

}
?>