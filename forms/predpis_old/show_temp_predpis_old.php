<?
$x=$_POST['valU'];
$valCh=$_POST['valCh'];
$userid=$_COOKIE['userid'];
$idcheck=$_POST['idcheck'];
$v_d=$_POST['v_d'];
$v_d1=$_POST['v_d1'];

include_once("..\link\link.php");switch ($x) {
case 1:
	 $teat_q='UPDATE `predpis_old_obj_id'.$userid.'_user` SET flag="'.$valCh.'" WHERE id_obj="'.$idcheck.'"';
	//echo $teat_q;

		$q = mysql_query($teat_q);
    break;
case 2:
     $teat_q='UPDATE `predpis_old_obj_id'.$userid.'_user` SET flag="'.$valCh.'" WHERE id_address="'.$idcheck.'"';
	 //	echo $teat_q;

		$q = mysql_query($teat_q);
	    break;
case 3:
     $teat_q='UPDATE `predpis_old_obj_id'.$userid.'_user` SET flag="'.$valCh.'" WHERE id="'.$idcheck.'"';
	 //	echo $teat_q;

		$q = mysql_query($teat_q);
    break;
case 4:
    $teat_q='UPDATE `predpis_old_incoming_id'.$userid.'_user` SET flag="'.$valCh.'" WHERE id="'.$idcheck.'"';
   	//echo $teat_q;

		$q = mysql_query($teat_q);
    break;
	
}
			 
	 $y=0;
for ($y = 0; $y <= (count(v_d)+2); $y++) 
  { 
  if($v_d1[$y]==""){$val="NULL";}else{$val='"'.$v_d1[$y].'"';}
  $teat_q2='UPDATE `predpis_old_obj_id'.$userid.'_user` SET date_predpis='.$val.' WHERE id="'.$v_d[$y].'"';
  echo $teat_q2;
  $q = mysql_query($teat_q2);
  }	


?>