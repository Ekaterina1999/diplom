<?


 include_once("..\link\link.php");
 $list=$_POST['list'];
 $d1=$_POST['d1'];
 $d2=$_POST['d2'];

       $t_q_w=  ' SELECT `id` FROM `workers` WHERE `id_department`='.$list.'';
		// echo $t_q1;
$q_w1=mysql_query ($t_q_w)or die (Mysql_error());
while ($r_w1 = mysql_fetch_row($q_w1))
 {
if($otdel==""){$otdel='"'.$r_w1[0].'"';}else{$otdel=$otdel.',"'.$r_w1[0].'"';}

  }
  $t_q_otdel1=  'SELECT `id_act`FROM `link_act_workes` WHERE `id_user` in('.$otdel.')';
			// echo $t_q_otdel1;
			$q_otdel1=mysql_query ($t_q_otdel1)or die (Mysql_error());
			while ($r_otdel1 = mysql_fetch_row($q_otdel1))
			 {
			 		if($otdel3==""){$otdel3='"'.$r_otdel1[0].'"';}
					else{$otdel3=$otdel3.',"'.$r_otdel1[0].'"';}
			  }  
			  $t_q_otdel2=  'SELECT `id_order` FROM `link_order_workers` WHERE `id_workers` in ('.$otdel.')';
		// echo $t_q_otdel1;
		$q_otdel2=mysql_query ($t_q_otdel2)or die (Mysql_error());
		while ($r_otdel2 = mysql_fetch_row($q_otdel2))
		 {
		 		if($otdel2==""){$otdel2='"'.$r_otdel2[0].'"';}
				else{$otdel2=$otdel2.',"'.$r_otdel2[0].'"';}
		  }
// echo $otdel;
 
$tab='<table id="tab_report" cellspacing="0" cellpadding="0" border="2" >
  <tr>
    <td height="115" width="46">&#8470;</td>
   
    <td width="324"> &#1054;&#1088;&#1075;&#1072;&#1085;&#1080;&#1079;&#1072;&#1094;&#1080;&#1103;</td>
        <td width="106">&#1048;&#1053;&#1053;</td>
   <td width="117">&#1056;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1103;</td>
    
    <td width="64">&#1055;&#1088;&#1077;&#1076;&#1086;&#1089;&#1090;&#1077;&#1088;&#1077;&#1078;&#1077;&#1085;&#1080;&#1103;</td>
    <td width="64">&#1040;&#1082;&#1090;&#1099;&nbsp;</td>
    <td width="100">&#1055;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077;</td>
    
    <td width="76">&#1055;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;</td>
	<td>        &#1053;&#1077;&#1080;&#1089;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1099;&#1077; &#1087;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1103;</td>
  </tr>';
