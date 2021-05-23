<?php 
$date = new \DateTime();
 $in=$date->modify('last Monday')->format('Y-m-d');
$out=$date->modify(' +1 week');
$out=$out->modify('last Sunday')->format('Y-m-d');
echo $in.' '.$out;
?>