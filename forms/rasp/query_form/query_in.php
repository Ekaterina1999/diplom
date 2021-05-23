<?php 
$basis_rasp=$_POST['basis_rasp'];
$id_com=$_POST['id_com'];
switch($basis_rasp)
{
case(1):
include_once('query_tab_param.php');
 showBasis1($basis_rasp, $id_com);

break;

case(3):
include_once('query_tab_param.php');
 showBasis3($basis_rasp, $id_com);

break;

default:
include_once('fun_query.php');
 showBasis245($text);
break;
}



?>