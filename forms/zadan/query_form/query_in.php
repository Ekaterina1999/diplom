<?
$date_zadan=$_POST['date_zadan'];
$d=date_create($date_zadan);
$year=$d->format('Y');
$choice_list=$_POST['choice_list'];
$vid_zadan=$_POST['vid_zadan'];
$result_zadan=$_POST['result_zadan'];
$id_u=$_POST['u_id'];
include_once("..\..\link\link.php");



$text_q='SELECT max(`num`) FROM `tasks` WHERE`tasks_year`="'.$year.'"' ;

$r=mysql_query ($text_q);
while ($myrow = mysql_fetch_row($r)) {if ($myrow[0]==""){$max_num=1;}else {$max_num=$myrow[0]+1;}}

//echo $text_q." ".$max_num;

$text_in='INSERT INTO `tasks`(`num`, `tasks_year`, `date_tasks`, `id_type_tasks`, `id_results_tasks`) VALUES ("'.$max_num.'", "'.$year.'", "'.$d->format('Y-m-d').'", "'.$vid_zadan.'", "'.$result_zadan.'");';

//echo " ".$text_in;
$insert_tab=mysql_query ($text_in);

$text_q='SELECT `id` FROM `tasks` where `tasks_year`="'.$year.'" and `num`= "'.$max_num.'" and `date_tasks`= "'.$d->format('Y-m-d').'" and `id_type_tasks`= "'.$vid_zadan.'" and `id_results_tasks`="'.$result_zadan.'"' ;

$r1=mysql_query ($text_q);
while ($m_r = mysql_fetch_row($r1)) 
{
		if ($m_r[0]==""){}else {$id=$m_r[0];
		$insert_tab3=mysql_query ('INSERT INTO `complaints_tasks`(`id_complaints`, `id_tasks`)VALUES ( "'.$id.'", "'.$choice_list.'")');
	$insert_tab3=mysql_query ('INSERT INTO `link_task_workes`(`id_user`, `id_tasks`) VALUES ( "'.$id_u.'", "'.$id.'")');


}
echo $max_num;
}



?>