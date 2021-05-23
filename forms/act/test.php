<? 
	
		include_once("..\link\link.php");
		function city(){
		//$t1='select  id, add_p, root, name FROM  `all` WHERE  `all`.`id_city` IS NULL AND  `all`.`id_r` IS NULL and `lv`=7';
	//	$t1='select id_city, id, add_p, root, name FROM  `all` WHERE id in (SELECT  root FROM  `all` WHERE  `all`.`id_city` IS NULL AND  `all`.`id_r` IS NULL and `lv`=7) and `all`.`id_city` IS not NULL order by id ';
	
	 $q1=mysql_query ('SELECT id_city, id FROM  `city`  where id_city<500 ');

				while ($r = mysql_fetch_row($q1)) 
					{
					//$t="s"
				//	$id=$id.'<p>'.$r[1].'</p>';
					//$t='UPDATE `all` SET  name ="'.$r[1].". ".$r[3].', "+name , root="'.$r[2].'" WHERE `root` ="'.$r[0].'" ';
				$t='UPDATE `all` SET `id_city`="'.$r[0].'" WHERE `root` ="'.$r[1].'" ';
					echo $t;$q=mysql_query ($t);}
				echo "good|good";
				}
				function f(){$q1=mysql_query ('SELECT id_r, id FROM  `r` ');

				while ($r = mysql_fetch_row($q1)) 
					{
			
					$t='UPDATE `all` SET `id_r`="'.$r[0].'" WHERE `root` ="'.$r[1].'" ';
					echo $t;
				$q=mysql_query ($t);}
				echo "good" ;}
	// fun2();		
function  fun2(){
$i=11195;
$t='SELECT `id`,`id_street`,`add_p`,`name`,`id_city` FROM  `all` WHERE  `all`.`id_city` IS not NULL AND `lv` =7 and id_street is null ORDER BY  `name` ' ;
$q1=mysql_query ($t);

				while ($r = mysql_fetch_row($q1)) 
					{
			
					$t='UPDATE `all` SET `id_street`="'.$i.'" WHERE `id` ="'.$r[0].'" ';
					echo $t;
				$q=mysql_query ($t);
				$i++;}
				echo "end";
}
fun3();
function fun3(){
for($x=1; $x<34;$x++){
$user=$x;
$t='INSERT INTO  `link_menu_workers` (`id_menu` ,`id_workers`)VALUES ( "1",  '.$user.')';
echo $t;
$q=mysql_query ($t);
$t='INSERT INTO  `link_menu_workers` (`id_menu` ,`id_workers`)VALUES ( "2",  '.$user.')';
$q=mysql_query ($t);
$t='INSERT INTO  `link_menu_workers` (`id_menu` ,`id_workers`)VALUES ( "5",  '.$user.')';
$q=mysql_query ($t);
$t='INSERT INTO  `link_menu_workers` (`id_menu` ,`id_workers`)VALUES ( "6",  '.$user.')';
$q=mysql_query ($t);
$t='INSERT INTO  `link_menu_workers` (`id_menu` ,`id_workers`)VALUES ( "7",  '.$user.')';
$q=mysql_query ($t);
$t='INSERT INTO  `link_menu_workers` (`id_menu` ,`id_workers`)VALUES ( "8",  '.$user.')';
$q=mysql_query ($t);
$t='INSERT INTO  `link_menu_workers` (`id_menu` ,`id_workers`)VALUES ( "9",  '.$user.')';
$q=mysql_query ($t);
$t='INSERT INTO  `link_menu_workers` (`id_menu` ,`id_workers`)VALUES ( "11",  '.$user.')';
$q=mysql_query ($t);
echo 'user '.$x.' ; ';}
echo "end";
}
function fun1(){
//$t1='Select   root from `all` WHERE  `all`.`id_city` IS NULL AND  `all`.`id_r` IS NULL and `lv`=7 group by root';
//$t1='SELECT `id_street` FROM  `all` WHERE  `all`.`id_city` IS not NULL AND `lv` =7 group by `id_street` having (count(`id_street`)>1)';

//$t1='SELECT id, kod, name FROM  `street_zab` where id>=10000 and id<10500 ';

$y=8;
//echo '<p>'.$x.'</p>';
$t1='SELECT id, kod, name FROM  `city_zab`  where not( `name` like "%.%")';//type_sity<>"99" and type_sity ='.$x.' ';
$q1=mysql_query ($t1);
while ($r = mysql_fetch_row($q1)) 
					{$y++;
		
				//	$t='Select  id, name, add_p, lv, root, id_city, id_r  from `all`  WHERE `id` ="'.$r[0].'" ';		
				
					//while ($r = mysql_fetch_row($q1)) 
				//	{
			
					$t='UPDATE `city_zab` SET `name`="?.'.$r[2].'" WHERE `id` ="'.$r[0].'" ';
					echo $t;
				$q=mysql_query ($t);
				//}//}
				/*$ii=$ii.' '.$r[0];
				$t='SELECT * FROM  `all` WHERE `id_street` ="'.$r[0].'"';			
				$q=mysql_query ($t);
				while ($r1 = mysql_fetch_row($q)) {
				
				echo '<p>'.$r1[0].'|'.iconv("utf-8","windows-1251",$r1[2]).'|'.iconv("utf-8","windows-1251",$r1[3]).'|'.$r1[4].'|'.$r1[5].'|'.$r1[6].'</p>';
				}*/
				
				}echo $ii;
}				
?>