$t_q_r=  'SELECT `id`,`Name_org`,`inn` FROM `complaints_obj` order by `Name_org`';
$c=0;
$q_r=mysql_query ($t_q_r)or die (Mysql_error());
while ($r_q_r = mysql_fetch_row($q_r))
{ 
	 $c++;
		$tab=$tab.'<tr><td height="115" width="46">'.$c.'</td>
		<td width="78">'.iconv("utf-8","windows-1251",$r_q_r[1]).'</td>
	    <td width="324">'.iconv("utf-8","windows-1251",$r_q_r[2]).'</td>';
	  
		if 	($otdel2==""){$id_tab="";}else{$id_tab=" and `id_order` in(".$otdel2.")";}
	    $t_q_rasp1=  'SELECT count(*) FROM `order` WHERE `id_order` in
		(SELECT  `id_order` FROM 		`link_order_obj` WHERE `id_obj_c`="'.$r_q_r[0].'")
		 and `date_order`>="'.$d1.'" and `date_order` <="'.$d2.'"'.$id_tab;
		//echo	  $t_q1;
		echo"";
		$q_rasp1=mysql_query ($t_q_rasp1)or die (Mysql_error());
		while ($r_rasp1 = mysql_fetch_row($q_rasp1))
		 {
 			$tab=$tab.'<td height="115" width="46">'.$r_rasp1[0].'</td>';
		 }
  
		 //_pred
  		  if ($otdel==""){$id_tab="";}else{$id_tab=" and `id_user` in(".$otdel.")";}  
 	      $t_q_pred1=  'SELECT count(*) FROM `caveat` 
		  WHERE `id_obj` ="'.$r_q_r[0].'" and `date_caveat`>="'.$d1.'" 
		  and `date_caveat` <="'.$d2.'"'.$id_tab;
			//  echo	  $t_q1;
			$q_pred1=mysql_query ($t_q_pred1)or die (Mysql_error());
			while ($r_pred1 = mysql_fetch_row($q_pred1))
				 {
				  $tab=$tab.'<td height="115" width="46">'.$r_pred1[0].'</td>';
				  }
  		  
			if 	($otdel3==""){$id_tab="";}
			else{$id_tab=" and `id` in(".$otdel3.")";}      
	   	    $t_q_act1=  'SELECT count(*) FROM `act`
			 WHERE `obj_id` ="'.$r_q_r[0].'" 
			 and `date_act`>="'.$d1.'" and `date_act` <="'.$d2.'"'.$id_tab;
			 $q_act1=mysql_query ($t_q_act1)or die (Mysql_error());
			 while ($r_act1 = mysql_fetch_row($q_act1))
			 	 {
				  $tab=$tab.'<td height="115" width="46">'.$r_act1[0].'</td>';
				  }
			 $t_q_predpis1=  'SELECT count(*) FROM `ordinance` 
			 WHERE `id_act` in (SELECT id FROM `act` 
			 WHERE `obj_id` ="'.$r_q_r[0].'" '.$id_tab.')
			  and `Date_ordinance`>="'.$d1.'" and `Date_ordinance` <="'.$d2.'"';
			echo  $t_q_predpis1;
				$q_predpis1=mysql_query ($t_q_predpis1)or die (Mysql_error());
				while ($r_predpis1 = mysql_fetch_row($q_predpis1))
				 {
				 	 $tab=$tab.'<td height="115" width="46">'.$r_predpis1[0].'</td>';
				 }
			//_protocol
			$prot_id="";
			$t_q_protocol1=  'SELECT `id` FROM `notify_protocol` 
			WHERE `id_act` in (SELECT `id` FROM `act` WHERE `obj_id` ="'.$r_q_r[0].'" '.$id_tab.')';
			//echo $t_q1;
					echo $t_q_protocol1;
			$q_protocol1=mysql_query ($t_q_protocol1)or die (Mysql_error());
			while ($r_protocol1 = mysql_fetch_row($q_protocol1))
				 {
				 		if ($prot_id=="") {$prot_id=$r_protocol1[0];}
						else{$prot_id=$prot_id.', '.$r_protocol1[0];}
				  }
			if ($prot_id=="") { $tab=$tab.'<td height="115" width="46">0</td>';}
			else{
			     $t_q1=  'SELECT count(*) FROM `protocol` 
				 WHERE `id_notify` in ('.$prot_id.') 
				 and `Date_protocol`>="'.$d1.'" and `Date_protocol` <="'.$d2.'"';
				 // echo $t_q1;
				 $q1=mysql_query ($t_q1)or die (Mysql_error());
				 while ($r1 = mysql_fetch_row($q1))
				 		 {	
						  $tab=$tab.'<td height="115" width="46">'.$r1[0].'</td>';
						   }
  
  				}
           $t_q_i_p1=  ' SELECT count(*) FROM `ordinance` WHERE `id` in(SELECT `id_ordinance` FROM `ordinance_violation` WHERE  `Date_plan`>="'.$d1.'"  and `Date_plan`<="'.$d2.'" and `eliminated`="0")  and`id_act` in (SELECT `id` FROM `act` WHERE `obj_id`="'.$r_q_r[0].'"'.$id_tab.')';
		// echo $t_q1;
$q_i_p1=mysql_query ($t_q_i_p1)or die (Mysql_error());
while ($r_i_p1 = mysql_fetch_row($q_i_p1))
 {
 
 $tab=$tab.'<td height="115" width="46">'.$r_i_p1[0].'</td>';
  }
  
$tab=$tab. ' </tr>';
}
 
 $tab=$tab.'</table>';
echo $tab;

?>