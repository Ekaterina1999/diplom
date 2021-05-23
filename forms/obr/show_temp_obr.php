<?
$x=$_POST['valU'];
$valCh=$_POST['valCh'];
$userid=$_COOKIE['userid'];
$idcheck=$_POST['idcheck'];


include_once("..\link\link.php");

switch ($x) {
case 1:
	 $teat_q='UPDATE `obr_obj_id'.$userid.'_user` SET flag="'.$valCh.'" WHERE id_obj="'.$idcheck.'"';
    break;
case 2:
     $teat_q='UPDATE `obr_obj_id'.$userid.'_user` SET flag="'.$valCh.'" WHERE id_address="'.$idcheck.'"';
	    break;
case 3:
     $teat_q='UPDATE `obr_obj_id'.$userid.'_user` SET flag="'.$valCh.'" WHERE id="'.$idcheck.'"';
    break;
case 4:
    $teat_q='UPDATE `obr_incoming_id'.$userid.'_user` SET flag="'.$valCh.'" WHERE id="'.$idcheck.'"';
   
    break;
}
			echo $teat_q;

		$q = mysql_query($teat_q);


?>