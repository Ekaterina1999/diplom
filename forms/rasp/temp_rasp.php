<?
$basis=$_POST['basis_rasp'];
$user_id=$_COOKIE['userid'];
$obj=$_POST['obj'];
$city=$_POST['city'];
$street=$_POST['street'];
$house=$_POST['house'];
$housing=$_POST['korpus'];
$flat=$_POST['flat'];
$id_v=$_POST['id_v'];
$buf="";

include_once("..\link\link.php");
		if (!mysql_query('SELECT * FROM rasp_obj_id'.$user_id.'_user')){
			mysql_query('create table IF NOT EXISTS rasp_obj_id'.$user_id.'_user (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`id_obj` int(11) NOT NULL,
			`id_city` int(11) NOT NULL,
			`id_street` int(11) NOT NULL,
			`house` int(11) NOT NULL,
			`housing` varchar(3),
			`flat` int(5),
			`id_v` int(11) NOT NULL,
			`id_address` int(11) NOT NULL,
			`flag` int(11) NOT NULL,				
			PRIMARY KEY (`id`)
			)');
			
			}
		if (($obj ==0)or( $city ==0)or($street ==0)or( $house =="")or($id_v ==0)){ 

		}else{//1
		
		
		
		
		$s_obj_tab_if='select  `id_obj`
		from rasp_obj_id'.$user_id.'_user  where `id_obj` =  "'.$obj.'" and `id_city`=  "'.$city.'
		" and `id_street`=   "'.$street.'" and `house`=  "'.$house.'"  and `housing`= "'.strval($housing).'"  
		  and `flat`=   "'.$flat.'" and `id_v`="'.$id_v.'"';
		if(($obj_tab_if=mysql_query ($s_obj_tab_if))==0) {//2	
			
			
			
			
			//find id address
			$f_id_a='select  `id_address`
		from rasp_obj_id'.$user_id.'_user  where `id_obj` =  "'.$obj.'" and `id_city`=  "'.$city.'
		" and `id_street`=   "'.$street.'" and `house`=  "'.$house.'"  and `housing`= "'.strval($housing).'"  
		  and `flat`=   "'.$flat.'"';
			if(($q_f_id_a=mysql_query ($f_id_a))==0) {
			$f_id_a_max='select  (max(`id_address`)+1)
		from rasp_obj_id'.$user_id.'_user  ';
		  $q_f_id_a_max=mysql_query ($f_id_a_max);
		  $id_max_ad=mysql_fetch_row($q_f_id_a_max);
		  $id_ad=$id_max_ad[0];
		//  echo $q_f_id_a_max.$id_max_ad. $id_max_ad[0].' max2';
			}
			else
			{  $id_val_ad=mysql_fetch_row($q_f_id_a);
		  $id_ad=$id_val_ad[0];
		  if ( $id_ad==0){ $f_id_a_max='select  (max(`id_address`)+1)
		from rasp_obj_id'.$user_id.'_user  ';
		  $q_f_id_a_max=mysql_query ($f_id_a_max);
		  $id_max_ad=mysql_fetch_row($q_f_id_a_max);
		  $id_ad=$id_max_ad[0];}
		 // echo $f_id_a.' '. $q_f_id_a.$id_val_ad. $id_val_ad[0].' val2';
		  }
			
			
			//find id_address
			
			
			if ( $id_ad==0){ $id_ad=1;}
			
			
		
				$insert_tab=mysql_query ('INSERT INTO  
					`rasp_obj_id'.$user_id.'_user` (
					`id_obj` ,`id_city`,`id_street`,`house`,`housing`,`flat`,`id_v`,`id_address`,`flag` )
					VALUES ( "'.$obj.'", "'.$city.'", "'.$street.'", "'.$house.'", "'.$housing.'",
					 "'.$flat.'", "'.$id_v.'", "'.$id_ad.'", "1")',$db);
					 
					 }//2
					else{ 
					$obj_tab_if1= mysql_query ($s_obj_tab_if);
				
			
			$count_record=0;
			while ($row_obj_tab_if = mysql_fetch_row($obj_tab_if1))
{

$count_record=$count_record+1;
}
		
			if ($count_record == "")
					{//3
		
		
		//find id address
			$f_id_a='select  `id_address`
		from rasp_obj_id'.$user_id.'_user  where `id_obj` =  "'.$obj.'" and `id_city`=  "'.$city.'
		" and `id_street`=   "'.$street.'" and `house`=  "'.$house.'"  and `housing`= "'.strval($housing).'"  
		  and `flat`=   "'.$flat.'"';
			if(($q_f_id_a=mysql_query ($f_id_a))==0) {
			$f_id_a_max='select  (max(`id_address`)+1)
		from rasp_obj_id'.$user_id.'_user  ';
		  $q_f_id_a_max=mysql_query ($f_id_a_max);
		  $id_max_ad=mysql_fetch_row($q_f_id_a_max);
		  $id_ad=$id_max_ad[0];
		 // echo $q_f_id_a_max.$id_max_ad. $id_max_ad[0].' max2';
			}
			else
			{  $id_val_ad=mysql_fetch_row($q_f_id_a);
		  $id_ad=$id_val_ad[0];
		  if ( $id_ad==0){ $f_id_a_max='select  (max(`id_address`)+1)
		from rasp_obj_id'.$user_id.'_user  ';
		  $q_f_id_a_max=mysql_query ($f_id_a_max);
		  $id_max_ad=mysql_fetch_row($q_f_id_a_max);
		  $id_ad=$id_max_ad[0];}
		//  echo $f_id_a.' '. $q_f_id_a.$id_val_ad. $id_val_ad[0].' val2';
		  }
			
			
			//find id_address
		
		
		if ( $id_ad==0){ $id_ad=1;}
		
				$insert_tab1=mysql_query ('INSERT INTO  
					`rasp_obj_id'.$user_id.'_user` (
					`id_obj` ,`id_city`,`id_street`,`house`,`housing`,`flat`,`id_v`,`id_address`,`flag` )
					VALUES ( "'.$obj.'", "'.$city.'", "'.$street.'", "'.$house.'", "'.$housing.'",
					 "'.$flat.'", "'.$id_v.'", "'.$id_ad.'", "1")',$db);
						
						}//3
						
					 }
					 }//1
					

include_once("Tab_view_rasp.php");

?>