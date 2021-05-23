<?php
include_once("link\link.php");


$w=date('w',strtotime($_POST['data_start']));
if (($w==1)or($w==2)or($w==3)or($w==4)or($w==5)){//1
$date = date_create($_POST['data_start']);
$year=$date->format('Y');
$text_q='SELECT `id`, `current_year`, `date_in`, `date_out`, `type_date` FROM `holidays` where `current_year`="'.$year.'" and ( `date_in`<="'.$_POST['data_start'].'" and  `date_out`>="'.$_POST['data_start'].'")' ;
//echo $text_q;
$r=mysql_query ($text_q);
$hollday=0;
while ($myrow = mysql_fetch_row($r)) 
{//2
 		if ($myrow[0]==""){}else
				{$hollday=1; break;}
}//2

if($hollday==1){}else{
	$date_result=weekend($date,20);
	
	}
if ($date_result==""){}else{
echo'<p><input type="date" name="date_stop" id="date_stop" value="'.$date_result.'"/></p>';}
}//1

function weekend($d,$cd){
$date1= $d->format('Y-m-d');
$p=$cd;
$x=1;
$y=0;
$z=0;
while ($x++<$p){
$date1=$d->modify('+ 1 day')->format('Y-m-d');
$h_d=hollydays($date1);
$week=date('w',strtotime($date1));
switch ($h_d) {
case 0:

if (($week==0)or ($week==6)){$z++;
 $x--;
}

break;
case 1:

 $x--;


break;

case 2:


if (($week==0)or ($week==6)){$z++;

}else{$y++;}

break;

}

//echo '<p>'.$date1.' week'.$week.'  hollyday'.$h_d.'</p>';



}
/*
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
{}*/

return $date1;

$cd=0;}

function hollydays($date1){
$d=date_create($date1);
$year=$d->format('Y');
$text_q='SELECT `id`, `current_year`, `date_in`, `date_out`, `type_date` FROM `holidays` where `current_year`="'.$year.'" ' ;
//echo $text_q;
$r=mysql_query ($text_q);
$hollday=0;
while ($myrow = mysql_fetch_row($r)) 
{//2
if(strtotime($myrow[2]) <= strtotime($date1) && strtotime($date1) <= strtotime($myrow[3]))
 		
				{if ($myrow[4]==1){$hollday=1; }
				else{$hollday=2;}
				}
				//echo '<p>'.$myrow[2].'>='.$date1.' and '.$myrow[3].'<='.$date1.' '.$hollday.'</p>';
}//2
return $hollday;
}
?>